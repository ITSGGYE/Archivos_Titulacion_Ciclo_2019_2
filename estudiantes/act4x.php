<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { 
include("../conexion.php");

$id_examen = $_POST["id_examen"];
$id_preguntas = $_POST["id_preguntas"];
$preg = $_POST["preg"];
$actual=date("Y-m-d H:i:s");//hora actual del segundo examen
$ran4=$_POST['ran4'];
$consultad="SELECT rand FROM examen WHERE id='$id_examen' ";
$res=$link->query($consultad);
while ($rowd=$res->fetch_array()) {
$rand=$rowd['rand'];

}


$bus="SELECT tiempo FROM examen WHERE id='$id_examen' ";

if ($fes=$link->query($bus)) {
	while ($rws=$fes->fetch_assoc()) {
		$tiempo=$rws['tiempo'];
	}
}

$final5 = strtotime ( '+0 hour' , strtotime ( $actual ) ) ;
$final5 = strtotime ( '+'.$tiempo.' minute' , $final5 ) ; // utilizo "nuevafecha"
$final5 = strtotime ( '+0 second' , $final5 ) ; // utilizo "nuevafecha"
$final5 = date ( 'Y-m-j H:i:s' , $final5 );

$modif="UPDATE examen SET final5='$final5' WHERE id='$id_examen' ";
if ($resultado=$link->query($modif)) {
	//header("Location: act1.php?id_examen=$id_examen&ci=$ci");
//	echo "proceso correcto ";
$consulta="SELECT * FROM preguntas WHERE id_preguntas='$id_preguntas' ";
if ($resultado=$link->query($consulta)) {
	
while ($row=$resultado->fetch_array()) {
	$A=$row['A'];
	$B=$row['B'];
	$C=$row['C'];
	$D=$row['D'];
	$resp=$row['resp'];
}


if ($preg==$resp) {


$modificar="UPDATE cuestionarios SET act4='10', resp4='$preg',ran4='$ran4' WHERE ci='$usuario' AND id_examen='$id_examen'";
//--------------------
if ($resultado=$link->query($modificar)) {
		//SI RESPUESTA ES CORRECTA SE VA AL act1_post.php
		//-------------------------------------------------------------------**************
			header("Location: act4_post.php?id_examen=$id_examen");
		}else{
			echo " error al modificar las notas ";
		}
		//-------------------------------------------------------------------***************
}else{

$modificar="UPDATE cuestionarios SET act4='0', resp4='$preg',ran4='$ran4' WHERE ci='$usuario' AND id_examen='$id_examen'";
//--------------------
if ($resultado=$link->query($modificar)) {
		//-------------------------------------------------------------------*****************
			header("Location: act4_post.php?id_examen=$id_examen");
		}else{
			echo " error al modificar las notas ";
		}
		//--------------------------------------------------------------------*****************
}
//.............................

}


}else{
	echo "Error al modificar fecha inicio".$inicio;
}



//-----FOOTER
}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>