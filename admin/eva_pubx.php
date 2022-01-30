<?php
include ("../conexion.php");
$id=$_POST['id'];
$estado=$_POST['estado'];


 $modificar="UPDATE examen SET estado='$estado' WHERE id='$id' ";
if ($resultadox=$link->query($modificar)) {
  header("Location: index.php");
}else{
  echo "ERROR EN EL PROCESO A LA BASE DE DATOS ";
    echo "<a href='index.php'> <<< REGRESAR</a>";
}



?> 