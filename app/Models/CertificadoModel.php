<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificadoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'certificado';
    protected $primaryKey       = 'id_configuracion';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_configuracion',
        'imagen',
        'posx_nombre_participante',
        'posy_nombre_participante',
        'posx_nombre_curso',
        'posy_nombre_curso',
        'posx_qr',
        'posy_qr',
        'posx_tipo_participacion',
        'posy_tipo_participacion',
        'posx_bloque_texto',
        'posy_bloque_texto',
        'tamanio_texto_participante',
        'tamanio_texto_curso',
        'tamanio_texto_bloque',
        'orientacion',
        'color_nombre_participante',
        'color_nombre_curso',
        'alto_texto_nombre_curso',
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Functions
    public function editCertificacion($id) {
        $builder = $this->db->table('vista_listado_certificacion');
        $builder->select('*');
        $builder->where('id_configuracion', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }

}
