<?php 

class Escuela_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }


    public function mostrar($escuelaId){

    	$this->db->select('*');
    	$this->db->from("escuela");    	
    	$this->db->join('contacto_escuela', 'escuela.escuelaId = contacto_escuela.escuelaId');
    	$this->db->join('domicilio_escuela', 'escuela.escuelaId = domicilio_escuela.escuelaId');
    	$this->db->where('escuela.escuelaId' , $escuelaId);
    	return $query = $this->db->get()->row();
    }
    public function mostrar_todas(){
        $sql = "SELECT * FROM escuela
                JOIN contacto_escuela 
                    ON contacto_escuela.escuelaId = escuela.escuelaId
                JOIN domicilio_escuela
                    ON contacto_escuela.escuelaId = domicilio_escuela.escuelaId";
        return $this->db->query($sql)->result();
        /*$this->db->select('*');
        $this->db->from("escuela");        
        $this->db->join('contacto_escuela', 'escuela.escuelaId = contacto_escuela.escuelaId');
        $this->db->join('domicilio_escuela', 'escuela.escuelaId = domicilio_escuela.escuelaId');

        return $query = $this->db->get()->result();*/
    }


}
?>