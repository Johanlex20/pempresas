
<?php
    require 'includes/funciones.php';

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    
    <main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Crear una cuenta aprendiz</h3>
                        <form action="">
                            <div class="input-box">
                                <input type="text" placeholder="Nombre Completo" class="input-control">
                            </div>
                            <!-- <div class="input-box">
                                <input type="text" placeholder="Tipo identificación" class="input-control">
                            </div> -->
                            <div class="input-box">
                                <input type="text" placeholder="Identificación" class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="Programa o especialidad" placeholder="Programa o especialidad" class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="text" placeholder="Email" class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="password" placeholder="Password" class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="telefono" placeholder="telefono" class="input-control">
                            </div>
                            <button type="submit" class="boton">Crear Cuenta</button>
                        </form>
                        <div class="clic-boton">
                            <p>Ya tienes una cuenta <a href="ingreso-login-modificacion.php" class="gradient-text">Iniciar Sesion</a></p>
                        </div>
                    </div>
            </div>
        </div>
    </main>
    <script src="/build/js/app.js"> </script>
</body>
</html>