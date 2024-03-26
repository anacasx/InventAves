<?php

namespace Model;

class Agregar extends ActiveRecord{
    //nombre de la tabla
    protected static $tabla='existencias';
    protected static $columnasDB=['semana','cantidad','costo'];

    //variables por campo
    public $id;
    public $semana;
    public $cantidad;
    public $costo;

    //constructor
    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? null;
        $this->semana = $args['semana'] ?? '1';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->costo = $args['costo'] ?? '';
    }

    // Mensajes de validación para la creación de una cuenta
    public function agregarExistencia() {
      
        if(!$this->costo) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->cantidad) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }


        return self::$alertas;
    }
}