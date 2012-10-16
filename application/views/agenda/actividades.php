<?php
   // > Preparar arreglo de impresión
   $agenda = array();
   
   foreach ( $actividades as $actividad ) {
      // > Pasar a fecha unix fecha de BD
      $fecha_unix = strtotime($actividad->fecha);
      
      $hora    = date('H', $fecha_unix);
      $minutos = (int)date('i', $fecha_unix);
      $minutos = ( $minutos < 30 ) ? '00' : '30';
      
      $agenda[$hora.':'.$minutos][] = array(
         'hora'       => date('H:i', $fecha_unix),
         'actividad'  => $actividad->nombreActividad,
         'url'        => base_url('index.php/actividad/detalle/').'/'.$actividad->actividadId
      ); 
   }
?>
<?php for ( $i = 7; $i != 20; $i++ ) : ?>
   <?php $hora_print = (( strlen($i) == 1 ) ? '0' : '').$i; ?> 
   <div id="rowx" class="renglon">
      <div id="horarios" class="my-inline hora">
         <?php echo $hora_print.':00'; ?>
      </div>
      <div id="hora" class="my-inline hora-completa">
         <div class="media1">
            <?php
               if ( isset($agenda[$hora_print.':00']) ) {
                  $actividades_hora = $agenda[$hora_print.':00'];
                   
                  for ( $j = 0; $j < count($actividades_hora); $j++ ) {
                     echo '<a href="'.$actividades_hora[$j]['url'].'">'.$actividades_hora[$j]['actividad'].'</a>';
                     
                     if ( $j + 1 < count($actividades_hora) )
                        echo ',';
                  }
               }
            ?>
         </div>
         <div class="media2">
            <?php
               if ( isset($agenda[$hora_print.':30']) ) {
                  $actividades_hora = $agenda[$hora_print.':30'];
                  
                  for ( $j = 0; $j < count($actividades_hora); $j++ ) {
                     echo '<a href="'.$actividades_hora[$j]['url'].'">'.$actividades_hora[$j]['actividad'].'</a>';
                     
                     if ( $j + 1 < count($actividades_hora) )
                        echo ',';
                  }
               }
            ?>
         </div>
      </div>
   </div>
<?php endfor; ?>