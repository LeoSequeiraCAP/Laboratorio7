<?php require("header.php"); ?>

<div class="contenedor_formulario2">
<form action="buscarcliente.php" method="POST">

<label for="idcliente">ID</label>
    <input type="number" name="idCliente" id="idCliente" placeholder="ID">

    <input type="submit" value="Buscar" name="Carga">
</form>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    buscarCliente();
                                       
$infoCliente = buscarCliente();
if ($infoCliente) 
{
    echo "<h2>Información del Cliente:</h2>";
    echo "<p>Nombre: " . htmlspecialchars($infoCliente[0]['nombreC']) . "</p>";
    echo "<p>Dirección: " . htmlspecialchars($infoCliente[0]['direccion']) . "</p>";
    echo "<p>Email: " . htmlspecialchars($infoCliente[0]['email']) . "</p>";

    echo "<h2>Compras del Cliente:</h2>";
    if (count($infoCliente) > 1 || $infoCliente[0]['fecha'] != null) {
        echo "<ul>";
        foreach ($infoCliente as $compra) {
            echo "<li>Fecha: " . htmlspecialchars($compra['fecha']) . 
                 " - Producto: " . htmlspecialchars($compra['producto_nombre']) . 
                 " - Precio: " . htmlspecialchars($compra['precio']) . " UYU</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Este cliente no tiene compras registradas.</p>";
    }
} else {
    echo "<p>No se encontró el cliente.</p>";
} }     ?>     
</div>
</div>