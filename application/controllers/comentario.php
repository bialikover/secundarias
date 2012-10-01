<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comentario extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function nuevo(){
        $this->load->model('comentario_model');
        $result = $this->comentario_model->guardar();
        if($result['status'] == true){
        	if($this->input->post('stream') != false){
        		$html = $this->load->view("comentario/comentario", $result['data'], true);
        		echo $html;
        	} else{

        		$html = $this->load->view("comentario/comentario_stream", $result['data'], true);
        		echo $html;
        	}

      	} else{
        	return false;
      	}
        
    }

}

?>