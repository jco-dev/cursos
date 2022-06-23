<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;
use App\Models\PublicacionModel;

class Configuracion extends BaseController
{
    public $model;
    protected $db;
    public $numeroAnterior = 0;
    public $publicacion_model;
    public function __construct()
    {
        $this->model = new ConfiguracionModel();
        $this->publicacion_model = new PublicacionModel();
        require_once APPPATH . 'ThirdParty/ssp.class.php';
        $this->db = db_connect();
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

        $table = "vista_listado_configuracion";

        //primary key
        $primaryKey = "id_configuracion";

        $columns = array(
            array(
                "db" => "id_configuracion",
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
                    $status = [
                        'success',
                        'danger',
                        'warning',
                        'dark',
                        'primary',
                        'info',
                    ];

                    $estado = $status[$this->numeroAnterior];
                    $this->numeroAnterior++;
                    if ($this->numeroAnterior == 6)
                        $this->numeroAnterior = 0;
                    return '<span class="badge badge-' . $estado . '">' . $d . '</span>';
                }
            ),
            array(
                "db" => "imagen",
                "dt" => 3,
                "formatter" => function ($d, $row) {
                    if ($d == "" || $d == NULL)
                        return '<img class="img-thumbnail" width="50" heigth="50" src="' . base_url('assets/media/default/default.jpg') . '" alt="Imagen de fondo del certificado" />';
                    else
                        return '<img class="img-thumbnail" width="50" heigth="50" src="' . base_url($d) . '" alt="Imagen de fondo del certificado" />';
                }
            ),
            array(
                "db" => "fecha_inicio",
                "dt" => 4,
                "formatter" => function ($d, $row) {
                    if ($d != NULL || $d != "")
                        return date_format(date_create($d), 'd-m-Y');
                    else
                        return '';
                }
            ),
            array(
                "db" => "fecha_fin",
                "dt" => 5,
                "formatter" => function ($d, $row) {
                    if ($d != NULL || $d != "")
                        return date_format(date_create($d), 'd-m-Y');
                    else
                        return '';
                }
            ),
            array(
                "db" => "fecha_limite_inscripcion",
                "dt" => 6,
                "formatter" => function ($d, $row) {
                    if ($d != NULL || $d != "")
                        return date_format(date_create($d), 'd-m-Y');
                    else
                        return '';
                }
            ),
            array(
                "db" => "fecha_certificacion",
                "dt" => 7,
                "formatter" => function ($d, $row) {
                    if ($d != NULL || $d != "")
                        return date_format(date_create($d), 'd-m-Y');
                    else
                        return '';
                }
            ),
            array(
                "db" => "nota_aprobacion",
                "dt" => 8,
            ),
            array(
                "db" => "carga_horaria",
                "dt" => 9,
                "formatter" => function ($d, $row) {
                    if ($d != NULL || $d != "")
                        return $d . ' horas académicas';
                    else
                        return '';
                }
            ),
            array(
                "db" => "descripcion",
                "dt" => 10,
                "formatter" => function ($d, $row) {
                    return '<small>' . $d . '</small>';
                }
            ),
            array(
                "db" => "banner",
                "dt" => 11,
                "formatter" => function ($d, $row) {
                    if ($d == "" || $d == NULL)
                        return '<img class="img-thumbnail" width="120" heigth="80" src="' . base_url('assets/media/default/default.jpg') . '" alt="Banner del curso" />';
                    else
                        return '<img class="img-thumbnail" width="120" heigth="80" src="' . base_url($d) . '" alt="Banner del curso" />';
                }
            ),
            array(
                "db" => "celular_referencia",
                "dt" => 12,
            ),
            array(
                "db" => "inversion",
                "dt" => 13,
            ),
            array(
                "db" => "descuento",
                "dt" => 14,
            ),
            array(
                "db" => "fecha_inicio_descuento",
                "dt" => 15,
                "formatter" => function ($d, $row) {
                    if ($d != NULL || $d != "")
                        return date_format(date_create($d), 'd-m-Y');
                    else
                        return '';
                }
            ),
            array(
                "db" => "fecha_fin_descuento",
                "dt" => 16,
                "formatter" => function ($d, $row) {
                    if ($d != NULL || $d != "")
                        return date_format(date_create($d), 'd-m-Y');
                    else
                        return '';
                }
            ),
            array(
                "db" => "estado",
                "dt" => 17,
                'formatter' => function ($d, $row) {
                    if ($d === "REGISTRADO")
                        return '<span class="label label-lg font-weight-bold label-light-success label-inline">REGISTRADO</span>';
                    else
                        return '<span class="label label-lg font-weight-bold label-light-danger label-inline">TERMINADO</span>';
                }
            ),
            array(
                "db" => "id_configuracion",
                "dt" => 18,
                "formatter" => function ($id, $row) {
                    return '<span style="overflow: visible; position: relative; width: 125px;">
                    <button id="configuracion-publicacion" data-id="' . $id . '" data-curso="' . $row["fullname"] . '" data-corto="' . $row["shortname"] . '" class="btn btn-sm btn-light-info btn-clean btn-icon mr-2" title="Editar para la publicación">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z M10.875,15.75 C11.1145833,15.75 11.3541667,15.6541667 11.5458333,15.4625 L15.3791667,11.6291667 C15.7625,11.2458333 15.7625,10.6708333 15.3791667,10.2875 C14.9958333,9.90416667 14.4208333,9.90416667 14.0375,10.2875 L10.875,13.45 L9.62916667,12.2041667 C9.29375,11.8208333 8.67083333,11.8208333 8.2875,12.2041667 C7.90416667,12.5875 7.90416667,13.1625 8.2875,13.5458333 L10.2041667,15.4625 C10.3958333,15.6541667 10.6354167,15.75 10.875,15.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000" />
                                </g>
                            </svg>
                        </span>
                    </button>
                    <button id="configuracion-certificado" class="btn btn-sm btn-light-info btn-clean btn-icon mr-2" title="Editar la configuración del certificado">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
                                    <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                    </button>
                    <button id="configuracion-personalizacion" class="btn btn-sm btn-light-info btn-clean btn-icon mr-2" title="Personalización del certificado">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                                </g>
                            </svg>
                        </span>
                    </button>
                    <button id="configuracion-entrega" class="btn btn-sm btn-light-success btn-clean btn-icon mr-2" title="Editar para la entrega del certificado">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z" fill="#000000" />
                                    <path d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                </g>
                            </svg>
                        </span>
                    </button>
                    <button id="configuracion-finalizar" class="btn btn-sm btn-danger btn-clean btn-icon" title="Finalizar la configuración del certificado">
                        <span class="svg-icon svg-icon-md">
                            FIN
                        </span>
                    </button>
                </span>';
                }
            ),
        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function editFrmPublicacion()
    {
        $id_configuracion = $this->request->getGet('id');
        $data = $this->publicacion_model->editPublicacion($id_configuracion);
        return $this->response->setJSON(['vista' => view('configuracion/partials/_frmPublicacion'), 'data' => $data]);
    }

    public function subirBannerCurso()
    {
    }

    public function guardarPublicacion()
    {
        if ($this->request->isAJAX()) {
            // Subir Banner Curso //
            $ruta_banner = "";
            if ($this->request->getPost('banner_curso')) {
                if (preg_match("/^data:image\/(\w+);base64,/", $this->request->getPost('banner_curso'), $formato)) {
                    $imagen = substr($this->request->getPost('banner_curso'), strpos($this->request->getPost('banner_curso'), ',') + 1);
                    $nombre = trim($this->request->getPost('shortname')) . "_" . date('Y_m_d_H_i_s') . '.' . strtolower($formato[1]);
                    $ruta_banner = 'assets/img/banner/' . $nombre;
                    file_put_contents(FCPATH . 'assets/img/banner/' . $nombre, base64_decode($imagen));
                }
            }
            // Subir Pago QR //
            $ruta_pago_qr = $this->uploadFiles($_FILES['pago_qr'], ['png', 'jpg', 'jpeg'], 'assets/img/pago_qr/', trim($this->request->getPost('shortname')));

            // Subir Pago QR descuento //
            $ruta_pago_qr_descuento = $this->uploadFiles($_FILES['pago_qr_descuento'], ['png', 'jpg', 'jpeg'], 'assets/img/pago_qr/', trim($this->request->getPost('shortname')) . "_DESC");

            // Subir PDF //
            $ruta_pdf = $this->uploadFiles($_FILES['pdf'], ['pdf', 'doc', 'docx'], 'assets/media/pdf/', trim($this->request->getPost('shortname')));

            // Publicación //
            $id_configuracion       = $this->request->getPost('id_configuracion');
            $data_publicacion = [
                'nota_aprobacion'        => $this->request->getPost('nota_aprobacion'),
                'carga_horaria'          => $this->request->getPost('carga_horaria'),
                'banner'                 => $ruta_banner,
                'pdf'                    => $ruta_pdf,
                'pago_qr'                => $ruta_pago_qr,
                'pago_qr_descuento'      => $ruta_pago_qr_descuento,
                'celular_referencia'     => trim($this->request->getPost('celular_referencia')),
                'inversion'              => $this->request->getPost('inversion'),
                'descripcion'            => mb_convert_case(preg_replace("/\s+/", " ", trim($this->request->getPost('descripcion'))), MB_CASE_UPPER),
                'descuento'              => $this->request->getPost('descuento'),
                'fecha_inicio_descuento' => $this->request->getPost('fecha_inicio_descuento'),
                'fecha_fin_descuento'    => $this->request->getPost('fecha_fin_descuento'),
            ];

            // Configuración //
            $data_config = [
                'fecha_inicio'             => $this->request->getPost('fecha_inicio'),
                'fecha_fin'                => $this->request->getPost('fecha_fin'),
                'fecha_limite_inscripcion' => $this->request->getPost('fecha_limite_inscripcion')
            ];

            if ($this->model->update($id_configuracion, $data_config) && $this->publicacion_model->update($id_configuracion, $data_publicacion)) {
                return $this->response->setJSON(
                    [
                        'success' => 'Configuración realizado correctamente para la publicación'
                    ]
                );
            } else {
                return $this->response->setJSON(
                    [
                        'error' => 'Error al realizar la configuración de publicación'
                    ]
                );
            }
        }
    }

    public function uploadFiles($archivo, $permitidos, $ruta, $shortname)
    {
        if (isset($archivo) && $archivo['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $archivo['tmp_name'];
            $fileName = $archivo['name'];
            $fileNameCmps = explode(".", $fileName);
            $extensionArchivo = strtolower(end($fileNameCmps));

            $nuevoNombreArchivo = $shortname . '_' . md5(time() . $fileName) . '.' . $extensionArchivo;
            if (in_array($extensionArchivo, $permitidos)) {
                $path = $ruta . $nuevoNombreArchivo;
                if (move_uploaded_file($fileTmpPath, $path)) {
                    return $path;
                } else {
                    return NULL;
                }
            }
        }
    }
}
