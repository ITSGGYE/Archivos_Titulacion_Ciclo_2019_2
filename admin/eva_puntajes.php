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

   
<?php 
include("../conexion.php");

$id_examen=$_GET['id'];

//echo $id_examen;
?>

<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead class="thead-dark">
  <tr>
    <th>N#</th>
    <th>A.Paterno</th>
    <th>A.Materno</th>
    <th>Nombres</th>
    <th>Puntaje</th>
    <th></th>
    
  </tr>
</thead>
<tbody>
  <?php
  $numero=1;
$buscar="SELECT id,ap,am,nom,act1,act2,act3,act4,act5,act6,act7,act8,act9,act10,(act1+act2+act3+act4+act5+act6+act7+act8+act9+act10) as total FROM cuestionarios WHERE id_examen='$id_examen' ORDER BY ap,am,nom ASC ";
if ($resultado=$link->query($buscar)) {
  while ($row=$resultado->fetch_array()) {
    $id=$row['id'];
    $ap=$row['ap'];
    $am=$row['am'];
    $nom=$row['nom'];
    $total=$row['total'];
    
    echo "<tr>";
    echo "<td>".$numero."</td>";
    echo "<td>".$ap."</td>";
    echo "<td>".$am."</td>";
    echo "<td>".$nom."</td>";
    echo "<td>".$total."</td>";
    echo"<td><a href='reiniciar.php?id=$id&id_examen=$id_examen&ap=$ap&am=$am&nom=$nom'><button type='button' class='btn btn-secondary'>Reiniciar</button></a></td>";
    
    echo "</tr>";
    $numero++;

  }
}

  ?>
</tbody>
</table>
</div><!--fin de la tabla responsive-->

<a href="index.php"><button type='button' class='btn btn-warning'><i class="fas fa-fast-backward fa-3x"></i></button></a>
</div>

<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 