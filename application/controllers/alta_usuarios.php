<?php


class Alta_usuarios extends CI_Controller
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
		$crud->set_subject('usuario');
    	$crud->set_table('usuario');
		$crud->set_relation('tipoUsuarioId','tipo_usuario','tipoUsuario');
    	$crud->columns('usuarioId', 'usuario','password', 'tipoUsuarioId');
    	$crud->fields('usuario','password', 'verify_password', 'tipoUsuarioId');
    	$crud->display_as('tipoUsuarioId','Tipo de usuario');

        $crud->change_field_type('password', 'password');
        $crud->change_field_type('verify_password', 'password');
        $crud->set_rules('verify_password', 'Verify Password', 'required|matches[password]');
 		

 		//callbacks
    	$crud->callback_before_insert(array($this,'encrypt_password_callback'));
    	$crud->callback_before_update(array($this,'encrypt_password_callback'));
    	$crud->callback_edit_field('password',array($this,'decrypt_password_callback'));
    	$crud->callback_before_insert(array($this,'unset_verification'));
		$crud->callback_before_update(array($this,'unset_verification'));
    	
    	$output = $crud->render();
    	
    	$this->load->view('includes/header');
    	$this->load->view('alta_usuarios/index',$output);
    	$this->load->view('includes/footer');
	}

	function encrypt_password_callback($post_array, $primary_key = null){
    	$this->load->library('encrypt');
 
    	$key = 'k1PAjW3tuHCjewV7p7gFEiHps501b68d';
    	$post_array['password'] = $this->encrypt->encode($post_array['password'], $key);
    	return $post_array;
	}
 
	function decrypt_password_callback($value)
	{
	    $this->load->library('encrypt');

    	$key = 'k1PAjW3tuHCjewV7p7gFEiHps501b68d';
    	$decrypted_password = $this->encrypt->decode($value, $key);
    	return "<input type='password' name='password' value='$decrypted_password' />";
	}

	function unset_verification($post_array) {
           unset($post_array['verify_password']);
           return $post_array;
	}





}



?>