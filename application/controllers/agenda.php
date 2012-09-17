<?php

    class Agenda extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->helper('url');
        }
       

        public function index()
        {

            $this->load->view('includes/header-escuela');
            $this->load->view('agenda/index');
            $this->load->view('includes/footer');
        }

        public function guardar()
         {
            $this->load->view('includes/header-escuela');
            $this->load->view('agenda/guardar');
            $this->load->view('includes/footer');            
         }

       public function guardar_actividad()
        {
            $this->load->model("actividad_model");
            $this->actividad_model->guardar();
            redirect("/agenda");
        }

       public function cambiar_fecha()
        {
            $fecha=$this->input->post('myfecha');     

            $fecha1 = date("Y-m-d 00:00:00", strtotime($fecha));   
            $fecha2 = date("Y-m-d 23:59:59", strtotime($fecha)); 

            //var_dump($fecha1);
            //var_dump($fecha2);

            //die;

            $data['actividades'] = $this->db->query("select * FROM actividad WHERE fecha between '$fecha1' AND '$fecha2'")->result();
            $this->load->view("agenda/actividades", $data);
//echo $data;
         //  var_dump($data['actividades']);
       // return $data;



        }

        public function cargar_actividad()
          {
            // $data['actividades']=;
          }

        
    }

?> 