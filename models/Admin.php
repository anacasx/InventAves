<?php

namespace Model;

class Admin extends ActiveRecord{
    //nombre de la tabla
    protected static $tabla='admin';
    protected static $columnasDB=['usuario','password','adminis'];

    //variables por campo
    public $id;
    public $usuario;
    public $password;
    public $adminis;
   

    //constructor
    public function __construct($args=[])
    {
        $this->id = $args['id_usuario'] ?? null;
        $this->usuario = $args['usuario'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->adminis = $args['adminis'] ?? '1';
       
    }

    // Mensajes de validación para la creación de una cuenta
    public function validarNuevaCuenta() {
      
        if(!$this->adminis) {
            self::$alertas['error'][] = 'El Usuario es obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'La contraseña es Obligatoria';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }


        return self::$alertas;
    }
    
    public function validarEmail() {
        if(!$this->usuario) {
            self::$alertas['error'][] = 'El Usuario es Obligatorio';
        }
        return self::$alertas;
    }

    public function validarPassword() {
        if(!$this->password) {
            self::$alertas['error'][] = 'El Password es obligatorio';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El Password debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // Revisa si el usuario ya existe
    public function existeUsuario() {
        $query = " SELECT * FROM " . self::$tabla . " WHERE usuario = '" . $this->usuario . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error'][] = 'El Usuario ya esta registrado';
        }

        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }


     }
?>

