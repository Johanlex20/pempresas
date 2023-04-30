<?php

require 'app.php';

function incluirTemplate(string $nombre){
    include TEMPLATES_URL . "/$nombre.php"; //comillas dobles son obligatorias en esta funcion
}

function estaAutenticado() : bool {
    //COMPROBACION SI EL USUARIO ESTA REGISTRADO Y PUEDE ACTUALIZAR PROTEGE SI QUIEREN ENTRAR AL URL DE FORMA MANUAL SIN AUTENTICAR EL LOGIN
    session_start();
    $auth = $_SESSION ['login']; // esta validacon esta creada el el archivo login
    if ($auth){
        return true;
    }//else{ CON EL RETURN SE SALTA SI APLICA EN LA PRIMARE NO NECESTIA EL ELSE
        return false;
    //}
    

}