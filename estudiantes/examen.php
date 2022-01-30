<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>
<?php include("top-estudiantes.php");
include("../conexion.php");
$id_examen=$_GET['id_examen'];
$ci=$_GET['ci'];
$consulta="SELECT * FROM examen WHERE id='$id_examen' ";
if ($resultado=$link->query($consulta)) {
         while ($row=$resultado->fetch_assoc()) {
             $id_examen=$row['id'];
             $titulo=$row['titulo'];
             $categoria=$row['categoria'];
             //$archivo1=$row['archivo1'];
             //$resp1=$row['resp1'];
             $inicio=$row['inicio'];
           $final1=$row['final1'];
           $tiempo=$rw['tiempo'];

             
$actual=date('Y-m-j H:i:s');
$datetime1 = new DateTime($actual);
$datetime2 = new DateTime($final1);
$interval = $datetime1->diff($datetime2);
}}
?>
<body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Evaluación Virtual</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">v2.0 <span class="sr-only">(current)</span></a>
            </li>
            
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5" style="text-align: center;">Evaluación</h1>
      <p class="lead">Selecciona el inciso correcto de las siguientes preguntas de selección Múltiple</p>
      
    </main>
<hr>
    <footer class="footer">
      <div class="container">
<form action="examenx.php" method="post">
 <table class="table table-bordered">
   <tr>
     <td>Categoria: <?php echo $categoria;?></td>
     <td>Título : "<?php echo $titulo;?>" </td>
</tr>
<?php
$numero=1;
$otro=1;
$consulta="SELECT * FROM preguntas WHERE id_examen='$id_examen' ";
if ($resultado=$link->query($consulta)) {
         while ($row=$resultado->fetch_assoc()) {
             $id_preguntas=$row['id_preguntas'];
             $id_examen=$row['id_examen'];
             $A=$row['A'];
             $B=$row['B'];
             $C=$row['C'];
             $D=$row['D'];
             $preg=$row['preg'];
             $resp=$row['resp'];

echo "<tr>";
echo "<td colspan='2'>".$numero.") ".$preg."<br>";
echo "<input type='hidden' name='ci' value='".$ci."'>"; 
echo "<input type='hidden' name='id_examen' value='".$id_examen."'>";   
echo "<input type='hidden' name='id_preguntas' value='".$id_preguntas."'>"; 
echo "<input type='hidden' name='preg[]' value='".$preg."'>"; 
echo "<input type='hidden' name='resp[]' value='".$resp."'>"; 
echo "<div class='radio' style='margin-left:50px;'>
  <label><input type='radio' name='res".$otro."[]' value='".$A."'>".$A."</label>
</div>
<div class='radio' style='margin-left:50px;'>
  <label><input type='radio' name='res".$otro."[]' value='".$B."'>".$B."</label>
</div>
<div class='radio' style='margin-left:50px;'>
  <label><input type='radio' name='res".$otro."[]' value='".$C."'>".$C."</label>
</div>
<div class='radio' style='margin-left:50px;'>
  <label><input type='radio' name='res".$otro."[]' value='".$D."'>".$D."</label>
</div>";  
echo "</td>";
echo "</tr>";

$numero++;
$otro++;            

 } } 
?>


<!--<tr>
<td colspan="2">1). Pregunta<br>
<ul>
  <li>a) </li>
  <li>b) </li>
  <li>c) </li>
  <li>d) </li>
</ul>
</td>

</tr>-->
<tr>
  <td colspan="2"><button type="submit" class="btn btn-success">GUARDAR</button></td>
</tr>

 </table>
</form>
      </div>
    </footer>
 <!--================================================== -->


  <!--=== End Sticky Footer ===-->
<?php include("footer-examen.php");?>
<?php  }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>