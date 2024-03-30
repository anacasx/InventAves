<h1 class="nombre-pagina">Agregar</h1>

<form class="formulario" method="POST" action="/agregar">
<div class="campo">
    <label form="costo_inicial">Costo</label>
    <input type="number" id="costo_inicial" placeholder="$0" name="costo_inicial" value="<?php echo s($agregar->costo_inicial);?>">
</div>

<div class="campo">
    <label form="cantidad">Cantidad</label>
    <input type="number" id="cantidad" placeholder="" name="cantidad" value="<?php echo s($agregar->cantidad);?>">
</div>

<input type="submit" class="boton" value="Agregar">

</form>

<a href="/inicio"><button>Inicio</button></a>