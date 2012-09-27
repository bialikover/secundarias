<div id="login_form">
        <form action="<?php echo base_url();?>index.php/login/process" method="post" name="process">
            <h2>Agendar Actividad</h2>
            <br />            

            <label for="titulo">Titulo de la actividad</label>
            <input type="text" name='matricula' id='matricula' size="25" /><br />
         
            <label for="fecha">Fecha</label>
            <input type="text" name="fecha" id='password' size="25" /><br />     

            <label for="descripcion">Descripcion</label>
            <textarea name='descripcion' id='descripcion'></textarea>
         <br />
            <input type="Submit" value="Ingresar" />         
        </form>
    </div>