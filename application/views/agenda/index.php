<link rel="stylesheet" href="assets/jquery_ui_custom/jquery-ui.css" />
<script>
   function Retrieve(fecha) {
      $.post(
         "<?php echo base_url('index.php/agenda/cambiar_fecha');?>",
         {
            myfecha : fecha
         },
         function(data){
            $("#contedor").html(data);
         }
      );
      $.post(
         "<?php echo base_url('index.php/agenda/cambiar_semana');?>",
         {
            myfecha : fecha
         },
         function(data){
            $("#contedor1").html(data);
         }
      );
   }
   
   function RetrieveMonth(fecha) {
      console.log(fecha);
      $.post(
         "<?php echo base_url('index.php/agenda/cambiar_mes');?>",
         {
            myfecha : fecha
         },
         function(data){
            console.log(data);
            $("#contedor2").html(data);
         }
      );
   }

   $(document).ready(function(){
      $('#calendar').datepicker({
         // Meses
         monthNames : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
         monthNamesShort : ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
      
         // Días
         dayNames : ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
         dayNamesMin : ['Do','Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
         dayNamesShort : ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
         
         // Eventos
         onChangeMonthYear : function (year, month, inst) {
            if ( month.toString().length == 1 )
               month = '0' + month;
            
            RetrieveMonth('01-' + month + '-' + year);
         },
         
         onSelect : function (date_str) {
            date = new Date(date_str);
            
            date_formatted  = ((date.getDate().toString().length == 1) ? '0' : '') + date.getDate() + '-';
            date_formatted += (((date.getMonth() + 1).toString().length == 1) ? '0' : '') + (date.getMonth() + 1) + '-';
            date_formatted += date.getFullYear();
            
            Retrieve(date_formatted);
         }
      });
      
      date = new Date();
      
      today_formatted  = ((date.getDate().toString().length == 1) ? '0' : '') + date.getDate() + '-';
      today_formatted += (((date.getMonth() + 1).toString().length == 1) ? '0' : '') + (date.getMonth() + 1) + '-';
      today_formatted += date.getFullYear();
      
      month_formatted  = '01-';
      month_formatted += (((date.getMonth() + 1).toString().length == 1) ? '0' : '') + (date.getMonth() + 1) + '-';
      month_formatted += date.getFullYear();
      
      Retrieve(today_formatted);
      RetrieveMonth(month_formatted);
   });
</script>
<div class="row-fluid">
   <div class="span4 divalignright">
	  <div id="calendar" class="divalignleft">
	  </div>
   </div>
   <div class="span8">
	  <div>
		 <div class="my-inline menu1">
			<ul id="my-tab" class="nav nav-tabs">
			   <li class="active"><a href="#dia">Dia</a></li>
			   <li><a href="#semana">Semana</a></li>
			   <li><a href="#mes">Mes</a></li>
			</ul>
		 </div>
       <?php if($this->session->userdata('tipoUsuarioId') == 3):?>
		 <div class="my-inline">
			<a class="btn btn-success" href="<?php echo base_url('index.php/actividad/crear/index/add');?>">
			<i class="icon-plus icon-white"></i>Nueva Actividad </a></div>
	     </div>
      <?php endif;?>
	  <div class="tab-content">
		 <div id="dia" class="tab-pane active">
			<div id="contedor" class="contenedor">
			</div>
		 </div>
		 <div id="semana" class="tab-pane" style="overflow:hidden;">
			<div id="contedor1" class="contenedor">
			</div>
		 </div>
		 <div id="mes" class="tab-pane" style="overflow:hidden;">
			<div id="contedor2" class="contenedor">
			</div>
		 </div>
	  </div>
	  <script>
       $('#my-tab a').click(function(e){
          e.preventDefault();
          $(this).tab('show');
       })
     </script>
   </div>
</div>
