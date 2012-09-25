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
      
		$crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('docente');
        $crud->unset_add();

        $crud->set_relation('docenteId', 'docente', '{docenteId} - {nombre}');
        $crud->set_relation_n_n('materiaId', 'docente_materia', 'materia', 'docenteId', 'materiaId', 'materia','nombre');
        $crud->columns('nombre','materiaId');
        $crud->fields('docenteId', 'materiaId');
        //$crud->fields('docenteId');
        $crud->callback_after_update(array($this, 'callback_docente_materia'));

        $output = $crud->render();
        $this->load->view('includes/header-usuario-edit');
        $this->load->view('docente/index', $output);
        $this->load->view('includes/footer');

	}

        function callback_docente_materia($post_array,$primary_key) {
                
                $lol = $this->db->query("call procedure_docente_materia(?,?)", array(9, 25));
        /*$user_logs_update = array(
                "user_id" => $primary_key, 
                "last_update" => date('Y-m-d H:i:s')
            );
            $this->db->update('user_logs',$user_logs_update,array('user_id' => $primary_key));
            */
            return true;
        }

}

?>