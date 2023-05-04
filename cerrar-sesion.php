<?php

//INICIA SESSION
session_start();
//SE PUEDE CERRAR SON SESSION UNSET O SESSION DISTROY PERO ALGO MEJOR ES REASIGNAR EL ARREGLO DE SESSION
$_SESSION = [];

// var_dump($_SESSION);
//cuando activamos el boton cerrar simplemente el arreglo lo envia a la pagian de incio
header ('Location:/');
