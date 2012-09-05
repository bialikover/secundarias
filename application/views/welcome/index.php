<header><div class="my-nombre">

	<span class="my-container"><?php echo $nombre->nombre. " ".$nombre->apellido_pat;?></span>
	<?php echo '<br /><a href="'.base_url().'index.php/welcome/do_logout">Desconectar</a>';?>
</div>		
</header>
	<div class="my-container">
<div class="my-sub-header">
	
<h1>Mis Materias</h1>

</div>
<div class="my-container-materias">
	<?php foreach ($materias as $materia):?>
	<div class="my-materia">
			<h2><?php echo $materia->nombre;?></h2>
	</div>
<<<<<<< HEAD
	<? endforeach;?>
=======

	<? endforeach;?>

>>>>>>> 41284bd4ff6994dcb7249c14462ff16b2c9e46e0

	<div class="my-materia">
			<h2>Matematicas 1</h2>
	</div>

	<div class="my-materia">
			<h3>Matematicas 1</h3>
	</div>

	<div class="my-materia">
			<h3>Matematicas 1</h3>
	</div>

	<div class="my-materia">
			<h3>Matematicas 1</h3>
	</div>

</div>

<div class="my-container-comentarios">
	Comentarios..
</div>