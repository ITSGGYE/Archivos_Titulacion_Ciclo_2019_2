<?php 
include("../conexion.php");
$id=$_POST['id'];
$categoria=$_POST['categoria'];
$titulo=$_POST['titulo'];
$consigna=$_POST['consigna'];
$estado=$_POST['estado'];
$bimestre=$_POST['bimestre'];
$gestion=$_POST['gestion'];
$fecha=$_POST['fecha_final'];
$fecha2=date("Y-m-d",strtotime($fecha));
$tiempo=$_POST['tiempo'];

$actualizar="UPDATE examen SET titulo='$titulo', consigna='$consigna', estado='$estado', bimestre='$bimestre', gestion='$gestion', fecha_final='$fecha2', tiempo='$tiempo' WHERE id='$id' ";
if ($resultado=$link->query($actualizar)) {
     
header("Location: eva_mostrar.php");
}else{
  echo "Error al crear la CATEGORÍA ";
  echo "<a href ='eva_categoria.php'> REGRESAR </a>";
}
 ?>