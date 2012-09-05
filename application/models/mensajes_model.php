<?php
class mensajes_model extends CI_Model {

    public function __construct(){
	$this->load->database();
    }

    public function create_mensaje(){
        $this->load->helper('url');
        $data= array(
            'fecha' =>  $this->input->post('fecha'),
            'hora' =>  $this->input->post('hora'),
            'id_origen' => $this->input->post('id_origen'),
            'id_destino' => $this->input->post('id_destino'),
            'mensaje' => $this->input->post('mensaje')
        );
        return $this->db->insert('mensajes', $data);
    }

    public function read_mensajes(){
	$eventos = $this->db->get('mensajes');
	return $eventos->result_array();
    }	

    public function update_mensaje(){
	$data= array(
            'fecha' =>  $this->input->post('fecha'),
            'hora' =>  $this->input->post('hora'),
            'id_origen' => $this->input->post('id_origen'),
            'id_destino' => $this->input->post('id_destino'),
            'mensaje' => $this->input->post('mensaje')
	);
		
        $this->db->where('id', $this->input->post('id_mensaje'));
	return $this->db->update('mensajes', $data);
    }

    public function del_mensaje(){
	$this->db->where('id', $this->input->post('id_mensaje'));
	$this->db->delete('mensaje');
    }

    public function read_mensaje_esp(){
        $id=$this->input->post('id_mensaje');
        $mensaje = $this->db->get_where('mensaje', array('id' => $id), 1, 0);
        return $mensaje->result_array();
    }
}
