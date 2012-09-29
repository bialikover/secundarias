<?php class Materia_model extends CI_Model {
	

    function __construct()
    {
        parent::__construct();
    }

    function all()
    {
    	$query = $this->db->get("materia");
    	return $query->result();
    }

    function mostrar($materiaId){

        $query = $this->db->get_where("materia", array("materiaId" => $materiaId));
        return $query->row();
    }

    function materias_alumno($usuarioId){

        $this->db->select('materia_id');
        $this->db->from('docente_materia');
        $this->db->where('usuario.usuarioId', $usuarioId);  

        $sql = "SELECT * FROM `materia` WHERE `materiaId` IN ( 
                SELECT `materiaId` FROM `docente_materia` WHERE `docente_materiaId` IN (
                SELECT `docente_materiaId` FROM `grupo_docente_materia` WHERE `grupoId` IN ( 
                    SELECT `grupoId` from `alumno_grupo` WHERE `alumnoId` =".$usuarioId.")))";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function materias_docente($usuarioId){

        $sql = "SELECT * FROM `materia` WHERE `materiaId` IN (
                    SELECT `materiaId` FROM `docente_materia` WHERE `docenteId` =".$usuarioId.")";
        $query = $this->db->query($sql);
        return $query->result();
    }


    
}