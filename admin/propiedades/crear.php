<?php  
    //VERIFICA SI LA SESSION ESTA INICIADA SI NO PUES ENVIA A VALIDACION
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<?php
    require '../../includes/funciones.php';


// BASE DE DATOS
    require '../../includes/config/database.php';
    $db=conectarDB(); //conexion base de datos


    //CONSULTAR PARA OBTENER LOS PROGRAMAS ||  TIPO IDENTIFICACION
    $consulta = "SELECT * FROM programa";
    $consulta1 = "SELECT * FROM tipoidentificacion";
    $resultado = mysqli_query($db, $consulta);
    $resultado1 = mysqli_query($db, $consulta1);

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


        //mysqli_real_escape_string impide la inyeccion de datos, solo almacena y no permite que se ejecute sentencias sql. Este metodo se quita cuando este en POO por las sentencias preparadas

        $nombre = Mysqli_real_escape_string ( $db, $_POST ['nombre'] ); 
        $tipoId = mysqli_real_escape_string ($db, $_POST['tipoId'] );
        $identificacion = mysqli_real_escape_string ( $db, $_POST['identificacion'] );
        $programa = mysqli_real_escape_string( $db,  $_POST['programa'] );
        $email = mysqli_real_escape_string( $db, $_POST['email'] );
        $password = mysqli_real_escape_string( $db, $_POST['password'] );
        $telefono = mysqli_real_escape_string( $db, $_POST['telefono'] );
        $creacionaprendiz = date('y/m/d');

        //ENCRIPTAR CONTRASEÑA IMPORTANTE CAMBIAR LA VARIABLE $PASSWORD A $PASSWORDHASH EN EL QUERY INSERT INTO

        $passwordHash = password_hash($password, PASSWORD_DEFAULT );
        // var_dump( $passwordHash) ;

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
         if (!$programa){
            $errores[] = "* Elige un Programa";
         }
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
        if(empty($errores)){  //empty es la funcion que reviza los arreglos esten vacios
            //INSERTAR EN LA BASE DE DATOS
            $query = " INSERT INTO aprendiz (nombre, tipoId, identificacion, programa, email, password, telefono, creacionaprendiz) VALUES ('$nombre', '$tipoId', '$identificacion', '$programa', '$email', '$passwordHash', '$telefono' , '$creacionaprendiz')";

            //  echo $query;

            //ingreso a la base de datos despues de pasar todas las validaciones 
            $resultado = mysqli_query($db, $query);

            if($resultado){
                echo "Insertado Correctamente";
                //REDIRECCION DE USUARIO PARA EVITAR DUPLICAR DATOS

                header('Location: /login.php?resultado=1'); //header y la funcion Location/ se usa para redireccionar despues de la validacion de registro, Se debe utilizar poco y donde no este presente el HTML, crear la funcion antes de html para evitar errores.
            } 
        }

    }

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    <main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Crear cuenta aprendiz</h3>

                       <!-- mensaje de validacion complete los datos -->
                        <?php foreach($errores as $error): ?>  
                            <div class="alerta error">
                                <?php echo $error; ?>
                            </div>
                        <?php endforeach;?> 

                        <form class="formulario-aprendiz" method ="POST">
                            <div class="input-box">
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
                                     <option value="">*Seleccione identificación</option>
                                     <?php while ($tipoidentificacion = mysqli_fetch_assoc($resultado1)) : ?>
                                        <option <?php echo $tipoId === $tipoidentificacion ['idtipoId'] ? 'selected' : ''; ?>   value="<?php echo $tipoidentificacion ['idtipoId'] ?>"> <?php echo $tipoidentificacion ['tipoId'];?> </option>
                                     <?php endwhile; ?>
                                </select>
                            </div>
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
                                        <option value="">Seleccione Programa</option>
                                        <?php while ($tipoPrograma = mysqli_fetch_assoc($resultado)) :?>
                                           <option <?php echo $programa === $tipoPrograma ['idprograma'] ? 'selected' : ''; ?> value="<?php echo $tipoPrograma ['idprograma'] ?>"> <?php echo $tipoPrograma ['tipoPrograma'] ;?> </option>
                                        <?php endwhile;?> 
                                    <!-- <option value="">*Seleccione Programa</option>
                                    <option value="1">Programacion de Softmare</option>
                                    <option value="2">Sistemas</option>
                                    <option value="3">Soldadura</option>
                                    <option value="4">Bisuteria</option> -->
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
                                <input type="password" 
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
                            <p>Ya tienes una cuenta <a href="/login.php" class="gradient-text">Iniciar Sesion</a></p>
                        </div>
                    </div>
            </div>
                        <?php  if ($auth): ?>
                            <a href="/admin" class="boton-volver">  <!--necesita estilos-->
                                <span class="texto-fondo">Perfil</span>
                            </a>
                        <?php endif; ?>  

            
        </div>
    </main>


<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>