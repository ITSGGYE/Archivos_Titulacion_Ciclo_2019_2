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
$ci=$_POST['ci'];
$actual=date("Y-m-d H:i:s");//hora actual del segundo examen
$ran2=$_POST['ran2'];
$consultad="SELECT rand FROM examen WHERE id='$id_examen' ";
$res=$link->query($consultad);
while ($rowd=$res->fetch_array()) {
$rand=$rowd['rand'];
}
//$ran3=mt_rand(1,$rand);//FALTA ACTIVAR PARA QUE FUNCIONE

$bus="SELECT tiempo FROM examen WHERE id='$id_examen' ";

if ($fes=$link->query($bus)) {
	while ($rws=$fes->fetch_assoc()) {
		$tiempo=$rws['tiempo'];
	}
}

$final3 = strtotime ( '+0 hour' , strtotime ( $actual ) ) ;
$final3 = strtotime ( '+'.$tiempo.' minute' , $final3 ) ; // utilizo "nuevafecha"
$final3 = strtotime ( '+0 second' , $final3 ) ; // utilizo "nuevafecha"
$final3 = date ( 'Y-m-j H:i:s' , $final3 );

$modif="UPDATE examen SET final3='$final3' WHERE id='$id_examen' ";
if ($resultado=$link->query($modif)) {//
	//header("Location: act1.php?id_examen=$id_examen&ci=$ci");
//	echo "proceso correcto ";
$consulta="SELECT * FROM preguntas WHERE id_preguntas='$id_preguntas' AND id_examen='$id_examen' ";
if ($resultado=$link->query($consulta)) {
	
while ($row=$resultado->fetch_array()) {
	$A=$row['A'];
	$B=$row['B'];
	$C=$row['C'];
	$D=$row['D'];
	$resp=$row['resp'];
}


if ($preg==$resp) {


		$modificar="UPDATE cuestionarios SET act2='10', resp2='$preg',ran2='$ran2' WHERE ci='$usuario' AND id_examen='$id_examen'";
		//--------------------
		if ($resultado=$link->query($modificar)) {
//SI RESPUESTA ES CORRECTA SE VA AL act1_post.php
//-------------------------------------------------------------------
	header("Location: act2_post.php?id_examen=$id_examen");
}else{
	echo " error al modificar las notas ";
}
//-----------------------------

}else{

		$modificar="UPDATE cuestionarios SET act2='0', resp2='$preg',ran2='$ran2' WHERE ci='$usuario' AND id_examen='$id_examen'";
		//--------------------
		if ($resultado=$link->query($modificar)) {

//SI RESPUESTA ES CORRECTA SE VA AL act1_post.php
//-------------------------------------------------------------------
	header("Location: act2_post.php?id_examen=$id_examen");
}else{
	echo " error al modificar las notas ";
}
//-----------------------------

}
//.............................

}//

}else{
	echo "Error al modificar fecha inicio".$inicio;
}


//-----FOOTER
}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>