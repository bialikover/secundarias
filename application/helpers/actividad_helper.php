<?php 


	function muestra_nombre_docente($actividadId){
		$ci=& get_instance();
        $ci->load->database(); 
		$ci->load->model('actividad_model');
		return $ci->actividad_model->muestra_nombre_docente($actividadId);
	
	}

	function mostrar_nombre($usuarioId){
		$ci=& get_instance();
        $ci->load->database(); 		
		$usuario = $ci->db->get_where('datos_personal', array('usuarioId'=>$usuarioId))->row();
        $u = $usuario->nombre. " " .$usuario->aPaterno. " ".$usuario->aMaterno;
        return $u;
	}

?>