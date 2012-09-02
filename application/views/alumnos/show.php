<div class="my-perfil-container">
	<div class="my-header1-perfil">
		<h1>Perfil de Alumno</h1>
	</div>
<div class="my-nombre">
	<div class="my-foto">
	</div>
	<div class="my-div-container"></div>
	<h2><?php echo $alumno[0]->nombre.' '.$alumno[0]->apellido_pat.' '.$alumno[0]->apellido_mat; ?></h2>
</div>

	<div class="my-header2-perfil">
		<h3>Datos Personales</h3>
	</div>
	<div>
		<h4>
			Fecha de Nacimiento: <span class="my-perfil-datos"><?php echo $alumno[0]->fecha_nacimiento; ?></span>
		</h4>
		<h4>
			Genero: <h5><h5>
		</h4>
		<h4>
			CURP: <h5><h5>
		</h4>
		<h4>
			Dirección: <h5><h5>
		</h4>
		<h4>
			Telefono: <h5><h5>
		</h4>
		<h4>
			Correo Electronico: <h5><h5>
		</h4>

	</div>

	<div class="my-header2-perfil">
		<h3>Datos Academicos</h3>
	</div>

	<div>
		<h4>
			Institución: <h5><h5>
		</h4>
		<h4>
			Matricula: <span class="my-perfil-datos"><?php echo $alumno[0]->matricula; ?></span>
		</h4>
		<h4>
			Grado: <h5><h5>
		</h4>
		<h4>
			Salon: <h5><h5>
		</h4>
		<h4>
			Turno: <h5><h5>
		</h4>
		<h4>
			Ciclo Escolar: <h5><h5>
		</h4>
		
	</div>
	
</div>