<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CursoModel;
use App\Models\InscripcionModel;
use App\Models\UserModel;

class Inscripcion extends BaseController
{
    public $model;
    public $curso_model;
    public $user_model;
    public function __construct()
    {
        $this->model       = new InscripcionModel();
        $this->curso_model = new CursoModel();
        $this->user_model  = new UserModel();
    }

    public function verificarListado()
    {
        $moodle = \Config\Database::connect('moodle');
        $moodle->connect();
        $builder = $moodle->table('course');
        $builder->select('*');
        $query = $builder->get();
        $result = $query->getResult();

        // local
        $response = $this->curso_model->getAll();

        // verificar //
        if (count($result) > count($response))
            $this->actualizarListadoCurso($result);
        $moodle->close();
    }

    public function actualizarListadoCurso($result)
    {
        foreach ($result as $value) {
            $data = [
                'id' => $value->id,
                'category' => $value->category,
                'sortorder' => $value->sortorder,
                'fullname' => $value->fullname,
                'shortname' => $value->shortname,
                'timecreated' => $value->timecreated,
            ];

            // verificar registro
            $response = $this->model->where('id', $value->id)->first();
            if (!$response) {
                $this->model->insert($data);

                // Ingresar a la configuración
                $id_configuracion = $this->configuracion_model->insert([
                    'id_course' => $value->id,
                    'id_tipo_certificado' => NULL,
                    'informe' => 'NO',
                    'estado' => 'REGISTRADO'
                ]);


                if (is_numeric($id_configuracion)) {
                    // Ingresar a la publicación
                    $this->publicacion_model->insert([
                        'id_configuracion' => $id_configuracion,
                        'nota_aprobacion' => 65,
                        'estado' => 'REGISTRADO',
                    ]);

                    // Ingresar certificado
                    $this->certificado_model->insert([
                        'id_configuracion' => $id_configuracion,
                        'estado' => 'REGISTRADO',
                    ]);

                    // Ingresar personalización
                    $this->personalizacion_model->insert([
                        'id_configuracion' => $id_configuracion,
                        'estado' => 'REGISTRADO',
                    ]);

                    // Ingresar entrega
                    $this->entrega_model->insert([
                        'id_configuracion' => $id_configuracion,
                        'estado' => 'REGISTRADO',
                    ]);
                }
            }
        }
    }

    public function index()
    {
        $this->verificarListado();
        $id = $this->request->getVar('id');
        $response = $this->model->getUsersMoodle($id);
        $user = $this->model->findAll();
        $update = 0;
        $insert = 0;
        if (count($response) > count($user))
            $this->actualizarListadoUsuario($response);

        $response = $this->model->getUsersCourse($id);
        if (!$response)
            return $this->response->setJSON(['warning' => 'No hay participantes en el curso']);

        foreach ($response as $value) {
            $this->user_model->update(
                $value->id_user_moodle,
                ['firstname' => $value->nombres, 'lastname' => $value->apellidos, 'email' => $value->email]
            );

            // verificar inscripcion en el curso //
            if ($inscripcion = $this->model->where(['id_course' => $id, 'id_user' => $value->id_user_moodle])->first()) {
                $this->model->update(
                    $inscripcion->id_inscripcion,
                    ['calificacion_final' => $value->nota]
                );
                $update++;
            } else {
                $response = $this->model->insert([
                    'id_course' => $id,
                    'id_user' => $value->id_user_moodle,
                    'calificacion_final' => $value->nota,
                    'certificacion_solicitada' => 'CURSO',
                    'tipo_participacion' => 'PARTICIPANTE'
                ]);
                $insert++;
            }
        }
        return $this->response->setJSON(['exito' => 'Se actualizaron ' . $update . ' registros y se ingresaron ' . $insert . ' registros de participantes']);
    }

    public function actualizarListadoUsuario($userMoodle)
    {
        foreach ($userMoodle as $value) {
            $data = [
                'id' => $value->id,
                'username' => $value->username,
                'firstname' => $value->firstname,
                'lastname' => $value->lastname,
                'email' => $value->email,
                'auth' => $value->auth,
                'password' => $value->password,
                'city' => $value->city,
            ];

            // verificar registro
            $response = $this->user_model->where('id', $value->id)->first();
            if (!$response) {
                $this->user_model->insert($data);
            }
        }
    }
}
