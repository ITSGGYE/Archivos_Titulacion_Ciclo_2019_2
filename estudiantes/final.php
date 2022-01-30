<?php 
  include("../sesion.class.php");
  include("../conexion.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { ?>
<?php include("top-estudiantes.php");

$id_examen=$_GET['id_examen'];
//$ci=$_GET['ci'];
?>
<?php

$cons="SELECT * FROM examen WHERE id='$id_examen' ";
if ($re=$link->query($cons)) {
         while ($ro=$re->fetch_assoc()) {
             $id=$ro['id'];
             $categoria=$ro['categoria'];
             $titulo=$ro['titulo'];
             $consigna=$ro['consigna'];
             $fecha_final=$ro['fecha_final'];

             
 } }       
?>


    <!-- Begin page content -->

    <main role="main" class="container bg-light p-3" >

      <h1 class="mt-5">Evaluación de :<?php echo utf8_decode($titulo);?></h1>
      
<div class="alert alert-danger alert-dismissable" >
  <button type="button" class="close" data-dismiss="alert">&times;</button>


<?php
// la tabla cuestionarios tiene las  RESPUESTAS
//preguntas es la tabla de las preguntas e incisos

$consulta="SELECT *,sum(act1+act2+act3+act4+act5+act6+act7+act8+act9+act10) as total FROM cuestionarios WHERE ci='$usuario'  AND id_examen='$id_examen' ";
$resultado=$link->query($consulta);
while ($row=$resultado->fetch_array()) {
$ap=$row['ap'];
$am=$row['am'];
$nom=$row['nom'];

$ran1=$row['ran1'];
$ran2=$row['ran2'];
$ran3=$row['ran3'];
$ran4=$row['ran4'];
$ran5=$row['ran5'];
$ran6=$row['ran6'];
$ran7=$row['ran7'];
$ran8=$row['ran8'];
$ran9=$row['ran9'];
$ran10=$row['ran10'];

$resp1a=$row['resp1'];
$resp2a=$row['resp2'];
$resp3a=$row['resp3'];
$resp4a=$row['resp4'];
$resp5a=$row['resp5'];
$resp6a=$row['resp6'];
$resp7a=$row['resp7'];
$resp8a=$row['resp8'];
$resp9a=$row['resp9'];
$resp10a=$row['resp10'];

$total=$row['total'];


echo "Apellidos y Nombres : ".utf8_decode($ap)." ".utf8_decode($am)." ".utf8_decode($nom)." -- Tu puntaje es de : <strong><span class='bg-danger text-white p-2'>".$total."</span></strong>";
//echo $ran1;
}

?>
</div>


<?php 
echo "<a href='principal.php'><button type='button' class='btn btn-warning' style='float: left;' > <<<< REGRESAR </button></a> ||";

echo "<a href='puntajes.php?id_examen=$id_examen'><button type='button' class='btn btn-success' style='float: right;' > VER RESULTADOS >>>> </button></a>";


//MOSTRAMOS LAS REPUESTAS DEL EXAMEN
date_default_timezone_set("America/La_Paz");
$hoy=date("Y-m-d");

#echo $fecha_final;
#echo "<br>".$hoy;

if ($hoy>=$fecha_final) {
echo "<a href='pdf.php?id_examen=$id_examen'  target='_blanck'><button type='button' class='btn btn-danger' > IMPRIMIR </button></a> ";



?>
<!--EL CUADRO  EMPIEZA-->

<table class="table table-bordered table-striped mt-3">
  <tr>
    <td class="bg-primary text-white">Pregunta # 1 </td>
  </tr>
<!--AQUI LA PREGUNTA #1 DE TU EXAMEN-->
  <tr>

    <td>
   <?php    
$pregunta1="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran1' ";
$res1=$link->query($pregunta1);
while ($row1=$res1->fetch_array()) {
$preg1=$row1['preg'];
$resp1=$row1['resp'];
$A1=$row1['A'];
$B1=$row1['B'];
$C1=$row1['C'];
$D1=$row1['D'];

echo "<em>".$preg1."</em><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($A1)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($B1)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($C1)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($D1)."</font><br><br>";

echo "<strong>Respuesta Correcta: </strong><font style='color:red'>".$resp1."</font> | | <strong>Tu respuesta fue: </strong><font style='color:blue'>".$resp1a."</font>";
}
?>
    </td>
  </tr>
<!-- HASTA AQUI LA # 1 DEL EXAMEN-->
<tr>
    <td class="bg-primary text-white">Pregunta # 2 </td>
  </tr>
<!--AQUI LA PREGUNTA #2 DE TU EXAMEN-->
  <tr>

    <td>
   <?php    
$pregunta2="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran2' ";
$res2=$link->query($pregunta2);
while ($row2=$res2->fetch_array()) {
$preg2=$row2['preg'];
$resp2=$row2['resp'];
$A2=$row2['A'];
$B2=$row2['B'];
$C2=$row2['C'];
$D2=$row2['D'];

echo "<em>".$preg2."</em><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($A2)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($B2)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($C2)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($D2)."</font><br><br>";

echo "<strong>Respuesta Correcta: </strong><font style='color:red'>".$resp2."</font> | | <strong>Tu respuesta fue: </strong><font style='color:blue'>".$resp2a."</font>";
}
?>
    </td>
  </tr>
<!-- HASTA AQUI LA # 2 DEL EXAMEN-->
<tr>
    <td class="bg-primary text-white">Pregunta # 3 </td>
  </tr>
<!--AQUI LA PREGUNTA #3 DE TU EXAMEN-->
  <tr>

    <td>
   <?php    
$pregunta3="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran3' ";
$res3=$link->query($pregunta3);
while ($row3=$res3->fetch_array()) {
$preg3=$row3['preg'];
$resp3=$row3['resp'];
$A3=$row3['A'];
$B3=$row3['B'];
$C3=$row3['C'];
$D3=$row3['D'];

echo "<em>".$preg3."</em><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($A3)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($B3)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($C3)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($D3)."</font><br><br>";

echo "<strong>Respuesta Correcta: </strong><font style='color:red'>".$resp3."</font> | | <strong>Tu respuesta fue: </strong><font style='color:blue'>".$resp3a."</font>";
}
?>
    </td>
  </tr>
<!-- HASTA AQUI LA # 3 DEL EXAMEN-->
<tr>
    <td class="bg-primary text-white">Pregunta # 4 </td>
  </tr>
<!--AQUI LA PREGUNTA #4 DE TU EXAMEN-->
  <tr>

    <td>
   <?php    
$pregunta4="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran4' ";
$res4=$link->query($pregunta4);
while ($row4=$res4->fetch_array()) {
$preg4=$row4['preg'];
$resp4=$row4['resp'];
$A4=$row4['A'];
$B4=$row4['B'];
$C4=$row4['C'];
$D4=$row4['D'];

echo "<em>".$preg4."</em><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($A4)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($B4)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($C4)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($D4)."</font><br><br>";

echo "<strong>Respuesta Correcta: </strong><font style='color:red'>".$resp4."</font> | | <strong>Tu respuesta fue: </strong><font style='color:blue'>".$resp4a."</font>";
}
?>
    </td>
  </tr>
<!-- HASTA AQUI LA # 4 DEL EXAMEN-->
<tr>
    <td class="bg-primary text-white">Pregunta # 5 </td>
  </tr>
<!--AQUI LA PREGUNTA #5 DE TU EXAMEN-->
  <tr>

    <td>
   <?php    
$pregunta5="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran5' ";
$res5=$link->query($pregunta5);
while ($row5=$res5->fetch_array()) {
$preg5=$row5['preg'];
$resp5=$row5['resp'];
$A5=$row5['A'];
$B5=$row5['B'];
$C5=$row5['C'];
$D5=$row5['D'];

echo "<em>".$preg5."</em><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($A5)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($B5)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($C5)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($D5)."</font><br><br>";

echo "<strong>Respuesta Correcta: </strong><font style='color:red'>".$resp5."</font> | | <strong>Tu respuesta fue: </strong><font style='color:blue'>".$resp5a."</font>";
}
?>
    </td>
  </tr>
<!-- HASTA AQUI LA # 5 DEL EXAMEN-->
<tr>
    <td class="bg-primary text-white">Pregunta # 6 </td>
  </tr>
<!--AQUI LA PREGUNTA #6 DE TU EXAMEN-->
  <tr>

    <td>
   <?php    
$pregunta6="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran6' ";
$res6=$link->query($pregunta6);
while ($row6=$res6->fetch_array()) {
$preg6=$row6['preg'];
$resp6=$row6['resp'];
$A6=$row6['A'];
$B6=$row6['B'];
$C6=$row6['C'];
$D6=$row6['D'];

echo "<em>".$preg6."</em><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($A6)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($B6)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($C6)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($D6)."</font><br><br>";

echo "<strong>Respuesta Correcta: </strong><font style='color:red'>".$resp6."</font> | | <strong>Tu respuesta fue: </strong><font style='color:blue'>".$resp6a."</font>";
}
?>
    </td>
  </tr>
<!-- HASTA AQUI LA # 6 DEL EXAMEN-->
<tr>
    <td class="bg-primary text-white">Pregunta # 7 </td>
  </tr>
<!--AQUI LA PREGUNTA #7 DE TU EXAMEN-->
  <tr>

    <td>
   <?php    
$pregunta7="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran7' ";
$res7=$link->query($pregunta7);
while ($row7=$res7->fetch_array()) {
$preg7=$row7['preg'];
$resp7=$row7['resp'];
$A7=$row7['A'];
$B7=$row7['B'];
$C7=$row7['C'];
$D7=$row7['D'];

echo "<em>".$preg7."</em><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($A7)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($B7)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($C7)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($D7)."</font><br><br>";

echo "<strong>Respuesta Correcta: </strong><font style='color:red'>".$resp7."</font> | | <strong>Tu respuesta fue: </strong><font style='color:blue'>".$resp7a."</font>";
}
?>
    </td>
  </tr>
<!-- HASTA AQUI LA # 7 DEL EXAMEN-->

<tr>
    <td class="bg-primary text-white">Pregunta # 8 </td>
  </tr>
<!--AQUI LA PREGUNTA #8 DE TU EXAMEN-->
  <tr>

    <td>
   <?php    
$pregunta8="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran8' ";
$res8=$link->query($pregunta8);
while ($row8=$res8->fetch_array()) {
$preg8=$row8['preg'];
$resp8=$row8['resp'];
$A8=$row8['A'];
$B8=$row8['B'];
$C8=$row8['C'];
$D8=$row8['D'];

echo "<em>".$preg8."</em><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($A8)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($B8)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($C8)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($D8)."</font><br><br>";

echo "<strong>Respuesta Correcta: </strong><font style='color:red'>".$resp8."</font> | | <strong>Tu respuesta fue: </strong><font style='color:blue'>".$resp8a."</font>";
}
?>
    </td>
  </tr>
<!-- HASTA AQUI LA # 8 DEL EXAMEN-->
<tr>
    <td class="bg-primary text-white">Pregunta # 9 </td>
  </tr>
<!--AQUI LA PREGUNTA #9 DE TU EXAMEN-->
  <tr>

    <td>
   <?php    
$pregunta9="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran9' ";
$res9=$link->query($pregunta9);
while ($row9=$res9->fetch_array()) {
$preg9=$row9['preg'];
$resp9=$row9['resp'];
$A9=$row9['A'];
$B9=$row9['B'];
$C9=$row9['C'];
$D9=$row9['D'];

echo "<em>".$preg9."</em><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($A9)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($B9)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($C9)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($D9)."</font><br><br>";

echo "<strong>Respuesta Correcta: </strong><span class='text-danger'>".utf8_decode($resp9)."</span> | | <strong>Tu respuesta fue: </strong><font style='color:blue'>".$resp9a."</font>";
}
?>
    </td>
  </tr>
<!-- HASTA AQUI LA # 9 DEL EXAMEN-->
<tr>
    <td class="bg-primary text-white">Pregunta # 10 </td>
  </tr>
<!--AQUI LA PREGUNTA #10 DE TU EXAMEN-->
  <tr>

    <td>
   <?php    
$pregunta10="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran10' ";
$res10=$link->query($pregunta10);
while ($row10=$res10->fetch_array()) {
$preg10=$row10['preg'];
$resp10=$row10['resp'];
$A10=$row10['A'];
$B10=$row10['B'];
$C10=$row10['C'];
$D10=$row10['D'];

echo "<em>".$preg10."</em><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($A10)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($B10)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($C10)."</font><br>";
echo "<img src='imagenes/flecha.gif' style='margin-left:20px;'> <font style='margin-left:5px;'>".utf8_decode($D10)."</font><br><br>";

echo "<strong>Respuesta Correcta: </strong><font style='color:red'>".$resp10."</font> | | <strong>Tu respuesta fue: </strong><font style='color:blue'>".$resp10a."</font>";
}
?>
    </td>
  </tr>
<!-- HASTA AQUI LA # 10 DEL EXAMEN-->
</table>
<!-- HASTA AQUI EL CUADRO-->
<?php
}else{
echo "<div class='alert alert-primary mt-4' role='alert'>
  Aun estamos en  <a href='#' class='alert-link'> Evaluación</a>. 
</div>";

}


?>
<!--<button type="button" class="btn btn-warning" style="float: left;"> REGRESAR </button>
<button type="submit" class="btn btn-success" style="float: right;"> VER RESULTADOS >>>> </button>-->

  
    </main>


    <footer class="footer">
      <div class="container">
        <p class="float-right">
          <a href="#"><img src="imagenes/subir.png" width="50%"></a>
        </p>
      </div>
    </footer>

<?php include("footer-examen.php");?>
</body>
</html>
<?php  }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>