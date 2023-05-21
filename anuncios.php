<?php
    require 'includes/app.php';
    incluirTemplate('header'); // funcion incluida en los templates 
?>
<section>
    <div class="contenedor_cajas_ofe">
        <h2> OFERTAS LABORALES</h2>

        <?php
            $limite = 10; //limite de ofertas que se pueden ver en el index
            include 'includes/templates/anuncios.php';
        ?>
        
    </div> <!-- CONTINIDO ANUNCIOS --> 
</section>
   
    
<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>
