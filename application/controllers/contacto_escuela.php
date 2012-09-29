<?php


class Contacto_Escuela extends CI_Controller
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

    	$crud->columns('telEscuela','emailEscuela');
    	$crud->fields('telEscuela','emailEscuela');
    	$crud->set_relation('escuelaId', 'escuela', 'escuelaId');
    	$crud->display_as('administradorId','Administrador Escuela');
		$crud->unset_add();
		$crud->unset_list();
		$crud->unset_back_to_list();		
    	$output = $crud->render();
		    	
    	$this->load->view('includes/header-usuario-edit');
    	$this->load->view('contacto_escuela/index',$output);
    	$this->load->view('includes/footer');
	}


	public function show(){
		echo "la view para mostrar una secundaria.";

	}

	


}

?>