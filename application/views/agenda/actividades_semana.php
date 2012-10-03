<?php if ( count($actividades) < 1 ) : ?>
   <div id="rowx" class="renglon" style="padding-left:10px;">
      <b>Sin actividades esta semana</b>
   </div>
<?php endif; ?>

<?php
   $dia = array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
   $mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

   // > Preparar arreglo de impresión
   $agenda = array();

   foreach ( $actividades as $actividad ) {
      // > Pasar a fecha unix fecha de BD
      $fecha_unix = strtotime($actividad->fecha);
      
      // > Obtener componentes para la cabecera de fecha
      $fecha_dia_semana = date('w', $fecha_unix);
      $fecha_dia        = date('j', $fecha_unix);
      $fecha_mes        = date('n', $fecha_unix) - 1; // Enero = 0
      
      // > Generar la cabecera de fecha
      $cabecera_fecha = $dia[$fecha_dia_semana].' '.$fecha_dia.' de '.$mes[$fecha_mes];
      // Por ejemplo: Lunes 1 de Octubre
      
      $agenda[$cabecera_fecha][] = array(
         'hora'      => date('H:i', $fecha_unix),
         'actividad' => $actividad->nombreActividad,
         'url'       => base_url('index.php/actividad/detalle/').$actividad->actividadId
      );
   }
?>

<?php foreach ($agenda as $cabecera => $actividades) : ?>
   <div id="rowx" class="renglon" style="padding-left:10px;">
      <b><?php echo $cabecera; ?></b>
   </div>
   
   <?php foreach ( $actividades as $actividad ) : ?>
      <div id="rowx" class="renglon">
         <div id="horarios" class="my-inline hora">
      	  <?php echo $actividad['hora']; ?>
      	</div>
         <div id="hora" class="my-inline hora-completa">
            <div class="media1">
               <a href="<?php echo $actividad['url']; ?>"><?php echo $actividad['actividad']; ?></a>
            </div>
         </div>
      </div>
   <?php endforeach; ?>
<?php endforeach; ?>