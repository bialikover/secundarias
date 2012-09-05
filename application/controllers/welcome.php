<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->check_isvalidated();
    }


    public function index() {
        //$consulta = 
        $this->load->database("secundaria");
        $id_user = $this->session->userdata('id_usuario');
        $role = $this->session->userdata("role");
        $perfil_id = $this->session->userdata("perfil_id");
        
        if ($role === "Alumno") {
            redirect('alumnos/show/'.$perfil_id);
        } else if ($role === "Maestro") {
            redirect('docentes/show/'.$perfil_id);
        }
    }

    private function check_isvalidated() {
        if (!$this->session->userdata('validated')) {
            redirect('login');
        }
    }

    public function do_logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */