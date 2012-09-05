<?php


class Aula_digital extends CI_Controller
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
		$crud->set_subject('Contenido');
    	$crud->set_table('contenidos');

    	$crud->set_relation('id_materias','materias','nombre');
    	$crud->fields('id_materias', 'texto','id_docente','fecha_publicacion','id_grupo');

    	$crud->change_field_type('id_docente', 'hidden', $this->session->userdata("perfil_id"));
    	$crud->change_field_type('fecha_publicacion', 'hidden', date('Y-m-d') );

    	$crud->set_relation('id_grupo','grupos','clave');

    	$crud->display_as('id_materias','Materia');
    	$crud->display_as('id_grupo','Grupo');
    	$crud->unset_columns('id_docente','id_grupo','ruta_archivo');
    	$crud->unset_back_to_list();
    	$crud->callback_add_field('id_materias',array($this,'materias'));

    	$crud->add_action('Ver', '', 'alumnos/show','ui-icon-plus');
    	$crud->unset_delete();

    	$crud->required_fields('id_materias','id_grupo','texto');
 
    	$output = $crud->render();

    	$this->load->view('includes/header-escuela');
    	$this->load->view('alumnos/index',$output);

    	$this->load->view('includes/footer');	
	}

	public function materias(){
		$perfil_id = $this->session->userdata("perfil_id"); 
            $id_docentes = $this->db->query("select id_docentes from secundaria.docentes where id_docentes =". $perfil_id);
            $id_docentes = $id_docentes->row()->id_docentes;

            $materias = $this->db->query(
            "select nombre,id_materia from `materias` where `id_materia` IN (
                 select `id_materia` from `docente_materias` where `id_docente` =". $id_docentes. "
             );"
            );
          
          $materia = $materias->result();
          
          $html1 ="<select id='field-id_materias'  name='id_materias' class='chosen-select' data-placeholder='Select Materia' style='width:300px'>";
          foreach ( $materia as $mat ) {
          	$html1 .= "<option value='".$mat->id_materia."'>".$mat->nombre."</option>";
          }

          $html1 .= '</select>';

          /////////

          return $html1;

	}

}


 

?>