<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ofertas extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Ofertas',
            // 'ofertas' => $this->OfertasModel->getAll()
        ];
        return view('ofertas/index', $data);

    }
}
