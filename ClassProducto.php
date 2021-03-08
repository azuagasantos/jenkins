<?php

// Clases
class producto {

  //Estados
  private $fcod;
  private $fdesc;
  private $fprecio;
  private $fstock;
  private $tipoBusqueda;
  private $busqueda;

  //comportamientos
  function __construct($fcod,$fdesc,$fprecio,$fstock) {
    $this->fcod = $fcod;
    $this->fdesc = $fdesc;
    $this->fprecio = $fprecio;
    $this->fstock = $fstock;
  }

  function insertarProducto($conn){
    $sql = "INSERT INTO productos (cod, descripcion, precio, stock) VALUES ('".$this->fcod."', '".$this->fdesc."', '".$this->fprecio."', '".$this->fstock."');";
    if ($conn->query($sql) == true){
      echo "Nuevo registro insertado correctamente.";
    } else {
      echo "Error: ".$sql.$conn->error;
    }
  }

  function buscarProducto($busqueda,$tipoBusqueda,$conn){
    $sql = "SELECT * FROM productos WHERE ";
    switch ($tipoBusqueda) {
      case "codigo":
        $sql = $sql."cod like '%$busqueda%';";
        break;
      case "descripcion":
        $sql = $sql."descripcion like '%$busqueda%';";
        break;
      case "precio":
        $sql = $sql."precio like '%$busqueda%';";
	    break;
      case "stock":
        $sql = $sql."stock like '%$busqueda%';";
        break;
      default:
        echo "Se ha producido un error durante la búsqueda. ";
    }

    $resultado = mysqli_query($conn, $sql);

    // Consulta para realizar la busqueda en la base de datos
    if (mysqli_num_rows($resultado) > 0) {
    // Salida de datos por cada fila
    while($row = mysqli_fetch_assoc($resultado)) {
        echo "- Código: " . $row["cod"] . ", Descripción: " . $row["descripcion"] . ", Precio: " . $row["precio"] . ", Stock: " . $row["stock"] . "<br>";
    }
    }else{
    echo "No se han encontrado resultados.";
    }
    }
}

?>