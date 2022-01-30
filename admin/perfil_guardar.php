<?php
  include("../sesion.class.php");
  include("../config.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') {
  
include("top-admin.php");
?>
<div class="col-md-8 col-md-offset-3">
<?php

include("../conexion.php");
include("../config.php");

if (isset($_POST['guardar'])) {
$id=$_POST['id'];
$ap=$_POST['ap'];
$am=$_POST['am'];
$nom=$_POST['nom'];
$fecha=$_POST['fecha'];
$sexo=$_POST['sexo'];
$cargo=$_POST['cargo'];
$ci=$_POST['ci'];
$contrasenia=$_POST['contrasenia'];

$modificar="UPDATE dat_admin SET ap='$ap', am='$am', nom='$nom', fecha='$fecha', sexo='$sexo', cargo='$cargo', ci='$ci', contrasenia=md5('$contrasenia') WHERE id='$id' ";
if ($resultado=$link->query($modificar)) {
  echo "PERFIL Modificado Exitosamente ";
  echo "<a href=".$url."admin/perfil.php"."> REGRESAR</a>";
  
 }else{
  echo "Error al modificar el PERFIL ";
  echo "<a href=".$url."admin/perfil.php"."> REGRESAR</a>";
 }
}


if (isset($_POST['subir'])) {

$id=$_POST['id'];

// comprobamos que el arhivo no sea mayor de 1Mb
 if($_FILES["archivo"]["size"]>1000000){
  echo "Solo se permiten archivos menores de 1MB";
  }else{
     // sacamos todas las propiedades del archivo
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo= $_FILES['archivo']['type'];
$tamano_archivo = $_FILES["archivo"]['size'];
$direccion_temporal = $_FILES['archivo']['tmp_name'];
// movemos el archivo a la capeta de nuestro servidor
   move_uploaded_file($_FILES['archivo']['tmp_name'],"../fotos/" . $_FILES['archivo']['name']);
  }

include("../conexion.php");
$fotos= "UPDATE dat_admin SET archivo='$nombre_archivo' WHERE id='$id' ";
if ($resultado=$link->query($fotos)) {
	echo "FOTO SUBIDO exitosamente";

}else{
	echo "error al guardar la FOTO"; 
}

}

?>
</div>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href =".$url."index.php"."> REGRESAR </a>";
}
?> 