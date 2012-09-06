<h1>Materias</h1>
<hr>
<div class="row-fluid"> 
    <div class="12">
        <div class="my-container-materias">

            <?php foreach ($materias as $materia): ?>
                <div class="img-circle my-materia">
                    <span>
                        <?php echo $materia->nombre; ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>			
    </div>
</div>
<br>
<h1>Lo Nuevo</h1>
<?php foreach ($contenidos as $contenido) { ?>
<div class="row-floud">
        <div class="span6">
            <div class="row-fluid"> 
                <div class="span12">
                    <div class="my-comentary-container">
                        <div class="my-comentary-header">Tema</div>
                        <div class="my-comentary">
                            <div class="row-fluid">
                                <div class="span2 my-center">
                                    <img class="my-foto-mini" src="<?php echo base_url(); ?>/assets/img/user1.png">
                                </div>
                                <div class="span10">
                                    <h4><?php echo $docente->nombre; ?></h4>
                                    <p><?php echo $contenido['contenido']->texto; ?></p>

                                    <div class="date-footer">
                                        <span><?php $contenido['contenido']->fecha_publicacion; ?></span>
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
                        <?php foreach ($contenido['comentarios'] as $comentario) { ?>
                            <div class="my-comentary">

                                <div class="row-fluid">
                                    <div class="span2 my-center">
                                        <img class="my-foto-mini" src="<?php echo base_url(); ?>/assets/img/user1.png">
                                    </div>
                                    <div class="span10">
                                        <h4><?php $comentario['autor']->nombre; ?></h4>
                                        <p><?php echo $comentario['comentario']->contenido; ?></p>

                                        <div class="date-footer">
                                            <span><?php echo $comentario['comentario']->fecha_publicacion; ?></span>
                                        </div>
                                    </div>
                                </div></div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
</div>
<?php } ?>