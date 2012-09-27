<?php class Materias_model extends CI_Model {

	var $nombre = "";
	var $matricula = "";
	var $active = "true";
	var $grado = "";

    function __construct()
    {
        parent::__construct();
    }

    function all()
    {
    	$query = $this->db->get("materia");
    	return $query->result();
    }

    function insert_entry()
    {
        $this->nombre   = $this->input->post('nombre'); // please read the below note
        $this->matricula   = $this->input->post('matricula');
        $this->grado    = $this->input->post('grado');
        
        $this->db->insert('materias', $this);
    }

    function update_entry()
    {
    	
        $this->nombre   = $this->input->post('nombre'); // please read the below note
        $this->matricula   = $this->input->post('matricula');
        $this->grado    = $this->input->post('grado');
        $this->active    = $this->input->post('active');

        $this->db->update('materias', $this, array('id' => $_POST['id']));
    }

}