<?php
// BASE DE DATOS
    require '../../includes/config/database.php';
    $db=conectarDB(); //conexion base de datos


    //CONSULTAR PARA OBTENER LOS PROGRAMAS
    $consulta = "SELECT * FROM programa";
    $resultado = mysqli_query($db, $consulta);


    //ARREGLO CON MENSAJES DE ERROR
   $errores = [];

   $nombre = '';
   $tipoId = '';
   $identificacion = '';
   $programa = '';
   $email = '';
   $password = '';
   $telefono = '';

    //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
    if($_SERVER['REQUEST_METHOD']==='POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $nombre = $_POST['nombre'];
        $tipoId =  $_POST['tipoId'];
        $identificacion = $_POST['identificacion'];
        $programa =  $_POST['programa'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $telefono = $_POST['telefono'];

        //VALIDACION CON ARREGLO

        if (!$nombre){
             $errores[] = "* Debes añadir un Nombre";
        }
        if (!$tipoId){
            $errores[] = "* Elige un tipo de Identificacion";
        }
        if (!$identificacion){
            $errores[] = "* Debes añadir un Numero de Identificacion";
        }
        // if (!$programa){
        //     $errores[] = "* Elige un Programa";
        // }
        if (!$email){
            $errores[] = "* Debes añadir un Correo";
        }
        if (!$password){
            $errores[] = "* Debes añadir una Contraseña";
        }
        if (!$telefono){
            $errores[] = "* Debes añadir un Telefono";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";
       
        //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
        if(empty($errores)){
            //INSERTAR EN LA BASE DE DATOS
            $query = " INSERT INTO aprendiz (nombre, identificacion, email, password, telefono) VALUES ('$nombre', '$identificacion', '$email', '$password', '$telefono')";

            // echo $query;
            $resultado = mysqli_query($db, $query);

            if($resultado){
                echo "Insertado Correctamente";
            } 
        }

    }

    require '../../includes/funciones.php';
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    <main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Crear una cuenta aprendiz</h3>

                       <!-- mensaje de validacon complete los datos -->
                        <?php foreach($errores as $error): ?>  
                            <div class="alerta error">
                                <?php echo $error; ?>
                            </div>
                        <?php endforeach;?> 

                        <form class="formulario-aprendiz" method ="POST" action="/admin/propiedades/crear.php">
                            <div class="input-box">
                            <!-- <label for="nombre">Nombre Completo:</label> -->
                                <input type="text" 
                                id="nombre" 
                                name="nombre" 
                                placeholder="*Nombre usuario Completo" 
                                value="<?php echo $nombre; ?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <select type="text" 
                                id="tipoId" 
                                name="tipoId" 
                                value="<?php echo $tipoId; ?>"  
                                class="input-control">
                                    <option value="">*Seleccione identificacion</option>
                                    <option value="1">Cedula de Ciudadania</option>
                                    <option value="2">Tarjeta Identidad</option>
                                    <option value="3">Cedula de Extrangeria</option>
                                    <option value="4">Registro civil</option>
                                </select>
                            </div>
                            <!-- <div class="input-box">
                                <input type="text" placeholder="Tipo identificación" class="input-control">
                            </div> -->
                            <div class="input-box">
                                <input type="number" 
                                id="identificacion" 
                                name="identificacion"  
                                placeholder="*Identificación" 
                                value="<?php echo $identificacion;?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <select type="text" 
                                id="programa" 
                                name="programa" 
                                value="<?php echo $programa;?>" 
                                class="input-control">
                                    <option value="">*Seleccione programa</option>
                                    <?php while($programa = mysqli_fetch_assoc($resultado)) : ?>
                                        <option value=""> <?php echo $programa ['idPrograma'] . " " . $programa['nombrePrograma'];?> </option>
                                     <?php endwhile; ?>   

                                </select>
                            </div>
                            <div class="input-box">
                                <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                placeholder="*Email" 
                                value="<?php echo $email;?>" 
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="text" 
                                id="password" 
                                name="password" 
                                placeholder="*Password" 
                                value="<?php echo $password;?>"  
                                class="input-control">
                            </div>
                            <div class="input-box">
                                <input type="number" 
                                id="telefono" 
                                name="telefono" 
                                placeholder="*telefono" 
                                value="<?php echo $telefono;?>"  
                                class="input-control">
                            </div>
                            <button type="submit" class="boton">Crear Cuenta</button>
                          
                        </form>

                        <div class="clic-boton">
                            <p>Ya tienes una cuenta <a href="ingreso-login-modificacion.html" class="gradient-text">Iniciar Sesion</a></p>
                        </div>
                    </div>
            </div>

            <a href="/admin" class="boton-volver">  <!--necesita estilos-->
                <span class="texto-fondo">Volver</span>
            </a>
        </div>
    </main>


<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>