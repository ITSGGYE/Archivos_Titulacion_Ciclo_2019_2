<?php
  include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");

$id=$_GET['id'];
$colegio=$_GET['colegio'];
$nivel=$_GET['nivel'];
$curso=$_GET['curso'];
$paralelo=$_GET['paralelo'];
$gestion=$_GET['gestion'];
?>
<div class="row d-flex justify-content-center">
<div class="col-md-8">
<div class="table-responsive">

<p class="text-center"><b>Curso: </b><?php echo $curso." ".$paralelo." ".$nivel." --------  <b>U.E. : </b>".$colegio;?></p>
<table class="table table-bordered table-hover">
<form action="eva_partxx.php" method="get" >
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
$consulta="SELECT * FROM dat_admin WHERE  colegio='$colegio' AND nivel='$nivel' AND curso='$curso' AND paralelo='$paralelo' AND gestion='$gestion' ORDER BY ap,am,nom ASC";
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


echo "<tr>";
echo "<td>".$numero."<input type='hidden' name='id[]' value='".$id."'>
<input type='hidden' name='id_alumno[]' value='".$id_alumno."'>
<input type='hidden' name='ci[]' value='".$ci."'>
<input type='hidden' name='ap[]' value='".$ap."'>
<input type='hidden' name='am[]' value='".$am."'>
<input type='hidden' name='nom[]' value='".$nom."'>
<input type='hidden' name='colegio' value='".$colegio."'>
<input type='hidden' name='nivel' value='".$nivel."'>
<input type='hidden' name='curso' value='".$curso."'>
<input type='hidden' name='paralelo' value='".$paralelo."'>
<input type='hidden' name='gestion' value='".$gestion."'>

</td>";
echo "<td>".$ap." ".$am." ".$nom."</td>";
echo "<td>".$ci."</td>";
echo "<td><a href='eva_mod.php?id_alumno=$id_alumno&colegio=$colegio&nivel=$nivel&curso=$curso&paralelo=$paralelo&id=$id' class='btn btn-success'><i class='fas fa-edit'></i></a></td>";
echo "</tr>";
$numero++;		
	}
}

?>

<tr>
	<td colspan="2">
	<a href="index.php"><button type='button' class='btn btn-warning btn-lg'><i class="fas fa-fast-backward"></i> Regresar </button></a> || 
	<button type='submit' class='btn btn-primary btn-lg'><i class="far fa-save"></i> Guardar Participantes </button></td>
</tr>
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