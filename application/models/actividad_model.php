<?php 

class Actividad_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     
    public function guardar()
    {
        // grab user input

        $f=$this->input->post('fecha');
        $h=$this->input->post('hora');
        $f=$f.' '.$h;

        //var_dump($f);
        //die;


       // $fecha -> format('d-m-Y')

        //$fecha=new DateTime($f);

       
      //  $fecha2=$f -> format('Y-m-d h:m:s');
 


          $fecha2 = date("Y-m-d h:m:s", strtotime($f));





      
        $data=array(
        'nombreActividad' => $this->input->post('titulo'),
        'descActividad' => $this->input->post('descripcion'),
        'fecha' => $fecha2,
        'tipoActividadId' =>'1'
        );

        

     
        $this->db->insert('actividad', $data);
   }
}
?>