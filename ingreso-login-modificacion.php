

<?php
    //importar la base de datos
    require 'includes/config/database.php';
    $db = conectarDB();

    //VARIABLE DE FORMA GLOBAL PARA DETECTAR ERRORES
    $errores = [];

    //AUTENTICAR EL USUARIO
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // echo "<pre>";
            // var_dump ($_POST);
            // echo "<!pre>";

        $email = mysqli_real_escape_string ($db, filter_Var( $_POST['email'], FILTER_VALIDATE_EMAIL));  //filter validate nos valida si es un email valido

        //  var_dump($email);Validacion de que este tomando el ingreso de email

        $password = mysqli_real_escape_string ($db, $_POST ['password']);

        if (!$email){
            $errores[] = "El Email es obligatorio o no es válido";
        }
        if(!$password){
            $errores[] = "El Password es obligatorio";
        }

        if(empty($errores)){

            //REVISAR SI EL USUARIO EXISTE
            $query = "SELECT * FROM aprendiz WHERE email = '$email'";
            $resultado = mysqli_query ($db, $query);
            // var_dump($resultado);

            if ($resultado->num_rows){

            }else{
                $errores [] = "El Aprendiz no existe";
            }


        }
        //ver los errores
        //   echo "<pre>";
        //   var_dump($errores);
        //   echo "<!pre>";

    }




    // CONFIRMACION DE USUARIOS CREACION Y ACTUALIZACION
    $resultado = $_GET ['resultado'] ?? null; //envia el mensaje de creacion de usuario
    $resultado3 =$_GET ['resultado3'] ?? null; //envia el mensaje de actualizacion de usuario

    //INCLUIR UN TEMPLATE HEADER
    require 'includes/funciones.php';
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>

    <main>

       <!-- impirme el mensaje de registro correctamente-->

       <?php if( intval ($resultado) === 1) : ?> <!--convertir el valor string a numerico-->
            <p class="alerta exito"> Usuario Creado Correctamente </p>
            <?php elseif( intval ($resultado3) === 2) : ?>
            <p class="alerta exito"> Usuario Actualizado Correctamente </p>
        <?php endif?>



    <div class="contenerdor_formulario">
        <div class="formulario">
            <div class="cuadro">
                <h3>Plataforma de ingreso</h3>

                    <!-- varificacion de errores al ingresar -->

                    <?php foreach ($errores as $error): ?>
                        <div class="alerta error">
                            <?php echo $error; ?>
                        </div>
                    <?php endforeach; ?>


                <form method = "POST"  action=""> <!-- En el action puedo colocar donde quiero enviar los datos pero si no lo hago lo enviara al mismo archivo -->
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email" id="email" class="input-control" > <!-- required es para activar las validaciones de html5 -->
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" id="password"  class="input-control" ><!-- required es para activar las validaciones de html5 -->
                    </div>

                    <button type="submit" class="boton">Iniciar Sesión</button>
                </form>


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
    <script src="/build/js/app.js"></script>




</body>
</html>