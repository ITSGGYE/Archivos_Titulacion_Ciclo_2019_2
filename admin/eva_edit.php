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
<table class="table table-bordered table-hover">
<?php
include("../conexion.php");
//hasta aqui es la variable
$id=$_GET['id'];  
$consulta ="SELECT id,categoria,titulo,consigna,estado,colegio,nivel,curso,paralelo,bimestre,fecha_final,gestion,tiempo FROM examen WHERE id='$id' ";
if ($resultado=$link->query($consulta)) {
while($row = $resultado->fetch_assoc()) {
$id=$row['id'];
$categoria=$row['categoria'];
$titulo=$row['titulo'];
$consigna=$row['consigna'];
$colegio=$row['colegio'];
$estado=$row['estado'];
$nivel=$row['nivel'];
$curso=$row['curso'];
$paralelo=$row['paralelo'];
$bimestre=$row['bimestre'];
$fecha_final=$row['fecha_final'];
$gestion=$row['gestion'];
$tiempo=$row['tiempo'];



}
}
  ?>
<form action="eva_editx.php" method="post" enctype="multipart/form-data">
  <thead>
    <tr>
      <th colspan="4" ><h3> Formulario de la Evaluación</h3></th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="warning">Categoría:</td>
      <td>
      <input type="hidden" name="id" value="<?php echo $id;?>" >
      <input type="text" name="categoria" class="form-control" value="<?php echo $categoria;?>" readonly="readonly"></td>
      <td class="warning">Título:</td>
      <td><input type="text" name="titulo" class="form-control" value="<?php echo $titulo;?>"></td>
</tr>

<tr>
      <td class="warning">Consigna de la Evaluación:</td>
      <td><input type="text" name="consigna" class="form-control" value="<?php echo $consigna;?>"></td>
        <td class="warning">Estado:</td>
        <td><select name="estado" class="form-control">
          <option value="<?php echo $estado;?>"><?php echo $estado;?></option>
          <option value="Publicado">Publicado</option>
          <option value="Despublicado">Despublicado</option>
        </select></td>
</tr>

    <tr>
    <td class="warning">Bimestre:</td>
        <td><select name="bimestre" class="form-control">
          <option value="<?php echo $bimestre;?>"><?php echo $bimestre;?></option>
          <option value="1BIM">1 Bimestre</option>
          <option value="2BIM">2 Bimestre</option>
          <option value="3BIM">3 Bimestre</option>
          <option value="4BIM">4 Bimestre</option>
        </select></td>
        <td>Gestión:</td>
    <td><select name="gestion" class="form-control">
          <option value="<?php echo $gestion;?>"><?php echo $gestion;?></option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          
        </select>
    </td>
    </tr>
        <tr>
    <td class="danger">Fecha  final del Examen:</td>
        <td><input type="date" name="fecha_final" class="form-control" value="<?php echo $fecha_final;?>"></td>
        <td><img src='../iconos/compass.png '> Tiempo X pregunta</td>
        <td><select name="tiempo" class="form-control">
        <option value="<?php echo $tiempo;?>"><?php echo $tiempo." - Minutos";?></option>
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
    </tr>
    <tr>
    <td colspan="3"></td>
<script language="javascript" type="text/javascript">
function MiFuncionJS()
{  alert ("Estas Modificando los Datos de esta EVALUACIÓN ");
}
</script>

    <td>
<?php
echo "<button type='submit' value='Click' onClick='MiFuncionJS();' class='btn btn-success glyphicon glyphicon-floppy-disk'> GUARDAR MODIFICACIÓN </button>";
//echo "<input type='button' value='Click' onClick='MiFuncionJS();' /><br>";
?>

    <!--<button type="submit" name="guardar" class="btn btn-success glyphicon glyphicon-floppy-disk"> GUARDAR MODIFICACIÓN </button>--></td>
    </tr>
    </tbody>
  </form>
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