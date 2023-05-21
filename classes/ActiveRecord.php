<?php

namespace App;

class ActiveRecord {

    //BASE DE DATOS
    protected static $db;
    //IDENTIFICO QUE FORMA VA TENER LA COLUMNA
    protected static $columnasDB = [];

    protected static $tabla = '';

    //ERRORES
    protected static $errores = [];

    //DEFINIR LA CONEXION A LA BD
    public static function setDB($database){
        self::$db = $database;
    }

    
    public function guardar(){
        if (!is_null($this->id)){
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
        $query = " INSERT INTO " .  static::$tabla  . " ( ";
        $query .= join(', ',array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);
        

     //MENSAJE DE EXITO O DE ERROR
     if($resultado){
        echo "Insertado Correctamente";
        //REDIRECCION DE USUARIO PARA EVITAR DUPLICAR DATOS

        header('Location: /login.php?resultado=1'); //header y la funcion Location/ se usa para redireccionar despues de la validacion de registro, Se debe utilizar poco y donde no este presente el HTML, crear la funcion antes de html para evitar errores.
        } 
        
    }

    public function actualizar(){
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE " . static::$tabla  . " SET ";
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
        
       
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        
        $resultado = self::$db->query($query);
  
        if ($resultado){
            $this->borrarImagne();
            echo "Eliminado Correctamente";
            //REDIRECCION DE USUARIO PARA EVITAR DUPLICAR DATOS
            header('location:/admin/?resultado=3');
        }
       
    }

    //IDENTIFICAR Y UNIR LOS ATRIBUTOS DE LA DB
    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
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


     //SUBIDA DE ARCHIVOS
     public function setImagen($imagen){
        //ELIMINAR LA IMAGEN ANTERIOR
        if(isset( $this->id )){
            //COMPROBAR SI EXISTE EL ARCHIVO
            $this->borrarImagne();
            }
        //ASIGNAR AL ATRIBUTO DE IMAGEN EL NOMBRE DE LA IMAGEN
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    //ELIMINA EL ARCHIVO
    public function borrarImagne(){
            //COMPROBAR SI EXISTE EL ARCHIVO
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
    }


    //VALIDACION
    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        static::$errores = [];
        return static::$errores;
    }

    //LISTA DE TODOS LOS APRENDICES
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // OBTENER DETERMINADO NUMERO DE REGISTROS
       //LISTA DE TODOS LOS APRENDICES
       public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

        debuguear($query);

        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //BUSCA UNA APRENDIZ POR SU ID
    public static function find($id){
        $query ="SELECT * FROM " . static::$tabla . " WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado );
    }

    public static function consultarSQL($query){
        // CONSULTAR LA BASE DE DATOS
        $resultado = self::$db->query($query);

        // ITERRAR LOS RESULTADOS
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }    

        //LIBERAR LA MEMORIA
        $resultado->free();

        //RETORNAR LOS RESULTADOS
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

        foreach ($registro as $key => $value ){
            if (property_exists( $objeto, $key )){
                $objeto->$key = $value;
            }
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