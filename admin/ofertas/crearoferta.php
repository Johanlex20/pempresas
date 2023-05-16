<?php
    require '../../includes/app.php'; 
    use App\programa;
    use App\ofertas;
    use App\Tipoidentificacion;
    use Intervention\Image\ImageManagerStatic as image;
    estaAutenticado();
   
    //CONSULTAR PARA OBTENER LOS TIPOS DE IDENTIFICACION
     $tipoidentificacion = Tipoidentificacion::all();
     $tipoprogramas = programa::all();
 
    //CREAR UNA NUEVA INSTANCIA VACIA
    $oferta = new ofertas;
    
    //ARREGLO CON MENSAJES DE ERROR
    $errores = ofertas::getErrores();


    //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //CREAR UNA NUEVA ISNTANCIA
        $oferta = new ofertas($_POST['ofertas']);


        //GENERAR UN NOMBRE UNICO
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

       

        //SETEAR LA IMAGEN
        if($_FILES['oferta']['tmp_name']['imagen']){
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
            $oferta->setImagen($nombreImagen);
        }

         //VALIDAR
         $errores = $oferta->validar();

        if(empty($errores)){  
            if($_FILES['imagen']['tmp_name']){
                //GUARDA LA IMAGEN EN EL SERVIDOR
                $image->save(CARPETAS_IMAGENES . $nombreImagen);
            }
        //GUARDAR EN LA BD
        $oferta->guardar();

        }
    }

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    <main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Información de la Oferta</h3>

                       <!-- mensaje de validacion complete los datos -->
                        <?php foreach($errores as $error): ?>  
                            <div class="alerta error">
                                <?php echo $error; ?>
                            </div>
                        <?php endforeach;?> 

                        <form class="formulario-oferta" method ="POST" action="/admin/ofertas/crearoferta.php" enctype="multipart/form-data">
                            <?php include '../../includes/templates/formulario_ofertas.php' ?>
                            <button type="submit" class="boton">Publicar Oferta</button>
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