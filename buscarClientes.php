<?php

require './ClassCliente.php';

// Variables
$servername = "localhost:3306";
$username = "php";
$password = "1234";
$database = "pruebas";
$busqueda = $_POST["search"];
$tipoBusqueda = $_POST["opcion"];


$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$clienteNuevo=new Cliente("test","test","test","test","test");
$clienteNuevo->buscarCliente($busqueda,$tipoBusqueda,$conn);

mysqli_close($conn);

?>