<?php

namespace App\Models;

use CodeIgniter\Model;

class PublicacionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'publicacion';
    protected $primaryKey       = 'id_configuracion';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_configuracion',
        'nota_aprobacion',
        'carga_horaria',
        'descripcion',
        'banner',
        'pago_qr',
        'pago_qr_descuento',
        'celular_referencia',
        'inversion',
        'descuento',
        'fecha_inicio_descuento',
        'fecha_fin_descuento',
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

}
