<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Actividad extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');        
        $this->load->library('grocery_CRUD');
    }

    function detalle(){
      if (!$this->session->userdata('validated')){
        redirect('login');
      } else{
    	   $this->load->helper('form');
    	   $id = $this->uri->segment(3);
    
    	   $this->load->model("actividad_model");
         $this->load->model("comentario_model");
    	   $data['actividad'] = $this->actividad_model->mostrar($id);                
            if($data['actividad'] != null){
              if($this->actividad_model->es_mi_actividad($this->session->userdata('usuarioId'),$data['actividad']->actividadId)){
                $data['comentarios'] = $this->comentario_model->mostrar($data['actividad']->actividadId);
                $this->load->view('includes/header-alumno');
    	       //var_dump($data['actividad']);
                $this->load->view("actividad/mostrar_actividad", $data);  
                $this->load->view('includes/footer');
              } else{

                redirect(404);
              }

            } else{
                redirect(404);
            }
      }
    }



    public function crear(){
    if (!$this->session->userdata('validated') ||  $this->session->userdata('tipoUsuarioId') > 3 ) {
        redirect('login');
    } else {  
      $crud = new grocery_CRUD();
      $crud->set_table('actividad');
      $crud->set_theme('datatables');

      $crud->columns('nombreActividad','descActividad');
      

      if($this->session->userdata('tipoUsuarioId') == 3){
        $crud->fields('nombreActividad','descActividad', 'tipoActividadId', 'fecha', 'rutaActividad', 'grupo_docente_materiaId');
        $crud->set_relation('tipoActividadId', 'tipo_actividad', 'tipoActividad',  array('tipoActividadId < ' => '3' ));
        $crud->set_relation('grupo_docente_materiaId', 'grupo_docente_materia', '{claveGrupo} - {nombreMateria}');
        $crud->display_as('grupo_docente_materiaId','Grupo Materia');      
        $crud->callback_add_field('grupo_docente_materiaId',array($this,'materias'));        
      } else{
        $crud->fields('nombreActividad','descActividad', 'tipoActividadId', 'fecha', 'rutaActividad');
        $crud->set_relation('tipoActividadId', 'tipo_actividad', 'tipoActividad',  array('tipoActividadId' => '3' ));        
      }


      $crud->set_field_upload('rutaActividad','index.php/assets/uploads/files');
      //$crud->change_field_type('rutaActividad','invisible');
  
      $crud->unset_list();
      $crud->unset_back_to_list();
      
  
      $output = $crud->render();
      $this->load->view('includes/header-docente');
      $this->load->view('actividad/new', $output);
      $this->load->view('includes/footer');
    }
  }
  
    public function materias(){
      $usuarioId = $this->session->userdata("usuarioId"); 
      $this->load->model("materia_model");
      $materias = $this->materia_model->clave_materias_docente($usuarioId);
      $html1 ="<select id='field-grupo_docente_materiaId'  name='grupo_docente_materiaId' class='chosen-select' data-placeholder='Select Materia' style='width:300px'>";
      foreach ( $materias as $materia ) {
        $html1 .= "<option value='".$materia->grupo_docente_materiaId."'>".$materia->claveGrupo." - ".$materia->nombreMateria1."</option>";
      }

      $html1 .= '</select>';
      return $html1;

  }


}

?>