<?php

namespace App;

class aprendiz {

    public $id;
    public $nombre;
    public $tipoId;
    public $identificacion;
    public $programa;
    public $email;
    public $password;
    public $telefono;
    public $creacionaprendiz;

    public function __construct ($args = []){
        //??''= En caso de que no este lleno se agrega un strim vacío
        $this->id = $args['id'] ?? '';  
        $this->nombre = $args['nombre'] ?? ''; 
        $this->tipoId = $args['tipoId'] ?? ''; 
        $this->identificacion = $args['identificacion'] ?? ''; 
        $this->programa = $args['programa'] ?? ''; 
        $this->email = $args['email'] ?? ''; 
        $this->password = $args['password'] ?? ''; 
        $this->telefono = $args['telefono'] ?? ''; 
        $this->creacionaprendiz = date('Y/m/d'); 
    }
    
    public function guardar(){
        echo "Guardando en la base de datos";
    }
}