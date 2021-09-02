

<?php 
	session_start();
	include_once 'conexion.php';
	$correo = $_POST['correo'];
	$contrasena = $_POST['contrasena'];
	/* $contrasena =  hash('sha1', $contrasena); */
	$contrasena = encryptData($contrasena);

function encryptData($data)
{
	$clave = 'cadalargadepassdeingresodelsistemafundacionconexionvital';
	$method = 'aes-256-cbc';
	$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
	$encrypted_data = openssl_encrypt($data, $method, $clave, false, $iv);
	return $encrypted_data;
}
	$sentencia = $bd->prepare('select * from paciente where 
								correo= ? and contrasena = ?;');
	$sentencia->execute([$correo, $contrasena]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	//print_r($datos);

	if ($datos === FALSE) {
	 echo '<script>
    alert("Incorrecto, Intentelo de Nuevo");
   window.location.href="index.php";
 </script> ';  
		

		
	}elseif($sentencia->rowCount() == 1){
		$_SESSION['nombre'] = $datos->correo;

		 echo '<script>
    alert("Bienvenido Usuario");
   window.location.href="inicio.php";
 </script> ';  
		
	}
?>

