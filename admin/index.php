
<?php
    require '../includes/funciones.php';

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>

    <main class="contenedor seccion">
        <h1 class="admi-text">Administrador de P-empresas</h1>

         <a href="/admin/propiedades/crear.php" class="boton-volver">
            <span class="texto-fondo">Crear nuevo usuario </span>
         </a>     <!-- este boton lo envia directamente al archivo crear de propiedades carpeta admin -->
         
    </main>

<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>

