<?php

namespace App\Models;

use CodeIgniter\Model;

class InscripcionModel extends Model
{
  protected $DBGroup          = 'default';
  protected $table            = 'inscripcion';
  protected $primaryKey       = 'id_inscripcion';
  protected $useAutoIncrement = true;
  protected $insertID         = 0;
  protected $returnType       = 'object';
  protected $useSoftDeletes   = false;
  protected $protectFields    = true;
  protected $allowedFields    = [
    'id_course',
    'id_user',
    'calificacion_final',
    'tipo_participacion',
    'certificacion_solicitada',
    'estado'
  ];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'creado_el';
  protected $updatedField  = 'actualizado_el';

  // Funciones //
  public function getUsersMoodle($id)
  {
    $moodle = \Config\Database::connect('moodle');
    $moodle->connect();
    $builder = $moodle->query("SELECT * from mdl_user");
    return $builder->getResult();
  }

  public function getUsersCourse($id)
  {
    $moodle = \Config\Database::connect('moodle');
    $moodle->connect();
    $builder = $moodle->query("SELECT mdl_user.id AS id_user_moodle, mdl_user.firstname AS nombres , mdl_user.lastname AS apellidos,
        concat(mdl_user.firstname, ' ',mdl_user.lastname) AS alumno, mdl_user.username as usuario, mdl_user.password as password, mdl_user.email AS email, mdl_user.city AS ciudad,
        mdl_course.fullname AS curso, mdl_course_categories.name AS categoria, mdl_course.id AS id_course_moodle,
        CASE WHEN mdl_grade_items.itemtype = 'course' THEN concat('CalificacionFinal:')
        WHEN mdl_grade_items.itemtype ='category' THEN mdl_grade_categories.fullname ELSE mdl_grade_items.itemname
        END AS elementocalificador, mdl_grade_grades.itemid, ROUND(mdl_grade_grades.finalgrade,2) AS nota, mdl_scale.scale,			
        if(ROUND(mdl_grade_grades.finalgrade)<2,SUBSTRING_INDEX(mdl_scale.scale,',',ROUND(mdl_grade_grades.finalgrade)),
        substring(SUBSTRING_INDEX(mdl_scale.scale,',',ROUND(mdl_grade_grades.finalgrade)),((length(SUBSTRING_INDEX(mdl_scale.scale,',',ROUND(mdl_grade_grades.finalgrade)))-length(SUBSTRING_INDEX(mdl_scale.scale,',',ROUND(mdl_grade_grades.finalgrade)-1))-1)*-1))) as texto,
        DATE_ADD('1970-01-01', INTERVAL mdl_grade_items.timemodified SECOND) AS fechanota,
        mdl_grade_items.itemtype as tipoelemento, mdl_grade_items.sortorder, mdl_grade_items.hidden
        FROM mdl_course
        JOIN mdl_context  ON mdl_course.id = mdl_context.instanceid
        JOIN mdl_role_assignments ON mdl_role_assignments.contextid = mdl_context.id
        JOIN mdl_user  ON mdl_user.id = mdl_role_assignments.userid
        JOIN mdl_grade_grades ON mdl_grade_grades.userid = mdl_user.id
        JOIN mdl_grade_items ON mdl_grade_items.id = mdl_grade_grades.itemid
        left join mdl_grade_categories on mdl_grade_categories.id = mdl_grade_items.iteminstance
        JOIN mdl_course_categories ON mdl_course_categories.id = mdl_course.category
        left join mdl_scale on mdl_scale.id = mdl_grade_grades.rawscaleid
        WHERE mdl_grade_items.courseid = mdl_course.id and mdl_course.id = '$id'
        and mdl_grade_grades.finalgrade is not null and mdl_grade_items.hidden=0 AND (CASE WHEN mdl_grade_items.itemtype = 'course' THEN concat('CalificacionFinal:')
        WHEN mdl_grade_items.itemtype ='category' THEN mdl_grade_categories.fullname ELSE mdl_grade_items.itemname
        END)='CalificacionFinal:'
        ORDER BY curso, sortorder");
    return $builder->getResult();
  }

  public function getParticipantesCurso($id)
  {
    $builder = $this->db->table('inscripcion i');
    $builder->select('i.id_inscripcion, c.id, CONCAT_WS(" ", u.firstname, u.lastname) AS participante, i.calificacion_final, i.tipo_participacion, i.certificacion_solicitada, i.estado');
    $builder->join('user u', 'u.id = i.id_user');
    $builder->where('i.estado <>', 'ELIMINADO');
    $builder->join('course c', 'c.id = i.id_course');
    $builder->where('c.id', $id);
    $builder->orderBy('u.firstname, u.lastname');
    $query = $builder->get();
    return $query->getResult();
  }
}
