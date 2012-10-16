<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($msg = NULL) {
        // Load our view to be displayed
        // to the user

        if($this->session->userdata('validated')){
            redirect('welcome');
        }
        else{
    	  $data['msg'] = $msg;

    	  $this->load->view('includes/header0', $data);
          $this->load->view('login/home', $data);
          $this->load->view('includes/footer');
        }
    }

    public function process() {
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate();
        // Now we verify the result
        if (!$result) {
            // If user did not validate, then show them login page again        	
            $msg = '<font color=red>Usuario invalido o password incorrecto.</font><br />';
            $this->index($msg);
        } else {
            // If user did validate, 
            // Send them to members area            
            redirect('welcome');
        }
    }
    public function recupera_contrasena(){
        if( $this->session->userdata('validated')){
            redirect("login");
        } else{
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email');
            if ($this->form_validation->run() == FALSE){                
                $this->load->view("includes/header0");
                $this->load->view("login/recuperar");
                $this->load->view("includes/footer");
            } else {
                $this->recuperar();
            }            
        }
    }
    public function recuperar(){
        
        $this->load->model("login_model");
        $data['usuario'] = $this->login_model->get_usuario($this->input->post("email"));
        if(!empty($data) ){
            $this->load->view("includes/header0");
            $this->load->view("login/success", $data);
            $this->load->view("includes/footer");
            $this->send_email($data['usuario']);
        } else{
          redirect("login/recupera_contrasena");
        }
    }

    public function send_email($usuario){
        $this->load->library('encrypt');
        $this->load->library('email');
        $this->email->from('soporte@misecu.org', 'Mi secu');
        $this->email->to($usuario->email); 
        $this->email->cc('soporte@misecu.org');         
        $this->email->subject('Contraseña Solicitada');        
        $key = 'k1PAjW3tuHCjewV7p7gFEiHps501b68d';
        $decrypted_password = $this->encrypt->decode($usuario->password, $key);
        $this->email->message('Tu password es: '.$decrypted_password);  
        $this->email->send();
    }


}

?>