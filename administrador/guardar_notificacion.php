<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$nombre=$_POST["nombre"];
$sentencia=$bd->prepare("INSERT INTO notificacion(notificacion)VALUES(:nombre); ");
$sentencia->bindParam(':nombre',$nombre);
if($sentencia->execute()){
	return header("Location:notificaciones.php");
}
else {
	return "error";
}
?>