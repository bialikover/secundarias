<?php 


	function muestra_nombre_docente($actividadId){
		$ci=& get_instance();
        $ci->load->database(); 
		$ci->load->model('actividad_model');
		return $ci->actividad_model->muestra_nombre_docente($actividadId);
	
	}

?>