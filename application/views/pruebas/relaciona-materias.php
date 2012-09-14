<?php echo form_open('pruebas/send');?>



<select id="docenteId" name="docenteId">
<?php foreach ($docentes as $docente):?>
  <option value="<?php echo $docente->docenteId;?>"><?php echo $docente->docenteId;?></option>
<?php endforeach;?>
</select>


<?php foreach ($materias as $materia):?>
	<input type="checkbox" name="materias[<?php echo $materia->materiaId;?>]" 
		value="<?php echo $materia->materiaId?>"><?php  echo $materia->materia?><br>	
<?php endforeach;?>


<?php echo form_submit("agregar","agregar");?>

<?php echo form_close();?>

