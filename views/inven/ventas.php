<h1 class="nombre-pagina">Ventas</h1>
<p class="descripcion-pagina"> Bienvenido a la pantalla de ventas</p>

<form class="formulario" method="POST" 
                    action="/ventas">
                    <div class="campo">
    <label for="semana">Semana</label>
    <select name="semana">
        <option value="1" <?php if ($ventas->semana == 1) echo "selected"; ?>>1</option>
        <option value="2" <?php if ($ventas->semana == 2) echo "selected"; ?>>2</option>
        <option value="3" <?php if ($ventas->semana == 3) echo "selected"; ?>>3</option>
        <option value="4" <?php if ($ventas->semana == 4) echo "selected"; ?>>4</option>
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
            

<div class="campo">
<label for="precioU">Precio Unitario</label>
<input  type="text"
        id="precioU"
        name="precioU"
        placeholder="precioU"
        value="<?php echo s($ventas->precioU); ?>"
/>
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