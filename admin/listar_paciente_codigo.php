<?php

include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM paciente;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$var=$sentencia->fetchAll(PDO::FETCH_OBJ);

print_r($var);

?>
