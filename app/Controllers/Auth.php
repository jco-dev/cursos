<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class Auth extends BaseController
{
    public $usuario_model;
    protected $session;
    public function  __construct()
    {
        $this->usuario_model = new  AuthModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function autentificar()
    {
        $nombre_usuario = $this->request->getPost('username');
        $clave_usuario = $this->request->getPost('password');
        $user = $this->usuario_model->getUsuario($nombre_usuario, $clave_usuario);
        if ($user) {
            $person = $this->usuario_model->getPersona($user['id_usuario']);
            $this->session->set([
                'id_usuario' => $user['id_usuario'],
                'nombres'    => $person['nombre'],
                'paterno'    => $person['paterno'],
                'materno'    => $person['materno'],
                'email'      => $person['correo'],
                'celular'    => $person['celular'],
                'logged_in'  => true
            ]);
            return redirect()->to(base_url('/principal'))->with('success', 'Bienvenido ' . $user['nombre_usuario']);
        } else {
            return redirect()->to(base_url('/login'));
        }
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->route('/');
    }
}
