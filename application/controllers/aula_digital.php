<?php


class Aula_digital extends CI_Controller
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
		$crud->set_subject('Contenido');
    	$crud->set_table('contenidos');

    	$crud->set_relation('id_materias','materias','nombre');
    	$crud->fields('id_materias', 'texto');

    	$crud->display_as('id_materias','Materia');
    	$crud->unset_columns('id_docente','id_grupo','ruta_archivo');
    	//$crud->set_relation_n_n('grupo', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');

    	$crud->add_action('Ver', '', 'alumnos/show','ui-icon-plus');
    	$crud->unset_delete();
 
    	$output = $crud->render();
    	$this->load->view('includes/header');
    	$this->load->view('publicacion/index',$output);
    	$this->load->view('includes/footer');
	}

}


?>