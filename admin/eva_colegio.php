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

<form action="eva_colegiox.php" method="post" enctype="multipart/form-data">
  <thead>
    <tr>
      <thclass="warning"><h3> Nuevo Colegio</h3></th>

    </tr>
  </thead>
  <tbody>


<tr>

      <td><input type="text" name="colegio" class="form-control" placeholder="Escriba el nombre del colegio..."></td>
        
</tr>

    <tr>
    <td><button type="submit" class="btn btn-success glyphicon glyphicon-cloud-download"><i class="fal fa-save"></i> GUARDAR </button></td>
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
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 