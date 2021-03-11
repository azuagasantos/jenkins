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
require 'ClassProducto.php';

class ProductoTest extends \PHPUnit\Framework\TestCase
{


    public function testinsertarProducto()
    {

        $servername = "localhost:3306";
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
        $sqlPrueba = "select * from productos;";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $productosAntes = $resultado->num_rows;


        $productoNuevo = new producto("1", "desc", "23", "23");

        $productoNuevo->insertarProducto($conn);

        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $productosDespues = $resultado->num_rows;


        $this->assertEquals($productosAntes + 1, $productosDespues, "El producto se ha insertado correctamente");

        //Segunda tanda
        $sqlPrueba = "select * from productos where cod like '1';";
        $resultado = $conn->query($sqlPrueba);

        // Consulta para realizar la busqueda en la base de datos
        $numeroFilas = $resultado->num_rows;

        $this->assertEquals(1, $numeroFilas, "El producto se ha insertado correctamente, 2a prueba, y no se repiten filas");

        $conn->close();


    }
    public function testBuscarProductoCodigo()
    {

        $servername = "localhost:3306";
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


        $buscador = new producto("1","1","1","1");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscarProducto("1","codigo",$conn);

        $this->assertEquals(null,$resultado,"Hemos buscado el código 1");

    }


    public function testBuscarProductoDescripcion()
    {

        $servername = "localhost:3306";
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


        $buscador = new producto("1","1","1","1");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscarProducto("desc","descripcion",$conn);

        $this->assertEquals(null,$resultado,"Hemos buscado la descripcion desc");

    }


    public function testBuscarProductoPrecio()
    {

        $servername = "localhost:3306";
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


        $buscador = new producto("1","1","1","1");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscarProducto("23","precio",$conn);

        $this->assertEquals(null,$resultado,"Hemos buscado el precio 23");

    }


    public function testBuscarProductoStock()
    {

        $servername = "localhost:3306";
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


        $buscador = new producto("1","1","1","1");



        //lanzo una peticion cliente->buscar("Ped","onom",$conn) que tiene que ser resultado == 1
        $resultado = $buscador->buscarProducto("23","stock",$conn);

        $this->assertEquals(null,$resultado,"Hemos buscado el stock 23");
    }
}
?>
