<?php


class Alta_usuarios extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{

		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_subject('usuario');
    	$crud->set_table('usuario');

    	$crud->display_as('user','Usuario');

    	$crud->columns('user','role');

    	$output = $crud->render();
    	
    	$this->load->view('includes/header');
    	$this->load->view('alumnos/index',$output);
    	$this->load->view('includes/footer');


	}
}



?>