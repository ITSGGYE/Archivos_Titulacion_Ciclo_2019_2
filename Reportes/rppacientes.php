<?php

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
      $this->SetFont('Arial','b',12);
      // Movernos a la derecha
      $this->Cell(60);
      // Título
      $this->Cell(140,10,'CENTRO MEDICO ISABELITA ',0,1,'C');
      $this->Cell(60);
      $this->Cell(140,10,'LISTADO DE PACIENTES ',0,0,'C',False);

      

      // Salto de línea
      $this->SetFont('Arial','B',10);
      $this->Ln(20);
      $this->SetFillColor(176, 199, 236);
      $this->Cell(25,10,utf8_decode('Cèdula'),1,0,'C',True);
      $this->Cell(35,10,'Nombres',1,0,'C',True);
      $this->Cell(35,10,'Apellidos',1,0,'C',True);
      $this->Cell(30,10,utf8_decode('Gènero'),1,0,'C',True);
      $this->Cell(30,10,'Tipo Sangre',1,0,'C',True);
      $this->Cell(30,10,utf8_decode('Telèfono'),1,0,'C',True);
      $this->Cell(75,10,utf8_decode('Direcciòn'),1,1,'C',True);
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
  $consulta = "SELECT * FROM paciente";
  $resultado = mysqli_query($conexion, $consulta);

  $pdf = new PDF('L','mm','letter');
  $pdf->AddPage();
  $pdf->AliasNbPages();
  $pdf->SetFont('Arial','I',9);
  $pdf->SetFillColor(229, 229, 229);
  

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(25,9,$row['pac_cedula'],1,0,'C',False);
	$pdf->Cell(35,9,utf8_decode($row['pac_nombre']),1,0,'C',True);
	$pdf->Cell(35,9,utf8_decode($row['pac_apellido']),1,0,'C',False);
	$pdf->Cell(30,9,utf8_decode($row['pac_genero']),1,0,'C',True);
  $pdf->Cell(30,9,$row['pac_sangre'],1,0,'C',False);
	$pdf->Cell(30,9,$row['pac_telf'],1,0,'C',True);
  $pdf->Cell(75,9,utf8_decode($row['pac_direccion']),1,1,'C',False);
} 




// Encabezado
$pdf->SetFont('Times','',12);
$pdf->Image('../files/logo_oficial.jpeg',10,0,35);




  
    $pdf->Output();
  ?>