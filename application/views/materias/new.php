<?php echo form_open('materias/create');?>


<?php echo form_input('nombre', 'Nombre de la materia');?>
<?php echo form_input('matricula', 'Matricula de materia');?>
<?php echo form_dropdown('grado', 
						array(
						'1' => "1ero",
						'2' => "2do",
						'3' => "3ero")
						, '1');?>
<?php echo form_submit('enviar', 'Guardar');?>
<?php echo form_close();?>
