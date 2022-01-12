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
    $this->Cell(70,10,'FICHA DE ALUMNO',0,0,'C');
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

$sql = "SELECT cedula, nombres, apellidos, telefono, celular, nacionalidad, sangre, genero, fech_nacimiento, edad, etnia, domicilio, correo, discapacidad, estado, nivel, procedencia, correo_edu, codigo_matricula, fech_matricula, fech_admision, periodoI, periodoF, jornada, grado_id FROM alumno WHERE id='$id'";
	$res = mysqli_query($con, $sql);
	$vista = mysqli_fetch_row($res);

$sql1 = "SELECT id, nombre_grado FROM grado WHERE id='$vista[24]'";
	$res1 = mysqli_query($con, $sql1);
	$ver = mysqli_fetch_row($res1);


$pdf = new PDF();
$pdf->SetTitle('Ficha de Alumno');
$pdf->AliasNbpages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);


$pdf->Cell(-2);
$pdf->cell(65,10, 'Matricula: '.$vista[18], 1,0,'C',0);
$pdf->cell(65,10, 'Nombre: '.$vista[1], 1,0,'C',0);
$pdf->cell(65,10, 'Apellido: '.$vista[2], 1,1,'C',0);

$pdf->Cell(-2);
$pdf->cell(65,10, 'Cedula: '.$vista[0], 1,0,'C',0);
$pdf->cell(65,10, 'Telefono: '.$vista[3], 1,0,'C',0);
$pdf->cell(65,10, 'Celular: '.$vista[4], 1,1,'C',0);

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
$pdf->cell(65,10, 'Correo educativo: '.$vista[17], 1,1,'C',0);

$pdf->Cell(-2);
$pdf->cell(65,10, 'Estado: '.$vista[14], 1,0,'C',0);
$pdf->cell(65,10, 'Discapacidad: '.$vista[13], 1,0,'C',0);
$pdf->cell(65,10, 'Nivel: '.$vista[15], 1,1,'C',0);

$pdf->Cell(-2);
$pdf->cell(65,10, 'Procedencia: '.$vista[16], 1,0,'C',0);
$pdf->cell(65,10, 'Fecha matricula: '.$vista[19], 1,0,'C',0);
$pdf->cell(65,10, 'Fecha admision: '.$vista[20], 1,1,'C',0);

$pdf->Cell(-2);
$pdf->cell(65,10, 'Periodo: '.$vista[21].' - '.$vista[22], 1,0,'C',0);
$pdf->cell(65,10, 'jornada: '.$vista[23], 1,0,'C',0);
$pdf->cell(65,10, 'Grado: '.$ver[1], 1,1,'C',0);
	

$pdf->Output();
?>