<?php


class Contenido extends CI_Controller
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


  public function nuevo(){
/*   if (!$this->session->userdata('validated') ||  $this->session->userdata('tipoUsuarioId') != 3 ) {
        redirect('login');
    } else {  */
      $crud = new grocery_CRUD();
      $crud->set_table('actividad');
      $crud->set_theme('datatables');
      $crud->columns('nombreActividad','descActividad');
      $crud->fields('nombreActividad','descActividad', 'tipoActividadId', 'fecha', 'rutaActividad', 'grupo_docente_materia');
      $crud->set_relation_n_n('grupo_docente_materia', 'grupo_docente_materia_actividad', 'grupo_docente_materia','actividadId','grupo_docente_materiaId', '{claveGrupo} - {nombreMateria}');
      $crud->change_field_type('tipoActividadId','invisible');
      $crud->change_field_type('fecha','invisible');
      $crud->set_field_upload('rutaActividad','index.php/assets/uploads/files');
      $crud->change_field_type('rutaActividad','invisible');
  
      $crud->unset_list();
      $crud->unset_back_to_list();
      $crud->callback_before_insert(array($this,'tipo_actividad_fecha'));    
  
      $output = $crud->render();
      $this->load->view('includes/header-docente');
      $this->load->view('contenido/add', $output);
      $this->load->view('includes/footer');
    //}
  }

  function tipo_actividad_fecha($post_array){
  	$post_array['tipoActividadId'] = 2;
  	$post_array['fecha'] = date("Y-m-d h:m:s");
  	return $post_array;
  }
  

}


 

?>