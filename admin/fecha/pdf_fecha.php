<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: ../index.php');
	}	
?>
<?php
#Conectare a la base de datos
 include 'plantilla_fecha.php';
include_once("conexion.php");
$date1 = date("Y-m-d", strtotime($_POST['date1']));
$date2 = date("Y-m-d", strtotime($_POST['date2']));
if (!empty($_POST['date1']) and  !empty($_POST['date1'])){
	list($dia,$mes,$anio)=explode("/",$_POST['date1']);
	$date1="$anio-$mes-$dia";
	list($dia,$mes,$anio)=explode("/",$_POST['date2']);
	$date2="$anio-$mes-$dia";
$q_book = $conn->query("SELECT *  
  FROM cita c
  JOIN paciente p
   ON c.id_paciente=p.id_paciente
     JOIN especialista e
  ON c.id_especialista =e.id_especialista
  JOIN especialidad d
  ON  e.id_especialidad=d.id_especialidad
	WHERE c.fecha BETWEEN '$date1' AND '$date2' ORDER BY c.id_cita") or die(mysqli_error());
$v_book = $q_book->num_rows;
} 
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
    $pdf->SetY(40);
$pdf->SetX(5);
	$pdf->SetFont('Arial','B',8);	
	$pdf->SetFillColor(255, 118, 85);
		$pdf->Cell(14,5,'CEDULA',1,0,'C',1);
	$pdf->Cell(40,5,'PACIENTE ',1,0,'C',1);
			$pdf->Cell(40,5,'ESPECIALISTA',1,0,'C',1);
			$pdf->Cell(25,5,'ESPECIALIDAD',1,0,'C',1);
			$pdf->Cell(13,5,utf8_decode('FECHA'),1,0,'C',1);
			$pdf->Cell(13,5,'HORA',1,0,'C',1);
			$pdf->Cell(13,5,'ESTADO',1,0,'C',1);
		$pdf->Cell(100,5,'OBSERVACION',1,1,'C',1);
///////////////////////////////////////////
	  $pdf->SetFont('Arial','',6);
 
  $pdf->SetTextColor( 0, 0, 0);
	 $pdf->SetFillColor(0,0,128);
if($v_book > 0){
	while($f_book = $q_book->fetch_array()){
	$pdf->SetX(5);
  $pdf->Cell(14,7,utf8_decode($f_book['cedula']),1,0,'C',0);
  $pdf->Cell(40,7,utf8_decode($f_book['nombre_apellido']),1,0,'C',0);
        $pdf->Cell(40,7,utf8_decode($f_book['nombre_doctor']),1,0,'C',0);
           $pdf->Cell(25,7,utf8_decode($f_book['nombre_especialidad']),1,0,'C',0);
              $pdf->Cell(13,7,date("d/m/Y", strtotime($f_book['fecha'])),1,0,'C',0);
                 $pdf->Cell(13,7,utf8_decode($f_book['hora']),1,0,'C',0);
                    $pdf->Cell(13,7,utf8_decode($f_book['estado']),1,0,'C',0);
        $pdf->Cell(100,7,utf8_decode($f_book['observacion']),1,1,'C',0); 
	}	}
	$pdf->Output();
	?>
