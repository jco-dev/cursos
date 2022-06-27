<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Inscripcion extends BaseController
{
    public function index($id)
    {
        $encrypter = \Config\Services::encrypter();
        return var_dump($id, $encrypter->decrypt(hex2bin($id)));
    }
}
