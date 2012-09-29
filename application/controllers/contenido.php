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
   if (!$this->session->userdata('validated') ||  $this->session->userdata('tipoUsuarioId') > 3 ) {
        redirect('login');
    } else {  
      $crud = new grocery_CRUD();
      $crud->set_table('actividad');
      $crud->set_theme('datatables');

      $crud->columns('nombreActividad','descActividad');
      $crud->fields('nombreActividad','descActividad', 'tipoActividadId', 'fecha', 'rutaActividad', 'grupo_docente_materiaId');
      $crud->set_relation('grupo_docente_materiaId', 'grupo_docente_materia', '{claveGrupo} - {nombreMateria}');
      $crud->display_as('grupo_docente_materiaId','Grupo Materia');
      
      $crud->callback_add_field('grupo_docente_materiaId',array($this,'materias'));
      
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
    }
  }

  function tipo_actividad_fecha($post_array){
  	$post_array['tipoActividadId'] = 2;
  	$post_array['fecha'] = date("Y-m-d H:i:s");
  	return $post_array;
  }
  
    public function materias(){
      $usuarioId = $this->session->userdata("usuarioId"); 
      $this->load->model("materia_model");
      $materias = $this->materia_model->clave_materias_docente($usuarioId);
      //var_dump($materias);
      //die();
      $html1 ="<select id='field-id_materias'  name='id_materias' class='chosen-select' data-placeholder='Select Materia' style='width:300px'>";
      foreach ( $materias as $materia ) {
        $html1 .= "<option value='".$materia->grupo_docente_materiaId."'>".$materia->claveGrupo." - ".$materia->nombreMateria1."</option>";
      }

      $html1 .= '</select>';
      return $html1;

  }

}


 

?>