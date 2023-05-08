<?php

namespace App;

class Tipoidentificacion extends ActiveRecord{
    protected static $tabla = 'tipoidentificacion';
    protected static $columnasDB = ['idtipoId', 'tipoId'];

    public $idtipoId;
    public $tipoId;

    public function __construct ($args = []){
        //??''= En caso de que no este lleno se agrega un strim vacío
        $this->idtipoId = $args['idtipoId'] ?? null;  
        $this->tipoId = $args['tipoId'] ?? ''; 

    }
}