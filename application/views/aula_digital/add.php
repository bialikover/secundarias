<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <title>Mi secu</title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/secundaria.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/my-perfil.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/aula-digital.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/docente-alumno.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap-responsive.css">
    <script type="text/javascript" src="<?php echo base_url();?>/assets/grocery_crud/texteditor/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/bootstrap.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/my-menu-circle.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/app.js"></script>

    
  </head>
  <body>
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Nueva Actividad</h3>
  </div>
  <div class="modal-body">
     <form id='form1' action="<?php echo base_url('index.php/agenda/guardar_actividad');?>" method=POST>
            <label for="titulo">Titulo de la actividad</label>
            <input type="text" name='titulo' id='titulo' size="25" /><br />
         
            <label for="fecha">Fecha</label>
            <input type="text" name='fecha' id='fecha' size="25"  /><br />

             <label for="hora">Hora</label>
            <input class="dropdown-timepicker" type="text" name="hora" id="hora"/>
              
             <script>
                  $(document).ready(function() {
                        $("#fecha").datepicker();

                        $('.dropdown-timepicker').timepicker({
                        defaultTime: 'current',
                        minuteStep: 30,
                        disableFocus: true,
                        template: 'dropdown'
                        });
                      });

             </script>






            <label for="descripcion">Descripcion</label>
            <textarea name='descripcion' id='descripcion'></textarea>
         <br />

  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <input type=submit value='Guardar Actividad' class="f btn-primary" >
  </div>
        </form>
</body>
</html>
