<?php

require 'app.php';

function incluirTemplate(string $nombre){
    include TEMPLATES_URL . "/$nombre.php"; //comillas dobles son obligatorias en esta funcion
}