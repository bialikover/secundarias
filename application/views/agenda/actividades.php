<?php foreach ($actividades as $actividad):?>
              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    <?php echo $actividad->fecha;?>
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'}><?php echo $actividad->nombreActividad;?></div>
                     <div class='media2'><?php echo $actividad->descActividad?></div>
                  </div>
              </div>
<?php endforeach;?>