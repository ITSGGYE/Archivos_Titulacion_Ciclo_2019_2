<?php
include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-8 col-md-offset-3">
<div class="table-responsive">
<!--desde aqui el SI-->
<table class="table table-bordered table-hover">

<form action="reiniciarx.php" method="post">
  <thead>
  <?php 
include("../conexion.php");
$id=$_GET['id'];
$ap=$_GET['ap'];
$am=$_GET['am'];
$nom=$_GET['nom'];
$id_examen=$_GET['id_examen'];

 $consulta="SELECT * FROM cuestionario WHERE id='$id' AND id_examen='$id_examen' ";
 if ($resultado=$link->query($consulta)) {
   while ($row=$resultado->fetch_assoc()) {
     $id=$row['id'];
     $id_examen=$row['id_examen'];
   }
 }

?>
    <tr>
      <th class="danger"><h3> ¿Estas Seguro que deseas REINICIAR EL EXAMEN de : <em>" <?php echo $ap."  ".$am." ".$nom;?> ? " </em></h3></th>

    </tr>
  </thead>
  <tbody>

<tr>

      <td><input type="hidden" name="id"  value="<?php echo $id;?>">
      <input type="hidden" name="id_examen"  value="<?php echo $id_examen;?>"></td>
        
</tr>

    <tr>
    <td>
<?php
echo "<a href='eva_puntajes.php?id=$id_examen'><button type='button' class='btn btn-lg btn-defauld glyphicon' > <<< Regresar ATRAS  </button> </a>";
?>
    <button type="submit" class="btn btn-lg  btn-success"> REINICIAR >>>> </button></td>
    </tr>
    </tbody>
  </form>
</table>
<!--hasta aqui el SI-->
</div><!--fin de la tabla responsive-->
</div>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 