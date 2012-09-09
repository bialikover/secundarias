<?php

class Docente extends CI_Controller
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
      
		$crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_subject('relacion');
            $crud->set_table('usuario');
            $crud->where('tipoUsuario',2);
            //$this->db->query('');
            //$datos_docentes = $da

            //$crud->unset_add_fields('docenteId');
            //$crud->set_relation('docenteId','docente','docenteId');
            $crud->display_as('docenteId','Nombre del docente');
            //$crud->callback_add_field('docenteId',array($this,'maestros'));
            $crud->set_relation_n_n('materias','docente_materia','materia','usuarioId','materiaId','materia');
            

            $output = $crud->render();
            $this->load->view('includes/header-usuario-edit');
            $this->load->view('datos_personales/index', $output);
            $this->load->view('includes/footer');
            
	}
      public function maestros()
      {
            $maestro = $this->db->query("SELECT DISTINCT tabla1.nombre, tabla1.matricula, usuario.tipoUsuarioId FROM (SELECT datos_personal.nombre, adicional.matricula FROM datos_personal JOIN adicional ON datos_personal.usuarioId=adicional.usuarioId) as tabla1 JOIN usuario ON usuario.tipoUsuarioId=" . $this->uri->segment(4));
            $maestros = $maestro->row();
            
            $html1 ="<select id='field-id_materias'  name='id_materias' class='chosen-select' data-placeholder='Select Materia' style='width:300px'>";
          foreach ( $maestros as $mat ) {
            $html1 .= "<option value='".$mat->nombre."'>".$mat->matricula."</option>";
          }

          $html1 .= '</select>';

          /////////

          return $html1;
      }
}

?>