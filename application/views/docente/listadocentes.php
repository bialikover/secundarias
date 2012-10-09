<?php //var_dump($docentes);?>


<div class="container-fluid">

	<h1>Lista de Docentes</h1>
	<hr>

<!--=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=-->

  <br>
  <div class="row-fluid">
<?php foreach($docentes as $docente):?>
    <a href="<?php echo base_url("docente/mostrar/".$docente->docenteId);?>">
    <div class="span4">
      <!--Body content-->
      <img class="my-img-lisdocente" src="<?php echo muestra_foto($docente->docenteId);?>">
       
       <div class="my-text-lisdocente">
       <h4><?php echo mostrar_nombre($docente->docenteId);?></h4>
       <h5><?php echo $docente->especialidad;?></h5>




      </div>
    </div>
  </a>
<?php endforeach;?>
   
  </div>
<br>
<!--=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=-->





</div>
