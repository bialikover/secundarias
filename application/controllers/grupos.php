<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grupos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->library('grocery_CRUD');
    }

    //trae todas las materias
    public function index() {
        /*if (!$this->session->userdata('validated')) {
            redirect('login');
        } else {
            if ($this->session->userdata("role") != 'Escuela') {
                redirect('login');
            } */
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('docente_materia');
            $crud->unset_add();

            //$crud->set_relation('grupoId', 'grupo', 'grupoId');
            $crud->set_relation_n_n('grupos', 'grupo_docente_materia', 'grupo', 'grupo_docente_materiaId', 'grupoId', 'claveGrupo');
            $crud->fields('grupoId', 'materiasId'); 

            $output = $crud->render();
            $this->load->view('includes/header-escuela');
            $this->load->view('grupos/index', $output);
            $this->load->view('includes/footer');
        //}
    }

    //muestra una materia
    public function show() {
        $this->load->view("materias/show");
    }

    //muestra un formulario para crear una nueva materia
    public function new_view() {
        $this->load->view("materias/new");
    }

    //muestra un formulario para editar una materia
    public function edit() {
        
    }

    //guarda el nuevo elemento materia en la base de datos
    public function create() {
        var_dump($this->input->post());
        die;
    }

    //actualiza la información en la base de datos correspondiente a materia
    public function update() {
        
    }

    public function prueba() {
        $this->load->view('includes/header-alumno');
        $this->load->view('welcome/index');
        $this->load->view('includes/footer');
    }

}

?>