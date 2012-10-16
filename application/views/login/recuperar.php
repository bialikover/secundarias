<div class="my-container-home">
<div class= "container-fluid">
	<div class= "row-fluid">
<?php echo validation_errors(); ?>
<h2>Escribe tu correo:</h2>
<?php echo form_open("login/recupera_contrasena");?>
<?php echo form_input("email");?>
<?php echo form_submit("submit"," enviar");?>
<?php form_close();?>
</div>
</div>
</div>