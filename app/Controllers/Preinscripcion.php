<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BancoModel;
use App\Models\CuponesParticipanteModel;
use App\Models\CuponModel;
use App\Models\DepositoBancarioModel;
use App\Models\ModuloModel;
use App\Models\ParticipanteModel;
use App\Models\PreinscripcionModel;
use COM;

class Preinscripcion extends BaseController
{
    public $model;
    public $participante_model;
    public $cupon_model;
    public $banco_model;
    public $modulo_model;
    public $cupones_participante_model;
    public $deposito_bancario_model;
    public function __construct()
    {
        $this->model = new PreinscripcionModel();
        $this->participante_model = new ParticipanteModel();
        $this->cupon_model = new CuponModel();
        $this->cupones_participante_model = new CuponesParticipanteModel();
        $this->deposito_bancario_model = new DepositoBancarioModel();
        $this->banco_model = new BancoModel();
    }

    public function index($id)
    {
        $encrypter = \Config\Services::encrypter();
        $decrypt_id = $encrypter->decrypt(hex2bin($id));
        $municipios = $this->model->getMunicipiosDepartamentos();

        $this->modulo_model = new ModuloModel();
        $bancos = $this->banco_model->where('estado', 'REGISTRADO')->findAll();
        $modulos = $this->modulo_model->where(['estado' => 'REGISTRADO', 'id_course' => $decrypt_id])->findAll();
        $configuracion = $this->model->getConfiguracion($decrypt_id);
        return view("preinscripcion/index", ['id' => $id, 'municipios' => $municipios, 'bancos' => $bancos, 'configuracion' => $configuracion, 'modulos' => $modulos]);
    }

    public function verificarCi()
    {
        $ci = $this->request->getPost('ci');
        $response = $this->participante_model->where('ci', $ci)->find();
        return $this->response->setJSON($response);
    }

    public function verificarCupon()
    {
        $ci = $this->request->getPost('ci');
        $response = $this->cupon_model->getCuponesUsuario($ci);
        $data = array();
        if ($response) {
            foreach ($response as $value) {
                array_push($data, $value->numero_cupon);
            }
        }

        return $this->response->setJSON(['cupones' => $data]);
    }

    public function porcentajeCupon()
    {
        $numero_cupon = $this->request->getPost('numero_cupon');
        $ci = $this->request->getPost('ci');
        $cupon = $this->cupon_model->searchCuponNumero($ci, $numero_cupon);
        return $this->response->setJSON($cupon[0]->porcentaje_descuento);
    }

    public function verificarRegistroCurso()
    {
        $encrypter = \Config\Services::encrypter();

        $ci = $this->request->getPost('ci');
        $id_course = $encrypter->decrypt(hex2bin($this->request->getPost('id')));
        $response = $this->model->verificarPreinscripcionCurso($ci, $id_course);
        if ($response)
            return $this->response->setJSON(['data' => true]);
        else
            return $this->response->setJSON(['data' => false]);
    }

    public function save()
    {
        $encrypter = \Config\Services::encrypter();

        if ($this->model->verificarPreinscripcionCurso(trim($this->request->getPost('ci')), $encrypter->decrypt(hex2bin($this->request->getPost('id'))))) {
            return $this->response->setJSON(['info' => mb_convert_case(preg_replace("/\s+/", " ", trim($this->request->getPost('nombre'))), MB_CASE_UPPER) . ' ' . mb_convert_case(preg_replace("/\s+/", " ", trim($this->request->getPost('nombre'))), MB_CASE_UPPER) . ": Ya se encuentra registrado en el curso"]);
        }

        if (!$this->validate('preinscripcion')) {
            return $this->response->setJSON(['warning' => $this->validator->getErrors()]);
        }

        // verificar registro participante //
        $participante = $this->participante_model->where('ci', trim($this->request->getPost('ci')))->find();
        if ($participante) {
            $id_participante = $participante[0]['id_participante'];
        } else {
            // data participante
            $data_participante = [
                'ci'                =>  trim($this->request->getPost('ci')),
                'expedido'          =>  $this->request->getPost('expedido'),
                'correo'            =>  $this->request->getPost('correo'),
                'nombre'            =>  mb_convert_case(preg_replace("/\s+/", " ", trim($this->request->getPost('nombre'))), MB_CASE_UPPER),
                'paterno'           =>  mb_convert_case(preg_replace("/\s+/", " ", trim($this->request->getPost('paterno'))), MB_CASE_UPPER),
                'materno'           =>  mb_convert_case(preg_replace("/\s+/", " ", trim($this->request->getPost('materno'))), MB_CASE_UPPER),
                'genero'            =>  $this->request->getPost('genero'),
                'fecha_nacimiento'  =>  $this->request->getPost('gestion') . '-' . $this->request->getPost('mes') . '-' . $this->request->getPost('dia'),
                'celular'           =>  trim($this->request->getPost('celular')),
                'id_municipio'      => trim($this->request->getPost('ciudad_residencia'))
            ];
            $id_participante = $this->participante_model->insert($data_participante);
        }

        // subir imagen respaldo
        $img = $this->request->getFile('respaldo_transaccion');
        $ruta = NULL;
        if ($img->isValid() && !$img->hasMoved()) {
            $ruta = "assets/img/respaldo_pago/";
            $name = $img->getRandomName();
            $img->move(FCPATH . $ruta, $name);
            $ruta =  $ruta . '' . $name;
        }

        // verificar si el cupon el valido //
        $response = $this->model->verificarCuponCi(trim($this->request->getPost('ci')), $this->request->getPost('cupon_participante'));
        if (count($response) > 0) {
            $id_cupones_participante = $response[0]->id_cupones_participante;
        } else {
            $id_cupones_participante = NULL;
        }

        // data preinscripcion
        $data_preinscripcion = [
            'id_participante'         => $id_participante,
            'id_course'               => $encrypter->decrypt(hex2bin($this->request->getPost('id'))),
            'id_cupones_participante' => $id_cupones_participante,
            'tipo_pago'               => trim($this->request->getPost('modalidad_inscripcion')),
            'nro_transaccion'         => trim($this->request->getPost('nro_transaccion')),
            'monto_pago'              => trim($this->request->getPost('monto_pago')),
            'fecha_pago'              => $this->request->getPost('fecha_pago'),
            'tipo_certificacion'      => trim($this->request->getPost('tipo_certificado_solicitado')),
            'certificacion'           => trim($this->request->getPost('certificacion')),
            'respaldo_pago'           => $ruta,
        ];

        if ($id_preinscripcion = $this->model->insert($data_preinscripcion)) {
            if ($id_cupones_participante != NULL)
                $this->cupones_participante_model->update(['id_cupones_participante' => $id_cupones_participante], ['utilizado_el' => date('Y-m-d H:i:s'), 'estado' => "UTILIZADO"]);
            if ($this->banco_model->where('id_banco', $this->request->getPost('id_banco'))->find()) {
                $this->deposito_bancario_model->insert([
                    'id_preinscripcion' => $id_preinscripcion,
                    'id_banco' => $this->request->getPost('id_banco'),
                    'fecha' => date('Y-m-d')
                ]);
            }
            return $this->response->setJSON(['exito' => "Registro completado correctamente"]);
        } else {
            return $this->response->setJSON(['error' => "Error al registrarse al curso"]);
        }
    }
}
