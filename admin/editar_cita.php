<?php  
  session_start();
  if (!isset($_SESSION['nombre'])) {
    header('Location: login2.php');
 
  }
?>

 <?php
include_once("conexion.php");

$id=$_POST["id"];
$nombre=$_POST["nombre"];
//especialidad
$nombrecapa=$_POST["nombrecapa"];
//especialista
$curso=$_POST["curso"];
$fecha=$_POST["fecha"];
$hora=$_POST["hora"];
$estado=$_POST["estado"];
$observacion=$_POST["observacion"];

$sentencia=$bd->prepare("UPDATE cita SET 
id_paciente=:nombre,
	id_especialidad=:nombrecapa,
	id_especialista=:curso,
fecha=:fecha,
	hora=:hora,
estado=:estado,
	observacion=:observacion
	
	 WHERE id_cita=:id;");


$sentencia->bindParam(':id',$id);
$sentencia->bindParam(':nombre',$nombre);

$sentencia->bindParam(':nombrecapa',$nombrecapa);
$sentencia->bindParam(':curso',$curso);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':hora',$hora);
$sentencia->bindParam(':estado',$estado);
$sentencia->bindParam(':observacion',$observacion);



if($sentencia->execute()){
return header("Location:citas.php");

}
else {

return "error";

}

?>