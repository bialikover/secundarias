
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
                <h1><?php echo mostrar_nombre($docente->usuarioId);?></h1>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12 my-sub-header-perfil">
                <h3>Datos Personales</h3>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4 my-perfil-campos">
                <h4>Dirección</h4>
                <h4>Teléfono</h4>
                <h4>Correo Electrónico</h4>

            </div>
            <div class="span8">
                <h4><span class="my-perfil-datos"><?php //echo $docente->direccion; ?></span></h4>
                <h4><span class="my-perfil-datos"><?php echo $docente->telefono; ?></span></h4>
                <h4><span class="my-perfil-datos"><?php echo $docente->email; ?></span></h4>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12 my-sub-header-perfil">
                <h3>Datos Académicos</h3>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span4 my-perfil-campos">
                
                <h4>Matricula</h4>
                <h4>Materias</h4>
                 <h4>
                        <span class="my-perfil-datos">
                        <?php foreach ($materias as $materia):?>                    
                            <?php echo $materia->materia;?>                    
                        <?php endforeach;?>                
                        </span>
                    </h4>                

                
                <h4>Especialidad</h4>
            </div>

            <div class="span8">
                 
                <h4><span class="my-perfil-datos"><?php echo $docente->matricula; ?></span></h4>

                <h4><span class="my-perfil-datos"><?php echo $docente->especialidad; ?></span></h4>
            </div>
        </div>

    </div>
</div><!--=========================-->