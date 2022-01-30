<?php
  include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-12">
<?php

// desde aqui es el guardar
include("../conexion.php");
$categoria=$_POST['categoria'];
$autor=$_POST['autor'];
$titulo=$_POST['titulo'];
$estado=$_POST['estado'];
$bimestre=$_POST['bimestre'];
$gestion=$_POST['gestion'];
$fecha=$_POST['fecha_final'];
//$tiempo=$_POST['tiempo'];
$fecha2=date("Y-m-d",strtotime($fecha));

$insertar="INSERT INTO foros (id,autor,categoria,titulo,estado,gestion,bimestre,fecha_final) VALUES(NULL,'$autor','$categoria','$titulo','$estado','$gestion','$bimestre','$fecha2') ";
if ($resultado=$link->query($insertar)) {
echo "<script> alert (\"LOGIN:: Correcto: Autorizado para Crear Nueva Evaluación \"); </script>"; 
      echo "<script language=Javascript> location.href=\"foros.php\"; </script>"; 
      echo "Creación CORRECTA";      
//header("Location: eva1.php?categoria=$categoria&titulo=$titulo");
}else{
  echo "Error al crear la CATEGORÍA ";
  echo "<a href ='crear_foros.php'> REGRESAR </a>";
}


?> 




</div>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='index.php'> REGRESAR </a>";
}
?> 