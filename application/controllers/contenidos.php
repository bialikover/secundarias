<?php


class Contenidos extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}
  public function create(){
	
    $content = $this->input->post();
    $id_docente = $this->session->userdata('id_perfil');
    

  }


  public function nueva(){
    //$this->load->view('includes/header'); 
    $crud = new grocery_CRUD();
    $crud->set_table('actividad');
    $crud->set_theme('datatables');
    $crud->columns('nombreActividad','descActividad');
    $crud->fields('nombreActividad','descActividad', 'tipoActividadId', 'fecha', 'rutaActividad',
      'grupo_docente_materia');
    $crud->set_relation_n_n('grupo_docente_materia', 'grupo_docente_materia_actividad', 
    'grupo_docente_materia','actividadId','grupo_docente_materiaId', 'docente_materiaId');
    $crud->change_field_type('tipoActividadId','invisible');
    $crud->change_field_type('fecha','invisible');
    $crud->set_field_upload('rutaActividad','assets/uploads/files');

    $crud->unset_list();
    $crud->callback_before_insert(array($this,'tipo_actividad_fecha'));    

    $output = $crud->render();
    $this->load->view('includes/header-docente');
    $this->load->view('contenido/add', $output);
    $this->load->view('includes/footer');
  }

  function tipo_actividad_fecha($post_array){
  	$post_array['tipoActividadId'] = 2;
  	$post_array['fecha'] = date("Y-m-d h:m:s");
  	return $post_array;
  }
  

}


 

?>