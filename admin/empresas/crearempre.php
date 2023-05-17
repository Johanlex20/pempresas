<?php
    require '../../includes/app.php'; 
    use App\programa;
    use App\Empresas;
    use App\Tipoidentificacion;
    use Intervention\Image\ImageManagerStatic as Image;

    //CONSULTAR PARA OBTENER LOS TIPOS DE IDENTIFICACION
    $tipoidentificacion = Tipoidentificacion::all();
    $tipoprogramas = programa::all();
    $empresa = Empresas::all();

    //CREAR UNA NUEVA INSTANCIA VACIA
    $empresa = new Empresas;

    //ARREGLO CON MENSAJES DE ERROR
    $errores = Empresas::getErrores();

    //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //CREAR UNA NUEVA ISNTANCIA
        $empresa = new Empresas($_POST['empresas']);

        //GENERAR UN NOMBRE UNICO
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        if($_FILES['empresas']['tmp_name']['imagen']){
        //SETEAR LA IMAGEN
        $image = Image::make($_FILES['empresas']['tmp_name']['imagen'])->fit(800, 600);
        $empresa->setImagen($nombreImagen);
        }

         //VALIDAR
         $errores = $empresa->validar();

        if(empty($errores)){ 
            
        //CREAR CARPETA
        $carpetaImagenes = '../../src/img/'; 
        if(!is_dir(CARPETA_IMAGENES)){
            mkdir(CARPETA_IMAGENES);
        }
            //GUARDAR LA IMAGEN EN EL SERVIDOR
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            //GUARDAR EN LA BD
           $empresa->guardar();     
        }
      

    }

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    <main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Crear cuenta Empresa</h3>

                       <!-- mensaje de validacion complete los datos -->
                        <?php foreach($errores as $error): ?>  
                            <div class="alerta error">
                                <?php echo $error; ?>
                            </div>
                        <?php endforeach;?> 

                        <form class="formulario-oferta" method ="POST" action="/admin/empresas/crearempre.php" enctype="multipart/form-data">
                            <?php include '../../includes/templates/formulario_empresas.php' ?>
                            <button type="submit" class="boton">Crear Cuenta</button>
                        </form>

                        <div class="clic-boton">
                            <p>Ya tienes una cuenta <a href="/login.php" class="gradient-text">Iniciar Sesion</a></p>
                        </div>
                    </div>
            </div>
        </div>
    </main>


<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>