<?php
include("../conexion.php");
$categoria=$_POST['categoria'];

$insertar="INSERT INTO categoria (id,categoria) VALUES(NULL,'$categoria') ";
if ($resultado=$link->query($insertar)) {
   echo "CATEGORÍA creada Satisfactoriamente ";
   echo "<a href ='eva_categoria.php'> REGRESAR </a>";
}else{
  echo "Error al crear la CATEGORÍA ";
  echo "<a href ='eva_categoria.php'> REGRESAR </a>";
}

?>
