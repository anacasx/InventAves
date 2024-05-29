<h1 class="nombre-pagina">Ventas</h1>
<p class="descripcion-pagina"> Bienvenido a la pantalla de ventas</p>

<form class="formulario" method="POST" 
                    action="/ventas">
                    <div class="campo">
    <label for="semana">Semana</label>
    <select name="semana" id="semanaSelect">
        <option value="" selected disabled>Seleccione una semana</option>
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
        $query = "SELECT semana, precio_unitario FROM existencias ORDER BY semana ASC";
        $result = $conn->query($query);

        // Verificar si la consulta devuelve algún resultado
        if ($result->num_rows > 0) {
            // Iterar sobre los resultados y generar los options
            while ($row = $result->fetch_assoc()) {
                $semana = $row['semana'];
                $precio_unitario = $row['precio_unitario'];
                // Generar el option con el valor de la semana
                echo "<option value='$semana' data-precio='$precio_unitario'>$semana</option>";
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
    <label for="precio_unitario">Precio Unitario</label>
    <input type="text" name="precio_unitario" id="precioUnitarioInput" readonly placeholder="Precio unitario">
</div>

<script>
    // Obtener referencia al select y al input
    var selectSemana = document.getElementById('semanaSelect');
    var precioUnitarioInput = document.getElementById('precioUnitarioInput');

    // Escuchar cambios en el select
    selectSemana.addEventListener('change', function() {
        // Obtener el precio unitario de la opción seleccionada
        var selectedOption = selectSemana.options[selectSemana.selectedIndex];
        var precioUnitario = selectedOption.getAttribute('data-precio');

        // Actualizar el valor del input con el precio unitario
        precioUnitarioInput.value = precioUnitario;
    });
</script>

<div class="campo">
<label for="cantidad">Cantidad</label>
<input  type="text"
        id="cantidad"
        name="cantidad"
        placeholder="Cantidad de pollos"
        value="<?php echo s($ventas->cantidad); ?>"
/>
</div>

<div class="campo">
<label for="total">Total</label>
<input type="text" id="total" name="total" placeholder="total" readonly value="<?php echo s($ventas->total); ?>" />
</div>



<input type="submit"
     value="Aceptar" class="boton">

</form>


<script>
    // Función para calcular el total
    function calcularTotal() {
        var cantidad = document.getElementById('cantidad').value;
        var precioUnitarioInput = document.getElementById('precioUnitarioInput').value;
        var total = cantidad * precioUnitarioInput;
        document.getElementById('total').value = total;
    }

    // Llamar a la función cuando se cambie la cantidad o el precio unitario
    document.getElementById('cantidad').addEventListener('input', calcularTotal);
    document.getElementById('precioUnitarioInput').addEventListener('input', calcularTotal);

    // Calcular el total inicialmente
    calcularTotal();
</script>
