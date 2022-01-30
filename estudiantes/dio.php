<?php 
  include("../sesion.class.php");
  include("../conexion.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>
<?php include("top-estudiantes.php");


$id_examen=$_GET['id_examen'];
$ci=$_GET['ci'];
?>
<?php

$consulta="SELECT * FROM examen WHERE id='$id_examen' ";
if ($resultado=$link->query($consulta)) {
         while ($row=$resultado->fetch_assoc()) {
             $id=$row['id'];
             $categoria=$row['categoria'];
             $titulo=$row['titulo'];
             $consigna=$row['consigna'];

             
 } }       
?>


    <!-- Begin page content -->
    <main role="main" class="container">
    	<h1 class="mt-5">Bienvenido a la Evaluacion de :<?php echo $titulo;?></h1>
      <p class="lead">Solo tienes un intento, una vez que comienza  no hay marcha atras</p>
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 No tienes más intentos<br>
  <strong>¡Lo sentimos, Usted ya dió la EVALUACIÓN de <?php echo $titulo;?>!</strong>

</div>
<?php 
echo "<a href='principal.php'><button type='button' class='btn btn-warning' style='float: left;' > <<<< REGRESAR </button></a> ||";

echo "<a href='puntajes.php?id_examen=$id_examen'><button type='button' class='btn btn-success' style='float: right;' > VER RESULTADOS >>>> </button></a>";
echo "<a href='final.php?id_examen=$id_examen'><button type='button' class='btn btn-info' > VER MI EXAMEN >>>> </button></a> ";

?>

<!--<button type="button" class="btn btn-warning" style="float: left;"> REGRESAR </button>
<button type="submit" class="btn btn-success" style="float: right;"> VER RESULTADOS >>>> </button>-->

	
    </main>


    <footer class="footer">
      <div class="container">

      </div>
    </footer>

<?php include("footer-examen.php");?>
</body>
</html>
<?php  }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>