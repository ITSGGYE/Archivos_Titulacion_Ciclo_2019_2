<?php
include('db_login.php');
$connection = mysqli_connect($db_host, $db_username, $db_password);
if (!$connection)
{
	die ("Could not connect to the database: <br />". mysql_error());
}
mysqli_select_db($connection,'book');

if (!isset($_POST['id_asiento']) ) {
    header('Location: book.php'); exit;
}

$id_asiento = strip_tags( utf8_decode( $_POST['id_asiento'] ) );
// actualiza el asiento de resolver el qr que contiene el id del asiento para grabar la asistencia
$query = "UPDATE asientos set asistencia=1 where id_asiento=".$id_asiento;
$results = mysqli_query($connection,$query);
if (!$results)
{
	die ("No se puedo agregar asistencia al asiento : <br />". mysqli_error());
} 


?>


