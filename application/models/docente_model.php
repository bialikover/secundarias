<?php class Docente_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }
    
	function all()
    {
    	$query = $this->db->get("docente");
    	return $query->result();
    }
    function materias_docente($usuarioId){

       // $this->db->select('materia_id');
       // $this->db->from('docente_materia');
       // $this->db->where('usuario.usuarioId', $usuarioId);  

        $sql = "SELECT `materia` FROM `materia` WHERE `materiaId` IN (
                    SELECT `materiaId` FROM `docente_materia` WHERE `usuarioId` =".$usuarioId.")";
        $query = $this->db->query($sql);
        return $query->result();
    }


    function actividades($usuarioId){

    	$sql = "SELECT * FROM `actividad` WHERE `actividadId` IN (  
    			SELECT `actividadId` FROM `grupo_docente_materia_actividad` WHERE `grupo_docente_materiaId` IN (      					
    			SELECT `grupo_docente_materiaId` FROM `grupo_docente_materia` WHERE `docente_materiaId` IN ( 
    			SELECT `docente_materiaId` FROM `docente_materia` WHERE `docenteId` = ".$usuarioId.")))";
    	$query = $this->db->query($sql);
        return $query->result ();
    }

    function relaciona_materia($array_materias, $usuarioId){
    	   //var_dump($array_materias);
           //die;
    		foreach ($array_materias as $materia){
    			$data = array(
    				'docenteId' => $usuarioId,
    				'materiaId' => $materia
    				);
    			$this->db->insert('docente_materia', $data);
    		}

    }
}