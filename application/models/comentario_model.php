<?php 

class Comentario_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     


    public function guardar()
    {
      $data['comentario'] = $this->input->post('comentario');
      $data['usuarioId'] = $this->session->userdata('usuarioId');      
      $data['actividadId'] = $this->input->post('actividadId');
      $data['fecha'] = date("Y-m-d H:i:s");      
      $result['status'] = $this->db->insert('comentario', $data);
      $result['data'] = $data;
      return $result;
   }

   public function mostrar($actividadId){
      $comentarios = $this->db->query("SELECT * FROM comentario WHERE actividadId = ".$actividadId);
      return $comentarios->result();
   }
  public function mostrar_ultimos($actividadId){
      $comentarios = $this->db->query("SELECT * FROM comentario WHERE actividadId = ".$actividadId." ORDER BY fecha DESC LIMIT 2 ");
      return array_reverse($comentarios->result());
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

   public function ultimos($actividades){
    $actividades_y_coments = array();
    foreach($actividades as $actividad){
       $actividad->comentarios = $this->mostrar_ultimos($actividad->actividadId);
       array_push($actividades_y_coments,$actividad );
    }
    return $actividades_y_coments;

   }



}
?>