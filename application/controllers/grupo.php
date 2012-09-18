<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grupo extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{

            if (!$this->session->userdata('validated') ||  $this->session->userdata('usuarioId') != "2" ) {
                  redirect('login');
            } 
            else {
		    $crud = new grocery_CRUD();
      
                  $crud->set_theme('datatables');
                  //$crud->set_subject('Grupo');
                  $crud->set_table('grupo');
      
                  $crud->columns('claveGrupo','cicloEscolar','grado','alumnoId');
                  $crud->fields('claveGrupo','cicloEscolar','grado','escuelaId','alumnoId','docente_materiaId'); 
                  $crud->change_field_type('escuelaId','invisible');
                  //$crud->callback_add_field('escuelaId',array($this,'add_field_callback_1'));
                  $crud->callback_before_insert(array($this,'tipo_actividad_fecha')); 
      
                  $crud->set_relation_n_n('alumnoId', 'alumno_grupo', 'alumno', 'grupoId', 'alumnoId', 'nombre');
                  $crud->set_relation_n_n('docente_materiaId', 'grupo_docente_materia', 'docente_materia', 'grupoId', 'docente_materiaId', 'materiaId');      
                  $output = $crud->render();
      
                  $this->load->view('includes/header-docente');
                  $this->load->view('grupo/index', $output);
                  $this->load->view('includes/footer');
            }
	}

      function set_escuela_id($post_array){
            $post_array['escuelaId'] = $this->session->userdata('usuarioId');
      }

      /*function add_field_callback_1() {
            return '<input type="text" maxlength="50" value="2" name="escuelaId" readonly="readonly" style="width:462px">';
      }*/


}

?>