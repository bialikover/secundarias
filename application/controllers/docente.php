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
        $docentes = $this->docente_model->todos();
        $data['docentes'] = $this->docente_model->todos_materias($docentes);

        //var_dump($data);
        //die();
        if(!$this->session->userdata('validated')){
            $this->load->view('includes/header0');           
        } else{
             switch($this->session->userdata('tipoUsuarioId')){
                  case 1:
                       $this->load->view('includes/header-sa');
                       break;
                  case 2:
                       $this->load->view('includes/header-escuela');
                       break;
                  case 3:
                       $this->load->view('includes/header-docente');
                       break;
                  case 4:
                       $this->load->view('includes/header-alumno');
                       break;
                  case 5:
                       $this->load->view('includes/header-padre');
                       break;
             }

        }
            $this->load->view('docente/listadocentes', $data);
            $this->load->view('includes/footer');
        


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