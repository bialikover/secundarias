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


            $crud->columns('municipioId','calle','numero','colonia');
            $crud->fields('municipioId','calle','numero','colonia'); 

            $crud->display_as('municipioId','Municipio');        

            $crud->unset_delete();
            $crud->unset_add_fields();
            $crud->unset_add();
            $crud->unset_export();
            $crud->unset_print();
            $crud->unset_list();

            //$crud->callback_after_update(array($this, 'after_update'));

            $output = $crud->render();

            $this->load->view('includes/header-docente');
            $this->load->view('domicilio/index', $output);
            $this->load->view('includes/footer');
	}

}

?>