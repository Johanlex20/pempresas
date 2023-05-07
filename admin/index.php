
<?php

    require '../includes/app.php';
    estaAutenticado(); // funcion de autenticacion en includes



    $resultado = $_GET ['resultado'] ?? null; //envia el mensaje de creacion de usuario
    $resultado3 =$_GET ['resultado3'] ?? null; //envia el mensaje de actualizacion de usuario
    $resultado4 =$_GET ['resultado4'] ?? null; //envia el mensaje de eliminacion de usuario
    
    //INCLUIR UN TEMPLATE
    incluirTemplate('headersin'); // funcion incluida en los templates hay que crear los teamples primero
?>

    <main class="contenedor seccion">

    <!-- barra de seleccion perfil admin y barra superior saludo y cerrar sesion -->

    <div class="dashboard"> 
        <?php include_once __DIR__ . '/../includes/templates/sidebar.php';?>
            <div class="principal"> 
        <?php include_once __DIR__ . '/../includes/templates/barra.php';?>
        
            <h1 class="admi-text">Administrador de P-empresas</h1>

            <!-- impirme el mensaje de registro correctamente-->
            <?php if( intval ($resultado) === 1) : ?> <!--convertir el valor string a numerico-->
                <p class="alerta exito"> Usuario Creado Correctamente </p>

                <?php elseif( intval ($resultado3) === 2) : ?>
                <p class="alerta exito-verde"> Usuario Actualizado Correctamente </p>
                
                <?php elseif( intval ($resultado4) === 4) : ?>
                <p class="alerta exito-rojo"> Usuario Eliminado Correctamente </p>
            
            <?php endif?> 

            <!-- <a href="/eleccion-registro-modificacion.php" class="boton-volver">
                <span class="texto-fondo">Crear nuevo Usuario </span>
            </a>     este boton lo envia directamente al archivo crear de propiedades carpeta admin -->

            <!-- <a href="admin/propiedades/consultar.php" class="boton-volver">
                <span class="texto-fondo">Consultar Usuario </span>
            </a>      este boton lo envia directamente al archivo Consultar de propiedades carpeta admin -->

            <!-- <a href="/admin/propiedades/actualizar.php" class="boton-volver">
                <span class="texto-fondo">Actualizar Usuario </span>
            </a>     este boton lo envia directamente al archivo actualizar de propiedades carpeta admin -->
        </div>
    </div>

    </main>
    
         

<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>

