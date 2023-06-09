<?php
    require 'includes/app.php';
 
    //AUTENTICAR EL USUARIO

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "<!pre>";

        $email = mysqli_real_escape_string ($db, filter_var($_POST ['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST ['password']);


        if(!$email){
            $errores[] = "El Email es obligatorio o no es válido";   
        }

        if(!$password){
            $errores[]= "El Password es obligatorio";
        }

        if (empty($errores)){
            //REVISAR SI EL USUARIO EXISTE
            $query = "SELECT * FROM aprendiz WHERE email = '$email'";
            $resultado = mysqli_query($db, $query);
            

            if( $resultado->num_rows){
                // REVISAR SI EL PASSWORD ES CORRECTO
                $usuario = mysqli_fetch_assoc($resultado);

                // VERIFICAR SI EL PASSWORD ES CORRECTO 
                $auth = password_verify($password, $usuario['password']);

                if($auth){
                    //EL USUARIO ESTA AUTENTICADO
                    session_start();

                    //LLENAR EL ARREGLO DE LA SESIÓN

                    $_SESSION ['usuario'] = $usuario ['email'] ; //en esta area puedo poner lo que quiera visualizar tambien puedo poner los roles
                    $_SESSION ['login'] = true;

                    header('Location: /admin');   //Redirecionar a admin si el login es valido, se puede cambiar la ruta segun el rol 

                    // echo "<pre>";
                    // var_dump($_SESSION);      //SESION ES UNA SUPER GLOBAL
                    // echo "<!pre>";

                }else{
                    // EL USUARIO ESTA INCORRECTO
                    $errores[]='El password es incorrecto';
                }
            }else{
                $errores[] = "El Usuario no existe"; 
            }
        }
    }


        // CONFIRMACION DE USUARIOS CREACION Y ACTUALIZACION
         $resultado = $_GET ['resultado'] ?? null; //envia el mensaje de creacion de usuario
         $resultado3 =$_GET ['resultado3'] ?? null; //envia el mensaje de actualizacion de usuario


    //INCLUIR UN TEMPLATE HEADER
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>

    <main>
           <!-- impirme el mensaje de registro correctamente-->

           <?php if( intval ($resultado) === 1) : ?> <!--convertir el valor string a numerico-->
            <p class="alerta exito"> Creado Correctamente </p>
            <?php elseif( intval ($resultado3) === 2) : ?>
            <p class="alerta exito"> Actualizado Correctamente </p>
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