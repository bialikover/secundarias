<?php
   class Agenda extends CI_Controller {
      function __construct() {
         parent::__construct();
        
         $this->load->database();
         $this->load->helper('url');
         
         $this->load->library('grocery_CRUD');
      }
      
      public function index() {
         if (!$this->session->userdata('validated') ||  $this->session->userdata('tipoUsuarioId') > 4 || $this->session->userdata('tipoUsuarioId') < 3 ) {
            redirect('login');   
         } else {
            if($this->session->userdata('tipoUsuarioId') == 3){
               $this->load->view('includes/header-docente');
            } else{
               $this->load->view('includes/header-alumno');
            }

            $this->load->view('agenda/index');
            $this->load->view('includes/footer');

         }
 
      }

      public function guardar() {
         $this->load->view('includes/header-docente');
         $this->load->view('agenda/guardar');
         $this->load->view('includes/footer');            
      }

      public function guardaractividad() {
         if (!$this->session->userdata('validated') ||  $this->session->userdata('tipoUsuarioId') != 3  ) {
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
            $crud->unset_back_to_list();
            $crud->callback_before_insert(array($this,'tipo_actividad_fecha'));    
        
            $output = $crud->render();
            $this->load->view('includes/header-docente');
      
            $this->load->view('contenido/add', $output);
            $this->load->view('includes/footer');
         }
      }

      function tipo_actividad_fecha($post_array){
         $post_array['tipoActividadId'] = 1;
         return $post_array;
      }
      
      public function cambiar_fecha() {
         $this->load->model("actividad_model");

         $fecha     = $this->input->post('myfecha');     
         $fecha1    = date("Y-m-d 00:00:00", strtotime($fecha));   
         $fecha2    = date("Y-m-d 23:59:59", strtotime($fecha)); 
         $usuarioId = $this->session->userdata('usuarioId');
         
         $data['actividades'] = $this->actividad_model->mostrar_agenda_entre_fechas($fecha1, $fecha2, $usuarioId);
         
         $this->load->view("agenda/actividades", $data);
      }
        
      public function cambiar_semana() {
         $this->load->model("actividad_model");
         
         // > Valores de entrada
         $usuarioId     = $this->session->userdata('usuarioId');
         $in_fecha      = $this->input->post('myfecha');
         $in_fecha_unix = strtotime($in_fecha);
         
         // > Calcular fecha de 1er día de la semana y fecha del último día de la semana    
         $fecha_unix1 = strtotime('last monday', $in_fecha_unix);
         $fecha_unix2 = strtotime('+1 week', $fecha_unix1); // Lunes + 8 días
         $fecha_unix2 = strtotime('-1 day', $fecha_unix2);  // Lunes + 8 días - 1día (para que sea Domingo)
         
         $fecha1 = date("Y-m-d 00:00:00", $fecha_unix1);
         $fecha2 = date("Y-m-d 23:59:59", $fecha_unix2);
         
         // > Obtener actividades para el intervalo de fechas calculado
         $data['actividades'] = $this->actividad_model->mostrar_agenda_entre_fechas($fecha1, $fecha2, $usuarioId);
         
         // > Mostrar resultados
         $this->load->view("agenda/actividades_semana", $data);
      }
      
      public function cambiar_mes() {
         $this->load->model("actividad_model");
         
         // > Valores de entrada
         $usuarioId     = $this->session->userdata('usuarioId');
         $in_fecha      = $this->input->post('myfecha');
         $in_fecha_unix = strtotime($in_fecha);
         
         // > Calcular fecha de 1er día de la semana y fecha del último día de la semana    
         $fecha_unix1 = strtotime(date('Y-m-01', $in_fecha_unix));
         $fecha_unix2 = strtotime('+1 month', $fecha_unix1); // 1 del mes + 1 mes
         $fecha_unix2 = strtotime('-1 day', $fecha_unix2);   // 1 del mes - 1 día (para que sea el mismo mes)
         
         $fecha1 = date("Y-m-d 00:00:00", $fecha_unix1);
         $fecha2 = date("Y-m-d 23:59:59", $fecha_unix2);
         
         // > Obtener actividades para el intervalo de fechas calculado
         $data['actividades'] = $this->actividad_model->mostrar_agenda_entre_fechas($fecha1, $fecha2, $usuarioId);
         
         // > Mostrar resultados
         $this->load->view("agenda/actividades_mes", $data);
      }

      public function mostrar_actividad() {
        $this->load->model("actividad_model");
        $data['actividad']=$this->actividad_model->mostrar(40);

          //var_dump($data);

         $this->load->view('includes/header-alumno');
         $this->load->view("agenda/mostrar_actividad", $data);  
         $this->load->view('includes/footer');
      }  
   }