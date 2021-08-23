<?php
//agrega codigo de phpmailer para enviar correo
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'assets/PHPMailer/PHPMailer-master/src/Exception.php';
require 'assets/PHPMailer/PHPMailer-master/src/PHPMailer.php';
require 'assets/PHPMailer/PHPMailer-master/src/SMTP.php';

session_start();
include('phpqrcode/qrlib.php');
include('db_login.php');
$connection = mysqli_connect($db_host, $db_username, $db_password);
if (!$connection)
{
	die ("Could not connect to the database: <br />". mysql_error());
}
mysqli_select_db($connection,'book');
//revisa si se encuentra la variable save del post
if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
    header('Location: book.php'); exit;
}


	
// obtiene la fecha del evento 
$fecha = strip_tags( utf8_decode( $_POST['fecha_evento'] ) );
//revisa las capacitaciones en base a la fecha
$query = "select * from 
			capacitaciones 
			where DATE(fecha_inicio)='". $fecha . "' "; 
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_array($result);
// obtiene el idea de la capacitacion en base  a la fecha 
$id_capacitacion = $row["ID_CAPACITACION"];

//obtiene variables de nombre email y asiento enviadas por el post
$nombre = strip_tags( utf8_decode( $_POST['nombre'] ) );
$email = strip_tags( utf8_decode( $_POST['email'] ) );
$asiento = strip_tags( utf8_decode( $_POST['ch'] ) );
	
// chequea que se obtienen los elementos
if (empty($nombre))
    $error = 'Debes ingresar el nombre.';

elseif (empty($email)) 
    $error = 'Debes ingresar un correo electronico.';

elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email))
    $error = 'Debes ingresar un correo electronico valido.';

	
// si existe algun error retorna
if (isset($error)) {
    header('Location: book.php?e='.urlencode($error)); exit;
}


$id_usuario = $_SESSION['user_id'];
//inserta el asiento
$query = "INSERT INTO asientos ( ASIENTO, ID_EMPLEADO, ID_CAPACITACION) VALUES ($asiento,$id_usuario,$id_capacitacion)";

$results = mysqli_query($connection,$query);
$id_resultante =mysqli_insert_id($connection);

// if(!empty($message))
// {
// 	$message = "A new user '". $nombre ."' has booked seat number: '". $asiento ."'." . "His message is as below."  ;	
// }
// else
// {
// 	$message = "A new user '". $nombre ."' has booked seat number: '". $asiento;	
// }



// $messageUser = "Su asiento ha sido reservado. The seat number is: " . $asiento;

mysqli_close($connection);	

// crea un nuevo objeto phpmailer para enviar correo 
$mail = new PHPMailer(true);

try {
    // variables para envio de mail
    $mail->isSMTP();                                            
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;   
    $mail->Username   = 'book.in.2.0.2.0@gmail.com';                     
    $mail->Password   = 'Belencita2021';                            
    $mail->Port       =587;                                   
    $codeContents= $id_resultante ;
    $fileName = '005_file_'.md5($codeContents).'.png';
    $pngAbsoluteFilePath = $fileName;
    $urlRelativeFilePath = $fileName;
    QRcode::png($codeContents, $pngAbsoluteFilePath, QR_ECLEVEL_H);

    $mail->addAttachment($pngAbsoluteFilePath);
    $mail->setFrom('book.in.2.0.2.0@gmail.com', 'Reserva'); 
    //variable quemada con mi correo para no enviar al institucional
    $mail->addAddress('karenbelen0201@hotmail.com', 'Karen');


  
    $mail->isHTML(true);                                  
    $mail->Subject = 'Se ha generado una reserva';
    $mail->Body    = 'Se ha generado una reserva para el dia '.$fecha;
    $mail->AltBody = 'Este es el mensaje en texto plano para los clientes que no pueden leer HTML';

    $mail->send();
    ?>
<!DOCTYPE HTML>
<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>BookIn</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
	</HEAD>

	<BODY>
    <?php
    echo '<div class="alert alert-success" role="alert"> Se ha generado la reserva correctamente!     </div>';    
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Error de correo: {$mail->ErrorInfo}";
}


?>
<script type="text/javascript">
// retorna a pagina principal
    setTimeout(function(){
        window.location.href = 'bookin.php';
    }, 1500) 
</script>