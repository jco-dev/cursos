<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactoModel;
use App\Models\InformacionCursoModel;
use App\Models\PreinscripcionModel;

class Informacion extends BaseController
{
    public $model;
    public $preinscripcion_model;
    public $contacto_model;
    public $informacion_curso_model;
    public function __construct()
    {
        $this->preinscripcion_model = new PreinscripcionModel();
        $this->contacto_model = new ContactoModel();
        $this->informacion_curso_model = new InformacionCursoModel();
    }

    public function index($id)
    {
        $encrypter = \Config\Services::encrypter();
        $decrypt_id = $encrypter->decrypt(hex2bin($id));
        $configuracion = $this->preinscripcion_model->getConfiguracion($decrypt_id);
        return view('informacion/index', ['configuracion' => $configuracion, 'id' => $id]);
    }

    public function save()
    {
        $encrypter = \Config\Services::encrypter();
        $id_course =  $encrypter->decrypt(hex2bin($this->request->getPost('id')));
        $celular = trim($this->request->getPost('celular'));
        $nombre = mb_convert_case(preg_replace("/\s+/", " ", trim($this->request->getPost('nombre'))), MB_CASE_UPPER);

        // verificar registro contacto
        $contacto = $this->contacto_model->where('celular', $celular)->find();
        $id_contacto = NULL;
        if ($contacto) {
            $id_contacto = $contacto[0]->id_contacto;
        } else {
            $id_contacto = $this->contacto_model->insert([
                'celular' => $celular,
                'nombre' => $nombre
            ]);
        }

        $response = $this->informacion_curso_model->where(['id_contacto' => $id_contacto, 'id_course' => $id_course])->find();
        if (!$response) {
            if ($this->informacion_curso_model->insert(['id_contacto' => $id_contacto, 'id_course' => $id_course]))
                return $this->response->setJSON(['exito' => "Registro completado correctamente"]);
            else
                return $this->response->setJSON(['error' => "Error al registrarse por favor contáctese con el número 70648629"]);
        } else
            return $this->response->setJSON(['exito' => "Registro completado correctamente"]);
    }
}
