<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CertificadoModel;
use App\Models\ConfiguracionModel;
use App\Models\CursoModel;
use App\Models\EntregaModel;
use App\Models\PersonalizacionModel;
use App\Models\PublicacionModel;

class Curso extends BaseController
{
    private $db;
    public $model;
    public $configuracion_model;
    public $publicacion_model;
    public $certificado_model;
    public $personalizacion_model;
    public $entrega_model;
    public $numeroAnterior = NULL;
    public function __construct()
    {
        require_once APPPATH . 'ThirdParty/ssp.class.php';
        $this->db = db_connect();
        $this->model = new CursoModel();
        $this->configuracion_model = new ConfiguracionModel();
        $this->publicacion_model = new PublicacionModel();
        $this->certificado_model = new CertificadoModel();
        $this->personalizacion_model = new PersonalizacionModel();
        $this->entrega_model = new EntregaModel();
        $this->verificarListado();
    }

    public function index()
    {
        return view('curso/index');
    }

    public function verificarListado()
    {
        // moodle
        $moodle = \Config\Database::connect('moodle');
        $moodle->connect();
        $builder = $moodle->table('course');
        $builder->select('*');
        // $builder->limit(10);
        $query = $builder->get();
        $result = $query->getResult();

        // local
        $response = $this->model->getAll();

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
                    'fecha_inicio' => '2021-06-19',
                    'fecha_fin' => '2021-06-19',
                    'fecha_limite_inscripcion' => '2021-06-19',
                    'fecha_certificacion' => '2021-06-19',
                    'informe' => 'NO',
                    'estado' => 'REGISTRADO'
                ]);


                if (is_numeric($id_configuracion)) {
                    // Ingresar a la publicación
                    $this->publicacion_model->insert([
                        'id_configuracion' => $id_configuracion,
                        'nota_aprobacion' => 65,
                        'carga_horaria' => 60,
                        'descripcion' => 'NULL',
                        'banner' => 'NULL',
                        'celular_referencia' => '62332648',
                        'inversion' => 100,
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

    public function ajaxDatatable()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "vista_listado_cursos";

        //primary key
        $primaryKey = "id";

        $columns = array(
            array(
                "db" => "id",
                "dt" => 0,
            ),
            array(
                "db" => "fullname",
                "dt" => 1, NULL
            ),
            array(
                "db" => "shortname",
                "dt" => 2,
                "formatter" => function ($d, $row) {
                    $numero = random_int(0, 6);
                    $this->numeroAnterior  = $numero;
                    $status = [
                        'success',
                        'danger',
                        'success',
                        'warning',
                        'dark',
                        'primary',
                        'info',
                    ];
                    if ($this->numeroAnterior == $numero){
                        $numero = random_int(0, 6);
                        $this->numeroAnterior  = $numero;
                    }

                    $estado = $status[$numero];
                    return '<span class="badge badge-' . $estado . '">' . $d . '</span>';
                }
            ),
            array(
                "db" => "tipo_certificado",
                "dt" => 3,
                "formatter" => function ($d, $row) {
                    if ($d == "" || $d == NULL)
                        return '<img class="img-thumbnail" width="50" heigth="50" src="' . base_url('assets/media/default/default.jpg') . '" alt="Imagen tipo certificado" />';
                    else
                        return '<img class="img-thumbnail" width="50" heigth="50" src="' . base_url($d) . '" alt="Imagen tipo certificado" />';
                }
            ),
            array(
                "db" => "inscritos",
                "dt" => 4,
            ),
            array(
                "db" => "preinscritos",
                "dt" => 5,
            ),
            array(
                "db" => "modulos",
                "dt" => 6,
            ),
            array(
                "db" => "fecha_inicio",
                "dt" => 7,
                "formatter" => function ($d, $row) {
                    $date = date_create($d);
                    return date_format($date, 'd/m/Y');
                }
            ),
            array(
                "db" => "informe",
                "dt" => 8,
                'formatter' => function ($d, $row) {
                    if ($d === "Entregado")
                        return '<span class="label label-lg font-weight-bold label-light-success label-inline">SI</span>';
                    else
                        return '<span class="label label-lg font-weight-bold label-light-danger label-inline">NO</span>';
                }
            ),
            array(
                "db" => "id",
                "dt" => 9,
                "formatter" => function ($id, $row) {
                    return '<div class="dropdown dropdown-inline lista-opciones">
                    <a href="#" class="btn btn-light-primary btn-sm font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones</a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                       <ul class="navi flex-column navi-hover py-2">
                          <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                             Elige una acción:
                          </li>
                          <li class="navi-item">
                             <a onclick="inscripcion_estudiantes(' . $id . ')" type="button" id="btn_inscripcion" data-id=' . $id . ' class="navi-link" title="Inscripción de estudiantes de la plataforma moodle">
                             <span class="navi-icon"><i class="la la-pen-alt"></i></span>
                             <span class="navi-text">Inscripción participantes</span>
                             </a>
                          </li>
                          <li class="navi-item">
                             <a href="' . base_url(" cursos/ver_estudiantes/" . $id) . '" class="navi-link" title="Participantes del curso">
                             <span class="navi-icon"><i class="la la-users"></i></span>
                             <span class="navi-text">Participantes</span>
                             </a>
                          </li>
                          <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                             CERTIFICACIÓN:
                          </li>
                          <li class="navi-item">
                             <a onclick="imprimir_certificados(' . $id . ')" type="button" id="btn_imprimir_todos" data-id=' . $id . ' class="navi-link" title="Imprimir certificados del curso">
                             <span class="navi-icon"><i class="la la-print"></i></span>
                             <span class="navi-text">Certificados</span>
                             </a>
                          </li>
                          <li class="navi-item">
                             <a onclick="imprimir_certificado_blanco(' . $id . ')" type="button" id="btn_imprimir_blanco" data-id=' . $id . ' class="navi-link" title="Imprimir certificado en blanco del curso">
                             <span class="navi-icon"><i class="la la-print"></i></span>
                             <span class="navi-text">Cert. Blanco</span>
                             </a>
                          </li>
                          <li class="navi-item">
                             <a onclick="enviar_certificados_correo(' . $id . ')" type="button" id="btn_enviar_por_correo" data-id=' . $id . ' class="navi-link" title="Enviar certificados del curso por correo">
                             <span class="navi-icon"><i class="la la-mail-bulk"></i></span>
                             <span class="navi-text">Enviar cert.</span>
                             </a>
                          </li>
                          40
                          <li class="navi-item">
                             <a href="' . base_url('contactos/enviar/' . $id) . '" class="navi-link" title="Enviar correo del curso a los contactos">
                             <span class="navi-icon"><i class="la la-mail-bulk"></i></span>
                             <span class="navi-text">Enviar correo</span>
                             </a>
                          </li>
                          <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                             INSCRIPCIÓN:
                          </li>
                          <li class="navi-item">
                             <a href="' . base_url('inscripcionadmin/ver_inscritos/' . $id) . '" id="btn_ver_preinscritos" data-id=' . $id . ' class="navi-link" title="Listado de preinscritos del curso">
                             <span class="navi-icon"><i class="la la-pen-square"></i></span>
                             <span class="navi-text">Preinscritos</span>
                             </a>
                          </li>
                          <li class="navi-item">
                             <a href="' . base_url('inscripcionadmin/ver_informacion/' . $id) . '"  id="btn_ver_informacion" data-id=' . $id . ' class="navi-link" title="Listado de usuarios que pidieron información del curso">
                             <span class="navi-icon"><i class="la la-info-circle"></i></span>
                             <span class="navi-text">Información</span>
                             </a>
                          </li>
                          <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">
                             REPORTES:
                          </li>
                          <li class="navi-item">
                             <a onclick="reporte_economico(' . $id . ')" type="button" id="btn_reporte_economico" data-id=' . $id . ' class="navi-link" title="Reporte económico del curso">
                             <span class="navi-icon"><i class="la la-print"></i></span>
                             <span class="navi-text">Económico</span>
                             </a>
                          </li>
                          <li class="navi-item">
                             <a onclick="reporte_totales(' . $id . ')" type="button" id="btn_reporte_totales" data-id=' . $id . ' class="navi-link" title="Reporte económico total del curso">
                             <span class="navi-icon"><i class="la la-money"></i></span>
                             <span class="navi-text">Totales</span>
                             </a>
                          </li>
                          <li class="navi-item">
                             <a onclick="reporte_estudiantes(' . $id . ')" type="button" id="btn_reporte_estudiantes" data-id=' . $id . ' class="navi-link" title="Reporte de estudiantes del curso">
                             <span class="navi-icon"><i class="la la-print"></i></span>
                             <span class="navi-text">Estudiantes PDF</span>
                             </a>
                          </li>
                          <li class="navi-item">
                             <a onclick="add_certificate_type(' . $id . ')" type="button" id="btn_reporte_estudiantes" data-id=' . $id . ' class="navi-link" title="Agregar tipo certificado">
                             <span class="navi-icon"><i class="la la-plus"></i></span>
                             <span class="navi-text">Agregar tipo certificado</span>
                             </a>
                          </li>
                          </li>
                          <li class="navi-item">
                             <a href="' . base_url("cursos/agregar_envios/" . $id) . '" class="navi-link" title="Agregar envio de certificados">
                             <span class="navi-icon"><i class="fa fa-truck"></i></span>
                             <span class="navi-text">Envío de Certificados</span>
                             </a>
                          </li>
                       </ul>
                    </div>
                 </div>';
                }
            ),
        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }
}
