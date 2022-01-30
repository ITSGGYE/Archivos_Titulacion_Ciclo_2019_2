<?php
  include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-12">
 <div class="container-fluid">
        <ul class="full-box list-unstyled page-nav-tabs">
          
<li><a href="eva_categoria.php"><i class="fas fa-user-plus"></i>&nbsp; 1.-Crear Categoria</a></li>
    <li><a href="leccion.php"><i class='fas fa-key'></i> &nbsp;2.-Crear Lección</a>
                </li>
<li><a href="index2.php"><i class='fas fa-key'></i> &nbsp;3.-Lecciones Creadas</a>
                </li>
        </ul> 
      </div>
<a href="nuevo.php"><button type="button" class="btn btn-light"><i class="fas fa-user-plus"></i> Nuevo Alumno +</button></a>
<h3>EVALUACIONES</h3>


<table class="table table-striped table-bordered table-hover bg-secondary text-white">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Materia</th>
      <th scope="col">Título</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
<?php 
include("../conexion.php");
//MODIFICAR PARA RESTRINGIR EL AÑO
//$anio=date("Y");
//$anio=2018;

//$consulta="SELECT * FROM examen WHERE autor='$usuario' AND gestion='$anio' ";
$consulta="SELECT * FROM examen WHERE autor='$usuario' ";
if ($resultado=$link->query($consulta)) {
$numero=1;
    while ($row=$resultado->fetch_array()) {
        $id=$row['id'];
        $categoria=$row['categoria'];
        $titulo=$row['titulo'];
        $estado=$row['estado'];


    echo "<tr>";
    echo "<th scope='row'>".$id."</th>";
    echo "<td>".utf8_decode($categoria)."</td>";
    echo "<td>".utf8_decode($titulo)."</td>";
    echo "<td><a href='eva_part.php?id=$id'><button type='button' class='btn btn-secondary' data-toggle='tooltip' data-placement='bottom' title='Nuevos Alumnos' ><i class='fas fa-users'></i></button></a>
     <a href='eva_ver.php?id=$id'><button type='button' class='btn btn-dark' data-toggle='tooltip' data-placement='bottom' title='Estudiantes Participantes' ><i class='fas fa-id-card'></i></button></a>

    <a href='eva_puntajes.php?id=$id'><button type='button' class='btn btn-warning' data-toggle='tooltip' data-placement='bottom' title='Puntajes'><i class='fas fa-file-alt'></i></button></a> ";
    
    echo "<a href='evaluacion.php?id=$id&categoria=$categoria&titulo=$titulo'><button type='button' class='btn btn-defauld' data-toggle='tooltip' data-placement='bottom' title='Editar'><i class='fas fa-edit'></i></button></a> ";

    echo "<a href='epuntajes_pdf.php?id=$id' class='btn btn-primary' data-toggle='tooltip' title='Imprimir' target='_blank' data-placement='bottom'><i class='fal fa-print'></i></a> ";

    if ($estado=='Publicado') {
    echo "<a href='eva_pub.php?id=$id'><button type='button' class='btn btn-success' data-toggle='tooltip' data-placement='bottom' title='Publicado'><i class='far fa-check-square'></i></button></a> ";
    }else{
    echo "<a href='eva_pub.php?id=$id'><button type='button' class='btn btn-primary' data-toggle='tooltip' data-placement='bottom' title='Despublicado'><i class='fas fa-times'></i></button></a> ";
    }

    echo "<a href='eva_eliminar.php?id=$id'><button type='button' class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fas fa-trash-alt'></i></button></a></td>";
    echo "</tr>";       
$numero++;
    }
}
 ?>    


  </tbody>
</table>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 