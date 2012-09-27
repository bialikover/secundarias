<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
    	<title>Mi secu</title>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/home-secundarias.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap-responsive.css">
		
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery.js"></script> 
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/bootstrap.js"></script> 
		
	</head>
	<body>
	<header>
		<div class="container-fluid">
		  <div class="row-fluid">
		    <div class="span6">
		      <img src="<?php echo base_url();?>/assets/img/icon/HOMEICON.png">
		      <span>Mi secu</span>
		    </div>
		    <div class="span6">
		    	<form class="form-inline" action="<?php echo base_url();?>index.php/login/process" method="post" name="process">
		    	
			      <input type="text" name='usuario' id='usuario' placeholder="Usuario">
			      <input type="password" name="password" id='password' placeholder="Contraseña">
			      <input type="submit" value ="entrar"class="btn btn-success">
		   </form>
		    </div>
		  </div>
		  </header>
		