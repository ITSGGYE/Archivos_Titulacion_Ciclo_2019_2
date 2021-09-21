<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$id=$_POST["id"];
$sentencia=$bd->prepare("DELETE FROM notificacion WHERE id_notificacion=:id;");
$sentencia->bindParam(':id',$id);
if($sentencia->execute()){
	return header("Location:notificaciones.php");
}
else {
	return "error";
}
?>