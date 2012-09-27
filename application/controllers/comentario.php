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
        var_dump($result);
    }

}

?>