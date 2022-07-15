<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipanteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'participante';
    protected $primaryKey       = 'id_participante';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',
        'id_municipio',
        'id_profesion_oficio',
        'ci',
        'expedido',
        'nombre',
        'paterno',
        'materno',
        'genero',
        'fecha_nacimiento',
        'celular',
        'correo',
    ];

    // Dates
    /* Telling the model that it should not use timestamps. */
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Funciones //

}
