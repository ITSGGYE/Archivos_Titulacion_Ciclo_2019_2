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


	
// obtiene los datos enviados 
$nombre = strip_tags( utf8_decode( $_POST['nombre'] ) );
$cedula = strip_tags( utf8_decode( $_POST['cedula'])) ;
	
if (empty($nombre))
    $error = 'Debes ingresar el nombre.';

if (empty($cedula))
    $error = 'Debes ingresar la cedula.';
	
if (isset($error)) {
    header('Location: book.php?e='.urlencode($error)); exit;
}
// realiza la insercion con los datos obtenidos previamente
$query = "INSERT INTO capacitadores ( nombre,cedula) VALUES ('".$nombre."','".$cedula."')";
$results = mysqli_query($connection,$query);
if (!$results)
{
	die ("No se pudo crear el capacitador : <br />". mysqli_error());
}

header('Location: bookin.php'); exit;
?>
