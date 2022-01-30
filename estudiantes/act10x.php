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
$ran10=$_POST['ran10'];



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


$modificar="UPDATE cuestionarios SET act10='10', resp10='$preg',ran10='$ran10' WHERE ci='$usuario' AND id_examen='$id_examen'";
//--------------------
if ($resultado=$link->query($modificar)) {
//	echo "MODIFICADO EXITOSAMENTE, RESUESTA CORRECTA ";
	header("Location: final.php?id_examen=$id_examen");
}else{
	ECHO " error al modificar las notas ";
}
//-----------------------------
}else{

$modificar="UPDATE cuestionarios SET act10='0', resp10='$preg',ran10='$ran10' WHERE ci='$usuario' AND id_examen='$id_examen'";
//--------------------
if ($resultado=$link->query($modificar)) {
//	echo "MODIFICADO , RESUESTA INCORRECTA ";
	header("Location: final.php?id_examen=$id_examen");
}else{
	echo " error al modificar";
}
//-----------------------------	
}
//.............................

}

//-----FOOTER
}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>