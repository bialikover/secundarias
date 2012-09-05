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
		if( $this->session->userdata('role') == "Maestro" )
		{
			$crud1 = new grocery_CRUD();
		$crud1->set_theme('datatables');
		$crud1->set_subject('Aula digital');
    	$crud1->set_table('contenidos');

    	$crud1->display_as('id_materias','Materia');
    	$crud1->display_as('id_grupo','Grupo');
    	$crud1->display_as('fecha_publicacion','Fecha de creación');

    	$crud1->set_relation('id_materias','materias','nombre');
    	$crud1->set_relation('id_grupo','grupos','clave');

    	$crud1->columns('id_materias','fecha_publicacion','id_grupo');
    	$crud1->set_field_upload('ruta_archivo','/assets/upload/');
    	//$crud->fields('id_materias','texto','id_grupo');
    	$crud1->change_field_type('id_docente','hidden',0);
    	$crud1->change_field_type('fecha_publicacion','hidden',0);
    	//$crud1->change_field_type('ruta_archivo','hidden',0);


    	$crud1->add_action('Ver', '', 'alumnos/show','ui-icon-plus');
    	$crud1->unset_delete();
    	


    	$output = $crud1->render();

    	$this->load->view('includes/header-escuela');
    	$this->load->view('publicacion/index',$output);
    	$this->load->view('includes/footer');

		}
		else
		{
			redirect('alumnos');
		}
	}

	public function comentarios()
	{
		$this->load->view('includes/header-docente');
		$this->load->view('publicacion/comentarios');
		$this->load->view('includes/footer');
	}

}


?>