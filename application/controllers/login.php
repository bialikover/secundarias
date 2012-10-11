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

}

?>