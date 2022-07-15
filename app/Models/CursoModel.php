<?php

namespace App\Models;

use CodeIgniter\Model;

class CursoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'course';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Functions
    public function getAll()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

    // Cursos en oferta //
    public function getCursosVigentes()
    {
        $builder = $this->db->table('course c');
        $builder->select('c.id, c.fullname, c.shortname, DATE_FORMAT(cc.fecha_inicio, "%d-%m-%Y") as fecha_inicio, DATE_FORMAT(cc.fecha_limite_inscripcion, "%d-%m-%Y") as fecha_limite_inscripcion, p.banner, p.descripcion, p.carga_horaria, p.pdf, p.celular_referencia, p.inversion, p.descuento, DATE_FORMAT(p.fecha_inicio_descuento, "%d-%m-%Y") as fecha_inicio_descuento, DATE_FORMAT(p.fecha_fin_descuento, "%d-%m-%Y") as fecha_fin_descuento');
        $builder->join('configuracion cc', 'cc.id_course = c.id');
        $builder->join('publicacion p', 'p.id_configuracion = cc.id_configuracion');
        $builder->where('DATE_FORMAT(cc.fecha_limite_inscripcion, "%Y-%m-%d") >= DATE_FORMAT(NOW(),"%Y-%m-%d")');
        $builder->orderBy('p.descuento', 'DESC');
        $query = $builder->get();
        $result = $query->getResult();
        return $result;
    }

}
