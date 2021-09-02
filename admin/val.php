<?php
session_start();
include_once 'conexion.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
//$contrasena =  hash('sha1', $contrasena);

$contrasena = encryptData($contrasena);

function encryptData($data)
{
	$clave = 'cadalargadepassdeingresodelsistemafundacionconexionvital';
	$method = 'aes-256-cbc';
	$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
	$encrypted_data = openssl_encrypt($data, $method, $clave, false, $iv);
	return $encrypted_data;
}

$sentencia = $bd->prepare('select * from administrador where
								usuario = ? and contrasena = ?;');
$sentencia->execute([$usuario, $contrasena]);
$datos = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($datos);

if ($datos === false) {
	echo '<script>
    alert("Incorrecto, Intentelo de Nuevo");
   window.location.href="index.php";
 </script> ';
} else if ($sentencia->rowCount() == 1) {
	$_SESSION['nombre'] = $datos->usuario;

	echo '<script>
    alert("Bienvenido Administrador");
   window.location.href="inicio.php";
 </script> ';
}
?>

