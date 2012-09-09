<?php

class Adicionales extends CI_Controller
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
		if( $this->uri->segment(3) != 'edit' || !is_numeric($this->uri->segment(4)) || !$this->db->query('SELECT usuarioId FROM datos_contacto WHERE datosContactoId="' . $this->uri->segment(4) . '"')->result() ){
                  redirect('');
            }
            else{
		$crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('adicional');
            $crud->set_subject('adicional');


            $crud->columns('curp','especialidad','matricula');
            $crud->fields('curp','especialidad','matricula');         

            $crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_back_to_list();

            $crud->set_rules('curp','Curp','max_length[18]');
        	$crud->set_rules('especialidad','Especialidad','max_length[100]');
        	$crud->set_rules('matricula','Matricula','max_length[100]');        	

            $output = $crud->render();

            $this->load->view('includes/header-usuario-edit');
            $this->load->view('adicionales/index', $output);
            $this->load->view('includes/footer');
        }
	}

}

?>