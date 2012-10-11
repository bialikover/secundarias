<?php

class Datos_personal extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
      
		$crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_subject('datos personales');
            $crud->set_table('datos_personal');


            $crud->columns('nombre','aPaterno','aMaterno');
            $crud->fields('nombre','aPaterno','aMaterno','genero','fechaNac', 'rutaFoto');
            $crud->set_field_upload('rutaFoto','assets/uploads/fotos');

            $crud->display_as('aPaterno','Apellido Paterno');
            $crud->display_as('aMaterno','Apellido Materno');
            $crud->display_as('fechaNac','Fecha de Nacimiento');
            $crud->display_as('rutaFoto','Foto del usuario');

            $crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_back_to_list();


            $crud->set_rules('nombre','Nombre','max_length[100]');
            $crud->set_rules('aPaterno','Apellido Paterno','max_length[100]');
            $crud->set_rules('aPaterno','Apellido Paterno','max_length[100]');        

            $output = $crud->render();

            $this->load->view('includes/header-usuario-edit');
            $this->load->view('datos_personal/index', $output);
            $this->load->view('includes/footer');
            
	}

}

?>