<?php
include("../conexion.php");

if (isset($_POST['doc1'])) {
// comprobamos que el arhivo no sea mayor de 1Mb
$nombre=$_POST['nombre'];
$id=$_POST['id'];
$id_trabajos=$_POST['id_trabajos'];
 if($_FILES["archivo1"]["size"]>1000000 ){
  echo "Solo se permiten archivos menores de 500 Kbs";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo1']['name'];
$tipo_archivo= $_FILES['archivo1']['type'];
$tamano_archivo = $_FILES["archivo1"]['size'];
$direccion_temporal = $_FILES['archivo1']['tmp_name'];


// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo1']['tmp_name'],"trabajos/" . $_FILES['archivo1']['name']);
   $guardar="UPDATE trabajos_lista SET nombre='$nombre', archivo='$nombre_archivo' WHERE id='$id'";
   if ($resultado=$link->query($guardar)) {
   	header("Location: trabajos.php?id=$id&id_trabajos=$id_trabajos");
   }else{
   	echo " Error al guardar el archivo";
   }
   
}
}

?>