<?php


class Escuela extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}


	public function index(){

		if (!$this->session->userdata('validated')) {
            redirect('login');
        } 
        else {
			$crud = new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud->set_subject('escuela');
	    	$crud->set_table('escuela');    	

	    	$crud->columns('escuela','claveEscuela', 'turno' );
	    	$crud->fields('escuela', 'claveEscuela','turno', 'descEscuela', 'adicional');
	    	//$crud->set_relation('administradorId', 'usuario', 'usuarioId');
	    	//$crud->display_as('administradorId','Administrador Escuela');

	    	$crud->add_action('Contacto','', 'contacto_escuela/index/edit', 'ui-icon-plus');
	        $crud->add_action('Domicilio','', 'domicilio_escuela/index/edit', 'ui-icon-plus');
	    	//$crud->add_action('Contacto','', '', 'ui-icon-plus', array($this, '_idContacto'));
			//$crud->add_action('Domicilio','', '', 'ui-icon-plus', array($this, '_idDomicilio'));

			$crud->unset_add();

	    	$output = $crud->render();
	    	
	    	$this->load->view('includes/header-escuela');
	    	$this->load->view('escuela/index',$output);
	    	$this->load->view('includes/footer');
    	}
	}

	public function _idContacto($primary_key, $row){
		$llave_contacto = $this->db->query('SELECT contactoEscuelaId FROM contacto_escuela WHERE escuelaId=' . $primary_key . '');
		$contacto = $llave_contacto->row();	
		return site_url('contacto_escuela/index/edit/'.$contacto->contactoEscuelaId);
	}
	public function _idDomicilio($primary_key, $row){
		$llave_domicilio = $this->db->query('SELECT domicilioEscuelaId FROM domicilio_escuela WHERE escuelaId=' . $primary_key . '');
		$domicilio = $llave_domicilio->row();		
		return site_url('domicilio_escuela/index/edit/'.$domicilio->domicilioEscuelaId);
	}



	public function mostrar(){
		$this->load->model("escuela_model");
		$escuelaId = $this->uri->segment(3);
		var_dump($this->escuela_model->mostrar($escuelaId));
		//$this->load->view('includes/header');
		//$this->load->view('escuela/mostrar');
		//$this->load->view('includes/footer');
	}
}



?>