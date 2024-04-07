<?php

namespace Model;

class Admin extends ActiveRecord{
    //nombre de la tabla
    protected static $tabla='admin';
    protected static $columnasDB=['usuario','correo','contraseña','adminis'];

    //variables por campo
    public $id;
    public $usuario;
    public $correo;
    public $contraseña;
    public $adminis;
   

    //constructor
    public function __construct($args=[])
    {
        $this->id = $args['id_usuario'] ?? null;
        $this->usuario = $args['usuario'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->contraseña = $args['contraseña'] ?? '';
        $this->adminis = $args['adminis'] ?? '1';
       
    }

    // Mensajes de validación para la creación de una cuenta
    public function validarNuevaCuenta() {
      
        if(!$this->usuario) {
            self::$alertas['error'][] = 'El Usuario es obligatorio';
        }
        if(!$this->correo) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!$this->contraseña) {
            self::$alertas['error'][] = 'La contraseña es Obligatoria';
        }
        if(strlen($this->contraseña) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }


        return self::$alertas;
    }
    
    public function validarEmail() {
        if(!$this->correo) {
            self::$alertas['error'][] = 'El correo es Obligatorio';
        }
        return self::$alertas;
    }

    public function validarPassword() {
        if(!$this->contraseña) {
            self::$alertas['error'][] = 'El Password es obligatorio';
        }
        if(strlen($this->contraseña) < 6) {
            self::$alertas['error'][] = 'El Password debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // Revisa si el usuario ya existe
    public function existeUsuario() {
        $query = " SELECT * FROM " . self::$tabla . " WHERE correo = '" . $this->correo . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error'][] = 'El Usuario ya esta registrado';
        }

        return $resultado;
    }

    public function hashPassword() {
        $this->contraseña = password_hash($this->contraseña, PASSWORD_BCRYPT);
    }


     }
?>

