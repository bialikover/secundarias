<?php 

class Actividad_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     


    public function guardar()
    {
 
        $f=$this->input->post('fecha');
        $h=$this->input->post('hora');
        $f=$f.' '.$h;

          $fecha2 = date("Y-m-d h:m:s", strtotime($f));

      
        $data=array(
        'nombreActividad' => $this->input->post('titulo'),
        'descActividad' => $this->input->post('descripcion'),
        'fecha' => $fecha2,
        'tipoActividadId' =>'1'
        );
 
        $this->db->insert('actividad', $data);
   }

   public function mostrar($id)
   {
       $registro= $this->db->query("select * FROM actividad WHERE actividadId = '$id'");
      return $registro;
   }
}
?>