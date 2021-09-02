<?php
$conn = new mysqli("localhost", "root", "12345678", "citas");
if(!$conn){
	die("Fatal Error: No se pudo contectar a la base de datos!");
}
?>