<?php

class Grupo extends CI_Controller
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
            $crud->set_subject('Grupo');
            $crud->set_table('grupo');


            $crud->columns('claveGrupo','cicloEscolar','grado');
            $crud->fields('claveGrupo','cicloEscolar','grado'); 

            $crud->display_as('claveGrupo','Clave de Grupo');
            $crud->display_as('cicloEscolar','Ciclo Escolar');     
               

            /*$crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();*/
            //$crud->unset_list();

            $output = $crud->render();

            $this->load->view('includes/header-docente');
            $this->load->view('grupo/index', $output);
            $this->load->view('includes/footer');
	}

}

?>