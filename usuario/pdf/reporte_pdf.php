<?php
$id=$_GET['id'];
include 'plantilla_pdf_reporte.php';
include_once("../conexion.php");
$sentencia=$bd->query("
	SELECT  *
	FROM cita c
	JOIN paciente p
	ON c.paciente=p.id_paciente
	JOIN especialista e
	ON c.id_especialista =e.id_especialista
	JOIN especialidad d
	ON  e.id_especialidad=d.id_especialidad
	WHERE  c.cit_estado='asignado' 
	AND  c.id_cita='$id'
	;");
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetY(150);
$pdf->SetX(30);
$pdf->SetFillColor(255, 218, 85);
$pdf->SetTextColor(34,34,34);
$pdf->SetFont('Arial','B',8);
$pdf->SetX(30);
$pdf->Cell(55,-8,'OBSERVACION:',1,1,'C',1,false);
$pdf->SetX(30);
$pdf->Cell(55,-8,'ESTADO:',1,1,'C',1,false);
$pdf->SetX(30);
$pdf->Cell(55,-8,utf8_decode('HORA:'),1,1,'C',1,false);
$pdf->SetX(30);
$pdf->Cell(55,-8,'FECHA:',1,1,'C',1,false);
$pdf->SetX(30);
$pdf->Cell(55,-8,'ESPECIALISTA:',1,1,'C',1,false);
$pdf->SetX(30);
$pdf->Cell(55,-8,'ESPECIALIDAD ESCOGIDA:',1,1,'C',1,false);
$pdf->SetX(30);
$pdf->Cell(55,-8,'PACIENTE:',1,1,'C',1,false); 
$pdf->SetX(30);
$pdf->Cell(55,-8,'CEDULA:',1,1,'C',1,false); 
$pdf->SetX(30);
$pdf->Cell(55,-8,'CODIGO CITA',1,1,'C',1,false);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor( 0, 0, 0);
foreach($paciente as $row) {
	$pdf->SetX(84);
	$pdf->Cell(-19);
	$pdf->SetX(85);
	$pdf->Cell(83,8,utf8_decode($row->id_cita),1,1,'C',false);
	$pdf->SetX(85);
	$pdf->Cell(83,8,utf8_decode($row->pac_cedula),1,1,'C',1,false);
	$pdf->SetX(85);
	$pdf->Cell(83,8,utf8_decode($row->nombre_apellido),1,1,'C',1,false);
	$pdf->SetX(85);
	$pdf->Cell(83,8,utf8_decode($row->nombre_especialidad),1,1,'C',1,false);
	$pdf->SetX(85);
	$pdf->Cell(83,8,utf8_decode($row->nombre_doctor),1,1,'C',1,false);
	$pdf->SetX(85);
	$pdf->Cell(83,8,utf8_decode($row->fecha),1,1,'C',1,false);
	$pdf->SetX(85);
	$pdf->Cell(83,8,utf8_decode($row->hora),1,1,'C',1,false);
	$pdf->SetX(85);
	$pdf->Cell(83,8,utf8_decode($row->cit_estado),1,1,'C',1,false);
	$pdf->SetX(85);
	$pdf->Cell(83,8,utf8_decode($row->cit_observacion),1,1,'C',1,false);
}
$pdf->Output();
?>