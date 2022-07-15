<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'contacto';
    protected $primaryKey       = 'id_contacto';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ci',
        'expedido',
        'nombre',
        'paterno',
        'materno',
        'celular',
        'correo',
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Funciones //
}
