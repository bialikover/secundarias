<?php


class Publicacion extends CI_Controller
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
		$crud->set_subject('Aula digital');
    	$crud->set_table('contenidos');

    	$crud->display_as('id_materias','Materia');
    	$crud->display_as('id_grupo','Grupo');
    	$crud->display_as('fecha_publicacion','Fecha de creación');

    	$crud->set_relation('id_materias','materias','nombre');
    	$crud->set_relation('id_grupo','grupos','clave');

    	$crud->columns('id_materias','fecha_publicacion','id_grupo');
    	$crud->fields('id_materias','texto','id_grupo');


    	$crud->add_action('Ver', '', 'alumnos/show','ui-icon-plus');
    	$crud->unset_delete();
 
    	$output = $crud->render();
    	$this->load->view('includes/header');
    	$this->load->view('publicacion/index',$output);
    	$this->load->view('includes/footer');
	}

}


?>