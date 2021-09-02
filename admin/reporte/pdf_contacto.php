<?php



  include 'plantilla_contacto.php';
	

include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM contacto;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>


<?php
	
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	    $pdf->SetY(40);
$pdf->SetX(7);
	

	$pdf->SetFont('Arial','B',8);	
	$pdf->SetFillColor(255, 118, 85);
	$pdf->Cell(55,5,'NOMBRE CONTACTO ',1,0,'C',1);
			$pdf->Cell(19,5,'TELEFONO',1,0,'C',1);
		$pdf->Cell(80,5,'CORREO',1,0,'C',1);
			$pdf->Cell(130,5,'MENSAJE',1,1,'C',1);
	

	
 $pdf->SetFont('Arial','',6);
 
  $pdf->SetTextColor( 0, 0, 0);
	 $pdf->SetFillColor(0,0,128);
	foreach($paciente as $row) {

	$pdf->SetX(7);
		$pdf->Cell(55,10,utf8_decode($row->nombre_contacto),1,0,'C',0);
		$pdf->Cell(19,10,($row->telefono),1,0,'C');
	

$pdf->Cell(80,10,($row->correo),1,0,'C');
$pdf->Cell(130,10,($row->mensaje),1,1,'C');

	}
	$pdf->Output(d,'contacto.pdf');
?>


