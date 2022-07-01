<?php

namespace App\Models;

use CodeIgniter\Model;

class DepositoBancarioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'deposito_bancario';
    protected $primaryKey       = 'id_preinscripcion';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_preinscripcion',
        'id_banco',
        'fecha',
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Functions //
}
