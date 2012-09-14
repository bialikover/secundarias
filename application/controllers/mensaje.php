<?php

class Mensaje extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('mensajes_model');
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
        }
        
        public function index() {
            //if($this->session->userdata('role') != 'Escuela')
            
            $data['mensajes'] = $this->mensajes_model->read_mensajes();
            $this->load->view('includes/header');
            $this->load->view('mensajes/index', $data);
            $this->load->view('includes/footer');
        }

    }
?>