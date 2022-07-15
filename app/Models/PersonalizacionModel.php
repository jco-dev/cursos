<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonalizacionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'personalizacion';
    protected $primaryKey       = 'id_configuracion';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_configuracion',
        'imagen_personalizado',
        'posx_imagen_personalizado',
        'posy_imagen_personalizado',
        'imprimir_subtitulo',
        'subtitulo',
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

}
