<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>
<?php include("top-estudiantes.php");?>

<div class="container-fluid">
<!--nav bar-->

<!--hasta aqui navbar-->
</div>
<div class="container">
<div class="row d-flex justify-content-center">
    <div class="col-12">
<a href="principal.php"><button type='button' class='btn btn-warning mt-3'><i class="fas fa-fast-backward fa-3x"></i></button></a>
      <hr>

  <!--<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">TRABAJOS</div>
  <div class="card-body">
    <h5 class="card-title">Materia:</h5>
    <h5 class="card-title">Título:</h5>
    <p class="card-text">Estado:</p>
  </div>
</div>-->

 <?php 
 include("../conexion.php");
$nivel=$_GET['nivel'];
$curso=$_GET['curso'];
$paralelo=$_GET['paralelo'];

 $numero=1;
$consulta="SELECT * FROM trabajos WHERE nivel='$nivel' AND curso='$curso' AND paralelo='$paralelo' AND estado='Publicado' ";
$resultado=$link->query($consulta);
while ($row=$resultado->fetch_array()) {
  $id=$row['id'];
  $categoria=$row['categoria'];
  $titulo=$row['titulo'];
  $estado=$row['estado'];
  $fecha_final=$row['fecha_final'];
  $fecha=date("d/m/Y",strtotime($fecha_final));
 

$fecha_hoy = date("Y-m-d");

 if (strcmp($fecha_hoy, $fecha_final)>0){  
echo "<div class='col-12 col-sm-12 col-md-6'>";
echo "<form action='trabajos_pm.php' method='get'>";//******************
echo "<div class='card bg-light mb-3' style='max-width: 18rem;'>";
echo "<div class='card-header bg-danger text-white text-center'>TRABAJOS</div>";
echo "<div class='card-body bg-secondary text-white'>";
echo "<h5 class='card-title'>Materia: <font class='text-warning'>".utf8_decode($categoria)."</font></h5>";
echo "<h5 class='card-title'>Título: <font class='text-warning'>".utf8_decode($titulo)."</font></h5>";
echo "<p class='card-text'><b>Estado: </b><font class='bg-danger text-white p-1'>Finalizado </font><br><b>Fecha: </b><small>".$fecha."</small></p>";
echo "<input type='hidden' name='id_trabajos' value='".$id."'> 
      <input type='hidden' name='ci' value='".$usuario."'>"; 
echo "<button type='submit' class='btn btn-warning'>Ver Puntaje >>></button></td>";
echo "</div>";
echo "</div>";
echo "</form>";
echo "</div>";//*****************************************************
}else{
echo "<div class='col-12 col-sm-12 col-md-6'>";
echo "<form action='trabajos.php' method='get'>";//******************
echo "<div class='card bg-light mb-3' style='max-width: 18rem;'>";
echo "<div class='card-header bg-primary text-white text-center'><b>TRABAJOS</b></div>";
echo "<div class='card-body bg-white'>";
echo "<h5 class='card-title'>Materia: <font class='text-info'>".utf8_decode($categoria)."</font></h5>";
echo "<h5 class='card-title'>Título: <font class='text-info'>".utf8_decode($titulo)."</font></h5>";
echo "<p class='card-text'><b>Estado: </b><font class='bg-primary text-white p-1'>Disponible</font><br><b>Fecha: </b><small>".$fecha."</small></p>";
echo "<input type='hidden' name='id_trabajos' value='".$id."'> 
      <input type='hidden' name='ci' value='".$usuario."'>"; 
echo "<button type='submit' class='btn btn-warning'>Ingresar >>> </button></td>";
echo "</div>";
echo "</div>";
echo "</form>";
echo "</div>";//*****************************************************
}



  /*echo "<form action='trabajos.php' method='get'>";
  echo "<tr>";
  echo "<td>".$numero."
  <input type='hidden' name='id_trabajos' value='".$id."'> 
  <input type='hidden' name='ci' value='".$usuario."'> 
  </td>";
  echo "<td>".$categoria."</td>";
  echo "<td>".utf8_decode($titulo)."</td>";
  echo "<td>".$fecha."</td>";
  echo "<td><button type='submit' class='btn btn-success'>Ingresar</button></td>";
  echo "</tr>";
  echo "</form>";
  $numero++;*/
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