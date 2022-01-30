<?php
include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");?>

<div class="container">
<div class="row d-flex justify-content-center">
<div class="col-md-8">

<?php
include("../conexion.php");
$consulta="SELECT id,ap,am,nom,ci,foto FROM dat_admin  WHERE ci='$usuario' AND cargo='$cargo'  ";
if ($resultado=$link->query($consulta)) {
  while ($row=$resultado->fetch_assoc()) {
     $id=$row['id'];
     $foto=$row['foto'];
     $aps=$row['ap'];
     $ams=$row['am'];
     $noms=$row['nom'];

}}
?>
<!--desde aqui el SI-->
        <div class="col-lg-5 col-md-6">
            <div class="card card-body">
              <!--<form action="foto.php" method="post" enctype="multipart/form-data">-->
                <div class="avatar mx-auto" style="max-width: 120px;">
<?php 
if ($foto=='') {

 echo "<img src='../estudiantes/fotos/foto.png' class='rounded-circle img-fluid'>";
}else{

 echo "<img src='../estudiantes/fotos/".$foto."' class='rounded-circle img-fluid'>";
}
?>
                    
                </div>
                
                <p class="grey-text"><?php echo $aps." ".$ams." ".$noms;?></p>
                <div class="d-flex justify-content-between">
<?php echo "<a href='usuario_fotox.php?id=$id' class='btn btn-light'> <i class='far fa-edit fa-2x'></i></a>";?>
                </div>
              <!--</form>-->
            </div>
        </div>
<!--hasta aqui el SI-->

</div>
</div>
</div><!--fin del ROW-->
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='../index.php'> REGRESAR </a>";
}
?> 