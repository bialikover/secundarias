<?php


class Domicilio_Escuela extends CI_Controller
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
		$crud->set_subject('Domicilio de la Escuela');
    	$crud->set_table('domicilio_escuela');    	

    	$crud->columns('zona','sector', 'municipioId', 'localidad', 
    				   'latitud', 'longitud' );
    	
    	$crud->fields('zona','sector', 'municipioId', 'localidad', 
    				   'latitud', 'longitud');
    	$crud->set_relation('municipioId', 'municipio', 'municipio');
    	
		$crud->unset_add();
		$crud->unset_list();
		$crud->unset_export();
        $crud->unset_print();
        $crud->unset_back_to_list();

    	$output = $crud->render();
    	
    	$this->load->view('includes/header-usuario-edit');
    	$this->load->view('domicilio_escuela/index',$output);
    	$this->load->view('includes/footer');
	}


	public function show(){
		echo "la view para mostrar una secundaria.";

	}
}

?>