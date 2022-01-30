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
$ran8=$_POST['ran8'];
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

$final9 = strtotime ( '+0 hour' , strtotime ( $actual ) ) ;
$final9 = strtotime ( '+'.$tiempo.' minute' , $final9 ) ; // utilizo "nuevafecha"
$final9 = strtotime ( '+0 second' , $final9 ) ; // utilizo "nuevafecha"
$final9 = date ( 'Y-m-j H:i:s' , $final9 );

$modif="UPDATE examen SET final9='$final9' WHERE id='$id_examen' ";
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


$modificar="UPDATE cuestionarios SET act8='10', resp8='$preg', ran8='$ran8' WHERE ci='$usuario' AND id_examen='$id_examen'";
//--------------------
if ($resultado=$link->query($modificar)) {
		//-------------------------------------------------------------------*****************
			header("Location: act8_post.php?id_examen=$id_examen");
		}else{
			echo " error al modificar las notas ";
		}
		//--------------------------------------------------------------------*****************


}else{

$modificar="UPDATE cuestionarios SET act8='0', resp8='$preg',ran8='$ran8' WHERE ci='$usuario' AND id_examen='$id_examen'";
//--------------------
if ($resultado=$link->query($modificar)) {
		//-------------------------------------------------------------------*****************
			header("Location: act8_post.php?id_examen=$id_examen");
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