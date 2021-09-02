<?php



session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}

	include 'plantilla.php';
	require '../connect_db.php';
	
	$query = "SELECT * From contacto";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(32,20,'NOMBRE ',1,0,'C',0);
	$pdf->Cell(32,20,'APELLIDO ',1,0,'C',0);
	$pdf->Cell(90,20,'CORREO ',1,0,'C',0);
	$pdf->Cell(32,20,'TELEFONO ',1,1,'C',0);
	
	$pdf->SetFont('Arial','',10);



	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(32,15,utf8_decode($row['nombre']),1,0,'C',0);
		$pdf->Cell(32,15,$row['apellido'],1,0,'C');
		$pdf->Cell(90,15,utf8_decode($row['correo']),1,0,'C',0);
$pdf->Cell(32,15,utf8_decode($row['telefono']),1,1,'C',0);





	}
	$pdf->Output();
?>


