<?php

namespace Model;

class Ventas extends ActiveRecord{
//nombre de la tabla
    protected static $tabla='ventas';
    protected static $columnasDB=['semana' , 'cantidad', 'precioU'];

// variables para cada campo

public $id;
public $semana;
public $cantidad;
public $precioU;

//constructors
public function __construct($args=[]){
    $this->id = $args['id'] ?? null;
    $this->semana = $args['semana'] ?? '';
    $this->cantidad = $args['cantidad'] ?? '';
    $this->precioU = $args['precioU'] ?? '';


}

    
// Mensajes de validación para la creación de una cuenta
 public function validarNuevaCuenta() {
      
    if(!$this->semana) {
        self::$alertas['error'][] = 'El campo es Obligatorio';
    }
    if(!$this->cantidad) {
        self::$alertas['error'][] = 'El campo es Obligatorio';
    }
    if(!$this->precioU) {
        self::$alertas['error'][] = 'El campo es Obligatorio';
    }
   
    return self::$alertas;
}
}