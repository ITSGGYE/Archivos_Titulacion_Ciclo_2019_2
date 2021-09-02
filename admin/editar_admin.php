<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: index.php');
}

?>

 <?php
include_once "conexion.php";

$id = $_POST["id"];
$usuario = $_POST["usuario"];
$pass = $_POST["pass"];
$nombre = $_POST["nombre"];
$pass = encryptData($pass);

function encryptData($data){   
	$clave  = 'cadalargadepassdeingresodelsistemafundacionconexionvital';
	$method = 'aes-256-cbc';
	$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");    
	$encrypted_data = openssl_encrypt ($data, $method, $clave, false, $iv);
	return $encrypted_data; 
}

$sentencia = $bd->prepare("UPDATE administrador SET
	usuario=:usuario,
	contrasena=:pass,
	nombre_apellido=:nombre
	 WHERE id_administrador=:id;");

$sentencia->bindParam(':id', $id);
$sentencia->bindParam(':usuario', $usuario);
$sentencia->bindParam(':pass', $pass);
$sentencia->bindParam(':nombre', $nombre);

if ($sentencia->execute()) {
    return header("Location:admin.php");

} else {

    return "error";

}

?>

