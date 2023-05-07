

<?php
    require '../../includes/app.php'; //ruta especifica para llamar funciones se guardan todas hay
    // estaAutenticado(); // funcion de autenticacion en includes
    //CREACION DE OBJETO APRENDIZ POO
    use App\aprendiz;
    $aprendiz = new aprendiz;

     

    //CONSULTAR PARA OBTENER LOS PROGRAMAS ||  TIPO IDENTIFICACION
    $consulta = "SELECT * FROM programa";
    $consulta1 = "SELECT * FROM tipoidentificacion";
    $resultado = mysqli_query($db, $consulta);
    $resultado1 = mysqli_query($db, $consulta1);

    //ARREGLO CON MENSAJES DE ERROR
   $errores = aprendiz::getErrores();

//    $nombre = '';
//    $tipoId = '';
//    $identificacion = '';
//    $programa = '';
//    $email = '';
//    $password = '';
//    $telefono = '';

    //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
    if($_SERVER['REQUEST_METHOD']==='POST'){

        $aprendiz = new aprendiz($_POST);
        $errores = $aprendiz->validar();
        
        //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
        if(empty($errores)){  
            //GUARDAR EN LA BD
            $resultado = $aprendiz->guardar();

            //MENSAJE DE EXITO O DE ERROR
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
                            <?php include '../../includes/templates/formulario_aprendiz.php' ?>
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