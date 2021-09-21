<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
}
?>
<?php
include_once("conexion.php");
$id=$_GET['id'];
$sentencia=$bd->prepare("DELETE FROM cita WHERE id_cita=:id;");
$sentencia->bindParam(':id',$id);
if($sentencia->execute()){
	echo '<script>
	alert("CITAS ELIMINADA EXISTOSAMENTE ❌");
	window.location.href="citas.php";
	</script> ';}
	else {
		return "error";
	}
	?>