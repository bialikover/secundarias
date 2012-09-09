<?php


class Escuelas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}



	public function index(){
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_subject('escuela');
    	$crud->set_table('escuela');    	

    	$crud->columns('escuelaId','escuela','claveEscuela', 'turno', 'descEscuela', 'adicional' );
    	$crud->fields('escuelaId','escuela', 'claveEscuela','turno', 'descEscuela', 'adicional');
    	$crud->set_relation('administradorId', 'usuario', 'usuarioId');
    	$crud->display_as('administradorId','Administrador Escuela');
    	$crud->add_action('Contacto','', '', 'ui-icon-plus', array($this, '_idContacto'));
		$crud->add_action('Domicilio','', '', 'ui-icon-plus', array($this, '_idDomicilio'));
		$crud->unset_add();

    	$output = $crud->render();
    	
    	$this->load->view('includes/header-escuela');
    	$this->load->view('escuelas/index',$output);
    	$this->load->view('includes/footer');
	}


	public function show(){
		echo "la view para mostrar una secundaria.";

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
}



?>