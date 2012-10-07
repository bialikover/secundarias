<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pruebas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function home()
	{
    	$this->load->view('includes/header0');
    	$this->load->view('pruebas/home');
    	$this->load->view('includes/footer');
	}

	public function noticias($data=NULL)
	{
    	$this->load->view('includes/header-escuela');
    	$this->load->view('pruebas/noticias',$data);
    	$this->load->view('includes/footer');
	}
	public function noticias_materia()
	{
		$tipoUsuarioId = $this->session->userdata("tipoUsuarioId");
	    if($tipoUsuarioId == 3 || $tipoUsuarioId == 4){
			$grupo_docente_materiaId = $this->uri->segment(3);		
			$usuarioId = $this->session->userdata('usuarioId');			
			$this->load->model('materia_model');
			$this->load->model('actividad_model');
			$data['materia'] = $this->materia_model->mostrar_materia_y_grupo($grupo_docente_materiaId);
			//$data['materia']['docente'] = $this->materia_model->mostrar_docente($materiaId);        	
        	$data['actividades'] = $this->actividad_model->mostrar_por_materia($materiaId, $usuarioId);
        	$this->load->view('includes/header-docente');
    		$this->load->view('pruebas/noticias_materia',$data); 
    		$this->load->view('includes/footer');
        }


        else{
        	redirect('login');
        }
    	
	}

}
?>