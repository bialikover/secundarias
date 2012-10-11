<?php

class Adicional extends CI_Controller
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
            $crud->set_table('adicional');
            $crud->set_subject('Información adicional');

            $crud->columns('curp','especialidad','matricula');
            $crud->fields('curp','especialidad','matricula');         

            $crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_back_to_list();

            $output = $crud->render();

            $this->load->view('includes/header-usuario-edit');
            $this->load->view('adicional/index', $output);
            $this->load->view('includes/footer');
	}

}

?>