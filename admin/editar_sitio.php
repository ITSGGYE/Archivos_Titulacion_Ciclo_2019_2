<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');	
	}
?>
 <?php
include_once("conexion.php");
if (isset($_POST)) {
    $id=$_POST["id"];
    $especialidad=$_POST["idEspecialidad"];
    $subtema=$_POST["subtema"];
    $descripcion=$_POST["descripcion"];

    $foto=$_FILES["foto"]["name"];
    $ruta=$_FILES["foto"]["tmp_name"];
    $destino="img/".$foto;
    copy($ruta, $destino);


    $sentencia=$bd->prepare("UPDATE sitio SET 
	id_especialidad=:especialidad,
	subtema=:subtema,
	descripcion=:descripcion,
	imagen=:foto
	 WHERE id_sitio=:id;");
    $sentencia->bindParam(':id', $id);
    $sentencia->bindParam(':especialidad', $especialidad);
    $sentencia->bindParam(':subtema', $subtema);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->bindParam(':foto', $destino);

if($sentencia->execute()){
return header("Location:sitio.php");

}
else {

return "error";

}
}
?>

