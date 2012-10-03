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
</script>
<script type="text/javascript">
   $(document).ready(function(){
      $('#calendar').Calendar({
            weekStart : 1
      });
      
      $('#calendar').bind('changeDay', function(event) {
         var fecha_retrieve = event.day.valueOf() + '-' + event.month.valueOf() + '-' + event.year.valueOf();
         var fecha_display  = event.day.valueOf() + '/' + event.month.valueOf() + '/' + event.year.valueOf();
         
         $('#actual').text(fecha_display);
         Retrieve(fecha_retrieve);
      });
      
      Retrieve(<?php echo date('d-m-Y'); ?>);
   });
</script>
<div class="row-fluid">
   <div class="span4 divalignright">
	  <div id="calendar" class="divalignright">
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
		 <div class="my-inline">
			<a class="btn btn-success" href="<?php echo base_url('index.php/actividad/crear/index/add');?>">
			<i class="icon-plus icon-white"></i>Nueva Actividad </a></div>
	  </div>
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
