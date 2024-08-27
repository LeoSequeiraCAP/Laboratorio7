<?php
function datosClientes() {
    require "conexion.php";
    $sql = "SELECT * FROM cliente";
    $result = $conn->query($sql);

    $clientes = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }
    }

    return $clientes;
}

function datosProductos() {
    require "conexion.php";
    $sql = "SELECT * FROM producto";
    $result = $conn->query($sql);

    $productos = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    }

    return $productos;
}

function agregarCliente(){
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nombreC = $nombre . " " . $apellido;
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $numero = $_POST['numero'];
    $direccionC = $direccion . " " . $numero;

     $sql = "INSERT INTO cliente (nombreC, direccion, email) VALUES (?, ?, ?)";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("sss", $nombreC, $direccionC, $email);
 
     if ($stmt->execute()) {
         header("index.php");
         exit();
     } else {
      
         echo "Error: " . $stmt->error;
     }

     $stmt->close();
     $conn->close();
 }

 function agregarProducto(){
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $origen = $_POST['origen'];

     $sql = "INSERT INTO producto (nombre, precio, descripcion, origen) VALUES (?, ?, ?, ?)";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("sdss", $nombre, $precio, $descripcion, $origen);
 
     if ($stmt->execute()) {
         header("index.php");
         exit();
     } else {
      
         echo "Error: " . $stmt->error;
     }

     $stmt->close();
     $conn->close();
 }

 function buscarProd() {
    require "conexion.php";
    
    $idProd = $_POST['idprod'];
    $sql = "SELECT * FROM producto WHERE cod_P = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idProd);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        return $resultado->fetch_assoc();
    } else {
        return null;
    }

    $stmt->close();
    $conn->close();
}

function buscarCliente() {
    require "conexion.php";
    $idCliente = $_POST['idCliente'];
    $sql = "
        SELECT cliente.nombreC, cliente.direccion, cliente.email, 
               compra.fecha, producto.nombre AS producto_nombre, producto.precio
        FROM cliente
        LEFT JOIN compra ON cliente.cod_cli = compra.cod_cli
        LEFT JOIN producto ON compra.cod_p = producto.cod_P
        WHERE cliente.cod_cli = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idCliente);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $clienteCompras = [];
        while ($row = $resultado->fetch_assoc()) {
            $clienteCompras[] = $row;
        }
        return $clienteCompras;
    } else {
        return null;
    }

    $stmt->close();
    $conn->close(); 
}