
<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "SELECT id_producto, codigo_producto, nombre_producto, date_added,precio_producto FROM products ";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'id_producto',1,0,'C',1);
	$pdf->Cell(70,6,'codigo_producto',1,0,'C',1);
	$pdf->Cell(20,6,'nombre_producto',1,0,'C',1);
	$pdf->Cell(70,6,'date_added',1,1,'C',1);
	$pdf->Cell(70,6,'precio_producto',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
		$pdf->Cell(20,6,$row['id_municipio'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['municipio']),1,1,'C');
	}
	$pdf->Output();
?>