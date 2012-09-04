<?php class Padres_model extends CI_Model {

	var $nombre = "";
	var $telefono = "";
	var $direccion = "";

    function __construct()
    {
        parent::__construct();
    }

    function all()
    {
    	$query = $this->db->get("padres");
    	return $query->result();
    }

    function insert_entry()
    {
        $this->nombre   = $this->input->post('nombre'); // please read the below note
        $this->matricula   = $this->input->post('telefono');
        $this->grado    = $this->input->post('direccion');
        
        $this->db->insert('padres', $this);
    }

    function update_entry()
    {
    	
        $this->nombre   = $this->input->post('nombre'); // please read the below note
        $this->telefono   = $this->input->post('telefono');
        $this->direccion    = $this->input->post('direccion');

        $this->db->update('padres', $this, array('id' => $_POST['id']));
    }

}