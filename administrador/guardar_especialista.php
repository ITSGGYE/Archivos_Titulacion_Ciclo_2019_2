<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$especialista=$_POST["especialista"];
$telefono=$_POST["telefono"];
$direccion=$_POST["direccion"];
$email=$_POST["email"];
$fecha=$_POST["fecha"];
$genero=$_POST["genero"];
$especialidad=$_POST["especialidad"];
$sentencia=$bd->prepare("INSERT INTO especialista(esp_cedula,nombre_doctor,especialista,esp_telefono,esp_direccion,esp_email,fecha_nacimiento,esp_sexo,id_especialidad)VALUES(:cedula,:nombre,:especialista,:telefono,:direccion,:email,:fecha,:genero,:especialidad); ");
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