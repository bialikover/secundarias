<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->check_isvalidated();
    }
<<<<<<< HEAD
	public function index()
	{		
        //$consulta = 
		$this->load->database("secundaria");
        $id_user = $this->session->userdata('id_user');
		$role = $this->session->userdata("role");
        $perfil_id = $this->session->userdata("perfil_id");        
        $data = array();

        if ( $role === "Alumno"){
            $data['nombre'] = $this->db->query("select nombre, apellido_pat, apellido_mat from alumnos where id_alumno =". $perfil_id)->row();
            $id_alumno = $this->db->query("select id_alumno from alumnos where id_alumno =". $perfil_id);
            $id_alumno = $id_alumno->row()->id_alumno;
            
		  $materias = $this->db->query(
            "select * from `materias` where `id_materia` IN (
                 select `id_materias` from `grupo_materia` where `id_grupo` IN (
                    select `id_grupo` from `alumnos` where `id_alumno` =". $id_alumno. "
                 )
             );"

            );
          $data['materias'] = $materias->result();
          $this->load->view('includes/header-alumno');
          $this->load->view('welcome/index', $data);
          $this->load->view('includes/footer');
        }


        else if($role === "Maestro"){
            $data['nombre'] = $this->db->query("select nombre, apellido_pat, apellido_mat from docentes where id_docentes =". $perfil_id)->row();
            $id_docentes = $this->db->query("select id_docentes from docentes where id_docentes =". $perfil_id);
            $id_docentes = $id_docentes->row()->id_docentes;

            $materias = $this->db->query(
            "select * from `materias` where `id_materia` IN (
                 select `id_materia` from `docente_materias` where `id_docente` =". $id_docentes. "
             );"
            );
          $data['materias'] = $materias->result();
          $this->load->view('includes/header-docente');
          $this->load->view('welcome/index', $data);
          $this->load->view('includes/footer');
=======

    public function index() {
        //$consulta = 
        $this->load->database("secundaria");
        $id_user = $this->session->userdata('id_usuario');
        $role = $this->session->userdata("role");
        $perfil_id = $this->session->userdata("perfil_id");
        
        if ($role === "Alumno") {
            redirect('alumnos/show/'.$perfil_id);
        } else if ($role === "Maestro") {
            redirect('docentes/show/'.$perfil_id);
>>>>>>> fb662b934ec02c99a931330c2f6111a2ce236e38
        }
    }

<<<<<<< HEAD
        else if($role === "Escuela"){
            $data['nombre'] = $this->db->query("select nombre from escuelas where id_escuela =". $perfil_id)->row();            
          $this->load->view('includes/header-escuela');
          $this->load->view('welcome/index', $data);
          $this->load->view('includes/footer');
        }

		
        
                
		
	}
	private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
=======
    private function check_isvalidated() {
        if (!$this->session->userdata('validated')) {
>>>>>>> fb662b934ec02c99a931330c2f6111a2ce236e38
            redirect('login');
        }
    }

    public function do_logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */