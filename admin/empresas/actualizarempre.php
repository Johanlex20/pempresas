<?php
    use App\Empresas;
use App\Tipoidentificacion;
use Intervention\Image\ImageManagerStatic as Image;
    require '../../includes/app.php';
    estaAutenticado(); // funcion de autenticacion en includes

     //CONSULTA PARA OBTENER TODOS LOS TIPOS IDENTIFICACION DE APRENDICES
     $empresa = Empresas::all();
     $tipoidentificacion = Tipoidentificacion::all();

    //Validar la URL por ID válido
    $id=$_GET['id'];
    $id= filter_Var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }
    //CONSULTA PARA OBTENER LOS DATOS DEL APRENDIZ
    $empresa = Empresas::find ($id);
    
    //ARREGLO CON MENSAJES DE ERROR
    $errores = Empresas::getErrores();

    //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
    if($_SERVER['REQUEST_METHOD']==='POST'){

        //ASIGNAR LOS ATRIBUTOS
        $args = $_POST['empresas'];


        $empresa->sincronizar($args);
        
        //VALIDACION
        $errores = $empresa->validar();
        
        //GENERAR UN NOMBRE UNICO
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        //SUBIDA DE ARCHIVOS
        if($_FILES['empresas']['tmp_name']['imagen']){
            //SETEAR LA IMAGEN
            $image = Image::make($_FILES['empresas']['tmp_name']['imagen'])->fit(800, 600);
            $empresa->setImagen($nombreImagen);
            }

        //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
        if(empty($errores)){  //empty es la funcion que reviza los arreglos esten vacios
            //ALMACENAR LA IMAGEN
            $empresa->guardar();
            $image->save(CARPETA_IMAGENES . $nombreImagen);            
        }
    }

    
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    <main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Actualizar Empresa</h3>

                       <!-- mensaje de validacion complete los datos -->
                        <?php foreach($errores as $error): ?>  
                            <div class="alerta error">
                                <?php echo $error; ?>
                            </div>
                        <?php endforeach;?> 

                         <form class="formulario-oferta" method ="POST"  enctype="multipart/form-data">
                            <?php include '../../includes/templates/formulario_empresas.php'; ?>
                            <button type="submit" class="boton">Actualizar Empresa</button>
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