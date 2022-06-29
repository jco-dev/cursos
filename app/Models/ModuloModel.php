<?php

namespace App\Models;

use CodeIgniter\Model;

class ModuloModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'modulo';
    protected $primaryKey       = 'id_modulo';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_course',
        'nombre_modulo',
        'fecha_inicio',
        'fecha_fin',
        'carga_horaria',
        'imagen',
        'posx_imagen',
        'posy_imagen',
        'color_texto_titulo',
        'fecha_certificacion',
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Funciones //
}
