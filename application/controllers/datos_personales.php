<?php

class Datos_personales extends CI_Controller
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
            $crud->set_subject('datos personales');
            $crud->set_table('datos_personal');


            $crud->columns('nombre','aPaterno','aMaterno');
            $crud->fields('nombre','aPaterno','aMaterno','genero','fechaNac');         

            $crud->display_as('aPaterno','Apellido Paterno');
            $crud->display_as('aMaterno','Apellido Materno');
            $crud->display_as('fechaNac','Fecha de Nacimiento');

            $crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();

            $output = $crud->render();

            $this->load->view('includes/header-docente');
            $this->load->view('datos_personales/index', $output);
            $this->load->view('includes/footer');
	}

}

?>