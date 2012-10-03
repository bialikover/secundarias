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
    $query = $this->db->query($sql, array($docenteId, $materiaId));
    return $query->result();
   }
   public function mostrar_actividades_por_grupo_docente_materia($grupo_docente_materiaId){

    $sql = "SELECT * from actividad WHERE grupo_docente_materiaId = ?";
    $query = $this->db->query($sql, array($grupo_docente_materiaId) );
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
   public function es_mi_grupo($usuarioId, $tipoUsuarioId, $grupo_docente_materia){
    if($tipoUsuarioId == 3){
      $sql = "SELECT docenteId FROM grupo_docente_materia 
            JOIN docente_materia 
              ON grupo_docente_materia.docente_materiaId = docente_materia.docente_materiaId
            WHERE grupo_docente_materiaId = ?";
      $query = $this->db->query($sql, array($grupo_docente_materia));
      $docenteId = $query->row();
      if($docenteId != null){
        if($docenteId->docenteId == $usuarioId){
            return true;
        }else{
           return false;
        }
      }else{
        return false;
      } 
    } else{ //tipo de usuario 4 alumno
      $sql = "SELECT alumnoId FROM alumno_grupo 
            JOIN grupo 
              ON alumno_grupo.grupoId = grupo.grupoId
            JOIN grupo_docente_materia
              ON grupo_docente_materia.grupoId = grupo.grupoId
            WHERE grupo_docente_materiaId = ? AND alumnoId = ?";
      $query = $this->db->query($sql, array($grupo_docente_materia, $usuarioId));

      if($query->row()!= null){
        return true;
      }
      else{
        return false;
      }

    }   

   }

   public function es_mi_actividad($usuarioId, $tipoUsuarioId, $actividadId){
    if($tipoUsuarioId == 3){
      $sql = "SELECT nombre, docenteId FROM docente_materia
        JOIN grupo_docente_materia ON docente_materia.docente_materiaId = grupo_docente_materia.docente_materiaId
        JOIN actividad ON grupo_docente_materia.grupo_docente_materiaId = actividad.grupo_docente_materiaId
        WHERE actividadId = ? ";
      
      $docenteId = $this->db->query($sql, array($actividadId))->row();

      if($docenteId != null){

        if($docenteId->docenteId == $usuarioId){
          return true;
        }else{
          return false;
        }
      } else{
        return false;
      }
    } else{
      $sql = "SELECT alumnoId FROM alumno_grupo 
            JOIN grupo 
              ON alumno_grupo.grupoId = grupo.grupoId
            JOIN grupo_docente_materia
              ON grupo_docente_materia.grupoId = grupo.grupoId
            JOIN actividad 
              ON actividad.grupo_docente_materiaId = grupo_docente_materia.grupo_docente_materiaId
            WHERE actividadId = ? AND alumnoId = ?";
      $query = $this->db->query($sql, array($actividadId, $usuarioId));

      if($query->row()!= null){
        return true;
      }
      else{
        return false;
      }
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

      $sql = "SELECT * FROM alumno_grupo 
            JOIN grupo 
              ON alumno_grupo.grupoId = grupo.grupoId
            JOIN grupo_docente_materia
              ON grupo_docente_materia.grupoId = grupo.grupoId
            JOIN actividad 
              ON actividad.grupo_docente_materiaId = grupo_docente_materia.grupo_docente_materiaId
            JOIN tipo_actividad 
              ON tipo_actividad.tipoActividadId = actividad.tipoActividadId
            WHERE alumnoId = ?";

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


    function actividades_noticias_escuela($limit = 4){
      $sql = "SELECT * FROM actividad WHERE tipoActividadId = 3 LIMIT ?";
      $query = $this->db->query($sql, array($limit));
      return $query->result();
    }
    
    function mostrar_agenda_entre_fechas($fecha1, $fecha2, $usuarioId, $order_by = 'asc') {
      $sql0     = '';
      $order_by = (strtoupper($order_by) == 'ASC') ? 'ASC' : 'desc';
      
      if ( $this->session->userdata('tipoUsuarioId') == 3 ) {
         $sql0 = 'SELECT
                     grupoId
                  FROM
                     grupo_docente_materia
                  INNER JOIN docente_materia
                     ON docente_materia.docente_materiaId = grupo_docente_materia.docente_materiaId
                  WHERE
                     docente_materia.docenteId = ?';
      } else {
         $sql0 = 'SELECT grupodId FROM alumno_grupo WHERE alumnoId = ?';
      }
      
      $sql1 = 'SELECT
                  *
               FROM
                  actividad
               INNER JOIN grupo_docente_materia
                  ON grupo_docente_materia.grupo_docente_materiaId = actividad.grupo_docente_materiaId
               WHERE
                  actividad.fecha BETWEEN ? AND ?
                  AND grupo_docente_materia.grupoId IN ('.$sql0.')
               ORDER BY actividad.fecha '.$order_by;
      
      $bindings = array($fecha1, $fecha2, $usuarioId);
      
      $result   = $this->db->query($sql1, $bindings);
      
      return $result->result();
    }
}
?>