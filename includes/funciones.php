<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCION_URL',__DIR__ . 'funciones.php');

function incluirTemplate(string $nombre){
    include TEMPLATES_URL . "/$nombre.php"; //comillas dobles son obligatorias en esta funcion
}

//COMPROBACION SI EL USUARIO ESTA REGISTRADO Y PUEDE ACTUALIZAR PROTEGE SI QUIEREN ENTRAR AL URL DE FORMA MANUAL SIN AUTENTICAR EL LOGIN
function estaAutenticado() {
    session_start();

    if (!$_SESSION ['login']){
        header('Location: /');
    }
}

function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//ESCAPAR O SANITIZAR EL HTML
function s ($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//VALIDAR TIPO DE CONTENIDO
function validarTipoContenido($tipo){
    $tipos = ['tipoidentificacion', 'aprendiz', 'tipoprograma'];

    return in_array($tipo, $tipos);
}