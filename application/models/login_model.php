<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
     
    public function validate(){
        // grab user input        

        $this->load->library('encrypt');
        $usuario = $this->security->xss_clean($this->input->post('usuario'));        
        $decoded = $this->security->xss_clean($this->input->post('password'));
        //$password = $this->security->xss_clean($this->input->post('password'));
        //$password = $this->encrypt->encode( $decoded);        
        // Prep the query
        $this->db->where('usuario', $usuario);
        //$this->db->where('password', $decoded);                 
        // Run the query
        $query = $this->db->get('usuario');
        // Let's check if there are any results
        if($query->num_rows() == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            if($row->tipoUsuarioId == 1){
                if($row->password == $decoded){
                    $data = array(
                        'usuarioId' => $row->usuarioId,
                        'tipoUsuarioId' => $row->tipoUsuarioId,                    
                        'usuario' => $row->usuario,
                        'validated' => true
                        );
                    $this->session->set_userdata($data);
                    return true;
                } else{
                    return false;
                }

            }else{
                if($this->encrypt->decode($row->password) == $decoded){
                    $data = array(
                        'usuarioId' => $row->usuarioId,
                        'tipoUsuarioId' => $row->tipoUsuarioId,                    
                        'usuario' => $row->usuario,
                        'validated' => true
                        );
                    $this->session->set_userdata($data);
                    return true;
                } else{
                    return false;
                }
            }

       }
        // If the previous process did not validate
        // then return false.
        return false;
    }

    public function get_usuario($email){
        $sql = "SELECT * FROM usuario 
                JOIN datos_contacto
                    ON datos_contacto.usuarioId = usuario.usuarioId
                WHERE datos_contacto.email = ?";
        $query = $this->db->query($sql, $email);
        return $query->row();
    }
}
?>