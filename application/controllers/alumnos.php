<?php


class Alumnos extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}

//funcion para enlistar a los alumnos
	public function index()
	{
		/*
			Variables:
			
			$data = Almacena los valores retornados por un modelo
			
		*/

		$crud = new grocery_CRUD();
		//$crud->set_theme('datatables');
    	$crud->set_table('alumnos');
    	$crud->columns('matricula','nombre','apellido_pat','apellido_mat','genero');
    	$crud->display_as('apellido_pat','Apellido paterno');
    	$crud->fields('matricula','nombre','apellido_pat','apellido_mat','genero','ver');
 
    	$output = $crud->render();
    	$this->load->view('alumnos/index.html',$output);

	}

	public function ver()
	{

	}

	public function eliminar()
	{

	}

	public function editar()
	{

	}


}



?>