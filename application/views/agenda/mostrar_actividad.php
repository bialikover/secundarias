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

