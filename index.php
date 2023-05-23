
<?php
    require 'includes/app.php';
    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>

<main class="contenedor_cajas">
    <h1 class="admi-text-home">PAGINA HOME</h1>
    
    <section>
    <div class="contenedor_cajas_ofe">
            <h2> OFERTAS</h2>
  
            <?php
                include 'includes/templates/anuncios.php';
            ?>

        </div> <!-- CONTINIDO ANUNCIOS --> 
    </section>  
</main>
<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>