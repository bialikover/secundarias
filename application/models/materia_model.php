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

        /*$sql = "SELECT * FROM `materia` WHERE `materiaId` IN (
                    SELECT `materiaId` FROM `docente_materia` WHERE `docenteId` =".$usuarioId.")";*/

        $sql = "SELECT DISTINCT(materia), materiaId FROM (SELECT grupo_docente_materia.claveGrupo, grupo_docente_materia.nombreMateria1 AS materia, docente_materia.docenteId, docente_materia.materiaId
            FROM grupo_docente_materia JOIN
                docente_materia 
            ON grupo_docente_materia.docente_materiaId=docente_materia.docente_materiaId) AS  grupos_todos
            WHERE grupos_todos.docenteId=" . $usuarioId;

        $query = $this->db->query($sql);
        return $query->result();
    }

    function clave_materias_docente($usuarioId){

        /*$sql = "SELECT * FROM `materia` WHERE `materiaId` IN (
                    SELECT `materiaId` FROM `docente_materia` WHERE `docenteId` =".$usuarioId.")";*/

        $sql = "SELECT * FROM (SELECT grupo_docente_materia.claveGrupo, grupo_docente_materia.nombreMateria1, docente_materia.docenteId, docente_materia.materiaId, grupo_docente_materia.grupo_docente_materiaId
                FROM grupo_docente_materia JOIN
                    docente_materia 
                ON grupo_docente_materia.docente_materiaId=docente_materia.docente_materiaId) AS  grupos_todos
                WHERE grupos_todos.docenteId=" . $usuarioId;

        $query = $this->db->query($sql);
        return $query->result();
    }
}