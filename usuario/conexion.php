<?php 
$contrasena="123456789";
$usuario="root";
$nomdb="consultorios_odontologicos";
try {
	$bd= new PDO('mysql:host=localhost;dbname='.$nomdb,$usuario,$contrasena); 
}
catch (Exception $e) {
echo "<script>  alert('Ocurrio un error a la conexión de Base de Dato')</script>".$e->getMessage();
}
?>