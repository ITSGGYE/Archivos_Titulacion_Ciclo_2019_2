<?php 
include("../conexion.php");
$id=$_POST['id'];
$id_examen=$_POST['id_examen'];
$modificar="UPDATE cuestionarios SET act1='',act2='',act3='',act4='',act5='',act6='',act7='',act8='',act9='',act10='',ran1='',ran2='',ran3='',ran4='',ran5='',ran6='',ran7='',ran8='',ran9='',ran10='' WHERE id='$id' AND id_examen='$id_examen' LIMIT 1";
if ($resultado=$link->query($modificar)) {
	header("Location: eva_puntajes.php?id=$id_examen");
}else{
	echo "Error al borrar de la Base de Datos <a href='eva_puntajes.php?id=$id_examen'> <<< Regresar </a>";
}


?>