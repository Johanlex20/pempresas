
<?php
    
    //INCLUIR UN TEMPLATE
    require '../includes/funciones.php';
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>

    <main class="contenedor seccion">
        <h1 class="admi-text">Administrador de P-empresas</h1>

        <!-- impirme el mensaje de registro correctamente-->

        <?php if( intval ($resultado) === 1) : ?> <!--convertir el valor string a numerico-->
            <p class="alerta exito"> Usuario Creado Correctamente </p>
            <?php elseif( intval ($resultado) === 2) : ?>
            <p class="alerta exito"> Usuario Actualizado Correctamente </p>
        <?php endif?> 

         <a href="/eleccion-registro-modificacion.php" class="boton-volver">
            <span class="texto-fondo">Crear nuevo Usuario </span>
         </a>     <!-- este boton lo envia directamente al archivo crear de propiedades carpeta admin -->

         <a href="admin/propiedades/consultar.php" class="boton-volver">
            <span class="texto-fondo">Consultar Usuario </span>
         </a>     <!-- este boton lo envia directamente al archivo Consultar de propiedades carpeta admin -->

         <a href="/admin/propiedades/actualizar.php" class="boton-volver">
            <span class="texto-fondo">Actualizar Usuario </span>
         </a>     <!-- este boton lo envia directamente al archivo actualizar de propiedades carpeta admin -->
    </main>
    
         

<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>

