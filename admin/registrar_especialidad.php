<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');
	
	}

	
?>



 <?php
include_once("conexion.php");


$nombre=$_POST["nombre"];


$sentencia=$bd->prepare("INSERT INTO especialidad(nombre_especialidad)VALUES(:nombre); ");


$sentencia->bindParam(':nombre',$nombre);


if($sentencia->execute()){
return header("Location:especialidad.php");

}
else {

return "error";

}

?>

