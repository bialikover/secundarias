<?php

class Materia extends CI_Controller
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
            $crud->set_subject('Materia');
            $crud->set_table('materia');


            $crud->columns('matriculaMateria','materia');
            $crud->fields('matriculaMateria','materia'); 

            $crud->display_as('matriculaMateria','Matricula');        

            /*$crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();*/
            //$crud->unset_list();

            $output = $crud->render();

            $this->load->view('includes/header-docente');
            $this->load->view('materia/index', $output);
            $this->load->view('includes/footer');
	}

}

?>