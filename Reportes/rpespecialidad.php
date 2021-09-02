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
if ($_SESSION['Especialidad']==1)
{


 //AddPage(orientacion[PORTRAIT,LANDSCAPE],TAMAÑO[A3,A4,A5,LETTER,LEGAL]),
  //SetFont(tipo[COURIER,HELVETICA,ARIAL,TIMES,SYMBOL,ZA`DINGBATS],estilo[normal,B,I,U],tamaño),
  //Cell(ancho,alto,texto,bordes,?,alineacion,rellenar,link),
  //OutPut(destino[I,D,F,S],nombre_archivo,utf8)

 
  require('fpdf183/fpdf.php');
  

  


  
  class PDF extends FPDF
  {
  // Cabecera de página
  function Header()
  {


      // Arial bold 15
      $this->SetFont('Arial','B',12);
      // Movernos a la derecha
      $this->Cell(60);
      // Título
      $this->Cell(140,10,'CENTRO MEDICO ISABELITA ',0,1,'C');
      $this->Cell(60);
      $this->Cell(140,10,'LISTADO DE ESPECIALIDADES ',0,0,'C',False);

      

      // Salto de línea
      $this->SetFont('Arial','B',10);
      $this->Ln(20);
      $this->SetFillColor(176, 199, 236);
      $this->Cell(40,10,utf8_decode('Nombre'),1,0,'C',True);
      $this->Cell(180,10,utf8_decode('Descripcion'),1,0,'C',True);
      $this->Ln(10);
  }
  
  // Pie de página
  function Footer()
  {
    
    date_default_timezone_set("America/Guayaquil");
    $fecha_hoy = date("d/m/Y");
    
    


    
    
    // Posición: a 1,5 cm del final
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',10);
      // Número de página
      $this->Cell(0,5,'Fecha de Emision: '.$fecha_hoy,0,0,'C');
      $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
  }
  }
  
  


  require ("../config/conexion.php");
  $consulta = "SELECT * FROM especialidad where not esp_nombre='Ninguna'";
  $resultado = mysqli_query($conexion, $consulta);

  $pdf = new PDF('L','mm','letter');
  $pdf->AddPage();
  $pdf->AliasNbPages();
  $pdf->SetFont('Arial','I',9);
  $pdf->SetFillColor(229, 229, 229);
  

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(40,10,utf8_decode($row['esp_nombre']),1,0,'C',True);
	$pdf->Cell(180,10,utf8_decode($row['esp_descripcion']),1,1,'C',False);
} 




// Encabezado
$pdf->SetFont('Times','',12);
$pdf->Image('../files/logo_oficial.jpeg',10,0,35);




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