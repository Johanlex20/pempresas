
<?php

    require 'includes/app.php';


    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    
    <main>
    <div class="contenerdor_formulario">
        <div class="formulario">
            <div class="cuadro">
                <h3>Contraseña Olvidada</h3>
                <form action="">
                    <div class="input-box">
                            <input type="text" placeholder="Ingresé numero de identificación" class="input-control">
                </form>
                    <button type="submit" class="boton">Enviar enlace</button>
                
                <div class="clic-boton">
                    <p>¿No tienes una cuenta? <a href="eleccion-registro-modificacion.php" class="gradient-text">Crear cuenta</a></p>
                </div>
            </div>
        </div>
    </div>
    </main>
    <script src="/src/js/app.js"></script>
</body>
</html>