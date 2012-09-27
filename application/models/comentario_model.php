<?php 

class Comentario_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     


    public function guardar()
    {

      $actividadId = $this->input->post('actividadId');
      $this->db->select('grupo_docente_materia_actividadId');
      $this->db->from('grupo_docente_materia_actividad');
      $this->db->where('actividadId', $actividadId);
      $query = $this->db->get();
      $data['comentario'] = $this->input->post('comentario');
      $data['usuarioId'] = $this->session->userdata('usuarioId');      
      $data['grupo_docente_materia_actividadId'] = $query->row()->grupo_docente_materia_actividadId;
      $data['fecha'] = date("Y-m-d H:i:s");
      $estatus = $this->db->insert('comentario', $data);
      $data2['comentario'] = $data['comentario'];
      $data2['fecha'] = $data['fecha'];
      $usuario = $this->db->get_where('datos_personal', array('usuarioId'=>$data['usuarioId']))->row();
      $data2['usuario'] = $usuario->nombre. " " .$usuario->aPaterno. " ".$usuario->aMaterno;
      $html = $this->load->view("contenido/comentario", $data2, true);
      return $html;

   }

   public function mostrar($id){
      $this->db->select('grupo_docente_materia_actividadId');
      $this->db->from('grupo_docente_materia_actividad');
      $this->db->where('actividadId', $id);
      $gdma = $this->db->get()->row();
      $registro = $this->db->query("SELECT * FROM comentario WHERE grupo_docente_materia_actividadId = ".$gdma->grupo_docente_materia_actividadId);
      return $registro;
   }

   public function eliminar($id){    
    $this->db->delete('comentario', array('comentarioId' => $id)); 
   }

   public function es_mi_comentario($usuarioId, $comentarioId){
    $comentario = $this->db->get_where('comentario', array('comentarioId' => $comentarioId))->row();
    if($comentario->usuarioId == $usuarioId){
      return true;
    } else{
      return false;
    }

   }



}
?>