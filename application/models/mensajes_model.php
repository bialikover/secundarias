<?php

class mensajes_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function create_mensaje() {
        $this->load->helper('url');
        $data = array(
            'fecha' => $this->input->post('fecha'),
            'hora' => $this->input->post('hora'),
            'id_origen' => $this->input->post('id_origen'),
            'id_destino' => $this->input->post('id_destino'),
            'mensaje' => $this->input->post('mensaje')
        );
        return $this->db->insert('mensaje', $data);
    }

    public function read_mensajes() {
        $eventos = $this->db->get('mensaje');
        return $eventos->result_array();
    }

    public function update_mensaje() {
        $data = array(
            'fecha' => $this->input->post('fecha'),
            'hora' => $this->input->post('hora'),
            'id_origen' => $this->input->post('id_origen'),
            'id_destino' => $this->input->post('id_destino'),
            'mensaje' => $this->input->post('mensaje')
        );

        $this->db->where('id', $this->input->post('id_mensaje'));
        return $this->db->update('mensaje', $data);
    }

    public function del_mensaje() {
        $this->db->where('id', $this->input->post('id_mensaje'));
        $this->db->delete('mensaje');
    }

    public function read_mensaje_esp() {
        $id = $this->input->post('id_mensaje');
        $mensaje = $this->db->get_where('mensaje', array('id' => $id), 1, 0);
        return $mensaje->result_array();
    }

    public function read_mensaje_remitente($idRemitente) {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->join('datos_personal', 'datos_personal.usuarioId = usuario.usuarioId');
        $this->db->join('datos_contacto', 'datos_contacto.usuarioId = usuario.usuarioId');
        $this->db->join('domicilio', 'domicilio.usuarioId = usuario.usuarioId');
        $this->db->join('adicional', 'adicional.usuarioId = usuario.usuarioId');
        $this->db->join('mensaje', 'mensaje.emisorId = usuario.usuarioId');
        $this->db->where('usuario.usuarioId', $idRemitente);
        return $query = $this->db->get()->row();
    }
    
    public function read_all_mensajes_usuario($idDestinatario){
        $idRemitentes = $this->db->get_where('mensajes', array('receptorID'=>$idDestinatario))->result();
        $mensajes = array();
        foreach ($idRemitentes as $remitente) {
            $mensaje = $this->read_mensaje_remitente($remitente->emisorId);
            array_push($mensajes, $mensaje);
        }
        return $mensajes;
    }

}
