<?php

class Docente extends CI_Controller
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
            $crud->set_subject('relacion');
            $crud->set_table('docente');
            //$crud->where('tipoUsuario',2);
            //$this->db->query('');
            //$datos_docentes = $da

            //$crud->unset_add_fields('docenteId');
            $crud->set_relation('docenteId','docente','matricula');
            $crud->display_as('docenteId','Nombre del docente');
            //$crud->callback_add_field('docenteId',array($this,'maestros'));
            //$crud->set_relation_n_n('usuarios','docente','docente_materia','docenteId','docenteId','docente_materia');
            $crud->set_relation_n_n('materias','docente_materia','materia','docente_materiaId','materiaId','materia');
            

            $output = $crud->render();
            $this->load->view('includes/header-usuario-edit');
            $this->load->view('docentes/index', $output);
            $this->load->view('includes/footer');
            
	}
/*    */
}

?>