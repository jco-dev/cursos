<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfiguracionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'configuracion';
    protected $primaryKey       = 'id_configuracion';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_course',
        'id_tipo_certificado',
        'fecha_inicio',
        'fecha_fin',
        'fecha_limite_inscripcion',
        'fecha_certificacion',
        'informe',
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Functions //
    public function getDateCertificacion($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('fecha_inicio, fecha_fin, fecha_certificacion');
        $builder->where('id_course', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getConfiguracionCurso($id)
    {
        $builder = $this->db->table('configuracion c');
        $builder->select('*');
        $builder->join('course c2', 'c2.id=c.id_course');
        $builder->where('c2.id', $id);
        $builder->where('c.estado <>', 'ELIMINADO');
        $builder->join('certificado c1', 'c.id_configuracion = c1.id_configuracion');
        $builder->join('personalizacion p', 'c.id_configuracion = p.id_configuracion');
        $builder->join('tipo_certificado t', 't.id_tipo_certificado = c.id_tipo_certificado', 'LEFT');
    }
}
