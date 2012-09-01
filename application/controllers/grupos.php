<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grupos extends CI_Controller 
{	
	public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
			$this->load->library('grocery_CRUD');
    }
    //trae todas las materias
    public function index()
    {

    	$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_subject('grupo');
    	$crud->set_table('grupos');
        $crud->set_relation_n_n('materias', 'grupo_materia', 'materias', 'id_grupos', 'id_materias', 'nombre');
    	$crud->columns('año','clave','ciclo_escolar', 'salon', 'turno', 'grado');
        $crud->fields('año','clave','ciclo_escolar', 'salon', 'turno', 'grado', 'materias');    	
    	$crud->display_as('ciclo_escolar','Ciclo Escolar');
        $crud->add_action('Ver', '', 'materia/show','ui-icon-plus');
    	$crud->unset_delete();
 
    	$output = $crud->render();
    	$this->load->view('materias/index.html',$output);
    	
    }
    //muestra una materia
    public function show()
    {
    	$this->load->view("materias/show");	
    }

    //muestra un formulario para crear una nueva materia
    public function new_view()
    {
    	$this->load->view("materias/new");
    }

    //muestra un formulario para editar una materia
    public function edit()
    {

    }

    //guarda el nuevo elemento materia en la base de datos
    public function create()
    {
    	var_dump($this->input->post());
    	die;
    }

    //actualiza la información en la base de datos correspondiente a materia
    public function update()
    {

    }

}
