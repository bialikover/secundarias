<?php


class Escuelas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}



	public function index(){
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_subject('contacto_escuela');
    	$crud->set_table('contacto_escuela');    	

    	$crud->columns('escuelaId', 'telEscuela','emailEscuela');
    	$crud->fields('escuela', 'telefono_escuela','email_escuela');
    	$crud->set_relation('escuelaId', 'escuela', 'escuelaId');
    	$crud->display_as('administradorId','Administrador Escuela');
		$crud->unset_add();

    	$output = $crud->render();
    	
    	$this->load->view('includes/header-escuela');
    	$this->load->view('contacto_escuela/index',$output);
    	$this->load->view('includes/footer');
	}


	public function show(){
		echo "la view para mostrar una secundaria.";

	}
}

?>