<?php //var_dump($actividad);?>
<?php //var_dump($comentarios);?>

<br>
<div class="row-fluid"> 
	<div class="span8">
		<h1>Actividad</h1>
	</div>

</div>
<hr>

<div class="container-fluid">
	<div class="row-fluid"> 
		<div class="span1">

		</div>
		<div class="span10 ">
			<div class="my-public-header">
				<div class="row-fluid"> 
					<div id="my-menu" class="span4 ">
						<img class="my-foto" src="<?php echo muestra_foto($actividad->docenteId);?>">
					</div>

					<div id="my-menu" class="span8">
						<h1>
							
	                    <?php echo $actividad->nombreActividad;?>

						</h1>
						
						<h3 class="my-nombre"><?php echo muestra_nombre_docente($actividad->actividadId);?></h3>
						<p><?=$actividad->descActividad;?> </p>
			          
					</div>
				</div>
				<div class="row-fluid"> 
					<div class="span4">
						<div class="date-footer">
						<span><?=$actividad->fecha;?></span>
						</div>
					</div>
					<?php if($actividad->rutaActividad != null):?>
						<div class="span11 my-right">
						<a href="<?php echo base_url()."assets/uploads/files/".$actividad->rutaActividad; ?>">
							<span class="btn btn-success"><i class="icon-download icon-white"></i> Descargar Archivo</span>		
							</div>
						</a>
					<?php endif;?>
				</div>
			</div>
		</div>

		<div class="span1">

		</div>

	</div>
	<div class="row-fluid"> 
		<div id="my-menu" class="span1">

		</div>
		<div id="my-menu" class="span10">

			<div class="my-comentary-container">
			<div class="my-comentary-header">Comentarios </div>
			<?php foreach ($comentarios as $comentario):?>

			<div class="my-comentary">
			<div class="row-fluid">
				<div class="span2 my-center">
					<img class="my-foto-mini img-circle" src="<?php echo muestra_foto($comentario->usuarioId);?>">
				</div>
				<div class="span10">
					<h4><?php echo mostrar_nombre($comentario->usuarioId);?></h4>
					<p><?php echo $comentario->comentario;?> </p>

						<div class="date-footer">
						<span><?php echo $comentario->fecha;?></span>

						<?php if((es_mi_actividad($this->session->userdata('usuarioId'), $this->session->userdata('tipoUsuarioId'), $actividad->actividadId) 
								 && $this->session->userdata('tipoUsuarioId') == 3)
									|| es_mi_comentario($this->session->userdata('usuarioId'), $comentario->comentarioId)):?>
							<button class="close" value = "<?php echo $comentario->comentarioId;?>"><i class="icon-trash"></i></button>
						<?php endif;?>
					</div>
				</div>
			</div>
			</div>
			<?php endforeach;?>
			</div>
			<div class="my-comentary-container">
				<div class="my-comentary">
					<div class="row-fluid">
						<div class="span2 my-center">
							<img class="my-foto-mini img-circle" src="<?php echo muestra_foto($this->session->userdata("usuarioId"));?>">
						</div>
						<div class="span10">
							
							<?php echo form_hidden('actividadId', $actividad->actividadId);?>
							<?php $data = array('name' =>'comentario', 
												'class' => 'my-textarea', 
												'placeholder' =>'escribe un comentario', 
												'aria-expanded'=>"false", 
												'rows' => '1');?>
							<?php echo form_textarea($data); ?>
							<div id= "enviar-comentario" class="span11 my-right">
							<span class="btn btn-success"><i class="icon-comment icon-white"></i> Comentar</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
