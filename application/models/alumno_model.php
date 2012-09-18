<?php

class Alumno_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_alumnos()
	{
		$query = $this->db->get('alumnos');
		return $query->result();
	}

	function create()
	{
		
	}

	function perfil($usuarioId){

		$this->db->select('*');
		$this->db->from('usuario');			
		$this->db->join('datos_personal', 'datos_personal.usuarioId = usuario.usuarioId');
		$this->db->join('datos_contacto', 'datos_contacto.usuarioId = usuario.usuarioId');
		$this->db->join('domicilio', 'domicilio.usuarioId = usuario.usuarioId');
		$this->db->join('adicional', 'adicional.usuarioId = usuario.usuarioId');
		$this->db->where('usuario.usuarioId', $usuarioId); 	


		return $query = $this->db->get()->row();

	}
	function materias_alumno($usuarioId){

        $this->db->select('materia_id');
        $this->db->from('docente_materia');
        $this->db->where('usuario.usuarioId', $usuarioId);  

        $sql = "SELECT `materia` FROM `materia` WHERE `materiaId` IN ( 
        		SELECT `materiaId` FROM `docente_materia` WHERE `docente_materiaId` IN (
        		SELECT `docente_materiaId` FROM `grupo_docente_materia` WHERE `grupoId` = ( 
        			SELECT `grupoId` from `alumno_grupo` WHERE `alumnoId` =".$usuarioId.")))";
        $query = $this->db->query($sql);
        return $query->result();
    }


    function actividades($usuarioId){
    	$sql = "SELECT * FROM `actividad` WHERE `actividadId` IN (  
    			SELECT `actividadId` FROM `grupo_docente_materia_actividad` WHERE `grupo_docente_materiaId` IN (  
    				(SELECT `grupo_docente_materiaId` FROM `grupo_docente_materia` WHERE `grupoId` = ( 
    					SELECT `grupoId` from `alumno_grupo` WHERE `alumnoId` =".$usuarioId."))))";
	    $query = $this->db->query($sql);
        return $query->result ();
    }

}

?>