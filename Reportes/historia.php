<?php
//Activamos el almacenamiento en el buffer
ob_start();
if (strlen(session_id()) < 1) 
  session_start();

if (!isset($_SESSION["per_nombre"]))
{
  echo 'Debe ingresar al sistema correctamente para visualizar el reporte';
}
else
{
if ($_SESSION['Consultas']==1)
{



require_once "../modelos/Configuracion.php";
 $config = new Configuracion();

 $rsptas = $config->listar();
//Recorremos todos los valores obtenidos
$regs = $rsptas->fetch_object();


//Incluímos la clase Consulta
require_once "../modelos/Consulta_Medica.php";
//Instanaciamos a la clase con el objeto venta
$consulta = new Consulta_medica();
//En el objeto $rspta Obtenemos los valores devueltos del método ventacabecera del modelo
$rspta = $consulta->historia_clinica($_GET["id"]);
//Recorremos todos los valores obtenidos
$reg = $rspta->fetch_object();

//Inlcuímos a la clase PDF_MC_Table
require('fpdf183/fpdf.php');

//Instanciamos la clase para generar el documento pdf
$pdf=new FPDF();

//Agregamos la primera página al documento pdf
$pdf->AddPage();

//Seteamos el inicio del margen superior en 25 pixeles 
$y_axis_initial = 5;

//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá

// Encabezado
$pdf->SetFont('Arial','B',10);
$pdf->Image('../files/logo_oficial.jpeg',10,0,30);
$pdf->Cell(190,20,utf8_decode($regs->razon_social),0,1,'C');  
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Times','I',12);
$pdf->Cell(190,10,utf8_decode('HISTORIA CLINICA:   '.$reg->Nombres),1,1,'C',True);
$pdf->SetFont('Arial','B',10);
$pdf->SetDrawColor(37,128,184);
$pdf->Cell(190,10,utf8_decode('DATOS GENERALES'),1,1,'C'); 


$pdf->SetFont('Arial','',10);
$pdf->SetDrawColor(59,104,131);
$pdf->Cell(25,5,'Edad : ',1,0,'C',True);
$pdf->Cell(75,5,utf8_decode($reg->Edad),1,0,'C',True);
$pdf->Cell(25,5,'Hora : ',1,0,'C',True);
$pdf->Cell(65,5,utf8_decode($reg->hora_cita),1,1,'C',True);
$pdf->SetFont('Arial','',10);
$pdf->Cell(25,5,'Medico : ',1,0,'C',True);
$pdf->Cell(75,5,utf8_decode($reg->Medic),1,0,'C',True);
$pdf->Cell(30,5,'Especialidad : ',1,0,'C',True);
$pdf->Cell(60,5,utf8_decode($reg->esp_nombre),1,1,'C',True);


// Datos del Paciente

$pdf->SetFont('Arial','',10);
$pdf->Cell(25,5,'Cedula : ',1,0,'C',True);
$pdf->Cell(75,5,utf8_decode($reg->pac_cedula),1,0,'C',True);
$pdf->Cell(45,5,'Fecha de Nacimiento : ',1,0,'C',True);
$pdf->Cell(45,5,utf8_decode($reg->pac_fchnac),1,1,'C',True);
$pdf->Cell(25,5,'Sangre : ',1,0,'C',True);
$pdf->Cell(75,5,utf8_decode($reg->pac_sangre),1,0,'C',True);
$pdf->Cell(30,5,'Genero : ',1,0,'C',True);
$pdf->Cell(60,5,utf8_decode($reg->pac_genero),1,1,'C',True);
$pdf->Cell(25,5,'Direccion : ',1,0,'C',True);
$pdf->Cell(75,5,utf8_decode($reg->pac_direccion),1,0,'C',True);
$pdf->Cell(40,5,'Fecha : ',1,0,'C',True);
$pdf->Cell(50,5,utf8_decode($reg->fecha_cita),1,1,'C',True);


// Valoracion del Paciente
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(190,10,'SIGNOS VITALES',1,1,'C',True); 

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,'Talla (cm) : ',1,0,'C',True);
$pdf->Cell(50,5,utf8_decode($reg->talla),1,0,'C',True);

$pdf->Cell(40,5,'Peso (kg) : ',1,0,'C',True);
$pdf->Cell(50,5,utf8_decode($reg->peso),1,1,'C',True);

$pdf->Cell(50,5,'Presion Arterial (mmHg) : ',1,0,'C',true);
$pdf->Cell(50,5,utf8_decode($reg->presion_art),1,0,'C',true);

$pdf->Cell(40,5,'Alergias : ',1,0,'C',true);
$pdf->Cell(50,5,utf8_decode($reg->alergias),1,1,'C',true);

$pdf->Cell(50,5,'Temperatura : ',1,0,'C',true);
$pdf->Cell(50,5,utf8_decode($reg->temperatura),1,0,'C',true);

$pdf->Cell(40,5,'Habitos : ',1,0,'C',True);
$pdf->Cell(50,5,utf8_decode($reg->habitos),1,1,'C',True);


// COnsulta del Paciente
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'MOTIVO DE LA CONSULTA',1,1,'C',False);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(190,15,utf8_decode($reg->motivo_consulta),1,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'ENFERMEDAD ACTUAL',1,1,'C',False);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(190,10,utf8_decode($reg->enfermedad_actual),1,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'ANTECEDENTES',1,1,'C',FALSE);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(190,15,utf8_decode($reg->anteced),1,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'SINTOMAS',1,1,'C',False);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(190,10,utf8_decode($reg->sintomas),1,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(80,10,'DIAGNOSTICO',1,0,'C',False);
$pdf->SetFont('Arial','',10);
$pdf->Cell(110,10,utf8_decode($reg->enfermedad),1,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'TRATAMIENTO',1,1,'C',False);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(190,10,utf8_decode($reg->tratamiento),1,1,'C',False);
$pdf->Ln(25);


  // Arial italic 8
  $pdf->SetFont('Arial','I',10);
  // Número de página
  $pdf->Cell(0,5,'Fecha de Emision: '.$reg->fecha_cita,0,0,'C');
  $pdf->AliasNbPages();
  $pdf->Cell(0,5,utf8_decode('Página').$pdf->PageNo().'/{nb}',0,0,'C');




//Mostramos el documento pdf
$pdf->Output();

}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>