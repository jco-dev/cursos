<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Verificar extends BaseController
{

    public function index()
    {
        if ($this->request->getGet('id') && $this->request->getGet('id') != NULL) {
            echo view('verificar/certificacion/success', ['id' => $this->request->getGet('id')]);
        } else {
            return redirect()->to(base_url('ofertas'));
        }
    }
}
