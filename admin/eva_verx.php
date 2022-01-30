<?php 
include ("../conexion.php");
$id=$_POST['id'];
$id_examen=$_POST['id_examen'];

$borrar="DELETE FROM cuestionarios WHERE id='$id' AND id_examen='$id_examen' LIMIT 1 ";
if ($resultado=$link->query($borrar)) {
	echo "<script> alert (\"EXITO!!: Estudiante: Borrado EXITOSAMENTE \"); </script>"; 
      echo "<script language=Javascript> location.href=\"eva_ver.php?id=$id_examen\"; </script>"; 
      echo "Eliminacion Correcta";	
}else{
	echo "<script> alert (\"ERROR EN LA BASE DE DATOS!!:  \"); </script>"; 
      echo "<script language=Javascript> location.href=\"eva_ver.php?id=$id_examen\"; </script>"; 
      echo "VOLVER";	
}

?>