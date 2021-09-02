
<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');	
	}
?>

 <?php
include_once("conexion.php");

$usuario=$_POST["usuario"];
$nombre=$_POST["nombre"];
$pass=$_POST["pass"];
//$pass =  sha1($pass);
$rol = '1';
$pass = encryptData($pass);

function encryptData($data){   
	$clave  = 'cadalargadepassdeingresodelsistemafundacionconexionvital';
	$method = 'aes-256-cbc';
	$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");    
	$encrypted_data = openssl_encrypt ($data, $method, $clave, false, $iv);
	return $encrypted_data; 
}


$sentencia=$bd->prepare("INSERT INTO administrador(usuario,contrasena,nombre_apellido,id_rol)VALUES(:usuario,:pass,:nombre,:rol);");

$sentencia->bindParam(':usuario',$usuario);
$sentencia->bindParam(':pass',$pass);
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':rol',$rol);

if($sentencia->execute()){
return header("Location:admin.php");

}
else {

return "error";

}

?>

