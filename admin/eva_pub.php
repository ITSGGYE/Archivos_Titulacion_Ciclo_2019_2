<?php
include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="d-flex justify-content-center">

<div class="col-md-6">

<div class="table-responsive">
<table class="table table-bordered table-hover">

<form action="eva_pubx.php" method="post" enctype="multipart/form-data">
  <thead>
    <tr>
      <th class="warning"><h3> Estado de la Evaluación</h3></th>
      

    </tr>
  </thead>
  <tbody>
<tr>
<?php
include("../conexion.php");
$id=$_GET['id'];
$buscar="SELECT categoria, titulo, estado FROM examen WHERE id='$id' ";
if ($resultado=$link->query($buscar)) {
  while ($row=$resultado->fetch_assoc()) {
    $categoria=$row['categoria'];
    $titulo=$row['titulo'];
    $estado=$row['estado'];

echo "<td>
<input type='hidden' name='id' value='".$id."'>
Categoria: <b>".$categoria."</b> -- Título: <b>".$titulo."</b>";
echo "<select name='estado' class='form-control bg-secondary text-white'> 
      <option value='".$estado."'>".$estado."</option>";
echo "<option value='Publicado'>Publicado</option>
      <option value='Despublicado'>Despublicado</option>
     </select></td>";
  }

}
?>

        
</tr>

    <tr>
    <td class="">
      <a href="index.php"><button type='button' class='btn btn-warning'><i class="fas fa-fast-backward fa-3x"></i></button></a>
      <button type="submit" class="btn btn-primary btn" ><i class="far fa-save fa-3x"></i></button>
    </td>
    </tr>
    </tbody>
  </form>
</table>
</div><!--fin de la tabla responsive-->
</div>
</div>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 