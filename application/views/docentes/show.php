<div class="my-perfil-container">


    <div class="container-fluid">
        <div class="row-fluid"> 
            <div class="span12 my-header-perfil">
                <h4>Perfil de Docente</h4>
            </div>
        </div>

        <div class="row-fluid"> 
            <div class="span3">
                <div class="my-foto">
                    <img src="<?php echo base_url(); ?>/assets/img/user1.png">
                </div>
            </div>
            <div class="span9">
                <h1><?php echo $docente->nombre . ' ' . $docente->apellido_pat . ' ' . $docente->apellido_mat; ?></h1>
            </div>
        </div>
        <!--================================================================-->
        <div class="row-fluid">
            <div class="span12 my-sub-header-perfil">
                <h3>Datos Personales</h3>
            </div>
        </div>
        <!--================================================================-->
        <div class="row-fluid">
            <div class="span4 my-perfil-campos">
                <h4>Dirección</h4>
                <h4>Teléfono</h4>
                <h4>Correo Electrónico</h4>

            </div>
            <div class="span8">
                <h4><span class="my-perfil-datos"><?php echo $docente->direccion; ?></span></h4>
                <h4><span class="my-perfil-datos"><?php echo $docente->telefono; ?></span></h4>
                <h4><span class="my-perfil-datos"><?php echo $docente->correo; ?></span></h4>
            </div>
        </div>
        <!--================================================================-->
        <div class="row-floud">
            <div class="span12 my-sub-header-perfil">
                <h3>Datos Académicos</h3>
            </div>
        </div>

        <div class="row-floud">
            <div class="span4 my-perfil-campos">
                <h4>Institución</h4>
                <h4>Matricula</h4>
                <h4>Materias</h4>
                <h4>Especialidad</h4>
            </div>

            <div class="span8">
                <h4><span class="my-perfil-datos"><?php echo $escuela->nombre; ?></span></h4>
                <h4><span class="my-perfil-datos"><?php echo $docente->matricula; ?></span></h4>
                <h4><span class="my-perfil-datos">
                        <?php
                        for ($i = 0; $i < count($materias) - 1; $i++) {
                            echo $materias[$i]->nombre . " - ";
                        }
                        echo $materias[count($materias)-1]->nombre;
                        ?>
                    </span></h4>
                <h4><span class="my-perfil-datos"><?php echo $docente->especialidad; ?></span></h4>
            </div>
        </div>

    </div>
</div><!--=========================-->