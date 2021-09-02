

<?php 
	session_start();
	include_once 'conexion.php';
	$correo = $_POST['correo'];
	$contrasena = $_POST['contrasena'];
	$sentencia = $bd->prepare('select * from paciente where 
								correo= ? and contrasena = ?;');
	$sentencia->execute([$correo, $contrasena]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	//print_r($datos);

	if ($datos === FALSE) {
	 echo '<script>
    alert("Incorrecto, Intentelo de Nuevo");
   window.location.href="index3.php";
 </script> ';  
		

		
	}elseif($sentencia->rowCount() == 1){
		$_SESSION['nombre'] = $datos->correo;

		 echo '<script>
    alert("Bienvenido Usuario");
   window.location.href="user/inicio.php";
 </script> ';  
		
	}
?>

