<?php //var_dump($escuelas);?>

<div class="container-fluid">

	<h1>Lista de Secundarias</h1>
	<hr>

<!--=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=+=-->

  <br>
  <div class="row-fluid">
<?php foreach($escuelas as $escuela):?>    
    <a href="<?php echo base_url("escuela/mostrar/".$escuela->escuelaId);?>">
    <div class="span3">
      <!--Body content-->
      <img class="my-img-secu" src="<?php echo base_url("assets/uploads/fotosEscuela/".$escuela->rutaFotoEscuela);?>">
      <h4><?php echo $escuela->claveEscuela;?>, <?php echo $escuela->escuela;?></h4>
    </div>
	</a>
<?php endforeach;?>
    

</div>
