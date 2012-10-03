<script>
   function Retrieve(fecha) {
      $.post(
         "<?php echo base_url('index.php/agenda/cambiar_fecha');?>",
         {
            myfecha : fecha
         },
         function(data){
            console.log(data);
            $("#contedor").html(data);
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
         var fecha = event.day.valueOf() + '-' + event.month.valueOf() + '-' + event.year.valueOf();
         Retrieve(fecha);
      });
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
			<div id="actual" class="my-encabezado-calendar">
			   fecha </div>
			<div id="contedor" class="contenedor">
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 07:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 08:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 09:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 10:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 11:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 12:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 13:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 14:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 15:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 16:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 17:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 18:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 19:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			   <div id="rowx" class="renglon">
				  <div id="horarios" class="my-inline hora">
					 20:00 </div>
				  <div id="hora" class="my-inline hora-completa">
					 <div class="media1">
						00</div>
					 <div class="media2">
						30</div>
				  </div>
			   </div>
			</div>
		 </div>
		 <div id="semana" class="tab-pane">
			b</div>
		 <div id="mes" class="tab-pane">
			c</div>
	  </div>
	  <script>
       $('#my-tab a').click(function(e){
          e.preventDefault();
          $(this).tab('show');
       })
     </script>
   </div>
</div>
