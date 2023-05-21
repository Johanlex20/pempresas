<?php
namespace App;

class Empresas extends ActiveRecord{
    protected static $tabla = 'empresas';
     protected static $columnasDB = ['id', 'razonsocial', 'tipoId','identificacionemp','direccionemp', 'telefonoemp','emailemp','passwordemp','imagen','creacionemp'];


    public $id;
    public $razonsocial;
    public $tipoId;
    public $identificacionemp;
    public $direccionemp;
    public $telefonoemp;
    public $emailemp;
    public $passwordemp;
    public $imagen;
    public $creacionemp;
  

    public function __construct ($args = []){
      
        $this->id = $args['id'] ?? null;  
        $this->razonsocial = $args['razonsocial'] ?? '';
        $this->tipoId = $args['tipoId'] ?? '';
        $this->identificacionemp = $args['identificacionemp'] ?? '';
        $this->telefonoemp = $args['telefonoemp'] ?? '';
        $this->direccionemp = $args['direccionemp'] ?? ''; 
        $this->emailemp = $args['emailemp'] ?? ''; 
        $this->passwordemp = $args['passwordemp'] ?? ''; 
        $this->imagen = $_FILES['nombreImagen'] ??  '';
        $this->creacionemp = date('Y/m/d'); 
    }

    public function validar(){
        if (!$this->razonsocial){
            self::$errores[] = "* Debes añadir una Razon Social";
        }
        if (!$this->tipoId){
            self::$errores[] = "* El tipo de Identificacion es obligatorio";
        }
        if (!$this->identificacionemp){
            self::$errores[] = "* Debes añadir un Numero de Identificacion";
        }
        if (!$this->telefonoemp){
            self::$errores[] = "* Debes agregar un numero de telefono";
        }
        if (!$this->direccionemp){
            self::$errores[] = "* Debes ingresar direccion";
        }
        if (!$this->emailemp){
            self::$errores[] = "* Debes añadir email";
        }
        if (!$this->passwordemp){
            self::$errores[] = "* Debes ingresar contraseña";
        }
        if (!$this->imagen){
            self::$errores[] = "* Debes añadir imagen o Logo de la empresa";
        }
        
        return self::$errores;
    }
}
