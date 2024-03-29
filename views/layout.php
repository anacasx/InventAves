<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salón</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
<div class="imagen">
        <!-- Aquí puedes agregar tu imagen -->
        <img src="ruta/de/la/imagen.jpg" alt="Descripción de la imagen">
    </div>
<div class="menu">
        <a href="/agregar">Agregar</a>
        <a href="/costos">Costos</a>
        <a href="/inicio">Existencias</a>
        <a href="/perdidas">Perdidas</a>
        <a href="/ventas">Ventas</a>
        <a href="/admin">Admin</a>
    </div>

    <div class="contenedor-app">
        <?php echo $contenido; ?>
        <!--<div class="imagen"></div>
        <div class="app">
        
        </div>-->
    </div> 
            
</body>
</html>