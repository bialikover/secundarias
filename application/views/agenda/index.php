
<script>
  function Retrieve(fecha)
    {
       //alert(fecha);
       //console.log(fecha);

       $.post("<?php echo base_url('index.php/agenda/cambiar_fecha');?>",
        {myfecha:fecha},

        function(data){
          console.log(data);
          //alert(data);
           $("#contedor").html(data);
         });


    }
</script>
    

    <script type="text/javascript">
        $(document).ready(function(){

          var evnts = function(){
              return {
                      "event":
                          [
                               {"date":"01/01/2012","title":"1"}
                              ,{"date":"02/02/2012","title":"2"}
                              ,{"date":"03/03/2012","title":"34"}
                              ,{"date":"04/04/2012","title":"123"}
                              ,{"date":"05/05/2012","title":"223"}
                              ,{"date":"06/06/2012","title":"4"}
                              ,{"date":"07/07/2012","title":"5"}
                              ,{"date":"08/08/2012","title":"14"}
                              ,{"date":"09/09/2012","title":"10"}
                              ,{"date":"10/10/2012","title":"10"}
                              ,{"date":"11/11/2012","title":"10"}
                              ,{"date":"12/12/2012","title":"10"}
                          ]
                      }
          };

         $('#calendar').Calendar({ 'events': evnts, 'weekStart': 1 })
         .on('changeDay', function(event){var fecha=""; fecha=event.day.valueOf() +'-'+ event.month.valueOf() +'-'+ event.year.valueOf();Retrieve(fecha);  })
         .on('onEvent', function(event){ alert(event.day.valueOf() +'-'+ event.month.valueOf() +'-'+ event.year.valueOf() ); })
         .on('onNext', function(event){ alert("Next"); })
         .on('onPrev', function(event){ alert("Prev"); })
         .on('onCurrent', function(event){ alert("Current"); });
      });

    </script>
  
  <div class='row-fluid'>
    <div class='span4 divalignright' >
        <div class='divalignright'  id="calendar"></div>
  </div>
  <div class='span8'>
    <div>
      <div class='my-inline menu1'>
        <ul class='nav nav-tabs' id='my-tab'>
           <li class='active'><a href='#dia'>Dia</a></li>
           <li><a href='#semana'>Semana</a></li>
           <li><a href='#mes'>Mes</a></li>
        </ul>
      </div>

      <div class='my-inline' >
            <a class='btn btn-success' href="<?php echo base_url('index.php/agenda/guardaractividad/add');?>">
              <i class="icon-plus icon-white"></i>
              Nueva Actividad
            </a>
      </div>

 </div> 

 
    <div class='tab-content'>
      <div class='tab-pane active' id='dia'>
           <div class='my-encabezado-calendar' id='actual'>
              fecha
           </div>
           <div id='contedor' class="contenedor">
              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    07:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    08:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    09:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    10:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>
              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    11:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    12:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    13:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    14:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    15:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    16:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    17:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    18:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    19:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

              <div id='rowx' class='renglon'>
                  <div id='horarios' class='my-inline hora'>
                    20:00
                  </div>  
                  <div id='hora' class='my-inline hora-completa'>
                     <div class='media1'>00</div>
                     <div class='media2'>30</div>
                  </div>
              </div>

           </div>
      </div>
      <div class='tab-pane' id='semana'>b</div>
      <div class='tab-pane' id='mes'>c</div>
    </div>

     <script>
       $('#my-tab a').click(function(e){
          e.preventDefault();
          $(this).tab('show');
       })
     </script>
  </div>