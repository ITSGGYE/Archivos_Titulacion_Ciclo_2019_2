<?php
include 'plantilla_paciente.php';
include_once("../conexion.php");
$sentencia=$bd->query("SELECT * FROM paciente;");
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetY(60);
$pdf->SetX(10);
$pdf->SetFont('Arial','B',8);	
$pdf->SetFillColor(255, 218, 85);
$pdf->Cell(35,5,'CEDULA ',1,0,'C',1);
$pdf->Cell(85,5,'PACIENTE',1,0,'C',1);
$pdf->Cell(60,5,'TELEFONO',1,0,'C',1);
$pdf->Cell(50,5,'FECHA NACIMIENTO',1,0,'C',1);
$pdf->Cell(40,5,'GENERO',1,1,'C',1);
$pdf->SetFont('Arial','',6);
$pdf->SetTextColor( 0, 0, 0);
$pdf->SetFillColor(0,0,128);
foreach($paciente as $row) {
	$pdf->SetX(10);
	$pdf->Cell(35,5,utf8_decode($row->pac_cedula),1,0,'C',0);
	$pdf->Cell(85,5,utf8_decode($row->nombre_apellido),1,0,'C');
	$pdf->Cell(60,5,utf8_decode($row->pac_telefono),1,0,'C');
	$pdf->Cell(50,5,($row->fecha_nacimiento),1,0,'C');
	$pdf->Cell(40,5,($row->pac_sexo),1,1,'C');
}
$pdf->Output(d,'pacientes.pdf');
?>