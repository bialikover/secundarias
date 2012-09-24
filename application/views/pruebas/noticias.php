<?php var_dump($materias);?>
<?php //var_dump($contenidos);?>

<div class="row-fluid"> 
	<div class="span8">
		<h1>Materias</h1>
	</div>
    <?php if ($this->session->userdata("tipoUsuarioId")== 3):?>
	<div class="span4 my-right">
		<a href="<?php echo base_url()?>index.php/contenido/nuevo/index/add"  id = "nuevo-contenido"  class="btn btn-success "><i class="icon-plus icon-white"></i> Nuevo Contenido</a>
	</div>
    <!--<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    </div>-->
    <?php endif;?>
</div>

<hr>
<div class="row-fluid"> 
    <div class="12">
        <div class="my-container-materias">

            <?php foreach ($materias as $materia): ?>
            <a href="<?php echo base_url().'index.php/pruebas/noticias_materia/'.$materia->materiaId?>">
                <div class="img-circle my-materia">
                    <span>
                        <?php echo $materia->materia; ?>
                    </span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>			
    </div>
</div>
<br>
<h1>Lo Nuevo</h1>
<div class="row-floud">
        <div class="span6">
            <?php foreach (array_reverse($contenidos) as $contenido): ?>
            <div class="row-fluid"> 

                <div class="span12">
                    <div class="my-comentary-container">
                        <div class="my-comentary-header">Actividad</div>
                        <div class="my-comentary">
                            <div class="row-fluid">
                                <div class="span2 my-center">
                                    <img class="my-foto-mini" src="<?php echo base_url(); ?>/assets/img/user1.png">
                                </div>
                                <div class="span10">
                                    <h4><?php echo anchor("actividad/detalle/".$contenido->actividadId , strtoupper($contenido->nombreActividad)); ?></h4>
                                    <p><?php echo $contenido->descActividad; ?></p>

                                    <div class="date-footer">
                                        <span><?php echo $contenido->fecha; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>

        <div class="span6">
            <div class="row-fluid"> 
                <div class="span12">
                    <div class="my-comentary-container">
                        <!--<div class="my-comentary-header">Comentarios</div>
                        <?php //foreach ($contenido['comentarios'] as $comentario) { ?>
                            <div class="my-comentary">

                                <div class="row-fluid">
                                    <div class="span2 my-center">
                                        <img class="my-foto-mini" src="<?php echo base_url(); ?>/assets/img/user1.png">
                                    </div>
                                    <div class="span10">
                                        <h4><?php// $comentario['autor']->nombre; ?></h4>
                                        <p><?php// echo $comentario['comentario']->contenido; ?></p>

                                        <div class="date-footer">
                                            <span><?php// echo $comentario['comentario']->fecha_publicacion; ?></span>
                                        </div>
                                    </div>
                                </div></div>
                        <?php //} ?>

                    </div>-->
                </div>
            </div>
        </div>
</div>
