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

	    	$crud->columns('escuela','claveEscuela' );
	    	$crud->fields('escuela', 'claveEscuela','descEscuela', 'adicional', 'rutaFotoEscuela');
	    	$crud->set_field_upload('rutaFotoEscuela','assets/uploads/fotosEscuela');
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
		$this->load->model("actividad_model");
		$escuelaId = $this->uri->segment(3);
		$data['escuela'] = $this->escuela_model->mostrar($escuelaId);
		$data['noticias'] = $this->actividad_model->actividades_noticias_escuela();
		if(! empty($data['escuela'])){
			if(!$this->session->userdata('validated')){
               $this->load->view('includes/header0');           
           } else{
                switch($this->session->userdata('tipoUsuarioId')){
                     case 1:
                          $this->load->view('includes/header-sa');
                          break;
                     case 2:
                          $this->load->view('includes/header-escuela');
                          break;
                     case 3:
                          $this->load->view('includes/header-docente');
                          break;
                     case 4:
                          $this->load->view('includes/header-alumno');
                          break;
                     case 5:
                          $this->load->view('includes/header-padre');
                          break;
                }

           }
            $this->load->view('escuela/perfilsecu', $data);
        	$this->load->view('includes/footer');
		} else {

			 redirect(404);
		}

		//$this->load->view('includes/header');
		//$this->load->view('escuela/mostrar');
		//$this->load->view('includes/footer');
	}
	 public function mostrar_todas(){
          $this->load->model("escuela_model");
          $data['escuelas'] = $this->escuela_model->mostrar_todas();
          if(!$this->session->userdata('validated')){
               $this->load->view('includes/header0');           
           } else{
                switch($this->session->userdata('tipoUsuarioId')){
                     case 1:
                          $this->load->view('includes/header-sa');
                          break;
                     case 2:
                          $this->load->view('includes/header-escuela');
                          break;
                     case 3:
                          $this->load->view('includes/header-docente');
                          break;
                     case 4:
                          $this->load->view('includes/header-alumno');
                          break;
                     case 5:
                          $this->load->view('includes/header-padre');
                          break;
                }

           }
          
          $this->load->view('escuela/todas', $data);
        $this->load->view('includes/footer');

     }

     public function mostrar_todas_json(){
     	$this->load->model("escuela_model");
     	$escuelas = $this->escuela_model->mostrar_todas();
     	foreach ($escuelas as $escuela){
     		$escuela->descEscuela = htmlentities($escuela->descEscuela);
     	}
     	echo json_encode($escuelas);

     }

}



?>