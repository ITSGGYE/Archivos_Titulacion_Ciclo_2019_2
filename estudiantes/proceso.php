<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { 

include("../conexion.php");


$id_examen=$_GET['id'];
$ci=$_GET['ci'];



$consulta="SELECT * FROM cuestionarios WHERE ci='$usuario' AND id_examen='$id_examen' ";

$resultado=$link->query($consulta);
while ($row=$resultado->fetch_array()) {
             $act1=$row['act1'];
             
	
}

if ($act1==NULL) {
$iniciar="UPDATE cuestionarios SET act1='1' WHERE ci='$usuario' AND id_examen='$id_examen' ";
if ($res=$link->query($iniciar)) {
header("Location: index.php?id_examen=$id_examen&ci=$ci");
}else{
	echo "Error en el guardado de seguridad del examen";
}


//echo "Puede dar examen porque esta vacio";
	//header("Location: principal.php");
}else{ 

//echo "Ya dio el examen";
header("Location: dio.php?id_examen=$id_examen&ci=$ci");


}

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}

?>