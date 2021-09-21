<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$id=$_POST["id"];
$usuario=$_POST["usuario"];
$pass=$_POST["pass"];
$nombre=$_POST["nombre"];
$sentencia=$bd->prepare("UPDATE administrador SET 
	usuario=:usuario,
	contrasena=:pass,
	nombre_apellido=:nombre
	WHERE id_administrador=:id;");
$sentencia->bindParam(':id',$id);
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