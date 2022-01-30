<?php
include("../conexion.php");
$id=$_POST['id'];
$id_alumno=$_POST['id_alumno'];
$ci=$_POST['ci'];
$colegio=$_POST['colegio'];
$nivel=$_POST['nivel'];
$curso=$_POST['curso'];
$paralelo=$_POST['paralelo'];
$gestion=$_POST['gestion'];

$modificar="UPDATE dat_admin SET ci='$ci' WHERE id='$id_alumno' Limit 1";
if ($resultado=$link->query($modificar)) {
	header("Location: eva_partx.php?id=$id&colegio=$colegio&nivel=$nivel&curso=$curso&paralelo=$paralelo&gestion=$gestion");
}else{
	echo "error en la MODIFICACION";
}

?>