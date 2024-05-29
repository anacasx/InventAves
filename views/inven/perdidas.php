<h1 class="nombre-pagina">Registro de Pérdidas</h1>

<form class="formulario" method="POST" action="/perdidas">
    <div class="campo">
        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" placeholder="" name="cantidad" value="<?php echo isset($agregar) ? s($agregar->cantidad) : ''; ?>">
    </div>

    <div class="campo">
        <label for="semana">Semana</label>
        <select name="semana" id="semanaSelect">
            <option value="" selected disabled>Seleccione una semana</option>
            <?php
            // Aquí debes recuperar las opciones de semanas de tu base de datos
            // Supongamos que tienes un array con las opciones de semanas
            $semanas = [1,2,3,5];
            foreach ($semanas as $semana) {
                echo "<option value='$semana'>$semana</option>";
            }
            ?>
        </select>
    </div>

    <input type="submit" class="boton" value="Aceptar">
</form>
