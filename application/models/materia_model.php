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

    
}