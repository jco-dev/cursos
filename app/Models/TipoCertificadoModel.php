<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoCertificadoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tipo_certificado';
    protected $primaryKey       = 'id_tipo_certificado';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'imagen',
        'metodo',
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
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Funciones //
}
