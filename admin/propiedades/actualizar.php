<?php

use App\aprendiz;

    require '../../includes/app.php';
    estaAutenticado(); // funcion de autenticacion en includes

    //Validar la URL por ID válido
    $id=$_GET['id'];
    $id= filter_Var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    //CONSULTA PARA OBTENER LOS DATOS DEL APRENDIZ
    $aprendiz = aprendiz::find ($id);

    // $consulta2 ="SELECT * FROM aprendiz WHERE id = $id";
    // $resultado2 = mysqli_query($db, $consulta2);
    // $usuario = mysqli_fetch_assoc($resultado2);
    //CONSULTAR PARA OBTENER LOS PROGRAMAS ||  TIPO IDENTIFICACION
    $consulta = "SELECT * FROM programa";
    $consulta1 = "SELECT * FROM tipoidentificacion";
    $resultado = mysqli_query($db, $consulta);
    $resultado1 = mysqli_query($db, $consulta1);

    //ARREGLO CON MENSAJES DE ERROR
   $errores = [];

 
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

                         <form class="formulario-aprendiz" method ="POST"> 
                            <?php include '../../includes/templates/formulario_aprendiz.php'; ?>
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