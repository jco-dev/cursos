<?php

namespace App\Models;

use CodeIgniter\Model;

class CuponModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cupones';
    protected $primaryKey       = 'id_cupones';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tipo_cupon',
        'sigla_cupon',
        'cantidad',
        'fecha_inicio',
        'fecha_fin',
        'fecha_fin_canje',
        'porcentaje_descuento',
        'estado'
    ];

    // Funciones //
    public function getCuponesUsuario($ci)
    {
        $builder = $this->db->table('cupones_participante cp');
        $builder->select('cp.numero_cupon');
        $builder->join('participante p', 'cp.id_participante = p.id_participante');
        $builder->join('cupones c', 'c.id_cupones = cp.id_cupones');
        $builder->where('p.ci', $ci);
        $builder->where('cp.estado', 'REGISTRADO');
        $builder->where('c.fecha_fin_canje >=', date('Y-m-d'));
        $query = $builder->get();
        return $query->getResult();
    }

    public function searchCuponNumero($ci, $numero_cupon)
    {
        $builder = $this->db->table('cupones_participante cp');
        $builder->select('*');
        $builder->join('participante p', 'cp.id_participante = p.id_participante');
        $builder->join('cupones c', 'c.id_cupones = cp.id_cupones');
        $builder->where('cp.numero_cupon', $numero_cupon);
        $builder->where('p.ci', $ci);
        $builder->where('cp.estado', 'REGISTRADO');
        $builder->where('c.fecha_fin_canje >=', date('Y-m-d'));
        $query = $builder->get();
        return $query->getResult();
    }
}
