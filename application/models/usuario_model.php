<?php 

class Usuario_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function muestra_foto($usuarioId){
    	$this->db->select('rutaFoto');
    	$this->db->from('datos_personal');
    	$this->db->where('usuarioId', $usuarioId);
    	return $query = $this->db->get()->row();
    }

}

?>