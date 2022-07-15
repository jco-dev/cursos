<?php

namespace App\Models;

use CodeIgniter\Model;

class PreinscripcionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'preinscripcion';
    protected $primaryKey       = 'id_preinscripcion';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_participante',
        'id_course',
        'id_cupones_participante',
        'tipo_pago',
        'nro_transaccion',
        'monto_pago',
        'fecha_pago',
        'tipo_certificacion',
        'certificacion',
        'respaldo_pago',
        'observacion',
        'estado'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'creado_el';
    protected $updatedField  = 'actualizado_el';

    // Funciones
    public function getMunicipiosDepartamentos()
    {
        $builder = $this->db->table('departamento d');
        $builder->select('d.id_departamento, p.id_provincia, m.id_municipio, d.nombre_departamento, p.nombre_provincia, m.nombre_municipio');
        $builder->join('provincia p', 'd.id_departamento = p.id_departamento');
        $builder->join('municipio m', 'm.id_provincia =p.id_provincia');
        $builder->where('m.estado', 'REGISTRADO');
        $query = $builder->get();
        return $query->getResult();
    }

    public function getConfiguracion($id)
    {
        $builder = $this->db->table('vista_listado_configuracion');
        $builder->select('fecha_inicio, fecha_fin, fecha_limite_inscripcion, nota_aprobacion, carga_horaria, descripcion, banner, pago_qr, pago_qr_descuento, inversion, descuento, fecha_inicio_descuento, fecha_fin_descuento, celular_referencia');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getResult();
    }

    public function verificarPreinscripcionCurso($ci, $id_course)
    {
        $builder = $this->db->table('participante p');
        $builder->select('p.id_participante, p.ci, p.expedido, p.nombre, p.paterno, p.materno, p.genero, p.fecha_nacimiento, p.celular, p.correo,
        pp.id_course, pp.tipo_pago, pp.nro_transaccion, pp.monto_pago, pp.fecha_pago, pp.tipo_certificacion, pp.certificacion, pp.respaldo_pago, pp.estado');
        $builder->join('preinscripcion pp', 'p.id_participante=pp.id_participante');
        $builder->where('p.ci', $ci);
        $builder->where('pp.id_course', $id_course);
        $query = $builder->get();
        return $query->getResult();
    }

    public function verificarCuponCi($ci, $cupon)
    {
        $builder = $this->db->table('cupones_participante cp');
        $builder->select('*');
        $builder->join('participante p', 'cp.id_participante = p.id_participante');
        $builder->join('cupones c', 'cp.id_cupones = c.id_cupones');
        $builder->where('cp.numero_cupon', $cupon);
        $builder->where('p.ci', $ci);
        $builder->where('cp.estado', 'REGISTRADO');
        $builder->where('c.fecha_fin_canje >=', date('Y-m-d'));
        $query = $builder->get();
        return $query->getResult();
    }
}
