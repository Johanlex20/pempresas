<?php
    require '../../includes/app.php';
    $auth = estaAutenticado(); // funcion de autenticacion en includes

    if(!$auth){
            header('Location: /'); // ruta que envia a la pagina de inicio 
    }


    //Validar la URL por ID válido
    $id=$_GET['id'];
    $id= filter_Var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    // BASE DE DATOS
    // require '../../includes/config/database.php'; // require '../../includes/config/database.php'; POO no es necesario requerir la bd ya que app funiones tiene el metodo de ruteo importante verificar que el requiere includes/ app.php este bin dirijido 
    $db=conectarDB(); //conexion base de datos

    //CONSULTA PARA OBTENER LOS DATOS DEL APRENDIZ
    $consulta2 ="SELECT * FROM aprendiz WHERE id = $id";
    $resultado2 = mysqli_query($db, $consulta2);
    $usuario = mysqli_fetch_assoc($resultado2);

    // echo "<pre>";
    // var_dump($usuario);
    // echo "</pre>";


    //CONSULTAR PARA OBTENER LOS PROGRAMAS ||  TIPO IDENTIFICACION
    $consulta = "SELECT * FROM programa";
    $consulta1 = "SELECT * FROM tipoidentificacion";
    $resultado = mysqli_query($db, $consulta);
    $resultado1 = mysqli_query($db, $consulta1);

    //ARREGLO CON MENSAJES DE ERROR
   $errores = [];

   $nombre = $usuario ['nombre'];
   $tipoId = $usuario ['tipoId'];
   $identificacion = $usuario ['identificacion'];
   $programa = $usuario ['programa'];
   $email = $usuario ['email'];
   $password = $usuario ['password'];
   $telefono = $usuario ['telefono'];

    //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
    if($_SERVER['REQUEST_METHOD']==='POST'){
        

        //mysqli_real_escape_string impide la inyeccion de datos, solo almacena y no permite que se ejecute sentencias sql. Este metodo se quita cuando este en POO por las sentencias preparadas

        $nombre = Mysqli_real_escape_string ( $db, $_POST ['nombre'] ); 
        $tipoId = mysqli_real_escape_string ($db, $_POST['tipoId'] );
        $identificacion = mysqli_real_escape_string ( $db, $_POST['identificacion'] );
        $programa = mysqli_real_escape_string( $db,  $_POST['programa'] );
        $email = mysqli_real_escape_string( $db, $_POST['email'] );
        $password = mysqli_real_escape_string( $db, $_POST['password'] );
        $telefono = mysqli_real_escape_string( $db, $_POST['telefono'] );
        $creacionaprendiz = date('y/m/d');

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
            
            //ACTUALIZAR DATOS EN LA BASE DE DATOS
            $query = " UPDATE aprendiz SET nombre = '$nombre', tipoId = '$tipoId', identificacion = $identificacion, programa='$programa', email='$email', password='$password', telefono=$telefono WHERE id= $id";

            // echo $query;  activar este query es para comprobar la funion de la sentencia sql update
            

            $resultado3 = mysqli_query($db, $query);

            if($resultado3){
                echo "Actualizado Correctamente";
                //REDIRECCION DE USUARIO PARA EVITAR DUPLICAR DATOS

                header('Location: /admin?resultado3=2'); //header y la funcion Location/ se usa para redireccionar despues de la validacion de registro, Se debe utilizar poco y donde no este presente el HTML, crear la funcion antes de html para evitar errores.
            } 
        }

    }

    
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    <main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Actualizar aprendiz</h3>

                       <!-- mensaje de validacion complete los datos -->
                        <?php foreach($errores as $error): ?>  
                            <div class="alerta error">
                                <?php echo $error; ?>
                            </div>
                        <?php endforeach;?> 

                         <form class="formulario-aprendiz" method ="POST"> <!-- action="/admin/propiedades/actualizar.php" -->
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
                                     <option value="">*Seleccione identificación</option>

                                     <?php while ($tipoidentificacion = mysqli_fetch_assoc($resultado1)) : ?>

                                        <option <?php echo $tipoId === $tipoidentificacion ['idtipoId'] ? 'selected' : ''; ?>   value="<?php echo $tipoidentificacion ['idtipoId'] ?>"> <?php echo $tipoidentificacion ['tipoId'];?> </option>

                                     <?php endwhile; ?>
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
                                    <option value="">*Seleccione Programa</option>
                                    <option value="1">Programacion de Softmare</option>
                                    <option value="2">Sistemas</option>
                                    <option value="3">Soldadura</option>
                                    <option value="4">Bisuteria</option>
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
                            <button type="submit" class="boton">Actualizar Aprendiz</button>
                          
                        </form>

                        <div class="clic-boton">
                            <p>Ya tienes una cuenta <a href="/login.php" class="gradient-text">Iniciar Sesion</a></p>
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