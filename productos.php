<?php 
require("header.php");
$productos = datosProductos();
?>      

 <div class="contenedor_cuadros">
<?php foreach ($productos as $cuadro): ?>

    <div class="cuadro-productos">
    

<div class="nombre-cuadro"><?php echo htmlspecialchars($cuadro['nombre']); ?></div>

<div class="precio-cuadro"><?php echo htmlspecialchars($cuadro['precio']); ?> UYU</div>

<div class="descripcion-cuadro"><?php echo htmlspecialchars($cuadro['descripcion']); ?></div>

<div class="origen-cuadro">From <?php echo htmlspecialchars($cuadro['origen']); ?></div>

</div>

<?php endforeach; ?>










</body>