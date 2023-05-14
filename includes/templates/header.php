<?php  
    //VERIFICA SI LA SESSION ESTA INICIADA SI NO PUES ENVIA A VALIDACION
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina ingreso principal</title>

    <script src="https://kit.fontawesome.com/c613273784.js" crossorigin="anonymous"></script> 

    <link rel="stylesheet" href="/build/css/app.css">  
    <!--<link rel="stylesheet" href="/pempresas/build/css/app.css">     "/pempresas/build/css/app.css">  localhost trabaja el otro trabaja con local3000-->
</head>
<body>
    <header> 
        <section>
            <div class="burbujas">
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
            </div>
        </section>

        <div class="contenedor_menu">
            <div class="logo">
                <img src="/build/img/logo-de-Sena-sin-fondo-Blanco.png" alt="logo-Sena">
            </div>
            <div class="menu">
                <i class="fa-solid fa-bars" id="boton_minimenu"></i>
                <div id="mini_menu"></div>
                <nav id="nav">
                     <!-- <img src="/build/img/logo-de-Sena-sin-fondo-Blanco.png" alt="">  -->
                    <ul>
                        <li><a href="/index.php">HOME</a></li>
                        <?php  if ($auth): ?>
                            <li><a href="/admin/index.php">Perfil</a></li>
                        <?php endif; ?> 
                        <li><a href="/anuncios.php">Ofertas</a></li>
                        <li><a href="#">hoja de vida</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="/eleccion-registro-modificacion.php">Registro</a></li>
                        <li><a href="/login.php">Ingreso</a></li>
                        <?php  if ($auth): ?>
                            <li><a href="/cerrar-sesion.php">Cerrar Sesión</a></li>
                        <?php endif; ?>    

                    </ul>
                </nav>
            </div>
        </div>
    </header>