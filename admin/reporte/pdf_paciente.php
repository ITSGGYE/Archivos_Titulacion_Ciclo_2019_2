<?php



  include 'plantilla_paciente.php';
	

include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM paciente;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>


<?php
	
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	    $pdf->SetY(40);
$pdf->SetX(40);
	

	$pdf->SetFont('Arial','B',8);	
	$pdf->SetFillColor(255, 118, 85);
	$pdf->Cell(35,5,'CEDULA ',1,0,'C',1);
			$pdf->Cell(85,5,'PACIENTE',1,0,'C',1);
		$pdf->Cell(50,5,'FECHA NACIMIENTO',1,0,'C',1);
			$pdf->Cell(40,5,'GENERO',1,1,'C',1);
	

	
 $pdf->SetFont('Arial','',6);
 
  $pdf->SetTextColor( 0, 0, 0);
	 $pdf->SetFillColor(0,0,128);
	foreach($paciente as $row) {

	$pdf->SetX(40);
		$pdf->Cell(35,5,utf8_decode($row->cedula),1,0,'C',0);
		$pdf->Cell(85,5,utf8_decode($row->nombre_apellido),1,0,'C');
	

$pdf->Cell(50,5,($row->fecha_nacimiento),1,0,'C');
$pdf->Cell(40,5,($row->sexo),1,1,'C');

	}
	$pdf->Output(d,'lista_paciente.pdf');
?>


