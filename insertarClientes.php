<?php

require './ClassCliente.php';

// Variables
$servername = "localhost:3306";
$database = "pruebas";
$username = "php";
$password = "1234";
$fdni = $_POST["DNI"];
$fnom = $_POST["Nombre"];
$fape = $_POST["Apellidos"];
$fmail = $_POST["Email"];
$fdate = $_POST["fecha"];


//DEBUG
//echo "valores: $fdni,$fnom,$fape,$fdate,$fmail";




// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
      die("ERROR CONECTANDO: " . $conn->connect_error);
}

//Creamos un objeto cliente y le pedimos el alta
$clienteNuevo = new Cliente($fnom,$fape,$fdni,$fdate,$fmail);
$clienteNuevo->darAlta($conn);
$conn->close();

//DEBUG
//echo "Finalizado e insertado: $fdni,$fnom,$fape,$fdate,$fmail";




//$nombre=$_POST["Nombre"];
//$apellidos=$_POST["Apellidos"];
//$dni=$_POST["DNI"];
//$email=$_POST["Email"];
//$fechadenacimiento=$_POST["fecha"];


//$sql = "INSERT INTO clientes (nombre, apellidos, dni, email, fechadenacimiento) VALUES ('$nombre','$apellidos', '$dni', '$email', '$fechadenacimiento')";
//if (mysqli_query($conn, $sql)) {
//      echo "El nuevo campo ha sido añadido.";
//} else {
//      echo "ERROR INSERTANDO: " . $sql . "<br>" . mysqli_error($conn);
//}
//mysqli_close($conn);
?>
