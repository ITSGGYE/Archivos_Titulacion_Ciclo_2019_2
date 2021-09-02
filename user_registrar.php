<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');
	
	}

	
?>


 <?php
include_once("conexion.php");

$cedula=$_POST["cedula"];
$nombre=$_POST["nombre"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$fecha=$_POST["fecha"];
$genero=$_POST["genero"];

$sentencia=$bd->prepare("INSERT INTO paciente(cedula,nombre_apellido,correo,contrasena,fecha_nacimiento,sexo)VALUES(:cedula,:nombre,:email,:pass,:fecha,:genero); ");

$sentencia->bindParam(':cedula',$cedula);
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':pass',$pass);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':genero',$genero);

if($sentencia->execute()){

	 echo '<script>
    alert("Usuario Registrado");
   window.location.href="index3.php";
 </script> ';  
		
}
else {

 echo '<script>
    alert("Incorrecto, Intentelo de Nuevo");
   window.location.href="index3.php";
 </script> ';  

}

?>

