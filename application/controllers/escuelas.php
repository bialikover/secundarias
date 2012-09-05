<?php


class Escuelas extends CI_Controller
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
		$crud->set_subject('escuelas');
    	$crud->set_table('escuelas');    	
    	$crud->columns('nombre', 'turno','clave', 'zona', 'sector', 'municipio', 'localidad', 'telefono', 'email', 'descripcion' );

    	$output = $crud->render();
    	
    	$this->load->view('includes/header-escuela');
    	$this->load->view('escuelas/index',$output);
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