<?php


class Contenidos extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}
  public function create(){

    $content = $this->input->post();
    $id_docente = $this->session->userdata('id_perfil');
    

  }


  public function nueva(){
    $this->load->view('includes/header');
    $this->load->view('aula_digital/nuevo');
    $this->load->view('includes/footer');
  }
  

}


 

?>