<?php class Docente_model extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }
    
	function all()
    {
    	$query = $this->db->get("docente");
    	return $query->result();
    }
    function materias_docente($usuarioId){

       // $this->db->select('materia_id');
       // $this->db->from('docente_materia');
       // $this->db->where('usuario.usuarioId', $usuarioId);  

        $sql = "SELECT * FROM `materia` WHERE `materiaId` IN (
                    SELECT `materiaId` FROM `docente_materia` WHERE `docenteId` =".$usuarioId.")";
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