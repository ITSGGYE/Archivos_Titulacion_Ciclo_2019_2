<?php



  include 'plantilla_historial_general.php';
	

include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM historial h
JOIN paciente p
ON h.id_paciente = p.id_paciente
	                      
	                       ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>


<?php
	
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	    $pdf->SetY(36);
$pdf->SetX(2);
	

	$pdf->SetFont('Arial','B',4);	
	$pdf->SetFillColor(255, 118, 85);
		$pdf->Cell(11,5,utf8_decode('# HISTORIAL'),1,0,'C',1);
	$pdf->Cell(11,5,utf8_decode('# PACIENTE'),1,0,'C',1);
			$pdf->Cell(9,5,utf8_decode('CEDULA'),1,0,'C',1);
			$pdf->Cell(25,5,utf8_decode('PACIENTE'),1,0,'C',1);
	$pdf->Cell(10,5,utf8_decode('NACIMIENTO'),1,0,'C',1);
	$pdf->Cell(9,5,utf8_decode('GENERO'),1,0,'C',1);
		$pdf->Cell(35,5,utf8_decode('CORREO'),1,0,'C',1);
			$pdf->Cell(8,5,utf8_decode('EDAD'),1,0,'C',1);
			
$pdf->Cell(14,5,utf8_decode('CIUDAD'),1,0,'C',1);
$pdf->Cell(32,5,utf8_decode('DIRECCION'),1,0,'C',1);
$pdf->Cell(9,5,utf8_decode('TELEFONO'),1,0,'C',1);

$pdf->Cell(60,5,utf8_decode('MOTIVO'),1,0,'C',1);
$pdf->Cell(60,5,utf8_decode('RECOMENDACION'),1,1,'C',1);

			$pdf->SetX(20);

	
 $pdf->SetFont('Arial','',4);
 
  $pdf->SetTextColor( 0, 0, 0);
	 $pdf->SetFillColor(0,0,128);
	foreach($paciente as $row) {

	
	$pdf->Cell(-31,5,'000',0,0,'C',0);

			$pdf->SetY(41);
				$pdf->SetX(2);
	$pdf->Cell(11,5,utf8_decode($row->id_historial),1,0,'C',0);
		$pdf->Cell(11,5,utf8_decode($row->cod_paciente),1,0,'C',0);
		
$pdf->Cell(9,5,utf8_decode($row->cedula),1,0,'C');
$pdf->Cell(25,5,utf8_decode($row->nombre_apellido),1,0,'C',0);
$pdf->Cell(10,5,utf8_decode($row->fecha_nacimiento),1,0,'C',0);
$pdf->Cell(9,5,utf8_decode($row->genero),1,0,'C',0);
$pdf->Cell(35,5,utf8_decode($row->correo),1,0,'C',0);
$pdf->Cell(8,5,utf8_decode($row->edad),1,0,'C',0);


$pdf->Cell(14,5,ucfirst(utf8_decode($row->ciudad)),1,0,'C',0);
$pdf->Cell(32,5,ucfirst(utf8_decode($row->direccion)),1,0,'C',0);
$pdf->Cell(9,5,ucfirst(utf8_decode($row->telefono)),1,0,'C',0);
$pdf->Cell(60,5,ucfirst(utf8_decode($row->mot)),1,0,'C',0);
$pdf->Cell(60,5,ucfirst(utf8_decode($row->recom)),1,1,'C',0);
	}
	$pdf->Output();
?>


