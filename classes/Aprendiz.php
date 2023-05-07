<?php

namespace App;

class aprendiz {

    //BASE DE DATOS
    protected static $db;
    //IDENTIFICO QUE FORMA VA TENER LA COLUMNA
    protected static $columnasDB = ['id', 'nombre', 'tipoId', 'identificacion', 'programa', 'email', 'password', 'telefono', 'creacionaprendiz'];

    public $id;
    public $nombre;
    public $tipoId;
    public $identificacion;
    public $programa;
    public $email;
    public $password;
    public $telefono;
    public $creacionaprendiz;

    //DEFINIR LA CONEXION A LA BD
    public static function setDB($database){
        self::$db = $database;
    }

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

    // SANITIZAR DATOS
    $atributos = $this->sanitizarAtributos();
    debuguear($atributos);
        
    //INSERTAR DATOS EN LA BASE DE DATOS
        $query = " INSERT INTO aprendiz (nombre, tipoId, identificacion, programa, email, password, telefono, creacionaprendiz) VALUES ('$this->nombre', '$this->tipoId', '$this->identificacion', '$this->programa', '$this->email', '$this->password', '$this->telefono' , '$this->creacionaprendiz')";

        $resultado = self::$db->query($query);
        debuguear($resultado);
    }

    //IDENTIFICAR Y UNIR LOS ATRIBUTOS DE LA DB
    public function atributos(){
        $atributos = [];
        foreach(self::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];  
        foreach($atributos as $key => $value ){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }


}