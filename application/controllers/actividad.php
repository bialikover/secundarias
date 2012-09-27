<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Actividad extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function detalle(){
    	$this->load->helper('form');
    	$id = $this->uri->segment(3);
    	$this->load->model("actividad_model");
        $this->load->model("comentario_model");
    	$data['actividad'] = $this->actividad_model->mostrar($id)->result();        
        $data['comentarios'] = $this->comentario_model->mostrar($id)->result();        
    	$this->load->view('includes/header-alumno');
    	//var_dump($data['actividad']);
        $this->load->view("agenda/mostrar_actividad", $data);  
        $this->load->view('includes/footer');
    }

}

?>