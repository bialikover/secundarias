<?php class Docente_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }
    

    //filtrado por escuela???
	function todos()
    {
        $sql = "SELECT * from docente
                JOIN usuario 
                    ON docente.docenteId = usuario.usuarioId 
                JOIN datos_personal
                    ON datos_personal.usuarioId = usuario.usuarioId
                JOIN adicional
                    ON adicional.usuarioId = usuario.usuarioId 
                ";
    	$query = $this->db->query($sql);
    	return $query->result();
    }


    function relaciona_materia($array_materias, $usuarioId){
    	   //var_dump($array_materias);
           //die;
    		foreach ($array_materias as $materia){
    			$data = array(
    				'docenteId' => $usuarioId,
    				'materiaId' => $materia
    				);
    			$this->db->insert('docente_materia', $data);
    		}

    }

    function mostrar($docenteId){

        $this->db->select('*');
        $this->db->from("usuario");
        $this->db->join('docente', 'docente.docenteId = usuario.usuarioId');
        $this->db->join('adicional', 'usuario.usuarioId = adicional.usuarioId');
        $this->db->join('datos_personal', 'usuario.usuarioId = datos_personal.usuarioId');
        $this->db->join('datos_contacto', 'usuario.usuarioId = datos_contacto.usuarioId');
        $this->db->join('domicilio', 'usuario.usuarioId = domicilio.usuarioId');
        $this->db->where('docente.docenteId' , $docenteId);
        return $query = $this->db->get()->row();
    }




    function mensajes($id){
        $this->load->model('mensajes_model');
        $mensajes = $this->mensajes_model->read_all_mensajes_usuario($id);
        $this->load->view('includes/header-docente');
        foreach ($mensajes as $$mensaje) {
            $this->load->view('mensaje/show', $mensaje);
        }
        $this->load->view('includes/footer');
    }
}