<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuario';
    protected $primaryKey       = 'id_usuario';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre_usuario', 'clave_usuario', 'estado'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Functions //
    public function getUsuario($nombre_usuario, $clave_usuario)
    {
        $builder = $this->table('usuario');
        $builder->select('*');
        $builder->where('nombre_usuario', $nombre_usuario);
        $builder->where('clave_usuario', md5(trim($clave_usuario)));
        $builder->where('estado', 'REGISTRADO');
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function getPersona($id_usuario)
    {
        $builder = $this->db->table('usuario u');
        $builder->select('p.nombre, p.paterno, p.materno, p.celular, p.correo');
        $builder->join('participante p', 'p.id_participante = u.id_usuario');
        $builder->where('u.id_usuario', $id_usuario);
        $query = $builder->get();
        return $query->getRowArray();
    }

}
