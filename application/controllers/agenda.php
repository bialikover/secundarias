<?php

    class Agenda extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        
        $this->load->library('grocery_CRUD');
    }
       

        public function index()
        {

            $this->load->view('includes/header-docente');
            $this->load->view('agenda/index');
            $this->load->view('includes/footer');
        }

        public function guardar()
         {
            $this->load->view('includes/header-docente');
            $this->load->view('agenda/guardar');
            $this->load->view('includes/footer');            
         }

       public function guardaractividad()
       {
          if (!$this->session->userdata('validated') ||  $this->session->userdata('tipoUsuarioId') != 3 ) {
            redirect('login');
          } else { 
            $crud = new grocery_CRUD();
            $crud->set_table('actividad');
            $crud->set_theme('datatables');
            $crud->columns('nombreActividad','descActividad','fecha');
            $crud->fields('nombreActividad','descActividad', 'tipoActividadId', 'fecha', 'rutaActividad', 'grupo_docente_materia');
            $crud->set_relation_n_n('grupo_docente_materia', 'grupo_docente_materia_actividad', 'grupo_docente_materia','actividadId','grupo_docente_materiaId', 'docente_materiaId');
            $crud->change_field_type('tipoActividadId','invisible');
            $crud->change_field_type('rutaActividad','invisible');
            $crud->change_field_type('grupo_docente_materia','invisible');
        
        
            $crud->unset_list();
            $crud->callback_before_insert(array($this,'tipo_actividad_fecha'));    
        
            $output = $crud->render();
            $this->load->view('includes/header-docente');
      
            $this->load->view('contenido/add', $output);
            $this->load->view('includes/footer');
          }
       }

      function tipo_actividad_fecha($post_array){
        $post_array['tipoActividadId'] = 1;
        //$post_array['fecha'] = date("Y-m-d h:m:s");
        return $post_array;
      }

       public function cambiar_fecha()
        {
         // :TODO: Mover a Modelo
            $fecha=$this->input->post('myfecha');     

            $fecha1 = date("Y-m-d 00:00:00", strtotime($fecha));   
            $fecha2 = date("Y-m-d 23:59:59", strtotime($fecha)); 

            $data['actividades'] = $this->db->query("select * FROM actividad WHERE fecha between '$fecha1' AND '$fecha2' AND tipoActividadId = 1 ")->result();
            $this->load->view("agenda/actividades", $data);

        }



        public function mostrar_actividad()
        {

           $this->load->model("actividad_model");
           $data['actividad']=$this->actividad_model->mostrar(40)->result();

             //var_dump($data);

            $this->load->view('includes/header-alumno');
            $this->load->view("agenda/mostrar_actividad", $data);  
            $this->load->view('includes/footer');


          
        }

        
    }
?> 