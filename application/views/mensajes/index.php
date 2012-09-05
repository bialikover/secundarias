<div class="container-fluid">
	

	<div class="row-fluid"> 
		<div id="my-menu" class="span1">

		</div>
		<div id="my-menu" class="span10">

			<div class="my-comentary-container">
			<div class="my-comentary-header">Mensajes </div>
			<?php foreach ($mensajes as $mensaje): ?>
			<div class="my-comentary">
			<div class="row-fluid">
				<div class="span2 my-center">
					<img class="my-foto-mini" src="<?php echo base_url();?>/assets/img/user1.png">
				</div>
				<div class="span10">
					<h4><?php echo $mensaje['id_origen'] ?></h4>
					<p><?php echo $mensaje['mensaje'] ?> </p>

						<div class="date-footer">
						<span><?php echo $mensaje['fecha'] . ' ' . $mensaje['hora'] ?></span>
					</div>
				</div>
			</div>
			</div>
			<?php endforeach; ?>

		</div>
		</div>
		<div id="my-menu" class="span1">

		</div>

	</div>
</div>