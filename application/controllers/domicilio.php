<?php

class Domicilio extends CI_Controller
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
            $crud->set_table('domicilio');
            $crud->set_subject('Domicilio');


            $crud->columns('municipioId','calle','numero','colonia');
            $crud->fields('municipioId','calle','numero','colonia','cp'); 
            $crud->display_as('numero','Número');
            $crud->display_as('municipioId','Municipio');        
            $crud->display_as('cp','Código Postal');
            $crud->set_relation('municipioId', 'municipio', 'municipio');

            $crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_list();
            $crud->unset_back_to_list();

            $crud->set_rules('calle','Calle','max_length[100]');
            $crud->set_rules('colonia','Colonia','max_length[100]');
            $crud->set_rules('cp','Codigo Postal','max_length[10]');
            $crud->set_rules('numero','Numero','max_length[10]');
            $crud->required_fields('municipioId');


            //$crud->callback_after_update(array($this, 'after_update'));

            $output = $crud->render();

            $this->load->view('includes/header-usuario-edit');
            $this->load->view('domicilio/index', $output);
            $this->load->view('includes/footer');
	}

}

?>