<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');	
	}	
?>
 <?php
include_once("conexion.php");

$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$email=$_POST["email"];

$fecha=$_POST["fecha"];
$genero=$_POST["genero"];
$rol = '2';
$pass=$_POST["pass"];
$pass = encryptData($pass);

function encryptData($data){   
	$clave  = 'cadalargadepassdeingresodelsistemafundacionconexionvital';
	$method = 'aes-256-cbc';
	$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");    
	$encrypted_data = openssl_encrypt ($data, $method, $clave, false, $iv);
	return $encrypted_data; 
}

$sentencia=$bd->prepare("INSERT INTO paciente(cedula,nombre_apellido,correo,contrasena,fecha_nacimiento,sexo, id_rol)VALUES(:cedula,:nombre,:email,:pass,:fecha,:genero,:rol); ");

$sentencia->bindParam(':cedula',$cedula);
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':pass',$pass);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':genero',$genero);
$sentencia->bindParam(':rol',$rol);
/* print_r($sentencia); */
if($sentencia->execute()){
return header("Location:paciente.php");
}
else {

return "error";

}

?>

