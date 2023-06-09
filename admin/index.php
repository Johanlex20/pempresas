<?php
    require '../includes/app.php';
    estaAutenticado(); // funcion de autenticacion en includes

    $resultado = $_GET ['resultado'] ?? null; //envia el mensaje de creacion de usuario
    
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
                <p class="alerta exito"> Creado Correctamente </p>

                <?php elseif( intval ($resultado) === 2) : ?>
                <p class="alerta exito-verde"> Actualizado Correctamente </p>
                
                <?php elseif( intval ($resultado) === 3) : ?>
                <p class="alerta exito-rojo"> Eliminado Correctamente </p>
            
            <?php endif?>
        </div>
    </div>
    </main>
<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>

