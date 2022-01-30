<?php 
include("../conexion.php");
$id=$_POST['id'];
$modificar="DELETE FROM examen WHERE id='$id' LIMIT 1";
if ($resultado=$link->query($modificar)) {
	header("Location: index.php");
}else{
	echo "Error al borrar de la Base de Datos ";
}


?>