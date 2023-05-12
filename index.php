
<?php
    require 'includes/app.php';

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>

    <main class="contenedor_cajas">
        <h1 class="admi-text-home">PAGINA HOME</h1>
    

    <div class="contenedor_cajas_ofe">
        <h2> OFERTAS LABORALES</h2>
            <div class="cajas_ofe"> 
                    <div class="caja_ofe">
                        <picture>
                            <source srcset="build/img/anuncio1.webp" type="image/webp">
                            <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                            <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
                        </picture>
                        <h3>Programadores de Software</h3>
                        <p>Solicita Programadores con conocimientos en HTML, CSS, python</p>
                        <p class="precio">$3.000.000</p>  

                        <div class="iconos-caja">
                            <div>
                                <img loading="lazy" src="/build/img/icono-empresa.webp" alt="icono-persona"> 
                                <p>postulacion: 32</p>    
                            </div>
                            <div>
                                <img loading="lazy" src="/build/img/icono-email.webp" alt="icono-email">
                                <p>google@gmail.com</p>
                            </div>
                            <div>
                                <img loading="lazy" src="/build/img/icono-telefono.webp" alt="icono-telefono">
                                <p>300100100</p>
                            </div>      
                        </div>
                    </div>
                    <div class="caja_ofe">
                        <picture>
                            <source srcset="build/img/anuncio1.webp" type="image/webp">
                            <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                            <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
                        </picture>
                        <h3>Programadores de Software</h3>
                        <p>Solicita Programadores con conocimientos en HTML, CSS, python</p>
                        <p class="precio">$3.000.000</p>  

                        <ul class="iconos-caja">
                            <li>
                                <img loading="lazy" src="/build/img/icono-empresa.webp" alt="icono-persona"> 
                                <p>postulacion: 32</p>    
                            </li>
                            <li>
                                <img loading="lazy" src="/build/img/icono-email.webp" alt="icono-email">
                                <p>google@gmail.com</p>
                            </li>
                            <li>
                                <img loading="lazy" src="/build/img/icono-telefono.webp" alt="icono-telefono">
                                <p>300100100</p>
                            </li>      
                        </ul>
                    </div>
                    <div class="caja_ofe">
                        <picture>
                            <source srcset="build/img/anuncio1.webp" type="image/webp">
                            <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                            <img loading="lazy" src="build/img/anuncio1.jpg" alt="anuncio">
                        </picture>
                        <h3>Programadores de Software</h3>
                        <p>Solicita Programadores con conocimientos en HTML, CSS, python</p>
                        <p class="precio">$3.000.000</p>  

                        <ul class="iconos-caja">
                            <li>
                                <img loading="lazy" src="/build/img/icono-empresa.webp" alt="icono-persona"> 
                                <p>postulacion: 32</p>    
                            </li>
                            <li>
                                <img loading="lazy" src="/build/img/icono-email.webp" alt="icono-email">
                                <p>google@gmail.com</p>
                            </li>
                            <li>
                                <img loading="lazy" src="/build/img/icono-telefono.webp" alt="icono-telefono">
                                <p>300100100</p>
                            </li>      
                        </ul>
                    </div>
            </div>            
    </div>
</main>
<?php
    incluirTemplate('footer');  //funcion incluida en lso templates deja ver el footer
?>