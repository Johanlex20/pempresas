<?php  
    //VERIFICA SI LA SESSION ESTA INICIADA SI NO PUES ENVIA A VALIDACION
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>


<div class="barra">
     <p>BIENVENIDO <span><?php echo $_SESSION['nombre'];?></span></p> <!--pendiente revizar la variable para poner el nombre de usuario al ingreso de perfil -->


    <?php  if ($auth): ?>
        <div class="clic-boton">
            <a href="cerrar-sesion.php" >Cerrar Sesión</a>
        </div>
    <?php endif; ?>
</div>

