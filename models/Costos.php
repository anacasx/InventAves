<?php

namespace Model;

class Costos extends ActiveRecord{
    //nombre de la tabla
    protected static $tabla='costos';
    protected static $columnasDB=['alimento','agua','medicina','m_obra','gas','aserrin','perdidas','ganancias'];

    //variables por campo
    public $id;
    public $alimento;
    public $agua;
    public $medicina;
    public $m_obra;
    public $gas;
    public $aserrin;
    public $perdidas;
    public $ganancias;

    //constructor
    public function __construct($args=[])
    {
        $this->id = $args['id_costos'] ?? null;
        $this->alimento = $args['alimento'] ?? '';
        $this->agua = $args['agua'] ?? '';
        $this->medicina = $args['medicina'] ?? '';
        $this->m_obra = $args['m_obra'] ?? '';
        $this->gas = $args['gas'] ?? '';
        $this->aserrin = $args['aserrin'] ?? '';
        $this->perdidas = $args['perdidas'] ?? '';
        $this->ganancias = $args['ganancias'] ?? '';
    }

    // Mensajes de validación para la creación de una cuenta
    public function validarNuevaCuenta() {
      
        if(!$this->alimento) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->agua) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->medicina) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!$this->m_obra) {
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        if($this->gas)  {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }
        if($this->aserrin)  {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }
        if($this->perdidas)  {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }
        if($this->ganancias)  {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }


        return self::$alertas;
    }
}