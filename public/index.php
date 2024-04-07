<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;

$router = new Router();
$router-> get('/', [LoginController::class,'login']);
$router-> post('/', [LoginController::class,'login']);


$router-> get('/login', [LoginController::class,'login']);
$router-> post('/login', [LoginController::class,'login']);

$router-> get('/panel', [LoginController::class,'panel']);
$router-> post('/panel', [LoginController::class,'panel']);

$router-> get('/agregar', [LoginController::class,'agregar']);
$router-> post('/agregar', [LoginController::class,'agregar']);

$router-> get('/inicio', [LoginController::class,'inicio']);
$router-> post('/inicio', [LoginController::class,'inicio']);

$router-> get('/perdidas', [LoginController::class,'perdidas']);
$router-> post('/perdidas', [LoginController::class,'perdidas']);

$router-> get('/ventas', [LoginController::class,'ventas']);
$router-> post('/ventas', [LoginController::class,'ventas']);

$router-> get('/costos', [LoginController::class,'costos']);
$router-> post('/costos', [LoginController::class,'costos']);

$router-> get('/admin', [LoginController::class,'admin']);
$router-> post('/admin', [LoginController::class,'admin']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
