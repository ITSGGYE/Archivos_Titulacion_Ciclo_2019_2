<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$id=$_POST["id"];
$notificacion=$_POST["notificacion"];
$sentencia=$bd->prepare("UPDATE notificacion SET 
	notificacion=:notificacion
	WHERE id_notificacion=:id;");
$sentencia->bindParam(':id',$id);
$sentencia->bindParam(':notificacion',$notificacion);
if($sentencia->execute()){
	return header("Location:notificaciones.php");
}
else {
	return "error";
}
?>