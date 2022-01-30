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
$consulta="SELECT toque FROM dat_admin  WHERE ci='$usuario' AND cargo='$cargo'  ";
if ($resultado=$link->query($consulta)) {
  while ($row=$resultado->fetch_assoc()) {
     $toque=$row['toque'];

if ($toque=='SI') {
?>
<!--desde aqui el SI-->
<table class="table table-bordered table-hover">

<form action="usuario_newx.php" method="post" enctype="multipart/form-data">
  <thead>
    <tr>
      <th class="bg-warning" colspan="3"><h3> Nuevo Usuario</h3></th>

    </tr>
  </thead>
  <tbody>
<tr>
  <td>A.Paterno</td>
  <td>A.Materno</td>
  <td>Nombres</td>
</tr>

<tr>

      <td><input type="text" name="ap" class="form-control" >
          <input type="hidden" name="cargo" value="4" >
          <input type="hidden" name="foto" value="foto.png" >
          
      </td>
      <td><input type="text" name="am" class="form-control" ></td>
      <td><input type="text" name="nom" class="form-control" placeholder="Escriba el nombre" required=""></td>
        
</tr>

<tr>
  <td>Cédula de Identidad</td>
  <td colspan="2">Colegio</td>

</tr>


<tr>
  <td><input type="text" name="ci" class="form-control bg-warning"  placeholder="Escriba su C.I.">
</td>
  <td>
    <select name="colegio" class="form-control">
    <?php 
    $buscar="SELECT colegio FROM  colegios ";
    $res=$link->query($buscar);
    while ($row=$res->fetch_array()) {
      $colegio=$row['colegio'];
      echo "<option value='".$colegio."'>".$colegio."</option>";
    }?>
  </select>
  </td>
  
    <td><button type="submit" class="btn btn-success mr-auto"><i class="fal fa-save"></i> GUARDAR </button></td>
    </tr>
    </tbody>
  </form>
</table>
<!--hasta aqui el SI-->
<?php  
}else{
echo "<font class='alert alert-danger' style='font-size:17px;'>!! USTED no tiene los permisos para realizar esta acción contactese con el Administrador¡¡ </font>";
  
}



  }
}


?>

</div>
</div><!--fin del ROW-->
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='../index.php'> REGRESAR </a>";
}
?> 