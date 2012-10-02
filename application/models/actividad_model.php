<?php 

class Actividad_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     
   public function mostrar($id)
   {
       $sql = "select * FROM actividad WHERE actividadId = ?";
       $query = $this->db->query($sql , array($id));
       return $query->row();
   }

   public function mostrar_docente($materiaId, $docenteId){
    $sql = "
      SELECT * FROM `actividad` WHERE `actividadId` IN ( 
        SELECT `actividadId` FROM `grupo_docente_materia_actividad` WHERE `grupo_docente_materiaId` = (
          SELECT `grupo_docente_materiaId` FROM `grupo_docente_materia` WHERE `docente_materiaId` = (   
            SELECT `docente_materiaId` FROM `docente_materia` WHERE `docenteId` = ? AND `materiaId` = ?
          )
        )      )";
    $query =$this->db->query($sql, array($docenteId, $materiaId));
    return $query->result();
   }


   public function mostrar_por_materia($materiaId, $usuarioId){
        if($this->session->userdata('tipoUsuarioId') == 3 ){
          $sql0 = "SELECT grupoId
                   FROM grupo_docente_materia
                   INNER JOIN docente_materia ON grupo_docente_materia.docente_materiaId = docente_materia.docente_materiaId
                   WHERE docente_materia.docenteId = ? ";
          $query = $this->db->query($sql0, array($usuarioId) );
          $grupo = $query->row();          
          $grupoId = $grupo->grupoId;

        } else{
          $sql0 = "SELECT grupoId FROM alumno_grupo WHERE alumnoId = ?";
          $query = $this->db->query($sql0, array($usuarioId));
          $grupo = $query->row();
          $grupoId = $grupo->grupoId;
        }
        
        /*$sql = "select actividad.actividadId, actividad.tipoActividadId, actividad.nombreActividad, actividad.descActividad, actividad.rutaActividad, actividad.fecha, comentario.comentarioId, comentario.comentario, comentario.usuarioId, comentario.fecha
                FROM actividad, grupo_docente_materia_actividad, grupo_docente_materia, docente_materia, comentario
                WHERE grupo_docente_materia_actividad.actividadId = actividad.actividadId
                AND grupo_docente_materia_actividad.grupo_docente_materiaId = grupo_docente_materia.grupo_docente_materiaId
                AND grupo_docente_materia.docente_materiaId = docente_materia.docente_materiaId
                AND docente_materia.materiaId =".$materiaId."
                AND comentario.grupo_docente_materia_actividadId = grupo_docente_materia_actividad.grupo_docente_materia_actividadId
                AND grupo_docente_materia.grupoId =".$grupoId."
                  ORDER BY actividad.actividadId, comentario.fecha DESC;";*/

          $sql = "SELECT * FROM comentario JOIN 
                   (SELECT * FROM (SELECT actividad.actividadId as actividadId1, actividad.tipoActividadId, actividad.nombreActividad, actividad.descActividad, actividad.rutaActividad, actividad.fecha, materias_todas.alumnoId FROM actividad JOIN (
                         SELECT grupo_docente_materiaId as grupo_docente_materiaId1, grupos_todos.alumnoId FROM grupo_docente_materia JOIN (
                              SELECT alumno_grupo.alumnoId, grupo.grupoId
                                FROM alumno_grupo JOIN 
                                  grupo
                                ON alumno_grupo.grupoId = grupo.grupoId
                            ) AS grupos_todos 
                          ON grupo_docente_materia.grupoId=grupos_todos.grupoId
                        ) AS materias_todas
                        ON grupo_docente_materiaId=materias_todas.grupo_docente_materiaId1
                    ) AS actividades WHERE actividades.alumnoId= ? ) AS comentarios_todos
              ON actividadId=comentarios_todos.actividadId1";
        $query = $this->db->query($sql, array($usuarioId));
        return $actividades = $query->result();
   }


   public function es_mi_actividad($usuarioId, $actividadId){
      
      $sql = "SELECT nombre, docenteId FROM docente_materia
        JOIN grupo_docente_materia ON docente_materia.docente_materiaId = grupo_docente_materia.docente_materiaId
        JOIN actividad ON grupo_docente_materia.grupo_docente_materiaId = actividad.grupo_docente_materiaId
        WHERE actividadId = ? ";
      
      $docenteId = $this->db->query($sql, array($actividadId))->row();

      if($docenteId->docenteId == $usuarioId){
        return true;
      }else{
        return false;
      }

   }

   public function muestra_nombre_docente($actividadId){
    $sql = "SELECT nombre FROM docente_materia
            JOIN grupo_docente_materia 
              ON docente_materia.docente_materiaId = grupo_docente_materia.docente_materiaId 
            JOIN actividad 
              ON actividad.grupo_docente_materiaId = grupo_docente_materia.grupo_docente_materiaId
            WHERE actividad.actividadId = ? ";
    $docente = $this->db->query($sql, array($actividadId))->row();
    return $docente->nombre;

   }


    function actividades_alumno($usuarioId){
    	/*$sql = "SELECT * FROM `actividad` WHERE `actividadId` IN (  
    			SELECT `actividadId` FROM `grupo_docente_materia_actividad` WHERE `grupo_docente_materiaId` IN (  
    				(SELECT `grupo_docente_materiaId` FROM `grupo_docente_materia` WHERE `grupoId` IN ( 
    					SELECT `grupoId` from `alumno_grupo` WHERE `alumnoId` =".$usuarioId."))))";*/

      $sql = "SELECT * FROM (SELECT actividad.*, materias_todas.alumnoId FROM actividad JOIN (
                 SELECT grupo_docente_materiaId as grupo_docente_materiaId1, grupos_todos.alumnoId FROM grupo_docente_materia JOIN (
                      SELECT alumno_grupo.alumnoId, grupo.grupoId
                        FROM alumno_grupo JOIN 
                          grupo
                        ON alumno_grupo.grupoId = grupo.grupoId
                    ) AS grupos_todos 
                  ON grupo_docente_materia.grupoId=grupos_todos.grupoId
                ) AS materias_todas
                ON grupo_docente_materiaId=materias_todas.grupo_docente_materiaId1
            ) AS actividades WHERE actividades.alumnoId= ?";

	    $query = $this->db->query($sql, array($usuarioId));
        return $query->result ();
    }


    function actividades_docente($usuarioId){

    	/*$sql = "SELECT * FROM `actividad` WHERE `actividadId` IN (  
    			SELECT `actividadId` FROM `grupo_docente_materia_actividad` WHERE `grupo_docente_materiaId` IN (      					
    			SELECT `grupo_docente_materiaId` FROM `grupo_docente_materia` WHERE `docente_materiaId` IN ( 
    			SELECT `docente_materiaId` FROM `docente_materia` WHERE `docenteId` = ".$usuarioId.")))"; */
      $sql = "SELECT docente_materia.nombreMateria, grupo_docente_materia.claveGrupo, actividad.actividadId, 
                     actividad.nombreActividad, actividad.descActividad, actividad.fecha,
                     actividad.rutaActividad, tipo_actividad.tipoActividad
              FROM docente_materia
              JOIN grupo_docente_materia 
                ON grupo_docente_materia.docente_materiaId = docente_materia.docente_materiaId
              JOIN actividad 
                ON grupo_docente_materia.grupo_docente_materiaId = actividad.grupo_docente_materiaId
              JOIN tipo_actividad 
                ON  actividad.tipoActividadId = tipo_actividad.tipoActividadId 
              WHERE docente_materia.docenteId = ?";
    	$query = $this->db->query($sql, array($usuarioId));
      return $query->result();

    }


    function actividades_noticias_escuela(){
      $sql = "SELECT * FROM actividad WHERE tipoActividadId = 3";
      $query = $this->db->query($sql);
      return $query->result();
    }
}
?>