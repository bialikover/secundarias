<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pruebas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function noticias()
	{
    	$this->load->view('includes/header-escuela');
    	$this->load->view('pruebas/noticias');
    	$this->load->view('includes/footer');
	}
	public function noticias_materia()
	{
    	$this->load->view('includes/header-escuela');
    	$this->load->view('pruebas/noticias_materia');
    	$this->load->view('includes/footer');
	}
}
?>