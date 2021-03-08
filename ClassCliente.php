<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

class Cliente {
//Estado
private $fdni;
private $fnom;
private $fape;
private $fdate;
private $fmail;

//Comportamiento

function __construct($fnom,$fape,$fdni,$fdate,$fmail) {
$this->fdni = $fdni;
$this->fnom = $fnom;
$this->fape = $fape;
$this->fdate = $fdate;
$this->fmail = $fmail;
}

//darse de alta
function darAlta($conn) {
$sql = "INSERT INTO clientes (nombre,apellidos,dni,fechadenacimiento,email) VALUES ('".$this->fnom."','".$this->fape."','".$this->fdni."','".$this->fdate."','".$this->fmail."');";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";


// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'equipo2tiendaweb@gmail.com';                     // SMTP username
    $mail->Password   = 'Equipillo2TW';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('equipo2tiendaweb@gmail.com', 'Mailer');
    $mail->addAddress("$this->fmail");     // Add a recipient
    $mail->addReplyTo('equipo2tiendaweb@gmail.com');
    $mail->addCC('equipo2tiendaweb@gmail.com');
    $mail->addBCC('equipo2tiendaweb@gmail.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'TIENDA WEB 3.0';
    $mail->Body    = 'Registro completado. Gracias por confiar en nosotros.</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'El mensaje ha sido enviado.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


//hago la construccion del email y lo mando
//$miEmail = new envioEmail($mail);
//$miEmail->sendMail();


} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}


//buscar

function buscarCliente($busqueda,$tipoBusqueda,$conn){

    // Consulta para realizar la búsqueda en la base de datos
$sql = "SELECT * FROM clientes WHERE ";
switch ($tipoBusqueda){
case "nombre":
$sql = $sql."nombre like '%$busqueda%';";
break;
case "apellido":
$sql = $sql."apellidos like '%$busqueda%';";
break;
case "email":
$sql = $sql."email like '%$busqueda%';";
break;
case "dni":
$sql = $sql."dni like '%$busqueda%';";
break;
default:
echo "Se ha producido un error durante la búsqueda.";
}

$resultado = mysqli_query($conn, $sql);

// Consulta para realizar la busqueda en la base de datos
if (mysqli_num_rows($resultado) > 0) {
// Salida de datos por cada fila
while($row = mysqli_fetch_assoc($resultado)) {
echo "- Nombre: ".$row["nombre"].", Apellidos: ".$row["apellidos"].", Email: ".$row["email"].", DNI: ".$row["dni"]."<br>";
}
}else{
echo "No se han encontrado resultados.";
}
}




}
?>