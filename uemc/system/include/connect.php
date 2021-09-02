<?php
    $servidor = "localhost";
    $nombreusuario = "root";
	$password = "";
	$db_name = "sistema_uemc";

    $conexion = new mysqli($servidor, $nombreusuario, $password, $db_name);

    if($conexion-> connect_error){
        die("Conexión fallida: " . $conexion-> connect_error);
    }
    
?>
