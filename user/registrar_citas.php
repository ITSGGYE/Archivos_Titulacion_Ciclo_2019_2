<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');
	
	}

	
?>


 <?php
include_once("conexion.php");


$nombre=$_POST["nombre"];
//especialidad
$nombrecapa=$_POST["nombrecapa"];
//especialista
$curso=$_POST["curso"];
$fecha=$_POST["fecha"];
$hora=$_POST["hora"];
$estado=$_POST["estado"];
$observacion=$_POST["observacion"];
$p=$_POST["paciente"];

$sentencia=$bd->prepare("INSERT INTO cita(
	id_paciente,
	id_especialidad,
	id_especialista,
	fecha,
	hora,
	estado,
	observacion,
	usuario_admin)VALUES(
	:nombre,
	:nombrecapa,
	:curso,
	:fecha,
	:hora,
	:estado,
	:observacion, 
     :paciente ); ");



$sentencia->bindParam(':nombre',$nombre);

$sentencia->bindParam(':nombrecapa',$nombrecapa);
$sentencia->bindParam(':curso',$curso);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':hora',$hora);
$sentencia->bindParam(':estado',$estado);
$sentencia->bindParam(':observacion',$observacion);
$sentencia->bindParam(':paciente',$p);

if($sentencia->execute()){
return header("Location:citas.php");

}
else {

	echo '<script>
    alert("error al ingresar");
   window.location.href="citas.php";
 </script> ';  
}

?>