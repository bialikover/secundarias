<?php


class Docentes extends CI_Controller{

      function __construct()
      {
            parent::__construct();
            
            $this->load->database();
            $this->load->helper('url');
            
            $this->load->library('grocery_CRUD');
      }

//funcion para enlistar a los alumnos
      public function index()
      {
            /*
                  Variables:
                  
                  $data = Almacena los valores retornados por un modelo
                  
            */

            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_subject('docente');
      $crud->set_table('docentes');
      $crud->columns('nombre','apellido_pat','apellido_mat','genero');
      $crud->display_as('apellido_pat','Apellido paterno');
      $crud->display_as('apellido_mat','Apellido materno');
      $crud->fields('nombre','apellido_pat','apellido_mat','genero');
      $crud->add_action('Ver', '', 'alumnos/show','ui-icon-plus');
      $crud->unset_delete();
 
      $output = $crud->render();
      $this->load->view('includes/header');
      $this->load->view('docentes/index',$output);
      $this->load->view('includes/footer');

      }

      public function show()
      {
            $id = $this->uri->segment(3);
            $data['alumno'] = $this->db->get_where( 'alumnos', array( 'id' => $id ) )->result();
            
            $this->load->view('includes/header');
            $this->load->view('docentes/show',$data);
            $this->load->view('includes/footer');
      }



}



?>