<h1 class="nombre-pagina">Agregar</h1>

<form class="formulario" method="POST" action="/inicio">
<div class="campo">
    <label form="costo">Costo</label>
    <input type="number" id="costo" placeholder="$0" name="costo" value="<?php echo s($agregar->costo);?>">
</div>

<div class="campo">
    <label form="cantidad">Cantidad</label>
    <input type="number" id="cantidad" placeholder="" name="cantidad" value="<?php echo s($agregar->cantidad);?>">
</div>

<input type="submit" class="boton" value="Agregar">

</form>

<a href="/inicio"><button>Inicio</button></a>