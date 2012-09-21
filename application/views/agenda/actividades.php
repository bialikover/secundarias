<script>
   function SetHora(id,hora)
     {
        if (hora.length<2) hora="0"+hora;
     	hora=hora+":00";
     	id="#"+id;
        $(id).html(hora);
      }

     function SeleccionarHora(hora,contenido)
       {
         if (hora=='07:00') id='media11';
         if (hora=='07:30') id='media21';
         if (hora=='08:00') id='media12';
         if (hora=='08:30') id='media22';
         if (hora=='09:00') id='media13';
         if (hora=='09:30') id='media23';
         if (hora=='10:00') id='media14';
         if (hora=='10:30') id='media24';
         if (hora=='11:00') id='media15';
         if (hora=='11:30') id='media25';
         if (hora=='12:00') id='media16';
         if (hora=='12:30') id='media26';
         if (hora=='13:00') id='media17';
         if (hora=='13:30') id='media27';
         if (hora=='14:00') id='media18';
         if (hora=='14:30') id='media28';
         if (hora=='15:00') id='media19';
         if (hora=='15:30') id='media29';
         if (hora=='16:00') id='media110';
         if (hora=='16:30') id='media210';
         if (hora=='17:00') id='media111';
         if (hora=='17:30') id='media211';
         if (hora=='18:00') id='media112';
         if (hora=='18:30') id='media212';
         if (hora=='19:00') id='media113';
         if (hora=='19:30') id='media213';
         if (hora=='20:00') id='media114';


        
        url="<?php echo base_url('index.php/agenda/mostrar_actividad');?>";
        contenido="<a href='"+url+"'>"+contenido+"</a>";
        id="#"+id;
        $(id).html(contenido);
       }</script>


<?php $j=6;?>
<?php for ($i=1;$i<=20;$i++):?>
	
              <div id='rowx' class='renglon'>
                  <div <?php echo "id='hora$i'"; ?> class='my-inline hora'>
                    <?php $j++; echo "<script>SetHora('hora$i','$j');</script>";?>
                  </div>  
                  <div  class='my-inline hora-completa'>
                     <div class='media1' <?php echo "id='media1$i'"; ?> ></div>
                     <div class='media2' <?php echo "id='media2$i'"; ?> ></div>
                  </div>


              </div>
<?php endfor;?>

<?php $i=0;?>
<?php foreach ($actividades as $actividad):?>
	<?php $i++; $hora=substr($actividad->fecha,11,5); echo "<script>SeleccionarHora('$hora','$actividad->nombreActividad');</script>"?>

             
<?php endforeach;?>





