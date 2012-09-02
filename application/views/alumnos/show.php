<div class="my-perfil-container">
	<div class="my-header1-perfil">
		<h1>Perfil de Alumno</h1>
	</div>
<div class="my-nombre">
	<div class="my-foto">
	</div>
	<div class="my-div-container"></div>
	<h2>&nbsp; <?php echo $alumno[0]->nombre.' '.$alumno[0]->apellido_pat.' '.$alumno[0]->apellido_mat; ?></h2>
</div>

	<div class="my-header2-perfil">
		<h3>Datos Personales</h3>
	</div>
	<div>
		<div class="my-perfil-campos">

		<h4>
			Fecha de Nacimiento
		</h4>
		<h4>
			Genero
		</h4>
		<h4>
			CURP
		</h4>
		<h4>
			Dirección
		</h4>
		<h4>
			Telefono
		</h4>
		<h4>
			Correo Electronico
		</h4>

		</div>
		<hr>
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->fecha_nacimiento; ?></span></h4>
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->genero; ?></h4>
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->curp ?></h4>
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->direccion; ?></h4>
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->telefono; ?></h4>
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->correo_electronico; ?></h4>

	</div>

	<div class="my-header2-perfil">
		<h3>Datos Academicos</h3>
	</div>

	<div>
		<div class="my-perfil-campos">
		<h4>
			Institución
		</h4>
		<h4>
			Matricula
		</h4>
		<h4>
			Grado
		</h4>
		<h4>
			Salon
		</h4>
		<h4>
			Turno
		</h4>
		<h4>
			Ciclo Escolar
		</h4>
	</div>
		<hr>
		<h4><span class="my-perfil-datos"><?php echo $escuela[0]->nombre;?></span></h4>
		<h4><span class="my-perfil-datos"><?php echo $alumno[0]->matricula; ?></h4>
		<h4><span class="my-perfil-datos"><?php echo $grupo[0]->grado ?></h4>
		<h4><span class="my-perfil-datos"><?php echo $grupo[0]->salon; ?></h4>
		<h4><span class="my-perfil-datos"><?php echo $grupo[0]->turno; ?></h4>
		<h4><span class="my-perfil-datos"><?php echo $grupo[0]->ciclo_escolar; ?></h4>

	</div>
	
</div>