<?php

class Datos_contacto extends CI_Controller
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
            $crud->set_table('datos_contacto');
            $crud->set_subject('contacto');


            $crud->columns('telefono','telmovil','email');
            $crud->fields('telefono','telmovil','email');

            $crud->display_as('telmovil','Celular');
            $crud->display_as('email','Correo Electronico');         

            $crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_back_to_list();

            $crud->set_rules('telefono','Telefono','max_length[20]');
            $crud->set_rules('telMovil','Celular','max_length[20]');
            $crud->set_rules('email','Correo Electronico','max_length[150]|valid_email');



            $output = $crud->render();

            $this->load->view('includes/header-usuario-edit');
            $this->load->view('datos_contacto/index', $output);
            $this->load->view('includes/footer');
            }
	}

}

?>