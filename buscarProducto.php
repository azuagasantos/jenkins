<?php

require './ClassProducto.php';

// Variables
$servername = "localhost:3306";
$username = "php";
$password = "1234";
$database = "pruebas";

// Conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$busqueda = $_POST["search"];
$tipoBusqueda = $_POST["opcion"];

// Buscar producto
$productoExistente = new Producto("prueba","prueba","prueba","prueba");
$productoExistente->buscarProducto($busqueda,$tipoBusqueda,$conn);
$conn->close();

?>
