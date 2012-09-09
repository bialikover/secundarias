<div id="login_form">
        <form action="<?php echo base_url();?>index.php/login/process" method="post" name="process">
            <h2>Inicio de Sesión</h2>
            <br />            
            <?php if(! is_null($msg)) echo $msg;?> 
            <label for="usuario">Usuario</label>
            <input type="text" name='usuario' id='usuario' size="25" /><br />
         
            <label for="password">Contraseña</label>
            <input type="password" name="password" id='password' size="25" /><br />                         
         
            <input type="Submit" value="Ingresar" />         
        </form>
    </div>