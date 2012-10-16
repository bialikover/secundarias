<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/jquery.fcbkcomplete.min.js"></script>
<script type="text/javascript">
    $().ready(function(){
        $("#enviar").click(function(e){
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>index.php/mensaje/insertar",
                data: {'id_destino':$('#destino').val(),'mensaje':$("#mensaje").val()},
                success: function(result){
                    if(result == "True"){
                        alert('Mensaje Enviado');
                        location.reload();
                    }
                    else{
                        alert('Ocurrio un error');
                        window.location.href("<?php echo base_url(); ?>index.php/mensaje/index");
                    }
                },
                dataType: 'text'
            });
        });
    });
</script>
<div class="container-fluid">
    <div class="row-fluid"> 
        <div id="my-menu" class="span1">

        </div>
        <div id="my-menu" class="span10">

            <div class="my-comentary-container">
                <?php //var_dump($posible_targets); ?>
                <div class="my-comentary-header"> Enviar Mensaje </div>
                <label>Destinatario:</label>
                
                <select id="destino">                    
                    <?php
                    foreach ($posible_targets as $target) {
                        echo '<option value="' . $target['usuarioId'] . '">' . $target['nombre'] ." ". $target['aPaterno']." " .$target['aMaterno']." ". $target['tipoUsuario'].'</option>';
                    }
                    ?>
                </select>
                <span class="help-block">Escribe tu mensaje</span>
                <textarea rows="7" id="mensaje"></textarea><br/>
                <input type="button" value="Enviar" id="enviar">
                <div id="log"></div>
                <?php if (count($mensajes) == 0) { ?>
                    <div class="my-comentary-header"> No Tienes Mensajes </div>
                <?php } else { ?>
                    <div class="my-comentary-header">Mensajes </div>
    <?php foreach ($mensajes as $mensaje): ?>
                        <div class="my-comentary">
                            <div class="row-fluid">
                                <div class="span2 my-center">
                                    <img class="my-foto-mini" src="<?php echo base_url(); ?>/assets/img/user1.png">
                                </div>
                                <div class="span10">
                                    <h4><?php echo mostrar_nombre($mensaje['emisorId']) ?></h4>
                                    <p><?php echo $mensaje['mensaje'] ?> </p>

                                    <div class="date-footer">
                                        <span><?php echo $mensaje['fechaMensaje'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                }
                ?>

            </div>
        </div>
        <div id="my-menu" class="span1">

        </div>

    </div>
</div>