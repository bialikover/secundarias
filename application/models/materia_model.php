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

    function mostrar_materia_y_grupo($grupo_docente_materiaId){
        $sql = "SELECT * FROM docente_materia 
                JOIN grupo_docente_materia 
                    ON docente_materia.docente_materiaId  = grupo_docente_materia.docente_materiaId 
                WHERE grupo_docente_materia.grupo_docente_materiaId = ?";
        $query = $this->db->query($sql, array($grupo_docente_materiaId));
        return $query->row();
    }

    function materias_alumno($usuarioId){

        $sql = "SELECT grupo.claveGrupo, nombreMateria1 as materia, grupo_docente_materiaId  
                FROM grupo_docente_materia 
                JOIN grupo
                    ON grupo_docente_materia.grupoId = grupo.grupoId
                JOIN alumno_grupo
                    ON alumno_grupo.grupoId = grupo.grupoId
                WHERE alumno_grupo.alumnoId = ?";
        $query = $this->db->query($sql, array($usuarioId));
        return $query->result();
    }

    function materias_docente($usuarioId){

        $sql = "SELECT materiaId, claveGrupo, materia, grupo_docente_materiaId FROM (SELECT grupo_docente_materia.grupo_docente_materiaId, grupo_docente_materia.claveGrupo, grupo_docente_materia.nombreMateria1 AS materia, docente_materia.docenteId, docente_materia.materiaId
            FROM grupo_docente_materia JOIN
                docente_materia 
            ON grupo_docente_materia.docente_materiaId=docente_materia.docente_materiaId) AS  grupos_todos
            WHERE grupos_todos.docenteId= ?";

        $query = $this->db->query($sql, array($usuarioId));
        return $query->result();
    }

    function clave_materias_docente($usuarioId){

        /*$sql = "SELECT * FROM `materia` WHERE `materiaId` IN (
                    SELECT `materiaId` FROM `docente_materia` WHERE `docenteId` =".$usuarioId.")";*/

        $sql = "SELECT * FROM (SELECT grupo_docente_materia.claveGrupo, grupo_docente_materia.nombreMateria1, docente_materia.docenteId, docente_materia.materiaId, grupo_docente_materia.grupo_docente_materiaId
                FROM grupo_docente_materia JOIN
                    docente_materia 
                ON grupo_docente_materia.docente_materiaId=docente_materia.docente_materiaId) AS  grupos_todos
                WHERE grupos_todos.docenteId= ?";

        $query = $this->db->query($sql, array($usuarioId));
        return $query->result();
    }
}