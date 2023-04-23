
<?php
    require 'includes/funciones.php';

    incluirTemplate('header'); // funcion incluida en los templates hay que crear los teamples primero
?>
    
    <main>
        <div class="contenedor_cajas">
            <div class="cajas">
                <div class="caja">
                    <img src="img/logo-aprendiz.png" alt="aprendiz">
                        <div class="Contenido-texto-caja">
                            <h4>Registro Aprendices</h4>
                            <P>Ingrese en esta opción para registrar su perfil como aprendiz SENA o Egresado SENA.
                            </P>
                            <div class="clic-boton">
                                <p>¿No tienes una cuenta?</p> 
                                    <div><a href="/admin/propiedades/crear.php"><button type="submit" class="boton">crear cuenta como aprendiz</button></a></div>
                            </div>
                        </div>
                 </div>
                 <div class="caja">
                    <img src="img/logo-Empresa.png" alt="">
                        <div class="Contenido-texto-caja">
                            <h4>Registro Empresas</h4>
                            <P>Ingrese en esta opción para registrar su perfil Empresarial y publicar ofertas la borales.
                            </P>
                    <div class="clic-boton">
                        <p>¿No tienes una cuenta? </p>
                        <div><a href="crear-cuenta-empresa-modificacion.php"><button type="submit" class="boton">Crear cuenta como empresa</button></a></div>
                    </div>
                        </div>
                 </div> 
            </div>
        </div>
    </main>
    <script src="/build/js/app.js"> </script>
</body>
</html>