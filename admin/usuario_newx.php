<?php
include '../conexion.php';
$ap=$_POST['ap'];
$am=$_POST['am'];
$nom=$_POST['nom'];
$cargo=$_POST['cargo'];
$colegio=$_POST['colegio'];
$foto=$_POST['foto'];
$ci=$_POST['ci'];

$previo="SELECT * FROM dat_admin WHERE ci='$ci' ";
$resultado=$link->query($previo);
if (mysqli_num_rows($resultado)>0) {
  echo "<p>Existe el USUARIO en la Base de Datos</p>";
  echo "<a href='usuario_new.php'> <<< REGRESAR</a>";
  

}else{

 $insertar="INSERT INTO dat_admin (ci,ap,am,nom,cargo,colegio,foto) VALUES ('$ci','$ap','$am','$nom','$cargo','$colegio','$foto')";
if ($resultadox=$link->query($insertar)) {
  echo "GUARDADO LOS DATOS CORRECTAMENTE ";
  echo "<a href='index.php'> <<< REGRESAR</a>";
}else{
  echo "ERROR EN EL PROCESO A LA BASE DE DATOS ";
}
}



?>