<?php
  include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-10">


<h3>Nuevo Alumno</h3>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<form action="nuevoxx.php" method="post">
    <tr>
      <td class="danger">Colegio</td>
      
<?php 
include("../conexion.php");

$colegio=$_GET['colegio'];
$nivel=$_GET['nivel'];
$curso=$_GET['curso'];
$paralelo=$_GET['paralelo'];
$gestion=$_GET['gestion'];

/*$consulta="SELECT colegio FROM colegios ";
if ($resultado=$link->query($consulta)) {
$numero=1;
    while ($row=$resultado->fetch_array()) {
        
        $colegio=$row['colegio'];
echo "<option value='".$colegio."'>".$colegio."</option>";

     
$numero++;
    }
}
*/



 ?>  <td><input type="hidden" name="colegio" class="form-control" value="<?php echo $colegio;?>"><?php echo $colegio;?></td>
      <td class="danger">Nivel</td>
      <td><input type="hidden" name="nivel" class="form-control" value="<?php echo $nivel;?>"><?php echo $nivel;?></td>
      
    </tr>
    <tr>
      <td class="danger">Curso:</td>
      <td><input type="hidden" name="curso" class="form-control" value="<?php echo $curso;?>"><?php echo $curso;?></td>
      <td class="danger">Paralelo:</td>
      <td><input type="hidden" name="paralelo" class="form-control" value="<?php echo $paralelo;?>"><?php echo $paralelo;?></td>
    </tr>
    <tr>
      <td class="danger">Gestión:</td>
      <td><input type="hidden" name="gestion" class="form-control" value="<?php echo $gestion;?>"><?php echo $gestion;?>
<input type="hidden" name="foto" value="foto.png">
      </td>
      <td class="danger">USUARIO</td>
<?php
function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
 
//Ejemplo de uso
 
//echo generarCodigo(6); // genera un código de 6 caracteres de longitud.value="echo generarCodigo(6);
?>
      <td><input type="text" name="ci" class="form-control"  placeholder="Ingrese el C.I. que es el USUARIO" required></td>
    </tr>
    <tr>
      <td class="danger">A.Paterno:</td>
      <td><input type="text" name="ap" class="form-control" ></td>
      <td class="danger">A.Materno:</td>
      <td><input type="text" name="am" class="form-control" ></td>
    </tr>
    <tr>
      <td class="danger">Nombres:</td>
      <td><input type="text" name="nom" class="form-control" required></td>
      <td class="danger"></td>
      <td><button type="submit" class="btn btn-success"><i class="far fa-database"></i> REGISTRAR </button></td>
    </tr>
 </form> 
</table>
<hr>
<table class="table table-striped table-bordered table-hover">
  <tr>
    <td>N#</td>
    <td>A.Paterno</td>
    <td>A.Materno</td>
    <td>Nombres</td>
    <td>Usuario</td>
    <td>Colegio</td>
    <td>Nivel</td>
    <td>Curso</td>
    <td>Paralelo</td>
    <td>Gestion</td>
    
  </tr>
  <?php
  $numero=1;
$buscar="SELECT * FROM dat_admin WHERE colegio='$colegio' AND nivel='$nivel' AND curso='$curso' AND paralelo='$paralelo' AND gestion='$gestion' ORDER BY ap,am,nom ASC ";
if ($resultado=$link->query($buscar)) {
  while ($row=$resultado->fetch_array()) {
    $ap=$row['ap'];
    $am=$row['am'];
    $nom=$row['nom'];
    $ci=$row['ci'];
    $colegio=$row['colegio'];
    $nivel=$row['nivel'];
    $curso=$row['curso'];
    $paralelo=$row['paralelo'];
    $gestion=$row['gestion'];

    echo "<tr>";
    echo "<td>".$numero."</td>";
    echo "<td>".$ap."</td>";
    echo "<td>".$am."</td>";
    echo "<td>".$nom."</td>";
    echo "<td>".$ci."</td>";
    echo "<td>".$colegio."</td>";
    echo "<td>".$nivel."</td>";
    echo "<td>".$curso."</td>";
    echo "<td>".$paralelo."</td>";
    echo "<td>".$gestion."</td>";
    echo "</tr>";
    $numero++;

  }
}

  ?>
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