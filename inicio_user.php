
<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');
	
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>HOLA BIENVENIDO <strong></strong></h1>


 <?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM paciente WHERE  correo= '".$_SESSION['nombre']."'
    ");

$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>
<?php
foreach($paciente as $row) {?>
<p style=" font-size: 16px;"><?php echo $row->nombre_apellido?></p>	
<?php }?>




<a href="cerrar_user.php">cerrar</a>
</body>
</html>