<?php


class Alumnos extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}

//funcion para enlistar a los alumnos
	public function index()
	{
		/*
			Variables:
			
			$data = Almacena los valores retornados por un modelo
			
		*/

		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_subject('alumno');
    	$crud->set_table('alumnos');

    	$crud->display_as('apellido_pat','Apellido paterno');
    	$crud->display_as('fecha_nacimiento','Fecha de nacimiento');
    	$crud->display_as('apellido_mat','Apellido materno');
    	$crud->display_as('id_grupo','Grupo');
        $crud->display_as('id_padre','Tutor');

    	$crud->set_relation('id_grupo','grupos','clave');
        $crud->set_relation('id_padre','padres','nombre');

    	$crud->columns('matricula','nombre','apellido_pat','apellido_mat','id_grupo','correo_electronico');
    	$crud->fields('matricula','nombre','apellido_pat','apellido_mat','genero','id_grupo', 'id_padre', 'fecha_nacimiento','curp','direccion','telefono','correo_electronico');
    	

    	$crud->add_action('Ver', '', 'alumnos/show','ui-icon-plus');
    	$crud->unset_delete();
 
    	$output = $crud->render();

    	$this->load->view('includes/header-alumno');
    	$this->load->view('alumnos/index',$output);
    	$this->load->view('includes/footer');

	}

	public function show()
	{
		$id = $this->uri->segment(3);
		$data['alumno'] = $this->db->get_where( 'alumnos', array( 'id_alumno' => $id ) )->result();
		$alumno1=$data['alumno'];
		$id_grupo1=$alumno1[0]->id_grupo;

		$data['grupo'] = $this->db->get_where( 'grupos', array( 'id_grupo' => $id_grupo1 ) )->result();
		
		$grupo1=$data['grupo'];
		$id_escuela1=$grupo1[0]->id_escuela;
		
		$data['escuela'] = $this->db->get_where( 'escuelas', array( 'id_escuela' => $id_escuela1 ) )->result();
        
        $id_padre1 = $alumno1[0]->id_padre;
        $data['tutor'] = $this->db->get_where('padres',  array('id_padre' => $id_padre1))->result();


		$this->load->view('includes/header-alumno');
		$this->load->view('alumnos/show',$data);
		$this->load->view('includes/footer');
	}

	public function comentarios()
    {
        $this->load->view('includes/header');
        $this->load->view('aula_digital/comentarios');
        $this->load->view('includes/footer');
    }

}



?>