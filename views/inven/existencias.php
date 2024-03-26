<h1 class="nombre-pagina">Existencias</h1>


<head>
</head>
<body>

<?php
// Conectarse a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "granja24";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realizar la consulta
$sql = "SELECT semana, cantidad, costo, precio FROM existencias";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir los datos en una tabla
    echo "<table>";
    echo "<tr><th>Semana</th><th>Cantidad</th><th>Costo Unitario</th><th>Precio Unitario</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["semana"]."</td><td>".$row["cantidad"]."</td><td>".$row["costo"]."</td><td>".$row["precio"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>

</body>

<button class="boton" onclick="redireccionar()">Agregar</button>
<a href="/costos"><button>Costos</button></a>
<a href="/ventas"><button>Ventas</button></a>
<a href="/perdidas"><button>Perdidas</button></a>
<a href="/panel"><button>Panel</button></a>

<script>
  function redireccionar() {
    window.location.href = "/agregar";
  }
</script>