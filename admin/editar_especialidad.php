<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');
	
	}

	
?>





 <?php
include_once("conexion.php");


$id=$_POST["id"];

$nombre=$_POST["nombre"];


$sentencia=$bd->prepare("UPDATE especialidad SET 

	nombre_especialidad=:nombre
	 WHERE id_especialidad=:id;");


$sentencia->bindParam(':id',$id);

$sentencia->bindParam(':nombre',$nombre);


if($sentencia->execute()){
return header("Location:especialidad.php");

}
else {

return "error";

}

?>