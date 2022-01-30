<?php 
 //header("Content-Type: text/html; charset=iso-8859-1 ");
  include("../sesion.class.php");
  include("../conexion.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='3') { 

require('../pdf/fpdf.php');
include("../conexion.php");

//CONTROLES DEL GET
$id_examen=$_GET['id_examen'];

$cons="SELECT * FROM examen WHERE id='$id_examen' ";
if ($re=$link->query($cons)) {
         while ($ro=$re->fetch_assoc()) {
             $id=$ro['id'];
             $categoria=$ro['categoria'];
             $titulo=$ro['titulo'];
             $consigna=$ro['consigna'];

             
 } }    
 $consul="SELECT * FROM dat_admin WHERE ci='$usuario' AND cargo='3' ";
if ($resu=$link->query($consul)) {
         while ($rof=$resu->fetch_assoc()) {
             $ap=$rof['ap'];
             $am=$rof['am'];
             $nom=$rof['nom'];
             $nivel=$rof['nivel'];
             $curso=$rof['curso'];
             $paralelo=$rof['paralelo'];

          

             
 } } 


$consulta="SELECT *,sum(act1+act2+act3+act4+act5+act6+act7+act8+act9+act10) as total FROM cuestionarios WHERE ci='$usuario' AND id_examen='$id_examen' ";
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

$total=$row['total'];}       

