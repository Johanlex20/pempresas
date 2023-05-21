<?php
namespace App;

class ofertas extends ActiveRecord{
    protected static $tabla = 'ofertas';
     protected static $columnasDB = ['id', 'titulo', 'tipoPrograma', 'imagen'
     ,'jornada', 'modatrabajo', 'sueldo', 'vacantes', 'descriempleo','respon','reque','fechapubliofe'];

    public $id;
    public $titulo;
    public $tipoPrograma;
    public $imagen;
    public $jornada;
    public $modatrabajo;
    public $sueldo;
    public $vacantes;
    public $descriempleo;
    public $respon;
    public $reque;
    public $fechapubliofe;

    public function __construct ($args = []){
      
        $this->id = $args['id'] ?? null;  
        $this->titulo = $args['titulo'] ?? '';
        $this->tipoPrograma = $args['tipoPrograma'] ?? '';
        $this->imagen = $_FILES['nombreImagen'] ??  '';
        $this->jornada = $args['jornada'] ?? ''; 
        $this->modatrabajo = $args['modatrabajo'] ?? ''; 
        $this->sueldo = $args['sueldo'] ?? ''; 
        $this->vacantes = $args['vacantes'] ?? '';
        $this->descriempleo = $args['descriempleo'] ?? '';  
        $this->respon = $args['respon'] ?? '';
        $this->reque = $args['reque'] ?? '';  
        $this->fechapubliofe = date('Y/m/d'); 
        
    }

    public function validar(){
        if (!$this->titulo){
            self::$errores[] = "* Debes añadir un Titulo";
        }
        if (!$this->tipoPrograma){
            self::$errores[] = "* El tipo de programa es obligatorio";
        }
        if (!$this->imagen){
            self::$errores[] = "* La Imagen del anuncio es obligatoria";
        }
        if (!$this->jornada){
            self::$errores[] = "* Debes elegir Jornada";
        }
        if (!$this->modatrabajo){
            self::$errores[] = "* Debes elegir modalidad de trabajo";
        }
        if (!$this->sueldo){
            self::$errores[] = "* Debes añadir un rango de sueldo";
        }
        if (!$this->vacantes){
            self::$errores[] = "* Debes ingresar cantidad de vacantes";
        }
        if (!$this->descriempleo){
            self::$errores[] = "* Debes añadir descripción del empleo";
        }
        if (!$this->respon){
            self::$errores[] = "* Debes añadir responsavilidades del empleo";
        }
        if (!$this->reque){
            self::$errores[] = "* Debes añadir habilidades o conocimientos del postulante";
        }
        
        return self::$errores;
    }
}
