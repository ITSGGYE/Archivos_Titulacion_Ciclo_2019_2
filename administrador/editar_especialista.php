<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$id=$_POST["id"];
$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$especialista=$_POST["especialista"];
$telefono=$_POST["telefono"];
$direccion=$_POST["direccion"];
$email=$_POST["email"];
$fecha=$_POST["fecha"];
$genero=$_POST["genero"];
$especialidad=$_POST["especialidad"];
$sentencia=$bd->prepare("UPDATE especialista SET 
	esp_cedula=:cedula,
	nombre_doctor=:nombre,
	especialista=:especialista,
	esp_telefono=:telefono,
	esp_direccion=:direccion,
	esp_email=:email,
	fecha_nacimiento=:fecha,
	esp_sexo=:genero,
	id_especialidad=:especialidad
	WHERE id_especialista=:id;");
$sentencia->bindParam(':id',$id);
$sentencia->bindParam(':cedula',$cedula);
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':especialista',$especialista);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':genero',$genero);
$sentencia->bindParam(':especialidad',$especialidad);
if($sentencia->execute()){
	return header("Location:especialista.php");
}
else {
	return "error";
}
?>