<?php
include 'plantilla_administrador.php';
include_once("../conexion.php");
$sentencia=$bd->query("SELECT * FROM administrador;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetY(60);
$pdf->SetX(50);
$pdf->SetFont('Arial','B',8);	
$pdf->SetFillColor(255, 118, 85);
$pdf->Cell(45,5,utf8_decode('USUARIO'),1,0,'C',1);
$pdf->Cell(85,5,utf8_decode('CONTRASEÑA'),1,0,'C',1);
$pdf->Cell(70,5,utf8_decode('NOMBRE APELLIDO'),1,1,'C',1);
$pdf->SetFont('Arial','',6);
$pdf->SetTextColor( 0, 0, 0);
$pdf->SetFillColor(0,0,128);
foreach($paciente as $row) {
	$pdf->SetX(50);
	$pdf->Cell(45,5,utf8_decode($row->usuario),1,0,'C',0);
	$pdf->Cell(85,5,($row->contrasena),1,0,'C');
	$pdf->Cell(70,5,utf8_decode($row->nombre_apellido),1,1,'C');
}
$pdf->Output(d,'administrador.pdf');
?>
