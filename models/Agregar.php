<?php

namespace Model;

class Agregar extends ActiveRecord{
    //nombre de la tabla
    protected static $tabla='existencias';
    protected static $columnasDB=['fechaIngreso','semana','cantidad','costoInicial'];

    //variables por campo
    public $id;
    public $fecha;
    public $semana;
    public $cantidad;
    public $costo;

    //constructor
    public function __construct($args=[])
    {
        $this->id = $args['id_existencias'] ?? null;
        $this->fecha = $args['fechaIngreso'] ?? date('Y-m-d H:i:s');
        $this->semana = $args['semana'] ?? '1';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->costo = $args['costoInicial'] ?? '';
    }

    // Mensajes de validación para la creación de una cuenta
    public function validarNuevaCuenta() {
      
        if(!$this->costo) {
            self::$alertas['error'][] = 'El costo es Obligatorio';
        }
        if(!$this->cantidad) {
            self::$alertas['error'][] = 'La cantidad es Obligatoria';
        }


        return self::$alertas;
    }
}