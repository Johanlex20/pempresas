
<?php
    require 'includes/funciones.php';

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>

    <main>
    <div class="contenerdor_formulario">
        <div class="formulario">
            <div class="cuadro">
                <h3>Plataforma de ingreso</h3>
                <form action="">
                    <div class="input-box">
                        <input type="text" placeholder="Email" class="input-control">
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="Password" class="input-control">
                    </div>
                </form>
                    <button type="submit" class="boton">Iniciar Sesión</button>

                <div class="clic-boton">
                    <div class="input-link">
                        <a href="recuperar-contraseña-modificacion.php" class="gradient-text">Olvido su contraseña</a>
                    </div>
                    <p>¿No tienes una cuenta? <a href="eleccion-registro-modificacion.php" class="gradient-text">Crear cuenta</a></p>
                </div>
            </div>
        </div>
    </div>
    </main>
    <script src="js/script.js"></script>



 
</body>
</html>