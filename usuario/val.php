<?php 
session_start();
include_once 'conexion.php';
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$sentencia = $bd->prepare('select * from paciente where nombre_apellido= ? and contrasena = ?;');
$sentencia->execute([$usuario, $contrasena]);
$datos = $sentencia->fetch(PDO::FETCH_OBJ);
if ($sentencia->rowCount() == 1) {
	$_SESSION['nombre'] = $datos->correo;
	echo '<script>
	alert("Bienvenido Usuario");
	window.location.href="inicio.php";
	</script> ';  
}
$sentencias = $bd->prepare('select * from administrador where usuario = ? and contrasena = ?;');
$sentencias->execute([$usuario, $contrasena]);
$datos = $sentencias->fetch(PDO::FETCH_OBJ);
if ($sentencias->rowCount() == 1) {
	$_SESSION['nombre'] = $datos->usuario;
	echo '<script>
	alert("Bienvenido Administrador");
	window.location.href="../administrador/inicio.php";
	</script> ';  
}elseif ($datos === FALSE) {
	echo '<script>
	alert("Incorrecto, Intentelo de Nuevo");
	window.location.href="login.php";
	</script> ';  
}
?>