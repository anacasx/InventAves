<?php

namespace Model;

class Agregar extends ActiveRecord{
    //nombre de la tabla
    protected static $tabla='existencias';
    protected static $columnasDB=['fecha_ingreso','semana','cantidad','costo_inicial'];

    //variables por campo
    public $id;
    public $fecha_ingreso;
    public $semana;
    public $cantidad;
    public $costo_inicial;

    //constructor
    public function __construct($args=[])
    {
        $this->id = $args['id_existencias'] ?? null;
        $this->fecha_ingreso = $args['fecha_ingreso'] ?? date('Y-m-d H:i:s');
        $this->semana = $args['semana'] ?? '1';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->costo_inicial = $args['costo_inicial'] ?? '';
    }

    // Mensajes de validación para la creación de una cuenta
    public function validarNuevaCuenta() {
      
        if(!$this->semana) {
            self::$alertas['error'][] = 'El costo es Obligatorio';
        }
        if(!$this->cantidad) {
            self::$alertas['error'][] = 'La cantidad es Obligatoria';
        }


        return self::$alertas;
    }
}