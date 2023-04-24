
<?php
    // verificacion de mensaje GET
    // echo "<pre>";
    // var_dump($_GET);
    // $mensaje =$_GET;
    // echo "</pre>";
    // exit;

    $resultado =$_GET['resultado'] ??null;

    require '../includes/funciones.php';

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>

    <main class="contenedor seccion">
        <h1 class="admi-text">Administrador de P-empresas</h1>

        <!-- impirme el mensaje de registro correctamente-->

        <?php if( intval ($resultado) === 1) : ?> <!--convertir el valor string a numerico-->
            <p class="alerta exito"> Usuario creado correctamente </p>
        <?php endif?> 

         <a href="/eleccion-registro-modificacion.php" class="boton-volver">
            <span class="texto-fondo">Crear nuevo usuario </span>
         </a>     <!-- este boton lo envia directamente al archivo crear de propiedades carpeta admin -->
         
    </main>

<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>

