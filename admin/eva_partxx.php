<?php 
include ("../conexion.php");
$id=$_GET['id'];
$id_alumno=$_GET['id_alumno'];
$ci=$_GET['ci'];
$ap=$_GET['ap'];
$am=$_GET['am'];
$nom=$_GET['nom'];
$colegio=$_GET['colegio'];
$nivel=$_GET['nivel'];
$curso=$_GET['curso'];
$paralelo=$_GET['paralelo'];
$cargo=3;
$c = count($_GET["id"]);
if ($c > 0) {
for ($i=0; $i<$c; $i++) {


$id=$_GET['id'][$i];	
$id_alumno=$_GET['id_alumno'][$i];
$ci=$_GET['ci'][$i];
$ap=$_GET['ap'][$i];
$am=$_GET['am'][$i];
$nom=$_GET['nom'][$i];
// consultar si ya existen estos estudiante sino los guardamos y si hay  mandamos mensaje de que ya estan inscritos
$consulta="SELECT * FROM cuestionarios WHERE  ci='$ci' AND id_examen='$id' ";
$resultados=$link->query($consulta);
if (mysqli_num_rows($resultados)>0) {
    echo "Ya esta registrado en la Base de Datos ".$ap." ".$am." ".$nom." con el C.I.".$ci."  ";
    echo "<a href='eva_part.php?id=$id'> <button type='button'><<< REGRESAR</button></a> <br>";
    

}else{ 

$guardar="INSERT INTO cuestionarios (id,ci,ap,am,nom,cargo,id_datos,id_examen) VALUES (NULL,'$ci','$ap','$am','$nom','$cargo','$id_alumno','$id') ";
if ($resultado=$link->query($guardar)) {

//header("Location: eva_mostrar.php ");
	$modificar="UPDATE examen SET colegio='$colegio', nivel='$nivel', curso='$curso', paralelo='$paralelo' 	WHERE id='$id' ";
	if ($resul=$link->query($modificar)) {
		header("Location: index.php ");
	}else{
		echo "ERROR AL MODIFICAR ";
	}
	
}else{
//header("Location: index.php");
	echo "ERROR EN EL PROCESO  ";
	echo "<a href='index.php'> regresar </a>";
}

}
 }
}
?>