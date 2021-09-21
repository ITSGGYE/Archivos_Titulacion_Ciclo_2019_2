<?php
include 'plantilla_cita_general.php';
include_once("../conexion.php");
$sentencia=$bd->query("SELECT * 
	FROM cita c
	JOIN paciente p
	ON  c.paciente=p.id_paciente
	JOIN especialista e
	ON c.id_especialista =e.id_especialista
	JOIN especialidad d
	ON  e.id_especialidad=d.id_especialidad
	WHERE c.cit_estado='atendido'
	ORDER BY c.id_cita
	;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetY(60);
$pdf->SetX(3);
$pdf->SetFont('Arial','B',6);	
$pdf->SetFillColor(255, 218, 85);
$pdf->Cell(50,5,'PACIENTE ',1,0,'C',1);
$pdf->Cell(50,5,'ESPECIALISTA',1,0,'C',1);
$pdf->Cell(50,5,'ESPECIALIDAD',1,0,'C',1);
$pdf->Cell(13,5,utf8_decode('FECHA'),1,0,'C',1);
$pdf->Cell(12,5,'HORA',1,0,'C',1);
$pdf->Cell(12,5,'ESTADO',1,0,'C',1);
$pdf->Cell(89,5,'OBSERVACION',1,1,'C',1);
$pdf->SetFont('Arial','',5);
$pdf->SetTextColor( 0, 0, 0);
$pdf->SetFillColor(0,0,128);
foreach($paciente as $row) {
	$pdf->SetX(3);
	$pdf->Cell(50,5,utf8_decode($row->nombre_apellido),1,0,'C');
	$pdf->Cell(50,5,utf8_decode($row->nombre_doctor),1,0,'C');
	$pdf->Cell(50,5,utf8_decode($row->nombre_especialidad),1,0,'C');
	$pdf->Cell(13,5,utf8_decode($row->fecha),1,0,'C');
	$pdf->Cell(12,5,($row->hora),1,0,'C');
	$pdf->Cell(12,5,($row->cit_estado),1,0,'C');
	$pdf->Cell(89,5,utf8_decode($row->cit_observacion),1,1,'C');
}
$pdf->Output(d,'citas_atendida.pdf');
?>