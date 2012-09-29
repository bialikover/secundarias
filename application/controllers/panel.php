<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panel extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->database("secundaria");
        $usuarioId = $this->session->userdata('usuarioId');
        $tipoUsuarioId = $this->session->userdata("tipoUsuarioId");
        $perfil_id = $this->session->userdata("usuario");
        
        $this->load->model('actividad_model');
        $this->load->model('materia_model');
        

        if (!$this->session->userdata('validated')) {
            redirect('login');

        } else {
            if ($tipoUsuarioId === '1') {
                redirect("administracion/alta_usuarios");
            } else if ($tipoUsuarioId === '2') {
                $this->load->view('includes/header-escuela');
                $this->load->view('escuela/perfil');
                $this->load->view('includes/footer');
            } else if ($tipoUsuarioId === '3') {
                $data['materias'] = $this->materia_model->materias_docente($usuarioId);
                $data['actividades'] = $this->actividad_model->actividades_docente($usuarioId);
                
                $this->load->view('includes/header-docente');
                $this->load->view('pruebas/noticias', $data);
                $this->load->view('includes/footer');
            } else if ($tipoUsuarioId === '4') {
                $data['materias'] = $this->materia_model->materias_alumno($usuarioId);
                $data['contenidos'] = $this->actividad_model->actividades_alumno($usuarioId);
                $this->load->view('includes/header-alumno');
                $this->load->view('pruebas/noticias', $data);
                $this->load->view('includes/footer');
            } else {
                $this->load->view('includes/header-padre');
                $this->load->view('alumnos/index');
                $this->load->view('includes/footer');
            }
        }
    }

}