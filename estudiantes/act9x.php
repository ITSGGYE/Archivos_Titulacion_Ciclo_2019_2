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
$ran9=$_POST['ran9'];

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

$final10 = strtotime ( '+0 hour' , strtotime ( $actual ) ) ;
$final10 = strtotime ( '+'.$tiempo.' minute' , $final10 ) ; // utilizo "nuevafecha"
$final10 = strtotime ( '+0 second' , $final10 ) ; // utilizo "nuevafecha"
$final10 = date ( 'Y-m-j H:i:s' , $final10 );

$modif="UPDATE examen SET final10='$final10' WHERE id='$id_examen' ";
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


$modificar="UPDATE cuestionarios SET act9='10', resp9='$preg',ran9='$ran9' WHERE ci='$usuario' AND id_examen='$id_examen' ";
//--------------------
if ($resultado=$link->query($modificar)) {
		//-------------------------------------------------------------------*****************
			header("Location: act9_post.php?id_examen=$id_examen");
		}else{
			echo " error al modificar las notas ";
		}
		//--------------------------------------------------------------------*****************

}else{

$modificar="UPDATE cuestionarios SET act9='0', resp9='$preg',ran9='$ran9' WHERE ci='$usuario' AND id_examen='$id_examen'";
//--------------------
if ($resultado=$link->query($modificar)) {
		//-------------------------------------------------------------------*****************
			header("Location: act9_post.php?id_examen=$id_examen");
		}else{
			echo " error al modificar las notas ";
		}
		//--------------------------------------------------------------------*****************

}
//.............................

}

//hasta aqui	
}else{
	echo "Error al modificar fecha inicio".$inicio;
}


//-----FOOTER
}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>