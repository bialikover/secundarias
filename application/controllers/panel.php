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
        $this->load->model('comentario_model');
        

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
                $actividades = $this->actividad_model->actividades_docente($usuarioId);
                $data['actividades'] = $this->comentario_model->ultimos($actividades);
                
                $this->load->view('includes/header-docente');
                $this->load->view('panel/noticias', $data);
                $this->load->view('includes/footer');
            } else if ($tipoUsuarioId === '4') {
                $data['materias'] = $this->materia_model->materias_alumno($usuarioId);
                $data['contenidos'] = $this->actividad_model->actividades_alumno($usuarioId);
                $this->load->view('includes/header-alumno');
                $this->load->view('panel/noticias', $data);
                $this->load->view('includes/footer');
            } else {
                $this->load->view('includes/header-padre');
                $this->load->view('alumnos/index');
                $this->load->view('includes/footer');
            }
        }
    }
    public function noticias_materia()
    {
        $tipoUsuarioId = $this->session->userdata("tipoUsuarioId");
        if($tipoUsuarioId == 3 || $tipoUsuarioId == 4 && $this->session->userdata("validated")){
            $grupo_docente_materiaId = $this->uri->segment(3);        
            $usuarioId = $this->session->userdata('usuarioId');         
            $this->load->model('materia_model');
            $this->load->model('actividad_model');
            $this->load->model('comentario_model');            
            
            $es_mi_grupo = $this->actividad_model->es_mi_grupo($usuarioId, $grupo_docente_materiaId);
            $data['materia'] = $this->materia_model->mostrar_materia_y_grupo($grupo_docente_materiaId);
            if($es_mi_grupo && $data['materia'] != null ){
                $actividades = $this->actividad_model->mostrar_actividades_por_grupo_docente_materia($grupo_docente_materiaId, $usuarioId);            
                $data['actividades'] = $this->comentario_model->ultimos($actividades);
                $this->load->view('includes/header-docente');
                $this->load->view('panel/noticias_materia',$data); 
                $this->load->view('includes/footer');
            }
            else{
                redirect("login");
            }
        }


        else{
            redirect('login');
        }
        
    }

}