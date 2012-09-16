<?php

class Alumno extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

//funcion para enlistar a los alumnos
    public function index() {
        /*
          Variables:

          $data = Almacena los valores retornados por un modelo

         */

        if (!$this->session->userdata('validated')) {
            redirect('login');
        } else {
            if ($this->session->userdata("role") != 'Escuela') {
                redirect('login');
            }
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('alumno');
            $crud->set_table('alumnos');

            $crud->display_as('apellido_pat', 'Apellido paterno');
            $crud->display_as('fecha_nacimiento', 'Fecha de nacimiento');
            $crud->display_as('apellido_mat', 'Apellido materno');
            $crud->display_as('id_grupo', 'Grupo');
            $crud->display_as('id_padre', 'Tutor');

            $crud->set_relation('id_grupo', 'grupos', 'clave');
            $crud->set_relation('id_padre', 'padres', 'nombre');

            $crud->columns('matricula', 'nombre', 'apellido_pat', 'apellido_mat', 'id_grupo', 'correo_electronico');
            $crud->fields('matricula', 'nombre', 'apellido_pat', 'apellido_mat', 'genero', 'id_grupo', 'id_padre', 'fecha_nacimiento', 'curp', 'direccion', 'telefono', 'correo_electronico');

            $crud->add_action('Ver', '', 'alumnos/show', 'ui-icon-plus');
            $crud->unset_delete();

            $output = $crud->render();

            $this->load->view('includes/header-alumno');
            $this->load->view('alumno/index', $output);
            $this->load->view('includes/footer');
        }

        /* if (!$this->session->userdata('validated')) {
          redirect('login');
          } else {
          if ($this->session->userdata("role") != 'Escuela') {
          redirect('login');
          }
          $crud = new grocery_CRUD();
          $crud->set_theme('datatables');
          $crud->set_subject('alumno');
          $crud->set_table('alumnos');

          $crud->display_as('apellido_pat', 'Apellido paterno');
          $crud->display_as('fecha_nacimiento', 'Fecha de nacimiento');
          $crud->display_as('apellido_mat', 'Apellido materno');
          $crud->display_as('id_grupo', 'Grupo');
          $crud->display_as('id_padre', 'Tutor');

          $crud->set_relation('id_grupo', 'grupos', 'clave');
          $crud->set_relation('id_padre', 'padres', 'nombre');

          $crud->columns('matricula', 'nombre', 'apellido_pat', 'apellido_mat', 'id_grupo', 'correo_electronico');
          $crud->fields('matricula', 'nombre', 'apellido_pat', 'apellido_mat', 'genero', 'id_grupo', 'id_padre', 'fecha_nacimiento', 'curp', 'direccion', 'telefono', 'correo_electronico');


          $crud->add_action('Ver', '', 'alumnos/show', 'ui-icon-plus');
          $crud->unset_delete();

          $output = $crud->render();

          $this->load->view('includes/header-alumno');
          $this->load->view('alumno/index', $output);
          $this->load->view('includes/footer');
          } */
    }

    public function show() {
        $id = $this->uri->segment(3);

        $alumno = $this->db->get_where('alumno', array('alumnoId' => $id))->result();
        $grupo = $this->db->get_where('alumno_grupo', array('alumnoId' => $alumno[0]->alumnoId))->result();
        $escuela = $this->db->get_where('escuela', array('escuelaId' => $grupo[0]->escuelaId))->result();
        $padre = $this->db->get_where('padre', array('alumnoId' => $alumno[0]->alumnoId))->result();

        $this->load->model('Alumno_model');
        $perfil = $this->Alumno_model->perfil($id);

        $data['perfil'] = $perfil;
        $data['grupo'] = $grupo[0];
        $data['escuela'] = $escuela[0];
        $data['tutor'] = $padre[0];
        $this->load->view('includes/header-alumno');
        $this->load->view('alumno/show', $data);
        $this->load->view('includes/footer');
    }

    public function perfil() {
        $this->load->model('perfil');
        $usuarioId = $this->session->userdata('usuarioId');
        $data['alumno'] = $this->perfil->datos_perfil($usuarioId);
    }

    public function comentarios() {
        $this->load->view('includes/header');
        $this->load->view('aula_digital/comentarios');
        $this->load->view('includes/footer');
    }

}

?>