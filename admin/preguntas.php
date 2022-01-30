<?php
include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-12">

<div class="table-responsive">
<?php
$numero=1; 
include("../conexion.php"); 
$id=$_GET['id'];
$categoria=$_GET['categoria'];
$titulo=$_GET['titulo'];
echo "<a href='evaluacion.php?id=$id&categoria=$categoria&titulo=$titulo'><button type='button' class='btn btn-info' > <<< REGRESAR ATRAS</button></a>";
?>
<table class="table table-bordered table-hover">

<form action="preguntasx.php" method="post" enctype="multipart/form-data">
  <thead>
    <tr>
      <th colspan="4" ><h3> Formula tu pregunta</h3></th>

    </tr>
  </thead>
  
<tr>
      <td>Pregunta:</td>
      <td><textarea name="preg" class="form-control" placeholder="Escriba la pregunta" rows="3"></textarea></td>
      <td><br>Escriba la Respuesta:</td>
      <td>
      <input type="text" name="resp" class="form-control" placeholder="Escriba la respuesta igual al inciso correcto..." style="background-color:#F8F683;"><br>
      <input type="text" name="A" class="form-control" placeholder="Escriba la respuesta del inciso A" required><br>
      <input type="text" name="B" class="form-control" placeholder="Escriba la respuesta del inciso B" required><br>
      <input type="text" name="C" class="form-control" placeholder="Escriba la respuesta del inciso C" required><br>
      <input type="text" name="D" class="form-control" placeholder="Escriba la respuesta del inciso D" required>
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <input type="hidden" name="categoria" value="<?php echo $categoria;?>">
      <input type="hidden" name="numero" value="<?php echo $numero;?>">
      <input type="hidden" name="titulo" value="<?php echo $titulo;?>"></td>
      
</tr>
<tr>
<td colspan="3"></td><td><button type="submit" class="btn btn-success" >GUARDAR</button></td>
</tr>



  </form>
</table>



</div><!--fin de la tabla responsive-->
<!--<font class="alert alert-danger" style="font-size:17px;"> Se le Recomienda Realizar las <b>10 Preguntas</b> con sus Respuestas para el Buen Funcionamiento del SISTEMA gracias</font>-->
</div>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 