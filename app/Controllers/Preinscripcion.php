<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BancoModel;
use App\Models\CuponModel;
use App\Models\ModuloModel;
use App\Models\ParticipanteModel;
use App\Models\PreinscripcionModel;

class Preinscripcion extends BaseController
{
    public $model;
    public $participante_model;
    public $cupon_model;
    public $banco_model;
    public $modulo_model;
    public function __construct()
    {
        $this->model = new PreinscripcionModel();
        $this->participante_model = new ParticipanteModel();
        $this->cupon_model = new CuponModel();
    }

    public function index($id)
    {
        $encrypter = \Config\Services::encrypter();
        $decrypt_id = $encrypter->decrypt(hex2bin($id));
        $municipios = $this->model->getMunicipiosDepartamentos();
        $this->banco_model = new BancoModel();
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

    public function save()
    {
        var_dump($_REQUEST, $_FILES);
    }
}
