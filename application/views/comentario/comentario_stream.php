<div class="my-comentary">

                                <div class="row-fluid">
                                    <div class="span2 my-center">
                                        <img class="my-foto-mini img-circle" src="<?php echo muestra_foto($usuarioId);?>">
                                    </div>
                                    <div class="span10">
                                        <h4><?php echo mostrar_nombre($usuarioId);?></h4>
                                        <p><?php echo $comentario; ?></p>

                                        <div class="date-footer">
                                            <span><?php echo $fecha; ?></span>
                                            <button class="close"><i class="icon-trash"></i></button>
                                        </div>
                                    </div>
                                </div></div>