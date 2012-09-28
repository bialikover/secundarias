<?php

class Docente extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{		
        $this->load->model("docente_model");
        $this->docente_model->all();
	}

    public function mostrar(){
        $id = $this->uri->segment(3);
        $this->load->model("docente_model");
        $this->load->model("materia_model");
        $data['docente'] = $this->docente_model->mostrar($id);        
        if(! empty($data['docente'])){
            $data['docente'] = $this->docente_model->mostrar($id);
            $data['materias'] = $this->materia_model->materias_docente($id);
            if($this->session->userdata('validated')){
                $this->load->view('includes/header-alumno');
            }
            else{
                $this->load->view('includes/header0');   
            }
            $this->load->view('docente/show', $data);
            $this->load->view('includes/footer');
        } else{

            redirect(404);
        }

    }

}

?>