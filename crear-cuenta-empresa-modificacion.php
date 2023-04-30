
<?php

    require 'includes/funciones.php';

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    
    <main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Crear una cuenta Empresa</h3>
                        <form action="">
                            <div class="input-box">
                                <input type="text" placeholder="Razón social" class="input-control">
                            </div>
                             <div class="input-box">
                                <input type="NIT" placeholder="NIT" class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="actividad econimica" placeholder="Actividad económica" class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="direccion" placeholder="Dirección" class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="telefono" placeholder="teléfono" class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="email" placeholder="Email" class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="password" placeholder="Password" class="input-control">
                            </div>
                            <button type="submit" class="boton">Crear Cuenta</button>
                        </form>
                        <div class="clic-boton">
                            <p>Ya tienes una cuenta <a href="ingreso-login-modificacion.php" class="gradient-text">Iniciar Sesión</a></p>
                        </div>
                    </div>
            </div>
        </div>
    </main>
    <script src="/build/js/app.js"> </script>
</body>
</html>