<?php 


	function muestra_foto($usuarioId){
		$ci=& get_instance();
        $ci->load->database(); 
		$ci->load->model('usuario_model');
		$rutaFoto =  $ci->usuario_model->muestra_foto($usuarioId);
		
		if($rutaFoto->rutaFoto != null){
			return base_url()."assets/uploads/fotos/".$rutaFoto->rutaFoto;
		} else{

			return base_url()."assets/uploads/fotos/image-placeholder.png";
		}

	}

?>