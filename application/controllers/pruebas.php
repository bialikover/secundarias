<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pruebas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}


	public function noticias($data=NULL)
	{
    	$this->load->view('includes/header-escuela');
    	$this->load->view('pruebas/noticias',$data);
    	$this->load->view('includes/footer');
	}
	public function noticias_materia($data=NULL)
	{
    	$this->load->view('includes/header-escuela');
    	$this->load->view('pruebas/noticias_materia',$data); 
    	$this->load->view('includes/footer');
	}
}
?>