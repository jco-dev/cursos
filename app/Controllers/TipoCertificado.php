<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TipoCertificadoModel;

require_once APPPATH . 'ThirdParty/ssp.class.php';

class TipoCertificado extends BaseController
{
    public $model;
    public function __construct()
    {
        $this->model = new TipoCertificadoModel();
        $this->db = db_connect();
    }

    public function index()
    {
        return view('tipo_certificado/index');
    }

    public function ajaxDatatable()
    {
        $dbDetails = array(
            "host" => $this->db->hostname,
            "user" => $this->db->username,
            "pass" => $this->db->password,
            "db" => $this->db->database,
        );

        $table = "praq_vista_tipo_certificado";

        //primary key
        $primaryKey = "id_tipo_certificado";

        $columns = array(
            array(
                "db" => "id_tipo_certificado",
                "dt" => 0,
            ),
            array(
                "db" => "imagen",
                "dt" => 1,
                "formatter" => function ($d) {
                    if ($d == "")
                        return '<img class="img-thumbnail" width="60" heigth="60" src="' . base_url('assets/img/default.jpg') . '" alt="Imagen tipo certificado" />';
                    else
                        return '<img class="img-thumbnail" width="60" heigth="60" src="' . base_url($d) . '" alt="Imagen tipo certificado" />';
                }
            ),
            array(
                "db" => "metodo",
                "dt" => 2,
            ),
            array(
                "db" => "nombre_participante",
                "dt" => 3,
            ),
            array(
                "db" => "nombre_curso",
                "dt" => 4,
            ),
            array(
                "db" => "qr",
                "dt" => 5,
            ),
            array(
                "db" => "tipo_participacion",
                "dt" => 6,
            ),
            array(
                "db" => "bloque_texto",
                "dt" => 7,
            ),
            array(
                "db" => "tamanio_texto_participante",
                "dt" => 8,
            ),
            array(
                "db" => "tamanio_texto_curso",
                "dt" => 9,
            ),
            array(
                "db" => "tamanio_texto_bloque",
                "dt" => 10,
            ),
            array(
                "db" => "orientacion",
                "dt" => 11,
            ),
            array(
                "db" => "estado",
                "dt" => 12,
                'formatter' => function ($d, $row) {
                    if ($d === "REGISTRADO")
                        return '<span class="label label-lg font-weight-bold label-light-success label-inline">REGISTRADO</span>';
                    else
                        return '<span class="label label-lg font-weight-bold label-light-danger label-inline">ELIMINADO</span>';
                }
            ),
            array(
                "db" => "id_tipo_certificado",
                "dt" => 13,
                "formatter" => function ($id, $row) {
                    return '
					<a id="btn-edit-tipo-certificado" data-id=' . $id . ' href="javascript:;" class="btn btn-warning btn-sm btn-clean btn-icon" title="Editar">
						<i class="nav-icon la la-edit"></i>
					</a>
                    <a id="btn-delete-tipo-certificado" data-id=' . $id . ' href="javascript:;" class="btn btn-danger btn-sm btn-clean btn-icon" title="Eliminar">
						<i class="nav-icon la la-trash"></i>
					</a>
					';
                }
            ),
        );

        echo json_encode(
            \SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }

    public function frmTipoCertificado()
    {
        return $this->response->setJSON(['vista' => view('tipo_certificado/partials/_frmTipoCertificado')]);
    }

    public function save()
    {
        if (!$this->validate('tipoCertificado')) {
            return $this->response->setJSON(['warning' => $this->validator->getErrors()]);
        }

        $data = [
            'metodo' => trim($this->request->getPost('metodo')),
            'posx_nombre_participante' => $this->request->getPost('posx_nombre_participante'),
            'posy_nombre_participante' => $this->request->getPost('posy_nombre_participante'),
            'posx_nombre_curso' => $this->request->getPost('posx_nombre_curso'),
            'posy_nombre_curso' => $this->request->getPost('posy_nombre_curso'),
            'posx_qr' => $this->request->getPost('posx_qr'),
            'posy_qr' => $this->request->getPost('posy_qr'),
            'posx_tipo_participacion' => $this->request->getPost('posx_tipo_participacion'),
            'posy_tipo_participacion' => $this->request->getPost('posy_tipo_participacion'),
            'posx_bloque_texto' => $this->request->getPost('posx_bloque_texto'),
            'posy_bloque_texto' => $this->request->getPost('posy_bloque_texto'),
            'tamanio_texto_participante' => $this->request->getPost('tamanio_texto_participante'),
            'tamanio_texto_curso' => $this->request->getPost('tamanio_texto_curso'),
            'tamanio_texto_bloque' => $this->request->getPost('tamanio_texto_bloque'),
            'orientacion' => $this->request->getPost('orientacion'),
        ];

        if ($id = $this->model->insert($data)) {
            if ($this->request->getPost('imagen')) {
                if (preg_match("/^data:image\/(\w+);base64,/", $this->request->getPost('imagen'), $formato)) {
                    $imagen = substr($this->request->getPost('imagen'), strpos($this->request->getPost('imagen'), ',') + 1);
                    $nombre = $this->genRandomString() . '_' .  date('YmdHis') . '.' . strtolower($formato[1]);
                    $ruta_imagen = 'assets/img/tipo_certificado/' . $nombre;
                    file_put_contents(FCPATH . 'assets/img/tipo_certificado/' . $nombre, base64_decode($imagen));
                    $this->model->update($id, ['imagen' => $ruta_imagen]);
                }
            }
            return $this->response->setJSON(['success' => 'Tipo de certificado registrado correctamente']);
        } else {
            return $this->response->setJSON(['warning' => 'No se pudo guardar el tipo de certificado']);
        }
    }

    public function genRandomString()
    {
        $length = 5;
        $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWZYZ";

        $real_string_length = strlen($characters);
        $string = "id";

        for ($p = 0; $p < $length; $p++) {
            $string .= $characters[mt_rand(0, $real_string_length - 1)];
        }

        return strtolower($string);
    }

    public function edit()
    {
        $id = $this->request->getPost('id');
        $data = $this->model->where(['id_tipo_certificado' => $id])->find();
        return $this->response->setJSON(['vista' => view('tipo_certificado/partials/_frmEditTipoCertificado', ['data' => $data[0]])]);
    }

    public function update()
    {
        $data = [
            'posx_nombre_participante' => $this->request->getPost('posx_nombre_participante'),
            'posy_nombre_participante' => $this->request->getPost('posy_nombre_participante'),
            'posx_nombre_curso' => $this->request->getPost('posx_nombre_curso'),
            'posy_nombre_curso' => $this->request->getPost('posy_nombre_curso'),
            'posx_qr' => $this->request->getPost('posx_qr'),
            'posy_qr' => $this->request->getPost('posy_qr'),
            'posx_tipo_participacion' => $this->request->getPost('posx_tipo_participacion'),
            'posy_tipo_participacion' => $this->request->getPost('posy_tipo_participacion'),
            'posx_bloque_texto' => $this->request->getPost('posx_bloque_texto'),
            'posy_bloque_texto' => $this->request->getPost('posy_bloque_texto'),
            'tamanio_texto_participante' => $this->request->getPost('tamanio_texto_participante'),
            'tamanio_texto_curso' => $this->request->getPost('tamanio_texto_curso'),
            'tamanio_texto_bloque' => $this->request->getPost('tamanio_texto_bloque'),
            'orientacion' => $this->request->getPost('orientacion'),
        ];

        if ($this->model->update($this->request->getPost('id_tipo_certificado'), $data)) {
            if ($this->request->getPost('imagen')) {
                if (preg_match("/^data:image\/(\w+);base64,/", $this->request->getPost('imagen'), $formato)) {
                    $imagen = substr($this->request->getPost('imagen'), strpos($this->request->getPost('imagen'), ',') + 1);
                    $nombre = $this->genRandomString() . '_' .  date('YmdHis') . '.' . strtolower($formato[1]);
                    $ruta_imagen = 'assets/img/tipo_certificado/' . $nombre;
                    file_put_contents(FCPATH . 'assets/img/tipo_certificado/' . $nombre, base64_decode($imagen));
                    $this->model->update($this->request->getPost('id_tipo_certificado'), ['imagen' => $ruta_imagen]);
                }
            }
            return $this->response->setJSON(['success' => 'Tipo de certificado actualizado correctamente']);
        } else {
            return $this->response->setJSON(['warning' => 'No se pudo actualizar el tipo de certificado']);
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        if ($this->model->update($id, ['estado' => 'ELIMINADO'])) {
            return $this->response->setJSON(['success' => 'Tipo de certificado eliminado correctamente']);
        } else {
            return $this->response->setJSON(['error' => 'No se pudo eliminar el tipo de certificado']);
        }
    }
}
