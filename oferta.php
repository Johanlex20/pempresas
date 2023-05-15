<?php

    require 'includes/app.php';

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>

<section>
    <div class="contenedor_cajas_ofe">
            <h2> OFERTA LABORAL</h2>
                <div class="cajas_ofe"> 
                        <div class="caja_ofe">
                            <picture>
                                <source srcset="build/img/anuncio1.webp" type="image/webp">
                                <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                                <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
                            </picture>
                            <h3>Programadores de Software</h3>
                            <p>Solicita Programadores con conocimientos en HTML, CSS, python</p>
                            <p class="precio">$4.000.000</p>  

                            <div class="iconos-caja">
                                <div>
                                    <img loading="lazy" src="/build/img/icono-empresa.webp" alt="icono-persona"> 
                                    <p>postulacion: 10</p>    
                                </div>
                                <div>
                                    <img loading="lazy" src="/build/img/icono-email.webp" alt="icono-email">
                                    <p>google@gmail.com</p>
                                </div>
                                <div>
                                    <img loading="lazy" src="/build/img/icono-telefono.webp" alt="icono-telefono">
                                    <p>311010000</p>
                                </div>      
                            </div>
                            <a href="/admin/propiedades/actualizar.php" class="boton-volver">
                                <span class="texto-fondo">Ver Oferta</span>
                            </a> 
                        </div>            
                </div>    
    </div>
</section>


<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>
