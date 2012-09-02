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
        $matricula = $this->security->xss_clean($this->input->post('matricula'));
        $password = $this->security->xss_clean($this->input->post('password'));
         
        // Prep the query
        $this->db->where('matricula', $matricula);
        $this->db->where('password', $password);
         
        // Run the query
        $query = $this->db->get('usuario');
        // Let's check if there are any results
        if($query->num_rows() == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'id_usuario' => $row->id_usuario,
                    'role' => $row->role,
                    'perfil_id' => $row->perfil_id,
                    'matricula' => $row->matricula,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}
?>