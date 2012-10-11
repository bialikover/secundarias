<div class="container-fluid">
	
  <h2>Perfil de Secundaria</h2>
	<hr>
  <div class="row-fluid">
    
    <!-- Columna Estatica  - - - - - - - - - - - - - - - - - -->
    <div class="span2">
      <img class="my-img-secu" src="<?php echo base_url("assets/uploads/fotosEscuela/".$escuela->rutaFotoEscuela);?>">
      <h3>Datos</h3>

      <h4>Dirección</h4>
      <p><?php echo $escuela->direccion;?></p>
      <h4>Clave</h4>
      <p><?php echo $escuela->claveEscuela;?></p>
      <h4>Zona</h4>
      <p><?php echo $escuela->zona;?></p>
      <h4>Sector Educativo</h4>
      <p><?php echo $escuela->sector;?></p>
      <h4>Localidad</h4>
      <p><?php echo $escuela->localidad;?></p>
      <h4>Municipio</h4>
     <!-- <p><?php echo $escuela->municipio;?></p>-->

      <a href="<?php echo base_url("/docente")?>"><span class="btn btn-success">Docentes</span></a>

    </div>
<div class="span1">
</div>
    <div class="span9">
<h3>
        <?php echo $escuela->claveEscuela." - ".$escuela->escuela?>
      </h3>
      <!-- Carrusel - - - - - - - - - - - - - - - - - - - - -->
      <div id="my-carousel" class="my-carousel">
        <div id="myCarousel" class="carousel slide ">
          <!-- Carousel items -->
          <div class="carousel-inner">
            <?php foreach ($noticias as $noticia):?>
            
            <div class="active item">
              <img src="<?php echo base_url("assets/uploads/files/".$noticia->rutaActividad);?>">
              <div class="carousel-caption">
                <h4><?php echo $noticia->nombreActividad;?></h4>
                  <p><?php echo $noticia->descActividad;?></p>
              </div>
            </div>

        <?php endforeach;?>
        </div>

          <!-- Carousel nav -->
          <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div>
      </div>
      <!-- Fin Carrusel - - - - - - - - - - - - - - - - - - - - -->


      <!-- Nombre y Descripcion de escuela -->
      
      <p>
        <?php echo $escuela->adicional.$escuela->descEscuela?>
      </p>

      <hr>
      <!-- Mapa  - - - - - - - - - - - - - - - - - - - - - - - -->
      <h3>Ubicación</h3>
      <iframe width="800" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=DF,+M%C3%A9xico&amp;aq=0&amp;oq=mexico+df&amp;sll=37.230328,2.856445&amp;sspn=19.861539,39.331055&amp;ie=UTF8&amp;hq=&amp;hnear=Ciudad+de+M%C3%A9xico,+Distrito+Federal,+M%C3%A9xico&amp;t=m&amp;ll=<?php echo $escuela->latitud;?>,<?php echo $escuela->longitud;?>&amp;spn=0.129506,0.206337&amp;z=12&amp;output=embed"></iframe>

    </div>



  </div>
</div>