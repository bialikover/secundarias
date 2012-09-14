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

	public function relaciona_materia_docente(){
		$this->load->helper('form');
		$this->load->model("docente_model");
		$this->load->model("materias_model");
		$data['docentes']= $this->docente_model->all();
		$data['materias']= $this->materias_model->all();
		$this->load->view("pruebas/relaciona-materias",$data);
	}
	public function send(){
		$this->load->model("docente_model");
		$usuarioId = $this->input->post('docenteId');		
		$array_materias = $this->input->post('materias');
		$this->docente_model->relaciona_materia($array_materias, $usuarioId);

		
		
	}
}
?>