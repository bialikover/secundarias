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
		$crud->set_subject('escuela');
    	$crud->set_table('escuela');    	

    	$crud->columns('escuelaId', 'escuela','claveEscuela', 'turno', 'administradorId');
    	$crud->fields('escuela', 'clave_escuela','turno', 'descripcion', 'adicional', 'administradorId');
    	$crud->set_relation('administradorId', 'usuario', 'usuarioId');
    	$crud->display_as('administradorId','Administrador Escuela');
    	$crud->add_action('Contacto','', 'contacto_escuela');
		$crud->add_action('Domicilio','', 'domicilio_escuela/index');
		$crud->unset_add();

    	$output = $crud->render();
    	
    	$this->load->view('includes/header-escuela');
    	$this->load->view('escuelas/index',$output);
    	$this->load->view('includes/footer');
	}


	public function show(){
		echo "la view para mostrar una secundaria.";

	}
}



?>