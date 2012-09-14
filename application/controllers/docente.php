<?php

class Docente extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
      
		$crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('docente');
            $crud->unset_add();

            $crud->set_relation('docenteId', 'usuario', 'usuario',  array('tipoUsuarioId'=>'3'));
            $crud->set_relation_n_n('materiaId', 'docente_materia', 'materia', 'docenteId', 'materiaId', 'materia');
            $crud->unset_columns('docenteId');
            //$crud->fields('docenteId');

            $output = $crud->render();
            $this->load->view('includes/header-usuario-edit');
            $this->load->view('docente/index', $output);
            $this->load->view('includes/footer');

	}

}

?>