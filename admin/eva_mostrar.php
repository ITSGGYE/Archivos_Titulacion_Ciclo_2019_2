<?php
  include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-9 col-md-offset-2">

<a href="nuevo.php"><button type="button" class="btn btn-defauld "><img src="../iconos/icon-16-user-dd.png"> Nuevo Alumno +</button></a>
<h3>Lista de EVALUACIONES</h3>
<div class="table-responsive">
<table class="table table-striped table-bordered table-condensed">
<form action="eva_categoriax.php" method="post" >
    <tbody class="success">
      <td>N#</td>
      <td>Evaluaciones</td>
      <td>Título</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tbody>
<?php 
include("../conexion.php");
$anio=date("Y");

$consulta="SELECT * FROM examen WHERE autor='$usuario' AND gestion='$anio' ";
if ($resultado=$link->query($consulta)) {
$numero=1;
    while ($row=$resultado->fetch_array()) {
        $id=$row['id'];
        $categoria=$row['categoria'];
        $titulo=$row['titulo'];
        $estado=$row['estado'];


    echo "<tr>";
    echo "<td>".$id."</td>";
    echo "<td>".$categoria."</td>";
    echo "<td>".$titulo."</td>";
    echo "<td><a href='eva_part.php?id=$id'><button type='button' class='btn btn-defauld'><img src='../iconos/icon-16-user.png'> Añadir Participantes</button></a> <a href='eva_ver.php?id=$id'><button type='button' class='btn btn-defauld'><img src='../iconos/page_white_text.png'> Ver Participantes</button></a>

    <a href='eva_puntajes.php?id=$id'><button type='button' class='btn btn-defauld'><img src='../iconos/icon-16-module.png'> Resultados</button></a></td>";
    
    echo "<td><a href='evaluacion.php?id=$id&categoria=$categoria&titulo=$titulo'><button type='button' class='btn btn-defauld'> <img src='../iconos/pencil.png'> Editar </button></a></td>";
    echo "<td><a href='eva_pub.php?id=$id'><button type='button' class='btn btn-info'>".$estado."</button></a></td>";
    echo "<td><a href='eva_eliminar.php?id=$id'><button type='button' class='btn btn-danger'> Eliminar </button></a></td>";
    echo "</tr>";       
$numero++;
    }
}




 ?>    
    </form>
</table>
</div>
</div>

<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 