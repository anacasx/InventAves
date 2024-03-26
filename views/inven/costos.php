<h1 class="nombre-pagina">Costos</h1>

<p class="descripcion-pagina">Agrega los costos para la semana #</p>
<form class="formulario" method="POST" action="/costos">
<div class="campo">
    <label form="alimento">Alimento</label>
    <input type="number" id="alimento" placeholder="$0" name="alimento" value="<?php echo s($costos->alimento);?>">
</div>

<div class="campo">
    <label form="agua">Agua</label>
    <input type="number" id="agua" placeholder="$0" name="agua" value="<?php echo s($costos->agua);?>">
</div>

<div class="campo">
    <label form="medicina">Medicina</label>
    <input type="number" id="medicina" placeholder="$0" name="medicina" value="<?php echo s($costos->medicina);?>">
</div>

<div class="campo">
    <label form="mobra">Mano de Obra</label>
    <input type="number" id="mobra" placeholder="$0" name="mobra" value="<?php echo s($costos->obra);?>">
</div>

<div class="campo">
    <label form="gas">Gas</label>
    <input type="number" id="gas" placeholder="$0" name="gas" value="<?php echo s($costos->gas);?>">
</div>

<div class="campo">
    <label form="aserrin">Aserrín</label>
    <input type="number" id="aserrin" placeholder="$0" name="aserrin" value="<?php echo s($costos->aserrin);?>">
</div>

<div class="campo">
    <label form="perdidas">Perdidas</label>
    <input type="number" id="perdidas" placeholder="$0" name="perdidas" value="<?php echo s($costos->perdidas);?>">
</div>

<div class="campo">
    <label form="margen">Margen de Ganancia</label>
    <input type="number" id="margen" placeholder="$0" name="margen" value="<?php echo s($costos->margen);?>">
</div>

<input type="submit" class="boton" value="Aceptar">

</form>

<p></p>

<a href="/inicio"><button>Regresar</button></a>