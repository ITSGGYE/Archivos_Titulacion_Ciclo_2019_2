<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { 
include("../conexion.php");

$id_examen = $_POST["id_examen"];
$id_preguntas = $_POST["id_preguntas"];
$preg = $_POST["preg"];//en realidad es la respuesta que se obtiene de la pregunta
//$ci=$_POST['ci'];
$actual=date("Y-m-d H:i:s");//hora actual del segundo examen
$ran1=$_POST['ran1'];
$consultad="SELECT rand FROM examen WHERE id='$id_examen' ";
$res=$link->query($consultad);
while ($rowd=$res->fetch_array()) {
$rand=$rowd['rand'];

}
$ran2=mt_rand(1,$rand);

$bus="SELECT tiempo FROM examen WHERE id='$id_examen' ";

if ($fes=$link->query($bus)) {
	while ($rws=$fes->fetch_assoc()) {
		$tiempo=$rws['tiempo'];
	}
}

$final2 = strtotime ( '+0 hour' , strtotime ( $actual ) ) ;
$final2 = strtotime ( '+'.$tiempo.' minute' , $final2 ) ; // utilizo "nuevafecha"
$final2 = strtotime ( '+0 second' , $final2 ) ; // utilizo "nuevafecha"
$final2 = date ( 'Y-m-j H:i:s' , $final2 );

$modif="UPDATE examen SET final2='$final2' WHERE id='$id_examen' ";
if ($resultado=$link->query($modif)) {
	//header("Location: act1.php?id_examen=$id_examen&ci=$ci");
//desde aqui
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


$modificar="UPDATE cuestionarios SET act1='10', resp1='$preg',ran1='$ran1' WHERE ci='$usuario' AND id_examen='$id_examen' ";
//--------------------
if ($resultado=$link->query($modificar)) {
//	echo "MODIFICADO EXITOSAMENTE, RESUESTA CORRECTA ";
//SI RESPUESTA ES CORRECTA SE VA AL act1_post.php
//-------------------------------------------------------------------
	header("Location: act1_post.php?id_examen=$id_examen");
}else{
	echo " error al modificar las notas ";
}
//-----------------------------
}else{

$modificar="UPDATE cuestionarios SET act1='0', resp1='$preg',ran1='$ran1' WHERE ci='$usuario' AND id_examen='$id_examen'";
//--------------------
if ($resultado=$link->query($modificar)) {
//	echo "MODIFICADO , RESUESTA INCORRECTA ";
//si la respuesta es incorrecta igual se va al act1_post.php
	header("Location: act1_post.php?id_examen=$id_examen");
		}

	}//fin de while

//-------------------------------------------------------------------
}else{
	echo " error al modificar";
}
//-----------------------------	

//.............................



//hasta aqui	
}else{
	echo "Error al modificar fecha inicio".$inicio;
}







//-----FOOTER
}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>