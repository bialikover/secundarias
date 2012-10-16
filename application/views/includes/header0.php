<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
    	<title>Mi secu</title>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/home-secundarias.css">	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery-ui-1.8.23.custom.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/secundaria.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/my-perfil.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/aula-digital.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/docente-alumno.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/timepiker.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/docente-alumno.css">
		
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.8.0.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.ui.datepicker.js"></script> 
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script> 
    	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.calendar.js"></script> 
    	<script type="text/javascript" src="<?php echo base_url();?>assets/js/timepicker.js"></script> 
    	<script type="text/javascript" src="<?php echo base_url();?>assets/js/my-menu-circle.js"></script>
		
	</head>
	<body>
	<header>
		<div class="container-fluid">
		  <div class="row-fluid">
		  	<a href="<?php echo base_url();?>">
		    <div class="span6">
		      <img src="<?php echo base_url();?>assets/img/HOMEICON.png">
		      <span>Mi secu</span>
		    </div>
		    </a>
		    <div class="span6">
		    	<?php if (isset($msg)):?>
		    		<?php echo $msg;?>
		    	<?php endif;?>
		    	<form class="form-inline" action="<?php echo base_url();?>login/process" method="post" name="process">
		    	
			      <input type="text" name='usuario' id='usuario' placeholder="Usuario">
			      <input type="password" name="password" id='password' placeholder="Contraseña">
			      <input type="submit" value ="entrar"class="btn btn-success">
		   </form>
		    </div>
		  </div>
		  </header>
		