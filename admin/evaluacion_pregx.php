<?php
include("../conexion.php");
$id_preguntas=$_POST['id_preguntas'];
$categoria=$_POST['categoria'];
$titulo=$_POST['titulo'];

$del="DELETE FROM preguntas WHERE id_preguntas='$id_preguntas' ";
if ($resultado=$link->query($del)) {
header("Location: evaluacion.php?categoria=$categoria&titulo=$titulo");	
}else{
echo "<a href='evaluacion.php?categoria=$categoria&titulo=$titulo'><button type='button' class='btn btn-default'> <<< REGRESAR </button></a>";
}
?>