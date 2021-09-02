<?php



  include 'plantilla_especialista.php';
	

include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM especialista et
JOIN especialidad ed
ON et.id_especialidad=ed.id_especialidad
WHERE et.id_especialista
ORDER BY et.id_especialista
	;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>


<?php
	
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	    $pdf->SetY(40);
$pdf->SetX(10);
	

	$pdf->SetFont('Arial','B',7);	
	$pdf->SetFillColor(255, 118, 85);
	$pdf->Cell(17,5,'CEDULA ',1,0,'C',1);
			$pdf->Cell(50,5,'ESPECIALISTA',1,0,'C',1);
			$pdf->Cell(40,5,'ESPECIALIDAD',1,0,'C',1);
			$pdf->Cell(18,5,utf8_decode('TELÉFONO'),1,0,'C',1);
			$pdf->Cell(50,5,'DIRECCION',1,0,'C',1);
			$pdf->Cell(45,5,'CORREO',1,0,'C',1);
		$pdf->Cell(30,5,'FECHA NACIMIENTO',1,0,'C',1);
			$pdf->Cell(18,5,'GENERO',1,1,'C',1);
	

	
 $pdf->SetFont('Arial','',5);
 
  $pdf->SetTextColor( 0, 0, 0);
	 $pdf->SetFillColor(0,0,128);
	foreach($paciente as $row) {

	$pdf->SetX(10);
		$pdf->Cell(17,5,($row->cedula_esp),1,0,'C');
		$pdf->Cell(50,5,utf8_decode($row->nombre_doctor),1,0,'C');
	$pdf->Cell(40,5,utf8_decode($row->nombre_especialidad),1,0,'C');
$pdf->Cell(18,5,($row->telefono),1,0,'C');
$pdf->Cell(50,5,utf8_decode($row->direccion),1,0,'C');
$pdf->Cell(45,5,utf8_decode($row->correo),1,0,'C');
$pdf->Cell(30,5,($row->fecha_nacimiento),1,0,'C');
$pdf->Cell(18,5,($row->genero),1,1,'C');


	}
	$pdf->Output(d,'especialista_lista.pdf');
?>


