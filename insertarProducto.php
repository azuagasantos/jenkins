<?php

require './ClassProducto.php';

// Variables
$servername = "localhost";
$username = "php";
$password = "1234";
$database = "pruebas";


// Conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: ".$conn->connect_error);
}

// Datos del formulario
$fcod = $_POST["codigo"];
$fdesc = $_POST["descripcion"];
$fprecio = $_POST["precio"];
$fstock = $_POST["stock"];

// Insertar producto
$productoNuevo = new Producto($fcod,$fdesc,$fprecio,$fstock);
$productoNuevo->insertarProducto($conn);
$conn->close();

?>