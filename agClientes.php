<?php require("header.php"); ?>

<div class="container">
<div class="contenedor_formulario">
<form action="agclientes.php" method="POST">

<label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" placeholder="Pedrinho">


<label for="apellido">Apellido</label>
    <input type="text" name="apellido" id="apellido" placeholder="Goncalves">


<label for="email">Email</label>
    <input type="text" name="email" id="email" placeholder="Pedrinho@hotmail.com">


<label for="direccion">Dirección</label>
    <input type="text" name="direccion" id="direccion" placeholder="Porto Alegre">

    <label for="numero">Número</label>
<input type="text" name="numero" id="numero" placeholder="846">
    
    <input type="submit" value="Agregar" name="Carga">
<input type="reset" value="Borrar">
</form>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    agregarCliente();
}                                       ?>
</div>
</div>