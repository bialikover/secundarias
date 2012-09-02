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
		$crud->set_theme('datatables');
		$crud->set_subject('alumno');
    	$crud->set_table('alumnos');
    	$crud->columns('matricula','nombre','apellido_pat','apellido_mat','genero');
    	$crud->display_as('apellido_pat','Apellido paterno');
    	$crud->display_as('apellido_mat','Apellido materno');
    	$crud->fields('matricula','nombre','apellido_pat','apellido_mat','genero','fecha_nacimiento');
    	$crud->add_action('Ver', '', 'alumnos/show','ui-icon-plus');
    	$crud->unset_delete();
 
    	$output = $crud->render();
    	$this->load->view('includes/header');
    	$this->load->view('alumnos/index',$output);
    	$this->load->view('includes/footer');

	}

	public function show()
	{
		$id = $this->uri->segment(3);
		$data['alumno'] = $this->db->get_where( 'alumnos', array( 'id_alumno' => $id ) )->result();
		
		$this->load->view('includes/header');
		$this->load->view('alumnos/show',$data);
		$this->load->view('includes/footer');
	}


}



?>