<h1 class="nombre-pagina">Agregar usuarios</h1>

<form class="formulario" method="POST" action="/admin">
<div class="campo">
    <label form="usuario">Nombre Usuario</label>
    <input type="text" id="usuario" placeholder="Escribe el nombre del usuario" name="usuario" value="<?php echo s($admin->usuario);?>">
</div>

<div class="campo">
    <label form="correo">Correo</label>
    <input type="email" id="correo" placeholder="Escribe un correo" name="correo" value="<?php echo s($admin->correo);?>">
</div>

<div class="campo">
    <label form="contraseña">Contraseña</label>
    <input type="password" id="contraseña" placeholder="Escribe una contraseña" name="contraseña" value="<?php echo s($admin->contraseña);?>">
</div>

<div class="campo">
    <label for="adminis">Admin</label>
    <select name="adminis">
        <option value="0" <?php if ($admin->adminis == 0) echo "selected"; ?>>Usuario</option>
        <option value="1" <?php if ($admin->adminis == 1) echo "selected"; ?>>Admin</option>

    </select>
</div>
<input type="submit" class="boton" value="Agregar">

</form>

<body>

<?php
// Conectarse a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventaves";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realizar la consulta
$sql = "SELECT usuario, correo, contraseña, adminis  FROM admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir los datos en una tabla
    echo "<table>";
    echo "<tr><th>Usuario</th><th>Correo</th><th>Admin</th>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["usuario"]."</td><td>".$row["correo"]."</td><td>".$row["adminis"]."</td>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>


</body>

<a href="/inicio"><button>Inicio</button></a>
