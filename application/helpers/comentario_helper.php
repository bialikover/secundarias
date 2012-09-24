<?php 

	function es_mi_comentario($usuarioId, $comentarioId){
		$ci=& get_instance();
        $ci->load->database(); 
		$ci->load->model('comentario_model');
		return $ci->comentario_model->es_mi_comentario($usuarioId, $comentarioId);

	}
	function es_mi_actividad($usuarioId, $actividadId){
		$ci=& get_instance();
        $ci->load->database(); 
		$ci->load->model('actividad_model');
		return $ci->actividad_model->es_mi_actividad($usuarioId, $actividadId);
	
	}

?>