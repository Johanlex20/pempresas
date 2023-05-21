<?php
    use App\ofertas;
    use App\programa;
    use Intervention\Image\ImageManagerStatic as Image;
    require '../../includes/app.php';
    estaAutenticado(); // funcion de autenticacion en includes
    
    //CONSULTAR PARA OBTENER LOS TIPOS DE Registro
    $tipoprogramas = programa::all();
    $oferta = ofertas::all();

    //Validar la URL por ID válido
    $id=$_GET['id'];
    $id= filter_Var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    // OBTENER EL ARREGLO DEL LOS OFERTAS SOLO PUEDE IR EL OBJETO DE LA BUSQUEDA
    $oferta = ofertas::find($id);
    
    //ARREGLO CON MENSAJES DE ERROR
    $errores = ofertas::getErrores();

    //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
    if($_SERVER['REQUEST_METHOD']==='POST'){

        //ASIGNAR LOS ATRIBUTOS
        $args = $_POST['ofertas'];

        $oferta->sincronizar($args);
        
        //VALIDACION
        $errores = $oferta->validar();

        //GENERAR UN NOMBRE UNICO
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        //SUBIDA DE ARCHIVOS
        if($_FILES['ofertas']['tmp_name']['imagen']){
            //SETEAR LA IMAGEN
            $image = Image::make($_FILES['ofertas']['tmp_name']['imagen'])->fit(800, 600);
            $oferta->setImagen($nombreImagen);
            }

        //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
        if(empty($errores)){ 
            //ALMACENAR LA IMAGEN
            $image->save(CARPETA_IMAGENES . $nombreImagen);
            
           $oferta->guardar();  
        }
    }

    
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    <main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Actualizar Oferta</h3>

                       <!-- mensaje de validacion complete los datos -->
                        <?php foreach($errores as $error): ?>  
                            <div class="alerta error">
                                <?php echo $error; ?>
                            </div>
                        <?php endforeach;?> 

                        <form class="formulario-oferta" method ="POST"  enctype="multipart/form-data">
                            <?php include '../../includes/templates/formulario_ofertas.php' ?>
                            <button type="submit" class="boton">Actualizar Oferta</button>
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