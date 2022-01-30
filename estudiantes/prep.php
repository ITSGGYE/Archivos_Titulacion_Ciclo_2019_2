<?php
include("../conexion.php");
$id_examen=$_GET['id_examen'];
$inicio=date("Y-m-d H:i:s");
$ci=$_GET['ci'];
$tiempo=$_GET['tiempo'];

$final1 = strtotime ( '+0 hour' , strtotime ( $inicio ) ) ;
$final1 = strtotime ( '+'.$tiempo.' minute' , $final1 ) ; // utilizo "nuevafecha"
$final1 = strtotime ( '+0 second' , $final1 ) ; // utilizo "nuevafecha"
$final1 = date ( 'Y-m-j H:i:s' , $final1 );

$consulta="SELECT rand FROM examen WHERE id='$id_examen' ";
$res=$link->query($consulta);
while ($row=$res->fetch_array()) {
$rand=$row['rand'];

}
$ran1=mt_rand(1,$rand);



$modif="UPDATE examen SET inicio='$inicio', final1='$final1' WHERE id='$id_examen' ";
if ($resultado=$link->query($modif)) {

	
	
		header("Location: act1.php?id_examen=$id_examen&ci=$ci&ran1=$ran1");


	
	//echo "proceso correcto ";
}else{
	echo "Error al modificar fecha inicio".$inicio;
}

?>