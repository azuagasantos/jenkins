<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SalarioTest
 *
 * @author -equipo2
 */

require 'vendor/autoload.php';
require 'ClassCliente.php';

class ClienteTest extends \PHPUnit\Framework\TestCase
{


    public function testDarAlta()
    {

        $servername = "localhost";
        $username = "php";
        $password = "1234";
        $database = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }


        //Primera tanda
        //Primero calculo cuantas lineas hay en la tabla
        $sqlPrueba = "select * from clientes;";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $clientesAntes = $resultado->num_rows;


        $clienteNuevo = new Cliente("nom", "ape", "BBCF5Z7Q9", "2023-02-04", "equipo2tiendaweb@gmail.com");

        $clienteNuevo->darAlta($conn);

        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $clientesDespues = $resultado->num_rows;


        $this->assertEquals($clientesAntes + 1, $clientesDespues, "El cliente se da de alta correctamente");

        //Segunda tanda
        $sqlPrueba = "select * from clientes where dni like 'BBCF5Z7Q9';";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $numeroFilas = $resultado->num_rows;

        $this->assertEquals(1, $numeroFilas, "El cliente se da de alta correctamente, 2a prueba, y no se repiten filas");

        $conn->close();


    }


    public function testBuscarClienteNombre()
    {

        $servername = "localhost";
        $username = "php";
        $password = "1234";
        $database = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        //primero inserto 5 filas en la tabla

        //creo un objeto Cliente, y le pongo valores al azar como en el código real


        $buscador = new Cliente("1", "1", "1", "1", "1");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscarCliente("jorge","nombre",$conn);

        $this->assertEquals(null,$resultado,"Hemos buscado a jorge");

    }


    public function testBuscarClienteApellido()
    {

        $servername = "localhost";
        $username = "php";
        $password = "1234";
        $database = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        //primero inserto 5 filas en la tabla

        //creo un objeto Cliente, y le pongo valores al azar como en el código real


        $buscador = new Cliente("1", "1", "1", "1", "1");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscarCliente("cordon","apellido",$conn);

        $this->assertEquals(null,$resultado,"Hemos buscado el apellido cordon");

    }


    public function testBuscarClienteDNI()
    {

        $servername = "localhost";
        $username = "php";
        $password = "1234";
        $database = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        //primero inserto 5 filas en la tabla

        //creo un objeto Cliente, y le pongo valores al azar como en el código real


        $buscador = new Cliente("1", "1", "1", "1", "1");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscarCliente("123456789","dni",$conn);

        $this->assertEquals(null,$resultado,"Hemos buscado el dni 123456789");

    }



    public function testBuscarClienteEmail()
    {

        $servername = "localhost";
        $username = "php";
        $password = "1234";
        $database = "pruebas";

        // Establecer conexión con la base de datos
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        //primero inserto 5 filas en la tabla

        //creo un objeto Cliente, y le pongo valores al azar como en el código real


        $buscador = new Cliente("1", "1", "1", "1", "1");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscarCliente("este@nada","email",$conn);

        $this->assertEquals(null,$resultado,"Hemos buscado el email este@nada");

    }
}

?>