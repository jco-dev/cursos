<?php

namespace App\Models;

use CodeIgniter\Model;

class VerificarModel extends Model
{
    // Funciones
    public function verificarCertificado($id = NULL)
    {
        $resultado = NULL;
        if(!is_null($id)) {
            $builder = $this->db->table('inscripcion_curso ic');
            $builder->select('*, cc.nota_aprobacion, cc.fecha_certificacion, cc.fecha_inicial, cc.fecha_final');
            $builder->join('user u', 'u.id = ic.id_user_moodle');
            $builder->join('course c', 'c.id = ic.id_course_moodle');
            $builder->join('configuracion_curso cc', 'cc.id = c.id_course_moodle', 'right');
            $builder->where('MD5(CONCAT("CERTIFICADO_", ic.id_inscripcion_curso))', $id);
            $query = $builder->get();
            if($query->getRowArray()) {
                $resultado = $query->getRowArray();
            }else{
                $resultado = NULL;
            }
        }
        return $resultado;
    }
}
