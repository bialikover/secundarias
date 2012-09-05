<div class="my-perfil-container">
	

	<div class="container-fluid">
		<div class="row-fluid"> 
			<div class="span12 my-header-perfil">
				<h4>Perfil de Alumno</h4>
			</div>
		</div>
		
	<div class="row-fluid"> 
			<div class="span3">
				<div class="my-foto">
					<img src="<?php echo base_url();?>/assets/img/user1.png">
				</div>
			</div>
			<div class="span9">
				<h1><?php echo $alumno[0]->nombre.' '.$alumno[0]->apellido_pat.' '.$alumno[0]->apellido_mat; ?></h1>
			</div>
		</div>
	<div class="row-fluid">
		<div class="span12 my-sub-header-perfil">
			<h3>Datos Personales</h3>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4 my-perfil-campos">

		<h4>Fecha de Nacimiento</h4>
		<h4>Genero</h4>
		<h4>CURP</h4>
		<h4>Dirección</h4>
		<h4>Teléfono</h4>
		<h4>Correo Electrónico</h4>

		</div>
		<div class="span8">
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->fecha_nacimiento; ?></span></h4>

		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->genero; ?></span></h4>
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->curp ?></span></h4>
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->direccion; ?></span></h4>
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->telefono; ?></span></h4>
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->correo_electronico; ?></span></h4>
		</div>
	</div>
	<div class="row-floud">
		<div class="span12 my-sub-header-perfil">
			<h3>Datos Académicos</h3>
		</div>
	</div>

	<div class="row-floud">
		<div class="span4 my-perfil-campos">
			<h4>Institución</h4>
			<h4>Matricula</h4>
			<h4>Grado</h4>
			<h4>Salón</h4>
			<h4>Turno</h4>
			<h4>Ciclo Escolar</h4>

            <h4>Tutor</h4>
		</div>

		<div class="span8">
			<h4><span class="my-perfil-datos"><?php echo $escuela[0]->nombre;?></span></h4>
			<h4><span class="my-perfil-datos"><?php echo $alumno[0]->matricula; ?></span></h4>
			<h4><span class="my-perfil-datos"><?php echo $grupo[0]->grado ?></span></h4>
			<h4><span class="my-perfil-datos"><?php echo $grupo[0]->salon; ?></span></h4>
			<h4><span class="my-perfil-datos"><?php echo $grupo[0]->turno; ?></span></h4>
			<h4><span class="my-perfil-datos"><?php echo $grupo[0]->ciclo_escolar; ?></span></h4>
			<h4><span class="my-perfil-datos"><?php echo $tutor[0]->nombre; ?></span></h4>
		</div>
	</div>
	
	</div>
</div>