<?php
    use App\Tipoidentificacion;
    require '../../includes/app.php';
    estaAutenticado(); // funcion de autenticacion en includes
    
    //Validar la URL por ID válido
    $id=$_GET['id'];
    $id= filter_Var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }

    //CONSULTA PARA OBTENER LOS DATOS DEL APRENDIZ
    $tipoidentificacion = Tipoidentificacion::find ($id);
  
    //CONSULTA PARA OBTENER TODOS LOS TIPOS IDENTIFICACION DE APRENDICES
    // $tipoidentificacion = Tipoidentificacion::all();
 
    //ARREGLO CON MENSAJES DE ERROR
    $errores = Tipoidentificacion::getErrores();

 
    //EJECUTAR EL CODIGO DESPUES DE QUE EL USUARIO ENVIA EL FORMULARIO
    if($_SERVER['REQUEST_METHOD']==='POST'){

        //ASIGNAR LOS ATRIBUTOS
        $args = $_POST['tipoidentificacion'];

        $tipoidentificacion->sincronizar($args);
        
        //VALIDACION
        $errores = $tipoidentificacion->validar();

        //REVISAR QUE EL ARRAY DE ERRORES ESTE VACIO
        if(empty($errores)){  //empty es la funcion que reviza los arreglos esten vacios
            $tipoidentificacion->guardar();      
        }

    }

    
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    <main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Actualizar Tipo Identificacion</h3>

                       <!-- mensaje de validacion complete los datos -->
                        <?php foreach($errores as $error): ?>  
                            <div class="alerta error">
                                <?php echo $error; ?>
                            </div>
                        <?php endforeach;?> 

                         <form class="formulario-aprendiz" method ="POST"> 
                            <?php include '../../includes/templates/formulario_identificacion.php'; ?>
                            <button type="submit" class="boton">Actualizar Tipo Identificacion</button>
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