<header><div class="my-nombre">

	<span class="my-container">
		<?php if($this->session->userdata('role') != 'Escuela'):?>	
			<?php echo $nombre->nombre. " ".$nombre->apellido_pat;?>
		<?php else:?>
			<?php echo $nombre->nombre;?>
		<?php endif;?>
	</span>
	<?php echo '<br /><a href="'.base_url().'index.php/welcome/do_logout">Desconectar</a>';?>
</div>		
</header>
	<div class="my-container">
<div class="my-sub-header">
<?php if($this->session->userdata('role') != 'Escuela'):?>
<h1>Mis Materias</h1>

</div>
<div class="my-container-materias">
	<?php foreach ($materias as $materia):?>
	<div class="my-materia">
			<h2><?php echo $materia->nombre;?></h2>
	</div>


	<? endforeach;?>

</div>

<div class="my-container-comentarios">
	Comentarios..
</div>
<?php else:?>

<h1>Gestion Escolar</h1>

<?php endif;?>