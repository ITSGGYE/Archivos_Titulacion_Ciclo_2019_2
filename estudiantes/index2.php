<?php 
  include("../sesion.class.php");
  include("../conexion.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>
<?php include("top-estudiantes.php");

$id_examen=$_GET['id'];
$ci=$_GET['ci'];
?>
<?php
$veri="SELECT * FROM cuestionarios WHERE ci='$usuario' AND id_examen='$id_examen' ";
$fol=$link->query($veri);
while ($rod=$fol->fetch_array()) {
  $ran1=$rod['ran1'];
}

if ($ran1>0) {
 echo "<div class='text-center p-4 text-warning bg-danger'> <h3>!! Usted ya dio el examen </h3>";
 echo "<a href='final.php?id_examen=$id_examen' class='btn btn-success'> Ver Puntaje</a></div>";
}else{ 



$consulta="SELECT * FROM examen WHERE id='$id_examen' ";
if ($resultado=$link->query($consulta)) {
         while ($row=$resultado->fetch_assoc()) {
             $id=$row['id'];
             $categoria=$row['categoria'];
             $titulo=$row['titulo'];
             $consigna=$row['consigna'];
             $tiempo=$row['tiempo'];

             
 } }       
?>


    <!-- Begin page content -->
    <main role="main" class="container">
    	<h1 class="mt-5">Bienvenido a la Evaluacion de :<?php echo utf8_decode($titulo);?></h1>
      <p class="lead">Solo tienes un intento, una vez que comienza  no hay marcha atras</p>
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
 ¿Comenzamos la Evaluación?<br>
  <strong>¡Mucho OjO!</strong> Tiene un máximo de 
<?php 
	if ($tiempo==1) {
echo "<strong><font style='font-size: 20px;font-stretch: bold;'>".$tiempo." minuto </font></strong>";    
}else{
  echo "<strong><font style='font-size: 20px;font-stretch: bold;'>".$tiempo." minutos </font></strong>";
}
	


?>

X pregunta para resolver la evaluación

</div>
<form action="prep.php" method="get">
<input type="hidden" name="ci" value="<?php echo $ci;?>">
<input type="hidden" name="id_examen" value="<?php echo $id_examen;?>">
<input type="hidden" name="tiempo" value="<?php echo $tiempo;?>">
<?php echo "<a href='principal.php'><button type='button' class='btn btn-warning' style='float: left;''> <<<< REGRESAR </button></a>";?>

<button type="submit" class="btn btn-success" style="float: right;"> COMENZAR EXAMEN >>>> </button>

</form>	
    </main>


    <footer class="footer">
      <div class="container">

      </div>
    </footer>

<?php include("footer-examen.php");?>
</body>
</html>
<?php  }

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>