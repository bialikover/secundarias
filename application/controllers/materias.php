<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Materias extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->library('grocery_CRUD');
    }

    //trae todas las materias
    public function index() {
        if (!$this->session->userdata('validated')) {
            redirect('login');
        } else {
            if ($this->session->userdata("role") != 'Escuela') {
                redirect('login');
            }
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('materia');
            $crud->set_table('materias');
            $crud->columns('nombre', 'grado', 'matricula');
            $crud->fields('nombre', 'grado', 'matricula');
            $crud->add_action('Ver', '', 'materias/show', 'ui-icon-plus');
            $crud->unset_delete();

            $output = $crud->render();

            $this->load->view('includes/header-materia');
            $this->load->view('materias/index', $output);
            $this->load->view('includes/footer');
        }
    }

    //muestra una materia
    public function show() {
        //$id = $this->uri->segment(3);
        //$materia = $this->db->get_where('materias', array('id_materia' => $id))->result();

        //$data['materia'] = $materia[0];

        $this->load->view('includes/header-materia');
        $this->load->view('pruebas/noticias_materia', $data);
        $this->load->view('includes/footer');
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

}

?>