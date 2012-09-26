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
                redirect("alta_usuario");
            } else if ($tipoUsuarioId === '2') {
                $this->load->view('includes/header-escuela');
                $this->load->view('escuela/perfil');
                $this->load->view('includes/footer');
            } else if ($tipoUsuarioId === '3') {
                $data['materias'] = $this->materia_model->materias_docente($usuarioId);
                $data['contenidos'] = $this->actividad_model->actividades_docente($usuarioId);
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




        /*
          $usuarioId = $this->session->userdata("usuarioId");
          $id_docentes = $this->db->query("select id_docentes from docentes where id_docentes =". $perfil_id);
          $id_docentes = $id_docentes->row()->id_docentes;
          $materias = $this->db->query(
          "select nombre,id_materia from `materias` where `id_materia` IN (
          select `id_materia` from `docente_materias` where `id_docente` =". $id_docentes. "
          );"
          );

>>>>>>> 86254a56f5eb4930163cd91a1b77d9d3cf1945cb
          $materia = $materias->result();
          $perfil_id = $this->session->userdata("perfil_id");
          $id_docentes = $this->db->query("select id_docentes from docentes where id_docentes =". $perfil_id);
          $id_docentes = $id_docentes->row()->id_docentes;

          $materias = $this->db->query(
          "select nombre,id_materia from `materias` where `id_materia` IN (
          select `id_materia` from `docente_materias` where `id_docente` =". $id_docentes. "
          );"
          );

          $materia = $materias->result();


          //$consulta =
          $this->load->database("secundaria");
          $usuarioId = $this->session->userdata('usuarioId');
          $tipoUsuarioId = $this->session->userdata("tipoUsuarioId");
          $perfil_id = $this->session->userdata("usuario"); */
    }

}