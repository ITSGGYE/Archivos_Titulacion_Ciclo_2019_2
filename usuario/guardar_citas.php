<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$nombre=$_POST["nombre"];
$nombrecapa=$_POST["nombrecapa"];
$curso=$_POST["curso"];
$fecha=$_POST["fecha"];
$hora=$_POST["hora"];
$estado=$_POST["estado"];
$observacion=$_POST["observacion"];
$color=$_POST["color"];
$sentencia=$bd->prepare("INSERT INTO cita(
	paciente,
	id_especialidad,
	id_especialista,
	fecha,
	cit_hora,
	cit_estado,
	cit_observacion,color)VALUES(
	:nombre,
	:nombrecapa,
	:curso,
	:fecha,
	:hora,
	:estado,
	:observacion,:color); ");
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':nombrecapa',$nombrecapa);
$sentencia->bindParam(':curso',$curso);
$sentencia->bindParam(':fecha',$fecha);
$sentencia->bindParam(':hora',$hora);
$sentencia->bindParam(':estado',$estado);
$sentencia->bindParam(':observacion',$observacion);
$sentencia->bindParam(':color',$color);
if($sentencia->execute()){
	echo '<script>
	alert("CITAS REGISTRADA EXISTOSAMENTE");
	window.location.href="citas.php";
	</script> ';}
	else {
		return "error";
	}
	?>