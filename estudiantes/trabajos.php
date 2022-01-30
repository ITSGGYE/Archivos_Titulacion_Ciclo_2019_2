<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>
<?php include("top-estudiantes.php");
include("../conexion.php");
$id_trabajos=$_GET['id_trabajos'];


$consulta="SELECT * FROM trabajos_lista WHERE id_trabajos='$id_trabajos' AND ci='$usuario' ";
$res=$link->query($consulta);
while ($row=$res->fetch_array()) {
  $id=$row['id'];
}



?>
<div class="container">
<div class="row">
    <div class="col-6 col-md-6 bg-dark mt-5 text-white">
<a href="principal.php"><button type='button' class='btn btn-warning mt-3'><i class="fas fa-fast-backward fa-3x"></i></button></a>
      <hr>
  <form action="trabajosx.php" method="post"  class="form p-4 mt-3" enctype="multipart/form-data">
  
                   <p>Subir el Trabajo por este medio</p>

                   <div class="form-group">

                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="id_trabajos" value="<?php echo $id_trabajos;?>">
                    <input type="text" name="nombre" class="form-control" placeholder="Comentario del trabajo">
                   </div>
      <div class="form-inline">
                   <div class="form-group">
                      <input type="file"  name="archivo1" class="form-control-file" id="exampleFormControlFile1" required>
                    </div>
                  <div class="form-group">
                      <button type="submit" name="doc1" class="btn btn-primary"> <i class="fas fa-upload fa-3x"></i> Subir</button>
                  </div>
       </div>             

</form>

 </div>
  <div class="col-6 p-4 mt-5 bg-warning">
    <h2 class="display-5">Visualiza tu Archivo</h2>
    <hr>
    
<?php
$consulta="SELECT * FROM trabajos_lista WHERE id_trabajos='$id_trabajos' AND ci='$usuario' ";
$res=$link->query($consulta);
while ($row=$res->fetch_array()) {
  $archivo=$row['archivo'];

      echo "<a href='trabajos/".$archivo."' target='_blanck'><img src='imagenes/word.png' width='20%'></a><br>";
      echo $archivo;

}
?>
  </div>
  

</div>
</div><!--cierra el div del container-->

	<!--=== End Sticky Footer ===-->
<?php include("footer-examen.php");?>
<?php  }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>