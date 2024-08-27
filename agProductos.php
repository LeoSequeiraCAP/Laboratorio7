<?php require("header.php"); ?>

<div class="contenedor_formulario">
<form action="agproductos.php" method="POST">

<label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" placeholder="Camiseta">


<label for="precio">Precio</label>
    <input type="number" name="precio" id="precio" placeholder="4000">

<label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" id="descripcion" placeholder="Camiseta original">

    <label for="origen">Origen</label>
<input type="text" name="origen" id="origen" placeholder="Tuvalu">
    
    <input type="submit" value="Agregar" name="Carga">
<input type="reset" value="Borrar">
</form>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    agregarProducto();
}                                       ?>
</div>
</div>