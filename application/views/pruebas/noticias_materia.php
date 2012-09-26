<?php //var_dump($materia);?>
<?php var_dump($actividades);?>
<h1><?php echo $materia->materia;?></h1>
<hr>
<div class="row-fluid"> 
    <div class="12"> 
</div>
<h1>Lo Nuevo</h1>
<?php foreach ($actividades as $actividad): ?>
    <?php //var_dump($actividad);?>
<div class="row-floud">
        <div class="span6">
            <div class="row-fluid"> 
                <div class="span12">
                    <div class="my-comentary-container">
                        <div class="my-comentary-header"><?php echo $actividad->nombreActividad;?></div>

                        <div class="my-comentary">
                            <div class="row-fluid">
                                <div class="span2 my-center">
                                    <img class="my-foto-mini" src="<?php echo base_url(); ?>/assets/img/user1.png">
                                </div>
                                <div class="span10">
                                    <h4><?php  echo muestra_nombre_docente($actividad->actividadId);?></h4>
                                    <p><?php echo $actividad->descActividad; ?></p>

                                    <div class="date-footer">
                                        <span><?php $actividad->fecha; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="span6">
            <div class="row-fluid"> 
                <div class="span12">
                    <div class="my-comentary-container">
                        <div class="my-comentary-header">Comentarios</div>
                         <?php // foreach ($actividad['comentarios'] as $comentario) { ?>
                         
                            <div class="my-comentary">

                                <div class="row-fluid">
                                    <div class="span2 my-center">
                                        <img class="my-foto-mini" src="<?php echo base_url(); ?>/assets/img/user1.png">
                                    </div>
                                    <div class="span10">
                                        <h4>Nombre del comenter</h4>
                                        <p>Contenido del comentario</p>

                                        <div class="date-footer">
                                            <span>fecha del comentario</span>
                                        </div>
                                    </div>
                                </div></div>
                        <?php // } ?>

                    </div>
                </div>
            </div>
        </div>
</div>
<?php endforeach; ?>