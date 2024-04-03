<h1 class="nombre-pagina">Ventas</h1>
<p class="descripcion-pagina"> Bienvenido a la pantalla de ventas</p>

<form class="formulario" method="POST" 
                    action="/ventas">
                    <div class="campo">
    <label for="semana">Semana</label>
    <select name="semana">
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

        // Consulta para obtener los datos de la tabla "existencias"
        $query = "SELECT semana FROM existencias ORDER BY semana ASC";
        $result = $conn->query($query);

        // Verificar si la consulta devuelve algún resultado
        if ($result->num_rows > 0) {
            // Iterar sobre los resultados y generar los options
            while ($row = $result->fetch_assoc()) {
                $semana = $row['semana'];
                // Verificar si la semana actual coincide con la semana de la tabla "existencias"
                $selected = ($ventas->semana == $semana) ? "selected" : "";
                // Generar el option con el valor de la semana
                echo "<option value='$semana' $selected>$semana</option>";
            }
        } else {
            echo "<option value=''>No hay semanas disponibles</option>";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </select>
</div>
<div class="campo">
<label for="cantidad">Cantidad</label>
<input  type="text"
        id="cantidad"
        name="cantidad"
        placeholder="cantidad"
        value="<?php echo s($ventas->cantidad); ?>"
/>
</div>
            

<?php
// Suponiendo que ya tienes una conexión a la base de datos establecida
// y la variable $conexion representa esta conexión.
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
// Realizar la consulta a la base de datos
$query = "SELECT precio_unitario FROM existencias WHERE semana = 2";
$resultado = mysqli_query($conn, $query);

// Verificar si se obtuvo un resultado
if ($resultado) {
    // Obtener el valor de precio_unitario si existe
    $fila = mysqli_fetch_assoc($resultado);
    $precio_unitario = $fila['precio_unitario'];
} else {
    // Si no se encuentra el valor, establecer un valor por defecto
    $precio_unitario = "No encontrado";
}
?>

<div class="campo">
    <label for="precioU">Precio Unitario</label>
    <!-- Mostrar el valor obtenido en el input -->
    <input type="text" id="precioU" name="precioU" placeholder="precioU" value="<?php echo $precio_unitario; ?>" />
</div>


<div class="campo">
<label for="total">Total</label>
<input type="text" id="total" name="total" placeholder="total" readonly />
</div>



<input type="submit"
     value="Aceptar" class="boton">

</form>


<script>
    // Función para calcular el total
    function calcularTotal() {
        var cantidad = document.getElementById('cantidad').value;
        var precioU = document.getElementById('precioU').value;
        var total = cantidad * precioU;
        document.getElementById('total').value = total;
    }

    // Llamar a la función cuando se cambie la cantidad o el precio unitario
    document.getElementById('cantidad').addEventListener('input', calcularTotal);
    document.getElementById('precioU').addEventListener('input', calcularTotal);

    // Calcular el total inicialmente
    calcularTotal();
</script>
