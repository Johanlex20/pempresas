<?php
namespace APP;

class Programa extends ActiveRecord{
    protected static $tabla = 'programa';
    protected static $columnasDB = ['id', 'tipoPrograma', 'moda_prog', 'tipo_form_prog'];

    public $id;
    public $tipoPrograma;
    public $moda_prog;
    public $tipo_form_prog;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->tipoPrograma = $args['tipoPrograma'] ?? '';
        $this->moda_prog = $args['moda_prog'] ?? '';
        $this->tipo_form_prog = $args['tipo_form_prog'] ?? '';

    }
}