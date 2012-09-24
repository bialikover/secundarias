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
						<img class="my-foto" src="<?php echo base_url();?>/assets/img/user1.png">
					</div>

					<div id="my-menu" class="span8">
						<h1>
							<?php foreach ($actividad as $row):?>
	                              <?=$row->nombreActividad;?>

						</h1>
						<?php echo form_hidden('actividadId', $row->actividadId);?>
						<h3 class="my-nombre">José Pérez León</h3>
						<p><?=$row->descActividad;?> </p>
			          <?php endforeach;?>
					</div>
				</div>
				<div class="row-fluid"> 
					<div class="span4">
						<div class="date-footer">
						<span><?=$row->fecha;?></span>
						</div>
					</div>		
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
			<?php foreach (array_reverse($comentarios) as $comentario):?>

			<div class="my-comentary">
			<div class="row-fluid">
				<div class="span2 my-center">
					<img class="my-foto-mini" src="<?php echo base_url();?>/assets/img/user1.png">
				</div>
				<div class="span10">
					<?php 

					$usuario = $this->db->get_where('datos_personal', array('usuarioId'=>$comentario->usuarioId))->row();
        			$u = $usuario->nombre. " " .$usuario->aPaterno. " ".$usuario->aMaterno;

					?>
					<h4><?php echo $u;?></h4>
					<p><?php echo $comentario->comentario;?> </p>

						<div class="date-footer">
						<span><?php echo $comentario->fecha;?></span>

						<?php if(es_mi_actividad($this->session->userdata('usuarioId'), $actividad[0]->actividadId) 
									|| es_mi_comentario($this->session->userdata('usuarioId'), $comentario->comentarioId)):?>
							<button class="close"><i class="icon-trash"></i></button>
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
							<img class="my-foto-mini" src="<?php echo base_url();?>/assets/img/user1.png">
						</div>
						<div class="span10">
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
