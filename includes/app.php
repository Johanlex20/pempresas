<?php

require 'funciones.php';//funciones
require 'config/database.php';//conexion a base de datos
require __DIR__ . '/../vendor/autoload.php';//carga automatica de archivos funciones clases

//CONEXION A LA BASE DE DATOS
$db = conectarDB();

use App\aprendiz;

aprendiz::setDB($db);



