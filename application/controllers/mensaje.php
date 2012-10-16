<?php

class Mensaje extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mensajes_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

    public function index() {
        //if($this->session->userdata('role') != 'Escuela')

        $data['mensajes'] = $this->mensajes_model->read_mensajes();
        $data['posible_targets'] = $this->mensajes_model->get_posible_targets();
        

         switch($this->session->userdata('tipoUsuarioId')){
                  case 1:
                       $this->load->view('includes/header-sa');
                       break;
                  case 2:
                       $this->load->view('includes/header-escuela');
                       break;
                  case 3:
                       $this->load->view('includes/header-docente');
                       break;
                  case 4:
                       $this->load->view('includes/header-alumno');
                       break;
                  case 5:
                       $this->load->view('includes/header-padre');
                       break;
             }
        

        $this->load->view('mensaje/index', $data);
        $this->load->view('includes/footer');
    }

    public function insertar() {                    
        $data = array(
            'fechaMensaje' => date("Y-m-d_H:i:s"),
            'emisorId' => $this->session->userdata('usuarioId'),
            'receptorId' => $this->input->post('id_destino'),
            'mensaje' => $this->input->post('mensaje')
        );
        $resultado = $this->mensajes_model->create_mensaje($data);
        if ($resultado)
            echo "True";
        else
            echo "Error al enviar el mensaje";
    }
    
    public function getFriends(){
        $resultado = $this->mensajes_model->get_posible_targets();
        return json_encode($resultado);
    }

}

?>