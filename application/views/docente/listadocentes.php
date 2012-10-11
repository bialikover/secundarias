<?php //var_dump($docentes);?>


<div class="container-fluid">

	<h1>Lista de Docentes</h1>
	<hr>

<!--=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=-->

  <br>
  <div class="row-fluid">
<?php foreach($docentes as $docente):?>    
    <div class="span4">
      <!--Body content-->
      <img class="my-img-lisdocente" src="<?php echo muestra_foto($docente->docenteId);?>">
       
       <div class="my-text-lisdocente">
       <h4><?php echo mostrar_nombre($docente->docenteId);?></h4>
       <h5><?php echo $docente->especialidad;?></h5>
       <h6>Materias:</h6>
       <?php if($docente->materias != null):?>
       <ul>
        <?php foreach ($docente->materias as $materia):?>
          <li><h6><?php echo $materia->materia;?>,<?php echo $materia->claveGrupo;?></h6> </li>
        <?php endforeach;?>
       </ul>
       <?php endif;?>




      </div>
    </div>
<?php endforeach;?>
   
  </div>
<br>
<!--=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=-->





</div>
