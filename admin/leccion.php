<?php
include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>

<div class="col-md-10">
 <div class="container-fluid">
        <ul class="full-box list-unstyled page-nav-tabs">
          
<li><a href="eva_categoria.php"><i class="fas fa-user-plus"></i>&nbsp; 1.-Crear Categoria</a></li>
    <li><a href="leccion.php"><i class='fas fa-key'></i> &nbsp;2.-Crear Lección</a>
                </li>
<li><a href="index2.php"><i class='fas fa-key'></i> &nbsp;3.-Lecciones Creadas</a>
                </li>
        </ul> 
      </div>
<div class="table-responsive">

<table class="table table-striped table-bordered table-hover bg-secondary text-white">

<form action="leccionx.php" method="post" enctype="multipart/form-data">
  <thead class="bg-secondary text-white">

    <tr>
      <th colspan="4" ><h3> Formulario de la Evaluación</h3></th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="warning">Categoría:
      <input type="hidden" name="autor" value="<?php echo $usuario;?>">
      <input type="hidden" name="gestion" value="<?php $gestions=date("Y"); echo $gestions;?>">
      </td>
      <td><select name="categoria" class="form-control">
      <option value=" ">Seleccionar</option>
<?php
include("../conexion.php");
//hasta aqui es la variable  
$consulta ="SELECT * FROM categoria ";
if ($resultado=$link->query($consulta)) {
while($row = $resultado->fetch_array()) {
$categoria=$row['categoria'];

echo "<option value=".$categoria.">".$categoria."</option>";

}
}
  ?>
      </select></td>
      <td class="warning">Título:</td>
      <td><input type="text" name="titulo" class="form-control" placeholder="Escriba el Título..." required></td>
</tr>

<tr>
      
        <td class="warning">Estado:</td>
        <td><select name="estado" class="form-control">
          <option value="">Seleccionar</option>
          <option value="Publicado">Publicado</option>
          <option value="Despublicado">No</option>
        </select></td>
        <td class="warning">Bimestre:</td>
        <td><select name="bimestre" class="form-control">
          <option value="">Seleccionar</option>
          <option value="1BIM">1 Quimestre</option>
          <option value="2BIM">2 Quimestre</option>
          
        </select></td>
</tr>
<tr>

        <td>Tiempo del Examen:</td>
        <td><select name="tiempo" class="form-control">
          <option value="1">1 - Minutos</option>
          <option value="2">2 - Minutos</option>
          <option value="3">3 - Minutos</option>
          <option value="4">4 - Minutos</option>
          <option value="5">5 - Minutos</option>
          <option value="6">6 - Minutos</option>
          <option value="7">7 - Minutos</option>
          <option value="8">8 - Minutos</option>
          <option value="9">9 - Minutos</option>
          <option value="10">10 - Minutos</option>

        </select></td>
        <td class="danger">Fecha  final del Examen:</td>
        <td><input type="date" name="fecha_final" class="form-control" ></td>
</tr>

    </tbody>
<tr>
  <td colspan="4">
   <center> <a href="index.php"><button type='button' class='btn btn-warning'><i class="fas fa-fast-backward fa-3x"></i></button></a>
    <button type="submit" class="btn btn-success" ><i class="fas fa-save fa-3x"></i> </button></center></td>
</tr>
<!--<tr>
      <td>Pregunta 1:</td>
      <td><textarea name="preg" class="form-control" rows="3"></textarea></td>
      <td><br>Escriba la Respuesta:</td>
      <td>
      <input type="text" name="resp" class="form-control" placeholder="Escriba la respuesta igual al inciso correcto..." style="background-color:#FD0664;color:#ffffff;"><br>
      <input type="text" name="A" class="form-control" placeholder="Escriba la respuesta del inciso A" required><br>
      <input type="text" name="B" class="form-control" placeholder="Escriba la respuesta del inciso B" required><br>
      <input type="text" name="C" class="form-control" placeholder="Escriba la respuesta del inciso C" required><br>
      <input type="text" name="D" class="form-control" placeholder="Escriba la respuesta del inciso D" required></td>
      
</tr> -->




  </form>
</table>



</div><!--fin de la tabla responsive-->
<!--<font class="alert alert-danger" style="font-size:17px;"> Se le Recomienda Realizar las <b>10 Preguntas</b> con sus Respuestas para el Buen Funcionamiento del SISTEMA gracias</font>-->
</div>
<?php


}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 