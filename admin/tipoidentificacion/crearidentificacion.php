<?php
    require '../../includes/app.php'; 
    use App\Tipoidentificacion;
    $tipoidentificacion = new tipoidentificacion;

    //CONSULTAR PARA OBTENER LOS TIPOS DE IDENTIFICACION
    // $tipoidentificacion = Tipoidentificacion::all();
    // $tipoprogramas = programa::all();

    //ARREGLO CON MENSAJES DE ERROR
   $errores = tipoidentificacion::getErrores();

    //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $aprendiz = new tipoidentificacion($_POST['tipoidentificacion']);
        $errores = $aprendiz->validar();

        //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
        if(empty($errores)){  
            //GUARDAR EN LA BD
        $aprendiz->guardar();
        }

    }

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    <main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Crear Tipo Identificacion</h3>

                       <!-- mensaje de validacion complete los datos -->
                        <?php foreach($errores as $error): ?>  
                            <div class="alerta error">
                                <?php echo $error; ?>
                            </div>
                        <?php endforeach;?> 

                        <form class="formulario-aprendiz" method ="POST">
                            <?php include '../../includes/templates/formulario_identificacion.php' ?>
                            <button type="submit" class="boton">Crear Nueva Identificacion</button>
                        </form>

                        <div class="clic-boton">
                            <p>Ya tienes una cuenta <a href="/login.php" class="gradient-text">Iniciar Sesion</a></p>
                        </div>
                    </div>
            </div>
        </div>
         <!-- boton Volver -->
         <a href="/admin" class="boton-volver"> 
            <span class="texto-fondo">Volver</span>
         </a>
    </main>


<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>