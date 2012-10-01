<?php 

	function es_mi_comentario($usuarioId, $comentarioId){
		$ci=& get_instance();
        $ci->load->database(); 
		$ci->load->model('comentario_model');
		return $ci->comentario_model->es_mi_comentario($usuarioId, $comentarioId);

	}


?>