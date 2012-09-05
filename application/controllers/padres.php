<?php

/**
 * Description of padres
 *
 * @author neto
 */
class Padres extends CI_Controller {

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
            $crud->set_subject('padre');
            $crud->set_table('padres');
            $crud->columns('nombre', 'telefono', 'direccion');
            $crud->fields('nombre', 'telefono', 'direccion');
            $crud->add_action('Ver', '', 'padres/show', 'ui-icon-plus');
            $crud->unset_delete();

            $output = $crud->render();
            $this->load->view('includes/header-padre');
            $this->load->view('padres/index', $output);
            $this->load->view('includes/footer');
        }
    }

    //muestra una materia
    public function show() {
        $this->load->view("padres/show");
    }

    //muestra un formulario para crear una nueva materia
    public function new_view() {
        $this->load->view("padres/new");
    }

}

?>