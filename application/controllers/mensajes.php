<?php

class Mensajes extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('grocery_CRUD');
        }
        
        public function index() {
            //if($this->session->userdata('role') != 'Escuela')
            $data = array();
            $this->load->view('includes/header');
            $this->load->view('mensajes/index', $data);
            $this->load->view('includes/footer');
        }

    }
?>