<?php //var_dump($materia);?>
<?php //var_dump($actividades);?>
<h1><?php echo $materia->nombreMateria;?></h1>
<h2><?php echo $materia->claveGrupo;?></h2>
<hr>
<div class="row-fluid"> 
    <div class="12"> 
</div>
<h2>Lo Nuevo</h2>
<?php foreach ($actividades as $actividad): ?>
    <?php //var_dump($actividad);?>
<div class="row-floud">
        <div class="span6">
            <div class="row-fluid"> 
                <div class="span12">
                    <div class="my-comentary-container">
                        <div class="my-comentary-header"><?php echo $actividad->nombreActividad;?></div>
                        <a href="<?php echo base_url()."index.php/actividad/detalle/".$actividad->actividadId;?>">
                        <div class="my-comentary">
                            <div class="row-fluid">
                                <div class="span2 my-center">
                                    <img class="my-foto-mini img-circle" src="<?php echo muestra_foto($actividad->docenteId);?>">
                                </div>
                                <div class="span10">
                                    <h4><?php  echo muestra_nombre_docente($actividad->actividadId);?></h4>
                                    <p><?php echo $actividad->descActividad; ?></p>

                                    <div class="date-footer">
                                        <span><?php echo $actividad->fecha; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="span6">
            <div class="row-fluid"> 
                <div class="span12">
                    <div class="my-comentary-container">
                        <div class="my-comentary-header">Comentarios</div>
                        <?php foreach ($actividad->comentarios as $comentario):?>
                            <div class="my-comentary">

                                <div class="row-fluid">
                                    <div class="span2 my-center">
                                        <img class="my-foto-mini img-circle" src="<?php echo muestra_foto($comentario->usuarioId);?>">
                                    </div>
                                    <div class="span10">
                                        <h4><?php echo mostrar_nombre($comentario->usuarioId); ?></h4>
                                        <p><?php echo $comentario->comentario; ?></p>

                                        <div class="date-footer">
                                            <span><?php echo $comentario->fecha; ?></span>
                                        </div>
                                    </div>
                                </div></div>
                        
                            <?php endforeach;?>
                        <div class="my-comentary">
                            <div class="row-fluid">
                                <div class="span2 my-center">
                                    <img class="my-foto-mini img-circle" src="<?php echo muestra_foto($this->session->userdata("usuarioId"));?>">
                                </div>
                                <div class="span10">
                                    <input type="hidden" name="actividadId" value="<?php echo $actividad->actividadId;?>">
                                    <?php $data = array('name' =>'comentario', 
                                                        'class' => 'my-textarea_stream', 
                                                        'placeholder' =>'escribe un comentario', 
                                                        'aria-expanded'=>"false", 
                                                        'rows' => '1');?>
                                    <?php echo form_textarea($data); ?>
                                    <div name="enviar" class="span11 my-right comentario">
                                    <span class="btn btn-success"><i class="icon-comment icon-white"></i> Comentar</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
</div>
<?php endforeach; ?>