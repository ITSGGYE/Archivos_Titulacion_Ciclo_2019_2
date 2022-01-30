<?php
  include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="row d-flex justify-content-center">
<div class="col-md-8">

<div class="table-responsive">
<table class="table table-bordered table-hover">
  <thead class="thead-dark">
<tr>
  <th colspan="4">Participantes registrados en el Examen</th>
</tr>
    <tr class="success">
      <td>N#</td>
      <td>Nombres y Apellidos</td>
      <td>Usuario</td>
      <td></td>

    </tr>
</thead>
<tbody>
<?php
include("../conexion.php");

$id=$_GET['id'];
$numero=1;

$consulta="SELECT * FROM cuestionarios WHERE  id_examen='$id' ORDER BY ap,am,nom ASC ";
if ($resultado=$link->query($consulta)) {
  while ($row=$resultado->fetch_array()) {
    $id=$row['id'];
    $ci=$row['ci'];
    $ap=$row['ap'];
    $am=$row['am'];
    $nom=$row['nom'];
    $id_examen=$row['id_examen'];
//$dir="eva_verx.php?id=$id&id_examen=$id_examen";
echo "<form action='eva_verx.php' method='post'>";
echo "<tr>";
echo "<td>".$numero."<input type='hidden' name='id' value='".$id."'>
<input type='hidden' name='id_examen' value='".$id_examen."'>

</td>";
echo "<td>".$ap." ".$am." ".$nom." </td>";
echo "<td>".$ci."</td>";
echo "<td><button type='submit' class='btn btn-danger' ><i class='fas fa-trash-alt'></i></button></td>";
//echo "<td><input type='submit' value='Eliminar' class='btn btn-danger' ></td>";
echo "</tr>"; 
echo "</form>";

$numero++;  
  }
}

?>

<tr>
  <td colspan="4"><a href="index.php"><button type='button' class='btn btn-warning'><i class="fas fa-fast-backward fa-3x"></i></button></a> </td>
</tr>
</tbody>
</table>
</div><!--fin de la tabla responsive-->
</div>

<?php

include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 