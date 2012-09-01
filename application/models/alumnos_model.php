<?php

class Alumnos_model extends CI_Model
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

}

?>