// HASTA AQUI LOS CONTROLES DEL GET
$pdf = new FPDF('P','mm',array(215,330));//tamaño OFICIO
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 15);
$pdf->Ln(7);
$pdf->Image('img/escudo.png' , 30 ,4, 30 , 23,'PNG');
$pdf->Cell(60, 7, '', 0);
$pdf->Cell(70, 7, 'Evaluación de '.$categoria, 0,0,'B');//IMPORTANTE TRABAJAR CON 1 PARA VER LOS CUADROS
$pdf->Image('img/ministerio.jpg' , 160 ,5, 25 , 25,'jpg');
$pdf->Ln(9);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(10, 10, '', 0);
$pdf->Cell(10, 10, 'DATOS REFERENCIALES', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(15, 6, '', 0);
$pdf->Cell(15, 6, 'Título', 0);
$pdf->Cell(3, 6, ':', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 6, $titulo, 0);
$pdf->Cell(25, 6, '', 0);
$pdf->Cell(15, 6, 'Curso ', 0);
$pdf->Cell(3, 6, ':', 0);
if ($curso=='PRIMERO') {
$pdf->Cell(50, 6, "1° ".$paralelo." ".$nivel, 0);
}elseif ($curso=='SEGUNDO') {
$pdf->Cell(50, 6, "2° ".$paralelo." ".$nivel, 0);
}elseif ($curso=='TERCERO') {
$pdf->Cell(50, 6, "3° ".$paralelo." ".$nivel, 0);
}elseif ($curso=='CUARTO') {
$pdf->Cell(50, 6, "4° ".$paralelo." ".$nivel, 0);
}elseif ($curso=='QUINTO') {
$pdf->Cell(50, 6, "5° ".$paralelo." ".$nivel, 0);
}elseif ($curso=='SEXTO') {
$pdf->Cell(50, 6, "6° ".$paralelo." ".$nivel,0);
}else{
$pdf->Cell(50, 6, $curso." ".$paralelo." ".$nivel, 0);
}

$pdf->Ln(5);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(15, 6, '', 0);
$pdf->Cell(15, 6, utf8_decode('Nombre'), 0);
$pdf->Cell(3, 6, ':', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 6, utf8_decode($nom." ".$ap." ".$am), 0);
$pdf->Cell(25, 6, '', 0);
$pdf->Cell(15, 6, 'Puntaje ', 0);
$pdf->Cell(3, 6, ':', 0);
$pdf->Cell(50, 6, $total.' Puntos', 0);
$pdf->Ln(6);
$pdf->Cell(190, 6, '----------------------------------------------------------------------------------------------------------------------------------------------------------------', 0,0,'C');
$pdf->Ln(6);
// desde aqui la PREGUNTA # 1
$pregunta1="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran1' ";
$res1=$link->query($pregunta1);
while ($row1=$res1->fetch_array()) {
$preg1=$row1['preg'];
$resp1=$row1['resp'];
$A1=$row1['A'];
$B1=$row1['B'];
$C1=$row1['C'];
$D1=$row1['D'];
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(10, 5, '1. ', 0);
$pdf->Cell(185, 5, $preg1, 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($A1), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($B1), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($C1), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($D1), 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(29, 5, utf8_decode('Respuesta Correcta'), 0);
$pdf->Cell(3, 5, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, $resp1, 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(19, 4, utf8_decode('Tu respuesta'), 0);
$pdf->Cell(3, 4, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 4, $resp1a, 0);
$pdf->Ln(4);
// HASTA AQUI PREGUNTA # 1

// desde aqui la PREGUNTA # 2
$pregunta2="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran2' ";
$res2=$link->query($pregunta2);
while ($row2=$res2->fetch_array()) {
$preg2=$row2['preg'];
$resp2=$row2['resp'];
$A2=$row2['A'];
$B2=$row2['B'];
$C2=$row2['C'];
$D2=$row2['D'];
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(10, 5, '2. ', 0);
$pdf->Cell(185, 5, $preg2, 0);
$pdf->Ln(4);


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($A2), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($B2), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($C2), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($D2), 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(29, 5, utf8_decode('Respuesta Correcta'), 0);
$pdf->Cell(3, 5, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, $resp2, 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(19, 4, utf8_decode('Tu respuesta'), 0);
$pdf->Cell(3, 4, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 4, $resp2a, 0);
$pdf->Ln(4);
// HASTA AQUI PREGUNTA # 2
// desde aqui la PREGUNTA # 3
$pregunta3="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran3' ";
$res3=$link->query($pregunta3);
while ($row3=$res3->fetch_array()) {
$preg3=$row3['preg'];
$resp3=$row3['resp'];
$A3=$row3['A'];
$B3=$row3['B'];
$C3=$row3['C'];
$D3=$row3['D'];
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(10, 5, '3. ', 0);
$pdf->Cell(185, 5, $preg3, 0);
$pdf->Ln(4);


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($A3), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($B3), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($C3), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($D3), 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(29, 5, utf8_decode('Respuesta Correcta'), 0);
$pdf->Cell(3, 5, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, $resp3, 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(19, 4, utf8_decode('Tu respuesta'), 0);
$pdf->Cell(3, 4, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 4, $resp3a, 0);
$pdf->Ln(4);
// HASTA AQUI PREGUNTA # 3

// desde aqui la PREGUNTA # 4
$pregunta4="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran4' ";
$res4=$link->query($pregunta4);
while ($row4=$res4->fetch_array()) {
$preg4=$row4['preg'];
$resp4=$row4['resp'];
$A4=$row4['A'];
$B4=$row4['B'];
$C4=$row4['C'];
$D4=$row4['D'];
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(10, 5, '4. ', 0);
$pdf->Cell(185, 5, $preg4, 0);
$pdf->Ln(4);


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($A4), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($B4), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($C4), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($D4), 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(29, 5, utf8_decode('Respuesta Correcta'), 0);
$pdf->Cell(3, 5, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, $resp4, 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(19, 4, utf8_decode('Tu respuesta'), 0);
$pdf->Cell(3, 4, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 4, $resp4a, 0);
$pdf->Ln(4);
// HASTA AQUI PREGUNTA # 4
// desde aqui la PREGUNTA # 5
$pregunta5="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran5' ";
$res5=$link->query($pregunta5);
while ($row5=$res5->fetch_array()) {
$preg5=$row5['preg'];
$resp5=$row5['resp'];
$A5=$row5['A'];
$B5=$row5['B'];
$C5=$row5['C'];
$D5=$row5['D'];
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(10, 5, '5. ', 0);
$pdf->Cell(185, 5, $preg5, 0);
$pdf->Ln(4);


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($A5), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($B5), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($C5), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($D5), 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(29, 5, utf8_decode('Respuesta Correcta'), 0);
$pdf->Cell(3, 5, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, $resp5, 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(19, 4, utf8_decode('Tu respuesta'), 0);
$pdf->Cell(3, 4, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 4, $resp5a, 0);
$pdf->Ln(4);
// HASTA AQUI PREGUNTA # 5
// desde aqui la PREGUNTA # 6
$pregunta6="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran6' ";
$res6=$link->query($pregunta6);
while ($row6=$res6->fetch_array()) {
$preg6=$row6['preg'];
$resp6=$row6['resp'];
$A6=$row6['A'];
$B6=$row6['B'];
$C6=$row6['C'];
$D6=$row6['D'];
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(10, 5, '6. ', 0);
$pdf->Cell(185, 5, $preg6, 0);
$pdf->Ln(4);


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($A6), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($B6), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($C6), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($D6), 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(29, 5, utf8_decode('Respuesta Correcta'), 0);
$pdf->Cell(3, 5, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, $resp6, 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(19, 4, utf8_decode('Tu respuesta'), 0);
$pdf->Cell(3, 4, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 4, $resp6a, 0);
$pdf->Ln(4);
// HASTA AQUI PREGUNTA # 6
// desde aqui la PREGUNTA # 7
$pregunta7="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran7' ";
$res7=$link->query($pregunta7);
while ($row7=$res7->fetch_array()) {
$preg7=$row7['preg'];
$resp7=$row7['resp'];
$A7=$row7['A'];
$B7=$row7['B'];
$C7=$row7['C'];
$D7=$row7['D'];
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(10, 5, '7. ', 0);
$pdf->Cell(185, 5, $preg7, 0);
$pdf->Ln(4);


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($A7), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($B7), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($C7), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($D7), 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(29, 5, utf8_decode('Respuesta Correcta'), 0);
$pdf->Cell(3, 5, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, $resp7, 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(19, 4, utf8_decode('Tu respuesta'), 0);
$pdf->Cell(3, 4, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 4, $resp7a, 0);
$pdf->Ln(4);
// HASTA AQUI PREGUNTA # 7
// desde aqui la PREGUNTA # 8
$pregunta8="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran8' ";
$res8=$link->query($pregunta8);
while ($row8=$res8->fetch_array()) {
$preg8=$row8['preg'];
$resp8=$row8['resp'];
$A8=$row8['A'];
$B8=$row8['B'];
$C8=$row8['C'];
$D8=$row8['D'];
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(10, 5, '8. ', 0);
$pdf->Cell(185, 5, $preg8, 0);
$pdf->Ln(4);


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($A8), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($B8), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($C8), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($D8), 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(29, 5, utf8_decode('Respuesta Correcta'), 0);
$pdf->Cell(3, 5, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, $resp8, 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(19, 4, utf8_decode('Tu respuesta'), 0);
$pdf->Cell(3, 4, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 4, $resp8a, 0);
$pdf->Ln(4);
// HASTA AQUI PREGUNTA # 8
// desde aqui la PREGUNTA # 9
$pregunta9="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran9' ";
$res9=$link->query($pregunta9);
while ($row9=$res9->fetch_array()) {
$preg9=$row9['preg'];
$resp9=$row9['resp'];
$A9=$row9['A'];
$B9=$row9['B'];
$C9=$row9['C'];
$D9=$row9['D'];
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(10, 5, '9. ', 0);
$pdf->Cell(185, 5, $preg9, 0);
$pdf->Ln(4);


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($A9), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($B9), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($C9), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($D9), 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(29, 5, utf8_decode('Respuesta Correcta'), 0);
$pdf->Cell(3, 5, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, $resp9, 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(19, 4, utf8_decode('Tu respuesta'), 0);
$pdf->Cell(3, 4, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 4, $resp9a, 0);
$pdf->Ln(4);
// HASTA AQUI PREGUNTA # 9
// desde aqui la PREGUNTA # 10
$pregunta10="SELECT * FROM preguntas WHERE id_examen='$id_examen' AND numero='$ran10' ";
$res10=$link->query($pregunta10);
while ($row10=$res10->fetch_array()) {
$preg10=$row10['preg'];
$resp10=$row10['resp'];
$A10=$row10['A'];
$B10=$row10['B'];
$C10=$row10['C'];
$D10=$row10['D'];
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(10, 5, '', 0);
$pdf->Cell(10, 5, '10. ', 0);
$pdf->Cell(185, 5, $preg10, 0);
$pdf->Ln(4);


$pdf->SetFont('Arial', '', 8);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($A10), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($B10), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($C10), 0);
$pdf->Ln(4);
$pdf->Cell(35, 5, '', 0);
$pdf->Cell(5, 5, '<>', 0);
$pdf->Cell(185, 5, utf8_decode($D10), 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, '', 0);
$pdf->Cell(29, 5, utf8_decode('Respuesta Correcta'), 0);
$pdf->Cell(3, 5, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 5, $resp10, 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(19, 4, utf8_decode('Tu respuesta'), 0);
$pdf->Cell(3, 4, ':', 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(60, 4, $resp10a, 0);
$pdf->Ln(4);
// HASTA AQUI PREGUNTA # 9
$pdf->Output();
 }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>