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
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.0.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.ui.datepicker.js"></script> 
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.calendar.js"></script> 
    	<script type="text/javascript" src="<?php echo base_url();?>assets/js/timepicker.js"></script>  
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/my-menu-circle.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/app.js"></script>
		
	</head>
	<body>
	<header>
			<div class="navbar my-nav">
	  			<div class="navbar-inner">
						<div class="container-fluid">
							<div class="row-fluid"> 		
								<div id="my-menu" class="span12">
									<ul class="nav">
										<li><a class="" href="<?php echo base_url("index.php/welcome")?>">
										  	<img id="tab1" class="img-circle my-img-tab" src="<?php echo base_url();?>/assets/img/home-bco.png">
										  	<div id="tab1_t"  class="my-tex-nav">Inicio</div>
										  	</a>
										</li>
									</ul>
									<ul class="nav pull-right">
										<li><a  href="<?php echo base_url("index.php/mensaje/index")?>"> 
						  					<img id="tab2" class="img-circle my-img-tab" src="<?php echo base_url();?>/assets/img/mensaje-bco.png">
						  					<div id="tab2_t" class="my-tex-nav">Mensajes</div>
						    				</a>
										</li>
										<li><a class="my-a"  href="<?php echo base_url("index.php/welcome/do_logout")?>">  
						  					<img id="tab3" class="img-circle  my-img-tab" src="<?php echo base_url();?>/assets/img/salir-bco.png">
						  					<div id="tab3_t" class="my-tex-nav">Salir</div>
						  					</a>
						  				</li>
						  				<li>						  					
						  					<div id="tab4_t"><span><?php echo mostrar_nombre($this->session->userdata('usuarioId'));?></span></div>						  					
						  				</li>
									</ul>	
								</div>
							</div>
						</div>
				</div>
			</div>
	</header>
	<div class="container-fluid">
		<div class="row-fluid"> 
			<div class="span1">
				<!--margen izquierdo-->
			</div>

			<div class="span10">
