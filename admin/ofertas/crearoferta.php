<?php
    require '../../includes/app.php'; 
    use App\programa;
    use App\ofertas;
    use App\Tipoidentificacion;
    use Intervention\Image\ImageManagerStatic as Image;
    estaAutenticado();
   
    
     $tipoidentificacion = Tipoidentificacion::all();
     $tipoprogramas = programa::all();
     $oferta = ofertas::all();
 
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

        if($_FILES['ofertas']['tmp_name']['imagen']){
        //SETEAR LA IMAGEN
        $image = Image::make($_FILES['ofertas']['tmp_name']['imagen'])->fit(800, 600);
        $oferta->setImagen($nombreImagen);
        }

         //VALIDAR
         $errores = $oferta->validar();

        if(empty($errores)){ 
            
        //CREAR CARPETA
        $carpetaImagenes = '../../src/img/'; 
        if(!is_dir(CARPETA_IMAGENES)){
            mkdir(CARPETA_IMAGENES);
        }
            //GUARDAR LA IMAGEN EN EL SERVIDOR
            $image->save(CARPETA_IMAGENES . $nombreImagen);

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