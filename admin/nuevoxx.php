<?php
include("../conexion.php");
$colegio=$_POST['colegio'];
$nivel=$_POST['nivel'];
$curso=$_POST['curso'];
$paralelo=$_POST['paralelo'];
$gestion=$_POST['gestion'];
$ci=$_POST['ci'];
$ap=$_POST['ap'];
$am=$_POST['am'];
$nom=$_POST['nom'];
$foto=$_POST['foto'];
$cargo=3;

$insertar="INSERT INTO dat_admin(id,ap,am,nom,ci,cargo,colegio,nivel,curso,paralelo,gestion,foto) VALUES(NULL,'$ap','$am','$nom','$ci','$cargo','$colegio','$nivel','$curso','$paralelo','$gestion','$foto')";
if ($resultado=$link->query($insertar)) {
	header("Location:nuevox.php?colegio=$colegio&nivel=$nivel&curso=$curso&paralelo=$paralelo&gestion=$gestion");
}else{
	echo "Error en el proceso de la query";
}


?>