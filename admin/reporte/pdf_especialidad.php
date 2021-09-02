<?php



  include 'plantilla_especialidad.php';
	

include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM especialidad;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>


<?php
	
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	    $pdf->SetY(37);
$pdf->SetX(92);
	

	$pdf->SetFont('Arial','B',8);	
	$pdf->SetFillColor(255, 118, 85);
	$pdf->Cell(35,5,'#',1,0,'C',1);
			$pdf->Cell(85,5,'NOMBRE DE ESPECIALIDAD',1,1,'C',1);
		
	

	
 $pdf->SetFont('Arial','',6);
 
  $pdf->SetTextColor( 0, 0, 0);
	 $pdf->SetFillColor(0,0,128);
	foreach($paciente as $row) {

	$pdf->SetX(92);
	
		$pdf->Cell(35,5,utf8_decode($row->id_especialidad),1,0,'C');
		$pdf->Cell(85,5,utf8_decode($row->nombre_especialidad),1,1,'C');
	



	}
	$pdf->Output(d,'especialidades_lista.pdf');
?>


