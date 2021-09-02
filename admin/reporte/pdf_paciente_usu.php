<?php



  include 'plantilla_paciente_usu.php';
	

include_once("conexion.php");

$sentencia=$bd->query("SELECT nombre_apellido, correo, contrasena FROM  paciente;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>


<?php
	
	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	    $pdf->SetY(40);
$pdf->SetX(50);
	

	$pdf->SetFont('Arial','B',8);	
	$pdf->SetFillColor(255, 118, 85);
	$pdf->Cell(60,5,utf8_decode('NOMBRE APELLIDO PACIENTE'),1,0,'C',1);
			$pdf->Cell(85,5,utf8_decode('CORREO'),1,0,'C',1);
		$pdf->Cell(70,5,utf8_decode('CONTRASEÑA'),1,1,'C',1);
			

	
 $pdf->SetFont('Arial','',6);
 
  $pdf->SetTextColor( 0, 0, 0);
	 $pdf->SetFillColor(0,0,128);
	foreach($paciente as $row) {

	$pdf->SetX(50);
		$pdf->Cell(60,5,utf8_decode($row->nombre_apellido),1,0,'C',0);
		$pdf->Cell(85,5,($row->correo),1,0,'C');
	

$pdf->Cell(70,5,utf8_decode($row->contrasena),1,1,'C');

	}
	$pdf->Output(d,'paciente_usuario.pdf');
?>


