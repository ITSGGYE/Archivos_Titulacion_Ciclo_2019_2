<?php 
$contrasena="12345678";
$usuario="root";
$nomdb="citas";

try {
	$bd= new PDO('mysql:host=localhost;dbname='.$nomdb,$usuario,$contrasena); 

	//echo "<script> alert('Conexión de Base de dato Correctamenta')</script>";
}

catch (Exception $e) {

echo "<script>  alert('Ocurrio un error a la conexión de Base de Dato')</script>".$e->getMessage();

}


?>
