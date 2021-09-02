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
if ($_SESSION['Consultas']==1 or $_SESSION['Consulta Medica']==1)
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
$rspta_rec = $consulta->receta($_GET["id"]);
//Recorremos todos los valores obtenidos
$reg = $rspta->fetch_object();
$regsr = $rspta_rec->fetch_object();

//Inlcuímos a la clase PDF_MC_Table
require('../fpdf/fpdf.php');

//Instanciamos la clase para generar el documento pdf
$pdf=new FPDF();

//Agregamos la primera página al documento pdf
$pdf->AddPage();

//Seteamos el inicio del margen superior en 25 pixeles 
$y_axis_initial = 5;





//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá

// Encabezado
$pdf->SetFont('Arial','B',10);
$pdf->Image('../files/logo_oficial.jpeg',10,0,35);
$pdf->Cell(0,5,$regs->razon_social,0,1,'C');

$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,'Ruc: '.$regs->ruc,0,1,'C');
$pdf->Cell(0,5,$regs->direccion,0,1,'C');
$pdf->Cell(0,5,'Telefono: '.$regs->telefono,0,1,'C');

$pdf->Ln();
$pdf->SetFont('Times','I',10);
$pdf->Cell(0,5,'Fecha de Emision: '.$reg->fecha_cita,0,1,'R');

$pdf->SetFont('Times','I',14);
$pdf->Cell(0,5,'Dr(a). '.$reg->Medic,0,1,'C');
$pdf->Cell(0,5,'Especialidad: '.$reg->esp_nombre,0,1,'C');
$pdf->Ln(10);

$pdf->SetFont('ARIAL','B',10);
$pdf->SetFillColor(255,255,255);
$pdf->Cell(190,10,'RECETA MEDICA',0,1,'C',True);
$pdf->Cell(190,10,'INFORMACION DEL PACIENTE',0,1,'C',True);

$pdf->SetFont('Arial','',10);

$pdf->Cell(40,5,'Nombres y Apellidos : ',0,0,'C',True);
$pdf->Cell(60,5,$reg->Nombres,0,0,'C',True);
$pdf->Cell(30,5,'Fecha : ',0,0,'C',True);
$pdf->Cell(60,5,$reg->fecha_cita,0,1,'C',True);
$pdf->Cell(20,5,'Peso (kg) : ',0,0,'C',True);
$pdf->Cell(24,5,$reg->peso,0,0,'C',True);
$pdf->Cell(30,5,'Talla (cm) : ',0,0,'C',True);
$pdf->Cell(20,5,$reg->talla,0,0,'C',True);
$pdf->Cell(20,5,'Edad : ',0,0,'C',True);
$pdf->Cell(20,5,$reg->Edad,0,0,'C',True);
$pdf->Cell(28,5,'Temperatura : ',0,0,'C',True);
$pdf->Cell(28,5,utf8_decode($reg->temperatura),0,1,'C',True);


require ("../config/conexion.php");
$agenda_id=$reg->agenda_id;
$consulta = "SELECT a.agenda_id,r.medicamento,r.concentracion,r.cantidad,r.dosis,r.duracion from agenda a 
inner join receta r on a.agenda_id = r.agenda_id where a.agenda_id='$agenda_id'";
$resultado = mysqli_query($conexion, $consulta);


$pdf->SetFont('Times','',10);
$pdf->SetFillColor(198,218,218);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'Diagnostico:         '.utf8_decode($reg->enfermedad),0,1,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',10);
$pdf->SetDrawColor(59,104,131);
$pdf->Cell(45,9,'Medicamento',1,0,'C',False);
$pdf->Cell(35,9,'Concentracion',1,0,'C',False);
$pdf->Cell(25,9,'Cantidad',1,0,'C',False);
$pdf->Cell(35,9,'Dosis',1,0,'C',False);
$pdf->Cell(35,9,'Duracion',1,1,'C',False);



$pdf->SetFont('Arial','',10);
while ($row=$resultado->fetch_assoc()) {
$pdf->SetFillColor(37,128,184);

$pdf->Cell(45,9,$row['medicamento'],0,0,'C',False);
$pdf->Cell(35,9,utf8_decode($row['concentracion']),0,0,'C',False);
$pdf->Cell(25,9,utf8_decode($row['cantidad']),0,0,'C',False);
$pdf->Cell(35,9,utf8_decode($row['dosis']),0,0,'C',False);
$pdf->Cell(35,9,$row['duracion'],0,1,'C',False);
} 


$pdf->Ln(25);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,10,'_______________________________________',0,1,'C');
$pdf->Cell(190,10,'Firma del Medico',0,1,'C');


//Mostramos el documento pdf
$pdf->Output('',$agenda_id.'- Receta.pdf','utf8');

}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>