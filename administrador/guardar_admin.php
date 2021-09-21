<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$usuario=$_POST["usuario"];
$pass=$_POST["pass"];
$nombre=$_POST["nombre"];
$sentencia=$bd->prepare("INSERT INTO administrador(usuario,contrasena,nombre_apellido)VALUES(:usuario,:pass,:nombre);");
$sentencia->bindParam(':usuario',$usuario);
$sentencia->bindParam(':pass',$pass);
$sentencia->bindParam(':nombre',$nombre);
if($sentencia->execute()){
	return header("Location:admin.php");
}
else {
	return "error";
}
?>