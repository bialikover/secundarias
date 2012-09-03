<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

 	function __construct(){
        parent::__construct();
        $this->check_isvalidated();
    }
	public function index()
	{		
        //$consulta = 
		$this->load->database("secundaria");
        $id_user = $this->session->userdata('id_user');
		$role = $this->session->userdata("role");
        $perfil_id = $this->session->userdata("perfil_id");        

        if ( $role === "Alumno"){

            $id_alumno = $this->db->query("select id_alumno from alumnos where id_alumno =". $perfil_id);
            $id_alumno = $id_alumno->row()->id_alumno;
            
		  $materias = $this->db->query(
            "select * from `materias` where `id_materia` IN (
                 select `id_materias` from `grupo_materia` where `id_grupo` IN (
                    select `id_grupo` from `alumnos` where `id_alumno` =". $id_alumno. "
                 )
             );"

            );

          foreach ($materias->result() as $materia){
             echo $materia->nombre;
          }

        }
        else if($role === "Maestro"){
            $id_docentes = $this->db->query("select id_docentes from docentes where id_docentes =". $perfil_id);
            $id_docentes = $id_docentes->row()->id_docentes;

            $materias = $this->db->query(
            "select * from `materias` where `id_materia` IN (
                 select `id_materia` from `docente_materias` where `id_docente` =". $id_docentes. "
             );"
            );

          foreach ($materias->result() as $materia){
             echo $materia->nombre;
          }
        }

		echo 'Bienvenido!';
        
        echo '<br /><a href="'.base_url().'index.php/welcome/do_logout">Desconectar</a>';
		
	}
	private function check_isvalidated(){
        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }
    public function do_logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */