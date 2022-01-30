<?php 
require('../pdf/fpdf.php');
include("../conexion.php");


//CONTROLES DEL GET
$id=$_GET['id'];

$tapa="SELECT * FROM examen WHERE id='$id' ";
$result=$link->query($tapa);
while ($row=$result->fetch_assoc()) {
$categoria=$row['categoria'];
$titulo=$row['titulo'];
$consigna=$row['consigna'];
$nivel=$row['nivel'];
$curso=$row['curso'];
$paralelo=$row['paralelo'];
$gestion=$row['gestion'];
$bimestre=$row['bimestre'];
$fecha_final=$row['fecha_final'];
}

$pdf = new FPDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$pdf->Ln(10);
$pdf->Image('img/escudo.png' , 10 ,10, 25 , 23,'PNG');
$pdf->Cell(35, 10, '', 0);
$pdf->Cell(125, 10, 'EVALUACION '.$gestion, 0,0,'C');//IMPORTANTE TRABAJAR CON 1 PARA VER LOS CUADROS

$pdf->Image('img/ministerio.jpg', 170 ,10, 40 , 20);
$pdf->Ln(15);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(5, 8, '', 0);
$pdf->Cell(95, 8, 'Título de la Actividad: '.$titulo, 1);

$fecha=date("d/m/Y",strtotime($fecha_final));


//$pdf->Cell(95, 8, utf8_decode('CAMPOS DE SABERES: '.$area), 1);
$pdf->Cell(95, 8,  'Fecha : '.$fecha, 1);
$pdf->Ln(8);
//´POCO DE BREAK PARA CONDICIONAR

if ($curso=='PRIMERO') {
    $curso='1';
}
if ($curso=='SEGUNDO') {
    $curso='2';
}
if ($curso=='TERCERO') {
    $curso='3';
}
if ($curso=='CUARTO') {
    $curso='4';
}
if ($curso=='QUINTO') {
    $curso='5';
}
if ($curso=='SEXTO') {
    $curso='6';
}
$pdf->Cell(5, 8, '', 0);
$pdf->Cell(95, 8, 'CURSO: '.$curso.' de '.$nivel.' '.$paralelo, 1);

$pdf->Cell(95, 8, 'Materia: '.$categoria, 1);

$pdf->Ln(8);

$pdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco) 
$pdf->SetFillColor(150, 150, 155);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(5, 8, '', 0);
$pdf->Cell(95, 5, '', 1,0,'C',True);
$pdf->Cell(95, 5, 'V A L O R A C I O N E S  D E  L A  E V A L U A C I O N ', 1,0,'C',True);

//$pdf->Cell(40, 5, '', 1,0,'C',True);


$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(5, 8, '', 0);
$pdf->Cell(7, 8, 'N#', 1,0,'C',True);
$pdf->Cell(88, 8, 'APELLIDOS Y NOMBRES', 1,0,'C',True);
$pdf->SetFont('Arial', 'B', 7);
$pdf->SetTextColor(50,50,55); 
$pdf->Cell(22, 8, 'Puntaje Examen', 1,0,'C');
$pdf->Cell(20, 8, 'TOTAL', 1,0,'C');
$pdf->SetTextColor(255,255,255);
//$pdf->Cell(11, 8, '', 1,0,'C');
/*$pdf->Cell(11, 8, '', 1,0,'C');
$pdf->Cell(11, 8, '', 1,0,'C');
$pdf->Cell(11, 8, '', 1,0,'C');*/
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(53, 8, 'OBSERVACIONES', 1,0,'C',True);
//$pdf->Cell(44, 8, 'VALORACION CUALITATIVA', 1);
$pdf->SetTextColor(83,85,84);

$pdf->Ln(8);

$numero=1;
$consulta="SELECT ap,am,nom,act1,act2,act3,act4,act5,act6,act7,act8,act9,act10 FROM cuestionarios WHERE id_examen='$id' ORDER BY ap,am,nom ASC";
$resultadox=$link->query($consulta);

   while ($rows=$resultadox->fetch_array()) {
    $ap=$rows['ap'];
    $am=$rows['am'];
    $nom=$rows['nom'];
    $act1=$rows['act1'];
    $act2=$rows['act2'];
    $act3=$rows['act3'];
    $act4=$rows['act4'];
    $act5=$rows['act5'];
    $act6=$rows['act6'];
    $act7=$rows['act7'];
    $act8=$rows['act8'];
    $act9=$rows['act9'];
    $act10=$rows['act10'];
// desde aqui las variables
   
 
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(5, 5, '', 0);
$pdf->Cell(7, 5, $numero, 1);
$pdf->Cell(88, 5,$ap." ".$am." ".$nom, 1);


$total=($act1+$act2+$act3+$act4+$act5+$act6+$act7+$act8+$act9+$act10);
//$_POST['numeromulti']=str_replace(",",".",$_POST['numeromulti']);

$promed=$total * 0.35;
$pdf->Cell(22, 5, $total, 1,0,'C');
$pdf->Cell(20, 5, number_format($promed), 1,0,'C');
//pdf->Cell(11, 5, '', 1,0,'C');
//$pdf->Cell(11, 5, '', 1,0,'C');
//$pdf->Cell(11, 5, '', 1,0,'C');
//$pdf->Cell(11, 5, '', 1,0,'C');
$pdf->Cell(53, 5, '', 1,0,'C');

$pdf->Ln(5);
$numero++;
 

}

$pdf->Output();

?>