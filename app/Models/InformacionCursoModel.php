<?php

namespace App\Models;

use CodeIgniter\Model;

class InformacionCursoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'informacion_curso';
    protected $primaryKey       = 'id_informacion_curso';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_contacto',
        'id_course',
        'estado_contacto',
        'fecha_contacto',
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Funciones //
}
