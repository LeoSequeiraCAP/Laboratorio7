<?php require("header.php"); ?>

<div class="contenedor_formulario2">
<form action="buscarproducto.php" method="POST">

<label for="idprod">ID</label>
    <input type="number" name="idprod" id="idProd" placeholder="ID">

    <input type="submit" value="Buscar" name="Carga">
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    buscarProd();
                                       
$infoProducto = buscarProd();
if ($infoProducto) 
{
        echo "<h2>Información del Producto:</h2>";
        echo "<p>Nombre: " . htmlspecialchars($infoProducto['nombre']) . "</p>";
        echo "<p>Precio: " . htmlspecialchars($infoProducto['precio']) . " UYU</p>";
        echo "<p>Descripción: " . htmlspecialchars($infoProducto['descripcion']) . "</p>";
        echo "<p>Origen: " . htmlspecialchars($infoProducto['origen']) . "</p>";
} 
else 
{
        echo "<p>No se encontro el producto.</p>";
}         }      ?>     

</div>
</div>