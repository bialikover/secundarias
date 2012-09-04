<?php


class Secundarias extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}

	public function nueva()
	{

		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_subject('secundarias');
    	$crud->set_table('secundarias');    	
    	$crud->columns('nombre', 'descripcion','direccion', 'telefono');

    	$output = $crud->render();
    	
    	$this->load->view('includes/header-escuela');
    	$this->load->view('secundarias/index',$output);
    	$this->load->view('includes/footer');


	}


	public function index(){


		echo "la view principal";
		

	}


	public function show(){
		echo "la view para mostrar una secundaria.";

	}
}



?>