<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');
	
	}

	
?>




 <?php
include_once("conexion.php");


$id=$_POST["id"];


$sentencia=$bd->prepare("DELETE FROM contacto WHERE id_contacto=:id;");


$sentencia->bindParam(':id',$id);


if($sentencia->execute()){
return header("Location:contacto.php");

}
else {

return "error";

}

?>