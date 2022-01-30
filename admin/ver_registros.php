<?php
include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-8 col-md-offset-3">
<?php
include("../conexion.php");
$consulta="SELECT toque FROM dat_admin  WHERE ci='$usuario' AND cargo='$cargo'  ";
if ($resultado=$link->query($consulta)) {
  while ($row=$resultado->fetch_assoc()) {
     $toque=$row['toque'];


if ($toque=='SI') { ?>
<div class="table-responsive">
<table class="table table-bordered table-hover">

 
    <tr>
      <th class="warning" colspan="8"><h3> Listas de Registrados</h3></th>

    </tr>
 
 
<?php
//desde aqui el SI
$consultax="SELECT * FROM registrados  ";
if ($resultadox=$link->query($consultax)) {
  while ($row=$resultadox->fetch_array()) {
     $id=$row['id'];
     $ap=$row['ap'];
     $am=$row['am'];
     $nom=$row['nom'];
     $ci=$row['ci'];
     $colegio=$row['colegio'];
     $email=$row['email'];
     $telefono=$row['telefono'];

echo "<tr>";
echo "<td>".$id."</td>";
echo "<td>".$ap." ".$am." ".$nom."</td>";
echo "<td>".$ci."</td>";
echo "<td>".$colegio."</td>";
echo "<td>".$telefono."</td>";
echo "<td>".$email."</td>";

echo "</tr>";

}
}
?>
</table>
</div><!--fin de la tabla responsive-->
<!--hasta aqui el SI-->
<?php  
}else{
echo "<font class='alert alert-danger' style='font-size:17px;'>!! USTED no tiene los permisos para VER esta acción contactese con el Administrador¡¡ </font>";
  
}



  }
}


?>


</div>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 