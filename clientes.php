<?php 
require("header.php");
$clientes = datosClientes();
?>

 <div class="contenedor_cuadros">
<?php foreach ($clientes as $cuadro): ?>

    <div class="cuadro">
    

<div class="nombre-cuadro"><?php echo htmlspecialchars($cuadro['nombreC']); ?></div>
    
<div class="email-cuadro"><?php echo htmlspecialchars($cuadro['email']); ?></div>
    
<div class="direccion-cuadro"><?php echo htmlspecialchars($cuadro['direccion']); ?></div>

 </div>   
<?php endforeach; ?>









</body>