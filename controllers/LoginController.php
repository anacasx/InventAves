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
                // Ejecutar la consulta SQL para calcular la sumatoria de costos
                $conexion = new \mysqli("localhost", "root", "", "inventaves");
                if ($conexion->connect_error) {
                    die("Error en la conexión: " . $conexion->connect_error);
                }

                $consultaCostos = "UPDATE existencias
                    SET costo_unitario = (
                        (SELECT (SUM(alimento) + SUM(agua) + SUM(medicina) + SUM(obra) + SUM(gas) + SUM(aserrin) + SUM(perdidas)) / cantidad 
                         FROM costos) + costo_inicial
                    )";
                $resultadoConsultaCostos = $conexion->query($consultaCostos);

                if ($resultadoConsultaCostos) {
                    echo "Consulta de costo_unitario ejecutada correctamente";
                } else {
                    echo "Error en la consulta de costo_unitario: " . $conexion->error;
                }

                // Consulta para actualizar precio_unitario
                $consultaPrecio = "UPDATE existencias
                    SET precio_unitario = (
                        (SELECT (SUM(ganancias))
                        FROM costos) + costo_unitario
                    )";
                $resultadoConsultaPrecio = $conexion->query($consultaPrecio);

                if ($resultadoConsultaPrecio) {
                    echo "Consulta de precio_unitario ejecutada correctamente";
                } else {
                    echo "Error en la consulta de precio_unitario: " . $conexion->error;
                }

                $conexion->close();

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
            $alertas = $agregar->validarNuevaCuenta();
            $agregar->sincronizar($_POST);

            if (empty($alertas)) {
                echo "alertas vacías";
            } else {
                $resultado = $agregar->guardar();


                if($resultado){
                    echo "<script>alert('Registro ingresado correctamente');</script>";
                    echo "<script>window.location.href = '/inicio';</script>";
                }
            }
        }
        $router->render('inven/agregar', [
            'agregar' => $agregar,
            'alertas' => $alertas
        ]);
    }
}
