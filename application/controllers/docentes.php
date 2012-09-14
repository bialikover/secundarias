<?php

class Docentes extends CI_Controller {

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

       /* if (!$this->session->userdata('validated')) {
            redirect('login');
        } else {
            if ($this->session->userdata("role") != 'Escuela') {
                redirect('login');
            }*/
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('docente');
            $crud->set_table('docente');
            $crud->set_relation_n_n('materias', 'docente_materias', 'materias', 'id_docente', 'id_materia', 'nombre');
            $crud->columns('nombre', 'apellido_pat', 'apellido_mat', 'genero', 'especialidad', 'materias');
            $crud->display_as('apellido_pat', 'Apellido paterno');
            $crud->display_as('apellido_mat', 'Apellido materno');
            $crud->fields('nombre', 'apellido_pat', 'apellido_mat', 'genero', 'especialidad', 'materias');
            $crud->add_action('Ver', '', 'docentes/show', 'ui-icon-plus');
            $crud->unset_delete();

            $output = $crud->render();
            $this->load->view('includes/header-docente');
            $this->load->view('docentes/index', $output);
            $this->load->view('includes/footer');
        //}
    }

    public function show() {
        $id = $this->uri->segment(3);
        $docente = $this->db->get_where('docentes', array('id_docentes' => $id))->result();
        $data['docente'] = $docente[0];

        $id_materias = $this->db->get_where('docente_materias', array('id_docente' => $id))->result();
        $materias = array();
        foreach ($id_materias as $id_materia) {
            $materia = $this->db->get_where('materias', array('id_materia' => $id_materia->id_materia))->result();
            array_push($materias, $materia[0]);
        }
        $data['materias'] = $materias;
        $escuela = $this->db->get_where('escuelas', array('id_escuela' => $docente[0]->id_escuela))->result();
        $data['escuela'] = $escuela[0];

        $this->load->view('includes/header-docente');
        $this->load->view('docentes/show', $data);
        $this->load->view('includes/footer');
    }

    public function materias() {
        $id = $this->session->userdata('perfil_id');
        $id_materias = $this->db->get_where('docente_materias', array('id_docente' => $id))->result();
        $materias = array();

        $docente = $this->db->get_where('docentes', array('id_docentes' => $id))->result();

        foreach ($id_materias as $id_materia) {
            $materia = $this->db->get_where('materias', array('id_materia' => $id_materia->id_materia))->result();
            array_push($materias, $materia[0]);
        }
        $data['materias'] = $materias;

        $this->db->select('*');
        $this->db->order_by('fecha_modificacion', "desc");

        $this->db->where(array('id_docente' => $id));
        $contenidos1 = $this->db->get('contenidos', 5)->result();
        $contenidos = array();
        foreach ($contenidos1 as $contenido) {
            $comentarios = array();
            
            $comentarios1 = $this->db->get_where('comentarios', array('id_contenidos' => $contenido->id_contenido))->result();
            
            $materia = $this->db->get_where('materias', array('id_materia' => $contenido->id_materias))->result();
            foreach ($comentarios1 as $comentario) {
                $user = $this->db->get_where('usuario', array('id_usuario' => $comentario->id_user))->result();
                $autor = $this->db->get_where('alumnos', array('id_alumno' => $user[0]->perfil_id))->result();
                array_push($comentarios, array('comentario' => $comentario, 'autor' => $autor[0]));
            }
            $contenido_comentarios = array('contenido' => $contenido, 'comentarios' => $comentarios, 'materia' => $materia[0]);
            array_push($contenidos, $contenido_comentarios);
        }
        $data['contenidos'] = $contenidos;
        $data['docente'] = $docente[0];

        $this->load->view('includes/header-docente');
        $this->load->view('pruebas/noticias', $data);
        $this->load->view('includes/footer');
    }

}

?>