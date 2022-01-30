<?php
include("../conexion.php");
//date_default_timezone_set('America/La_Paz');
$id=$_POST['id'];
$ci=$_POST['ci'];
$comentario=$_POST['comentario'];
$fecha=date("Y-m-d H:i:s");
if ($comentario=='') {
header("Location: foros_ok.php?id=$id");
}else{ 
$nuevo="INSERT INTO foros_participacion (id_autor,id_foros,comentario,fecha) VALUE('$ci','$id','$comentario','$fecha')";
if($resultado=$link->query($nuevo)){
header("Location: foros_ok.php?id=$id");
}else{
	echo "Error al insertad datos";
}
	}
?>