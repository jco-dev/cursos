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
    protected $db;
    public function __construct()
    {
        $this->model       = new InscripcionModel();
        $this->curso_model = new CursoModel();
        $this->user_model  = new UserModel();
        require_once APPPATH . 'ThirdParty/ssp.class.php';
        $this->db = db_connect();
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

    public function participantes($id)
    {
        $this->data['fullname'] = $this->curso_model->find($id)['fullname'];
        $this->data['shortname'] = $this->curso_model->find($id)['shortname'];
        $this->data['id'] = $id;
        return view('inscripcion/participantes', $this->data);
    }

    public function ajaxDatatable()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "praq_vista_listado_inscripcion";

        //primary key
        $primaryKey = "id_inscripcion";
        $condicion = 'id_course = ' . $this->request->getVar('id');

        $columns = array(
            array(
                "db" => "id_inscripcion",
                "dt" => 0,
            ),
            array(
                "db" => "participante",
                "dt" => 1, NULL
            ),
            array(
                "db" => "calificacion_final",
                "dt" => 2, NULL
            ),
            array(
                "db" => "tipo_participacion",
                "dt" => 3,
                "formatter" => function ($d) {
                    return '<span class="badge badge-info">' . $d . '</span>';
                }
            ),
            array(
                "db" => "certificacion_solicitada",
                "dt" => 4,
                'formatter' => function ($d, $row) {
                    $curso = ($d === "CURSO") ? 'selected' : '';
                    $modulo = ($d === "MODULO") ? 'selected' : '';
                    $ambos = ($d === "AMBOS") ? 'selected' : '';
                    return '<select id="select-tipo-participacion" data-id="' . $row['id_inscripcion'] . '" class="custom-select form-control">
                        <option value="CURSO" ' .  $curso . ' >CURSO</option>
                        <option value="MODULO" ' .  $modulo . '>MODULO</option>
                        <option value="AMBOS" ' .  $ambos . '>AMBOS</option>
                    </select>';
                }
            ),
            array(
                "db" => "estado",
                "dt" => 5,
                'formatter' => function ($d, $row) {
                    $registrado = ($d === "REGISTRADO") ? 'selected' : '';
                    $eliminado = ($d === "ELIMINADO") ? 'selected' : '';
                    return '<select id="select-estado-inscripcion" data-id="' . $row['id_inscripcion'] . '" class="custom-select form-control">
                        <option value="REGISTRADO" ' .  $registrado . ' >REGISTRADO</option>
                        <option value="ELIMINADO" ' .  $eliminado . '>ELIMINADO</option>
                    </select>';
                }
            ),
            array(
                "db" => "id_inscripcion",
                "dt" => 6,
                "formatter" => function ($id, $row) {
                    return '<a href="javascript:;" id="btn-edit-inscripcion" data-id="' . $id . '" data-participante="' . $row['participante'] . '" class="btn btn-sm btn-clean btn-light-warning btn-icon"><i class="la la-pen"></i></a>
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-light-primary btn-icon"><i class="la la-print"></i></a>';
                }
            ),
        );

        echo json_encode(
            \SSP::complex($_GET, $dbDetails, $table, $primaryKey, $columns, $condicion)
        );
    }

    public function estadoInscripcion()
    {
        $id = $this->request->getVar('id');
        $estado = $this->request->getVar('value');
        if ($this->model->update($id, ['estado' => $estado]))
            return $this->response->setJSON(['exito' => 'Se actualizó el estado de la inscripción']);
        else
            return $this->response->setJSON(['error' => 'No se puede actualizar el estado de la inscripción']);
    }

    public function edit()
    {
        $id = $this->request->getVar('id');
        $data = $this->model->find($id);
        return $this->response->setJSON(['data' => $data, 'vista' => view('inscripcion/partials/frmEdit', ['id' => $id])]);
    }

    public function update()
    {
        $id_inscripcion = $this->request->getPost('id_inscripcion');
        $data = [
            'calificacion_final' => $this->request->getPost('calificacion_final'),
            'tipo_participacion' => $this->request->getPost('tipo_participacion'),
        ];
        if ($this->model->update($id_inscripcion, $data))
            return $this->response->setJSON(['success' => 'Se actualizó la inscripción']);
        else
            return $this->response->setJSON(['error' => 'No se puede actualizar la inscripción']);
    }

    public function tipoParticipacion()
    {
        $id = $this->request->getPost('id');
        $certificacion_solicitada = $this->request->getPost('value');
        if ($this->model->update($id, ['certificacion_solicitada' => $certificacion_solicitada]))
            return $this->response->setJSON(['exito' => 'Se actualizó el correctamente el tipo de participación']);
        else
            return $this->response->setJSON(['error' => 'No se puede actualizar el tipo de participación']);
    }
}
