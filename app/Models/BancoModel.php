<?php

namespace App\Models;

use CodeIgniter\Model;

class BancoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'banco';
    protected $primaryKey       = 'id_banco';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'sigla',
        'nombre',
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';
}
