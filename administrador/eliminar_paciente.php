<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$id=$_POST["id"];
$sentencia=$bd->prepare("DELETE FROM paciente WHERE id_paciente=:id;");
$sentencia->bindParam(':id',$id);
if($sentencia->execute()){
	return header("Location:paciente.php");
}
else {
	return "error";
}
?>
