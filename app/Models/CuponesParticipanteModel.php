<?php

namespace App\Models;

use CodeIgniter\Model;

class CuponesParticipanteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cupones_participante';
    protected $primaryKey       = 'id_cupones_participante';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_participante',
        'id_cupones',
        'numero_cupon',
        'utilizado_el',
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Funciones //
}
