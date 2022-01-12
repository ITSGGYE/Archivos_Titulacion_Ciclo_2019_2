<?php
require('../../fpdf/fpdf.php');

class PDF extends FPDF
{
function Header()
{
    // Logo
   // $this->Image('logo_pb.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'FICHA DEL DOCENTE',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(75);
    $this->Cell(40,40,'foto',1,0,'C');
    $this->Ln(70);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('página').$this->PageNo().'/{nb}',0,0,'C');
}
}

require "../conexion.php";

$obj= new conexion;
$con=$obj->conectar();

$id = $_GET['id'];

$sql = "SELECT cedula, nombres, apellidos, telefono, celular, nacionalidad, sangre, genero, fech_nacimiento, edad, etnia, domicilio, correo, discapacidad, nivel_edu, especialidad, correo_edu, turno, observacion FROM docente WHERE id='$id'";
	$res = mysqli_query($con, $sql);
	$vista = mysqli_fetch_row($res);

$pdf = new PDF();
$pdf->SetTitle('Ficha del Docente');
$pdf->AliasNbpages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);


$pdf->Cell(-2);
$pdf->cell(65,10, 'Cedula: '.$vista[0], 1,0,'C',0);
$pdf->cell(65,10, 'Nombre: '.$vista[1], 1,0,'C',0);
$pdf->cell(65,10, 'Apellido: '.$vista[2], 1,1,'C',0);

$pdf->Cell(-2);
$pdf->cell(65,10, 'Telefono: '.$vista[3], 1,0,'C',0);
$pdf->cell(65,10, 'Celular: '.$vista[4], 1,0,'C',0);
$pdf->cell(65,10, 'Discapacidad: '.$vista[13], 1,1,'C',0);

$pdf->Cell(-2);
$pdf->cell(65,10, 'Genero: '.$vista[7], 1,0,'C',0);
$pdf->cell(65,10, 'Sangre: '.$vista[6], 1,0,'C',0);
$pdf->cell(65,10, 'Nacionalidad: '.$vista[5], 1,1,'C',0);

$pdf->Cell(-2);
$pdf->cell(65,10, 'Fecha nacimiento: '.$vista[8], 1,0,'C',0);
$pdf->cell(65,10, 'Edad: '.$vista[9], 1,0,'C',0);
$pdf->cell(65,10, 'Etnia: '.$vista[10], 1,1,'C',0);

$pdf->Cell(-2);
$pdf->cell(65,10, 'Domicilio: '.$vista[11], 1,0,'C',0);
$pdf->cell(65,10, 'Correo: '.$vista[12], 1,0,'C',0);
$pdf->cell(65,10, 'Correo educativo: '.$vista[16], 1,1,'C',0);

$pdf->Cell(-2);
$pdf->cell(65,10, 'Nivel Educativo: '.$vista[14], 1,0,'C',0);
$pdf->cell(65,10, 'Especialidad: '.$vista[15], 1,0,'C',0);
$pdf->cell(65,10, 'Turno: '.$vista[17], 1,1,'C',0);

$pdf->Cell(-2);
$pdf->cell(195,10, 'Observacion: '.$vista[18], 1,0,'C',0);
	
$pdf->Output();
?>