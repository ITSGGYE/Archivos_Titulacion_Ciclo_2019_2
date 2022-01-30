<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>
<?php include("top-estudiantes.php");?>

<div class="container-fluid">
<!--nav bar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 mb-4">
  <a class="navbar-brand" href="principal.php">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="principal.php">Regresar</a>
      </li>


    </ul>

  </div>
</nav>
<!--hasta aqui navbar-->
</div>
<div class="container">
  <?php
$id_examen=$_GET['id_examen'];
echo "<a href='principal.php'><button type='button' class='btn btn-warning' style='float: left;' > <<<< REGRESAR </button></a> ||";

echo "<a href='puntajes.php?id_examen=$id_examen'><button type='button' class='btn btn-success' style='float: right;' > VER RESULTADOS >>>> </button></a>";
echo "<a href='#'><button type='button' class='btn btn-danger' ><i class='far fa-file-pdf'></i>  IMPRIMIR </button></a> ";

  ?>
        <table class="table table-bordered table-striped table-hover bg-white">
<?php

include("../conexion.php");
$cons="SELECT * FROM examen WHERE id='$id_examen' ";
if ($re=$link->query($cons)) {
         while ($ro=$re->fetch_assoc()) {
             $id=$ro['id'];
             $categoria=$ro['categoria'];
             $titulo=$ro['titulo'];
             $nivel=$ro['nivel'];
       $curso=$ro['curso'];
             $paralelo=$ro['paralelo'];

             

             
 } } 
?>

        <tr class="bg-primary text-white h4">
<td colspan="3">Curso: <?php echo $curso." ".$paralelo." ".$nivel." ---  Título: ".$titulo." --- Materia: ".$categoria;?> </td>



        </tr>

        <tr class="table-dark">

          <td>N°</td>

          <td>Nombres y Apellidos</td>

          <td>Puntaje</td>

        </tr>

<?php

include("../conexion.php");
$id_examen=$_GET['id_examen'];
$numero=1;
//select campo1, campo2, (campo1 + campo2) as resultado where condicion;
$consulta="SELECT id,ap,am,nom, act1,act2,act3,act4,act5,act6,act8,act9,act10,(act1+act2+act3+act4+act5+act6+act7+act8+act9+act10) as totales FROM cuestionarios WHERE id_examen='$id_examen' ORDER BY ap,am,nom ASC";

if ($resultado=$link->query($consulta)) {

         while ($row=$resultado->fetch_assoc()) {

             $id=$row['id'];

             $ap=$row['ap'];

             $am=$row['am'];

             $nom=$row['nom'];

             $totales=$row['totales'];

          echo "<tr>";

          echo "<td>".$numero."</td>";   

          echo "<td>".$ap." ".$am." ".$nom."</td> ";

          echo "<td>".$totales."</td>";

          echo "</tr>";

$numero++;
        

 } }    

?>

          

        </table>  
</div>
  <!--=== End Sticky Footer ===-->

<?php  }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>