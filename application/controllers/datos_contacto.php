<?php

class Datos_contacto extends CI_Controller
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
            $crud->set_table('datos_contacto');


            $crud->columns('telefono','telmovil','email');
            $crud->fields('telefono','telmovil','email');

            $crud->display_as('telmovil','Celular');
            $crud->display_as('email','Correo Electronico');         

            $crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();

            $output = $crud->render();

            $this->load->view('includes/header-docente');
            $this->load->view('datos_contacto/index', $output);
            $this->load->view('includes/footer');
	}

}

?>