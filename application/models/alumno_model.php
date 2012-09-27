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

}

?>