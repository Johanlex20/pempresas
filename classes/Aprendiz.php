<?php

namespace App;

class aprendiz {

    //BASE DE DATOS
    protected static $db;
    //IDENTIFICO QUE FORMA VA TENER LA COLUMNA
    protected static $columnasDB = ['id', 'nombre', 'tipoId', 'identificacion', 'programa', 'email', 'password', 'telefono', 'creacionaprendiz'];

    //ERRORES
    protected static $errores = [];

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
        $this->tipoId = $args['tipoId'] ?? 1; 
        $this->identificacion = $args['identificacion'] ?? ''; 
        $this->programa = $args['programa'] ?? 1; 
        $this->email = $args['email'] ?? ''; 
        $this->password = $args['password'] ?? ''; 
        $this->telefono = $args['telefono'] ?? ''; 
        $this->creacionaprendiz = date('Y/m/d'); 
    }
    
    public function guardar(){
        if (isset($this->id)){
            //ACTUALIZAR APRENDIZ
            $this->actualizar();
        }else{
            //CREANDO APRENDIZ
            $this->crear();
        }
    }

    public function crear(){
    // SANITIZAR DATOS
    $atributos = $this->sanitizarAtributos();

    //INSERTAR DATOS EN LA BASE DE DATOS
        $query = " INSERT INTO aprendiz ( ";
        $query .= join(', ',array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function actualizar(){
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE aprendiz SET ";
        $query .= join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string ($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);
        
        if($resultado){
            echo "Actualizado Correctamente";
            header('Location: /admin?resultado=2');
        }
    }

    //ELIMINAR UN REGISTRO
    public function eliminar(){
        //ELIMINAR APRENDIZ 
        $query = "DELETE FROM aprendiz WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        $resultado = self::$db->query($query);

        if ($resultado){

            echo "Eliminado Correctamente";
            //REDIRECCION DE USUARIO PARA EVITAR DUPLICAR DATOS
            header('location:/admin/?resultado=3');
        }
       
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

    //VALIDACION
    public static function getErrores(){
        return self::$errores;
    }

    public function validar(){
        if (!$this->nombre){
            self::$errores[] = "* Debes añadir un Nombre";
        }
        if (!$this->tipoId){
            self::$errores[] = "* Elige un tipo de Identificacion";
        }
        if (!$this->identificacion){
            self::$errores[] = "* Debes añadir un Numero de Identificacion";
         }
        if (!$this->programa){
            self::$errores[] = "* Elige un Programa";
        }
        if (!$this->email){
            self::$errores[] = "* Debes añadir un Correo";
        }
        if (!$this->password){
            self::$errores[] = "* Debes añadir una Contraseña";
        }
        if (!$this->telefono){
            self::$errores[] = "* Debes añadir un Telefono";
        }

        return self::$errores;
    }

    //LISTA DE TODOS LOS APRENDICES
    public static function all(){
        $query = "SELECT * FROM aprendiz";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //BUSCA UNA APRENDIZ POR SU ID
    public static function find($id){
        $query ="SELECT * FROM aprendiz WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado );
    }

    public static function consultarSQL($query){
        // CONSULTAR LA BASE DE DATOS
        $resultado = self::$db->query($query);

        // ITERRAR LOS RESULTADOS
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }    

        //LIBERAR LA MEMORIA
        $resultado->free();

        //RETORNAR LOS RESULTADOS
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new self;

        foreach ($registro as $key => $value ){
            if (property_exists( $objeto, $key ));
            $objeto->$key = $value;
        }
        return $objeto;
    }

    //SINCRONIZAR EL OBJETO EN MEMORIA CON LOS CAMBIOS REALIZADOS POR EL USUARIO
    public function sincronizar( $args = []){
        foreach($args as $key => $value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}