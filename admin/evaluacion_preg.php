<?php
include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-8 col-md-offset-2">

<form action="evaluacion_pregx.php" method="post">
<font class="alert alert-danger" style="font-size:17px;"> ¿SEGURO QUE DESEAS ELIMINAR LA PREGUNTA ?</font><hr>
<?php
include("../conexion.php");
$id_preguntas=$_GET['id_preguntas'];
$categoria=$_GET['categoria'];
$titulo=$_GET['titulo'];

echo "<a href='evaluacion.php?categoria=$categoria&titulo=$titulo'><button type='button' class='btn btn-default'> <<< CANCELAR </button></a>";
?>

<input type="hidden" name="id_preguntas" value="<?php echo $id_preguntas;?>">
<input type="hidden" name="categoria" value="<?php echo $categoria;?>">
<input type="hidden" name="titulo" value="<?php echo $titulo;?>">
<button type="submit" class="btn btn-danger">ELIMINAR</button>
</form>


</div>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 