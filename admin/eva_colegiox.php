<?php
include ("../conexion.php");
$colegio=$_POST['colegio'];

$consulta="SELECT colegio FROM colegios WHERE colegio='$colegio'";
$resultado=$link->query($consulta);
if (mysqli_num_rows($resultado)>0) {
  echo "<p>Existe el COLEGIO REGISTRADO  en la Base de Datos</p>";
  echo "<a href='eva_colegio.php'> <<< REGRESAR</a>";
  

}else{

 $insertar="INSERT INTO colegios (id_colegios,colegio) VALUES (NULL,'$colegio' )";
if ($resultadox=$link->query($insertar)) {
  echo "GUARDADO LOS DATOS CORRECTAMENTE ";
  echo "<a href='index.php'> <<< REGRESAR</a>";
}else{
  echo "ERROR EN EL PROCESO A LA BASE DE DATOS ";
}
}


?> 