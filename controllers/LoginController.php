<?php

namespace Controllers;

use Classes\Email;
use Model\Costos;
use Model\Agregar;
use MVC\Router;
use Model\Ventas;


class LoginController
{
    //Funcion para el login
    public static function login(Router $router)
    {
        $router->render('admin/login');
    }
    public static function panel(Router $router)
    {
        $router->render('admin/panel');
    }
    public static function perdidas(Router $router)
    {
        $router->render('inven/perdidas');
    }
    public static function inicio(Router $router)
    {
        $router->render('inven/existencias');
    }
    public static function ventas(Router $router) {
        //echo "desde costos";
            // Alertas vacias
            $alertas = [];
            $ventas = new Ventas();
        
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
               $alertas = $ventas->validarNuevaCuenta();
                $ventas->sincronizar($_POST);
        
                if(empty($alertas)) {
                    echo "alertas vacías";
                }else {
            $resultado = $ventas->guardar();
            
            
            if($resultado) {
              //  debuguear($usuario);
           
              echo "<script>alert('Datos guardados correctamente');</script>";
                 
                // header('Location: /mensaje');
               }}}
               $router->render('inven/ventas', [
                'ventas' => $ventas,
                'alertas' => $alertas
            ]);
        }        
    public static function costos(Router $router)
    {
        // Alertas vacias
        $alertas = [];
        $costos = new Costos;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $alertas = $costos->validarNuevaCuenta();
            $costos->sincronizar($_POST);

            if (empty($alertas)) {
                echo "alertas vacías";
            } else {
                $resultado = $costos->guardar();


                if ($resultado) {
                    //  debuguear($usuario);

                    echo "Guardado correctamente";

                    // header('Location: /mensaje');
                }
            }
        }
        $router->render('inven/costos', [
            'costos' => $costos,
            'alertas' => $alertas
        ]);
    }
    public static function agregar(Router $router)
    {
        // Alertas vacias
        $alertas = [];
        $agregar = new Agregar;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $alertas = $agregar->agregarExistencia();
            $agregar->sincronizar($_POST);

            if (empty($alertas)) {
                echo "alertas vacías";
            } else {
                $resultado = $agregar->guardar();


                if ($resultado) {
                    //  debuguear($usuario);

                    echo "Guardado correctamente";

                    // header('Location: /mensaje');
                }
            }
        }
        $router->render('inven/agregar', [
            'agregar' => $agregar,
            'alertas' => $alertas
        ]);
    }
}
