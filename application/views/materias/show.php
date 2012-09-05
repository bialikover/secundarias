<div class="my-perfil-container">


    <div class="container-fluid">
        <div class="row-fluid"> 
            <div class="span12 my-header-perfil">
                <h4>Información de la Matería</h4>
            </div>
        </div>

        <div class="row-fluid"> 
            <div class="span3">
                <div class="my-foto">
                    <img src="<?php echo base_url(); ?>/assets/img/user1.png">
                </div>
            </div>
            <div class="span9">
                <h1><?php echo $materia->nombre; ?></h1>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12 my-sub-header-perfil">
                <h3>Datos de la Matería</h3>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4 my-perfil-campos">
                <h4>Grado</h4>
                <h4>Matrícula</h4>
                <h4>Estado</h4>

            </div>
            <div class="span8">
                <h4><span class="my-perfil-datos"><?php echo $materia->grado; ?></span></h4>
                <h4><span class="my-perfil-datos"><?php echo $materia->matricula; ?></span></h4>
                <h4><span class="my-perfil-datos"><?php echo $materia->active; ?></span></h4>
            </div>
        </div>

    </div>
</div>