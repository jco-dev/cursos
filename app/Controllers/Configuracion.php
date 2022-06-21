<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;

class Configuracion extends BaseController
{
    public $model;
    public function __construct()
    {
        $this->model = new ConfiguracionModel();
    }

    public function index()
    {
        return view('configuracion/index');
    }

    public function ajaxDatatable()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );
    }
}
