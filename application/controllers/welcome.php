<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

 	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }
	public function index()
	{		
		$this->load->database("secundaria");
		
		var_dump($this->db->get("escuelas")->row()->nombre);

		echo 'Congratulations, you are logged in.';
        
        echo '<br /><a href="'.base_url().'home/do_logout">Logout Fool!</a>';
		
	}
	private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
    public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */