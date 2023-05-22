<?php
    use App\ofertas;
    
    if($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
        $oferta = ofertas::all();
    } else {
        // utiliza metodo get y muestra 4 oferta en home
        $oferta = ofertas::get(4);
    }
?>  
                <div class="cajas_ofe"> 
                    <?php  foreach($oferta as $ofer) { ?>
                        <div class="caja_ofe">

                                <img loading="lazy" src="/src/img/<?php echo $ofer->imagen; ?>" alt="anuncio">

                            <h3><?php echo $ofer->titulo; ?></h3>
                            <p><?php echo $ofer->descriempleo; ?></p>
                            <p class="precio">$<?php echo $ofer->sueldo; ?></p>  

                            <div class="iconos-caja">
                                <div>
                                    <img loading="lazy" src="/build/img/icono-empresa.webp" alt="icono-persona"> 
                                    <p>Vacantes: <?php echo $ofer->vacantes; ?></p>    
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
                            <a href="/oferta.php?id=<?php echo $ofer->id; ?>" class="boton-volver">
                                <span class="texto-fondo">Ver Oferta</span>
                            </a> 
                        </div><!-- CONTINIDO ANUNCIO--> 
                    <?php } ?>
                </div>  <!-- ANUNCIO --> 
                
