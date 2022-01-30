<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>
<?php include("top-examen.php");
include("../conexion.php");
$id_examen=$_GET["id_examen"];
//$ci=$_GET["ci"];

$consulta="SELECT * FROM examen WHERE id='$id_examen' ";
if ($resultado=$link->query($consulta)) {
         while ($row=$resultado->fetch_assoc()) {
             
             $titulo=$row['titulo'];
             $preg9=$row['preg9'];

             $resp9=$row['resp9'];
             $inicio=$row['inicio'];
           $final9=$row['final9'];
           $tiempo=$row['tiempo'];
           $categoria=$row['categoria'];

             
$actual=date('Y-m-j H:i:s');
$datetime1 = new DateTime($actual);
$datetime2 = new DateTime($final9);
$interval = $datetime1->diff($datetime2);
//echo $interval->format("%H:%I:%S"); MANTENIENDO LA HORA/MINUTO/SEGUNDOS
//echo $interval->format("%H:%I:%S");
}}    
?>
<body>
    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5" style="text-align: center;">Evaluación</h1>
      <p class="lead">Selecciona el inciso correcto de las siguientes preguntas de selección Múltiple <font class="cuadros" style="font-size:25px;"><label id = "tiempo"><?php echo $interval->format("%I:%S");?> </label></font></p>
      
    </main>
<hr>
      <div class="container">
<form action="act9x.php" method="post" id="test">
 <table class="table table-bordered">

   <tr class="cuadro">
     <td>Categoria: <?php echo utf8_decode($categoria);?></td>
     <td>Título : "<?php echo utf8_decode($titulo);?>" </td>
</tr>
<?php
$ran9=$_GET['ran9'];
$consulta="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran9'";
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
echo "<td colspan='2'><strong>PREGUNTA # 9:</strong><font class='lead text-primary'> ".$preg."</font><br><br>";

echo "<input type='hidden' name='id_examen' value='".$id_examen."'>"; 
echo "<input type='hidden' name='ran9' value='".$ran9."'>";     

//--desde aqui aleatorio
$array1=array("<div class='radio' style='margin-left:50px;'>
  <label><input type='radio' name='preg' value='".$A."'> ".$A."</label>
</div>", "<div class='radio' style='margin-left:50px;'>
  <label><input type='radio' name='preg' value='".$B."'> ".$B."</label>
</div>", "<div class='radio' style='margin-left:50px;'>
  <label><input type='radio' name='preg' value='".$C."'> ".$C."</label>
</div>", "
<div class='radio' style='margin-left:50px;'>
  <label><input type='radio' name='preg' value='".$D."'> ".$D."</label>
</div>");
//var_export ($array1);
shuffle($array1);
echo implode($array1); 
//--hasta aqui pone aleatorio
echo "</td>";
echo "</tr>";


             

            
// echo "<input type='text' name='preg1' value='".$preg1."'>"; 
 //echo "<input type='text' name='resp1' value='".$resp1."'>";   
 echo "<input type='hidden' name='id_preguntas' value='".$id_preguntas."'>";
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
  <td colspan="2"><button type="submit" name="test" id="test" style="float: right;" class="btn btn-lg btn-success">GUARDAR</button></td>
</tr>

 </table>
</form>
      </div>
 <!--================================================== -->


  <!--=== End Sticky Footer ===-->
<?php include("footer-examen.php");?>
<?php  }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>