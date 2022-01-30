<?php
  include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");

$id=$_GET['id'];
$id_alumno=$_GET['id_alumno'];
$colegio=$_GET['colegio'];
$nivel=$_GET['nivel'];
$curso=$_GET['curso'];
$paralelo=$_GET['paralelo'];
?>
<div class="row d-flex justify-content-center">
<div class="col-md-8">
<div class="table-responsive">

<table class="table table-bordered table-hover">
<form action="eva_modx.php" method="post" >
  <thead class="thead-dark">

    <tr>
      <th scope="col">#</th>
      <th scope="col">Apellidos y Nombres</th>
      <th scope="col">C.I.(Usuario)</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
<?php
include("../conexion.php");

$numero=1;
$consulta="SELECT * FROM dat_admin WHERE  id='$id_alumno' ";
if ($resultado=$link->query($consulta)) {
	while ($row=$resultado->fetch_array()) {
		$id_alumno=$row['id'];
		$ci=$row['ci'];
		$ap=$row['ap'];
		$am=$row['am'];
		$nom=$row['nom'];
		$colegio=$row['colegio'];
		$nivel=$row['nivel'];
		$curso=$row['curso'];
		$paralelo=$row['paralelo'];
		$gestion=$row['gestion'];


echo "<tr>";
echo "<td>".$numero."</td>";
echo "<td>".$ap." ".$am." ".$nom."</td>";
echo "<td><input type='text' name='ci' value='".$ci."' class='form-control'>
		  <input type='hidden' name='id_alumno' value='".$id_alumno."'>
		  <input type='hidden' name='colegio' value='".$colegio."'>
		  <input type='hidden' name='nivel' value='".$nivel."'>
		  <input type='hidden' name='curso' value='".$curso."'>
		  <input type='hidden' name='paralelo' value='".$paralelo."'>
		  <input type='hidden' name='id' value='".$id."'>
		  <input type='hidden' name='gestion' value='".$gestion."'>

</td>";
echo "<td><button type='submit' class='btn btn-success'>Guardar</button></td>";
echo "</tr>";

$numero++;		
	}
}

?>

</tbody>
</form>
</table>
</div>
</div><!--fin del a tabla responsive-->
<?php

include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 