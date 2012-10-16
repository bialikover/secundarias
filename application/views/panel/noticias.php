<?php //var_dump($this->session->userdata('usuarioId'));?>
<?php //var_dump($materias);?>
<?php //var_dump($actividades);?>

<div class="row-fluid"> 
	<div class="span8">
		<h1>Materias</h1>
	</div>
    <?php if ($this->session->userdata("tipoUsuarioId")== 3):?>
	<div class="span4 my-right">
		<a href="<?php echo base_url()?>actividad/crear/index/add"  id = "nuevo-contenido"  class="btn btn-success "><i class="icon-plus icon-white"></i> Crear Actividad o Evento</a>
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
            <a href="<?php echo base_url().'panel/noticias_materia/'.$materia->grupo_docente_materiaId;?>">
                <div class="img-circle my-materia">
                    <span>
                        <?php echo $materia->materia; ?></br></br>
                        <?php echo $materia->claveGrupo; ?>
                    </span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>			
    </div>
</div>
<br>
<h1>Lo Nuevo</h1>
<?php if(! empty($actividades)):?>
        <?php foreach ($actividades as $actividad): ?>
<div class="row-fluid">
        <div class="span6">
            <div class="row-fluid"> 
                <div class="span12">
                    <div class="my-comentary-container">
                        <div class="my-comentary-header">
                            <?php echo ucfirst($actividad->tipoActividad);?> 
                            para el grupo: 
                            <?php echo $actividad->claveGrupo;?>
                            de la materia:
                            <?php echo $actividad->nombreMateria;?>
                        </div>
                        <div class="my-comentary">
                            <div class="row-fluid">
                                <div class="span2 my-center">
                                    <img class="my-foto-mini img-circle" src="<?php echo muestra_foto($actividad->docenteId);?>">
                                </div>
                                <div class="span10">
                                    <h4><?php  echo muestra_nombre_docente($actividad->actividadId);?></h4>
                                    <h4><?php echo anchor("actividad/detalle/".$actividad->actividadId , strtoupper($actividad->nombreActividad)); ?></h4>
                                    <p><?php echo $actividad->descActividad; ?></p>

                                    <div class="date-footer">
                                        <span><?php echo $actividad->fecha; ?></span>
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
                                            <?php if((es_mi_actividad($this->session->userdata('usuarioId'), $this->session->userdata('tipoUsuarioId'), $actividad->actividadId) 
                                 && $this->session->userdata('tipoUsuarioId') == 3)
                                    || es_mi_comentario($this->session->userdata('usuarioId'), $comentario->comentarioId)):?>
                            <button class="close" value = "<?php echo $comentario->comentarioId;?>"><i class="icon-trash"></i></button>
                        <?php endif;?>
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
        <?php endforeach;?>
    <?php endif;?>
    <br>
</div>
