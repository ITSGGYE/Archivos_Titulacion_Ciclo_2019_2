<?php
include('phpqrcode/qrlib.php');
include('db_login.php');
$connection = mysqli_connect($db_host, $db_username, $db_password);
if (!$connection)
{
	die ("Could not connect to the database: <br />". mysql_error());
}
mysqli_select_db($connection,'book');

if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
    header('Location: book.php'); exit;
}


	
$fecha_inicio = date("Y-m-d H:i:s",strtotime(strip_tags( utf8_decode( $_POST['fecha_inicio']))));
$fecha_fin = date("Y-m-d H:i:s",strtotime(strip_tags( utf8_decode( $_POST['fecha_fin']))));
$titulo = strip_tags( utf8_decode( $_POST['titulo'] ) );
$capacitador = strip_tags( utf8_decode( $_POST['capacitador'])) ;

// verifica que los datos obtenidos anteriormente no esten vacios 
if (empty($titulo))
    $error = 'Debes ingresar el titulo.';

if (empty($capacitador))
    $error = 'Debes ingresar el capacitador.';

if (empty($fecha_inicio))
	$error = 'Debes ingresar la fecha de inicio';
	
	
if (empty($fecha_fin))
$error = 'Debes ingresar la fecha de culminacion';


if (isset($error)) {
    header('Location: book.php?e='.urlencode($error)); exit;
}
// realiza la insercion de los datos obtenidos previamente
$query = "INSERT INTO capacitaciones ( DESCRIPCION, fecha_inicio, fecha_fin, id_capacitador) VALUES ('".$titulo."','".$fecha_inicio."','".$fecha_fin."',".$capacitador.")";
$results = mysqli_query($connection,$query);
if (!$results)
{
	die ("No se pudo crear el evento : <br />". mysqli_error());
}

header('Location: bookin.php'); exit;
?>
