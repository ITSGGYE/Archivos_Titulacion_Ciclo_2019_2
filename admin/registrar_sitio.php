<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');	
	}
?>
 <?php
include_once("conexion.php");
$especialidad=$_POST["especialidad"];
$subtema=$_POST["subtema"];
$descripcion=$_POST["descripcion"];
$foto=$_FILES["foto"]["name"];
$ruta=$_FILES["foto"]["tmp_name"];
$destino="img/".$foto;
copy($ruta,$destino);

$sentencia=$bd->prepare("INSERT INTO sitio(id_especialidad,subtema,descripcion,imagen)VALUES(:especialidad,:subtema,:descripcion,:foto);");

$sentencia->bindParam(':especialidad',$especialidad);
$sentencia->bindParam(':subtema',$subtema);
$sentencia->bindParam(':descripcion',$descripcion);
$sentencia->bindParam(':foto',$destino);

if($sentencia->execute()){
return header("Location:sitio.php");

}
else {

return "error";

}

?>

