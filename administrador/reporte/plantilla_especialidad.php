<?php

require 'fpdf/fpdf.php';

class PDF extends FPDF
{
	function Header()
	{
		
			 // imagen
		$this->Image('../img/logooo.png', 15, 15, 38 );
		/////1	
			 // Arial bold 15
		$this->SetFont('Arial','B',10);
		$this->Cell(30);
// Colores de los bordes, fondo y texto
//////////////2222
		$this->SetTextColor(25, 37, 126);
 // Título
		$this->SetFont('Arial','B',20);
		
		$this->Cell(185,8, utf8_decode('
			CONSULTORIO ODONTOLOGICO SMILE DENTAL!'),0,0,'C');
   // Salto de línea
		$this->Ln(15);
		$this->SetTextColor(25, 37, 126);
		$this->SetFont('Arial','B',17);
 // Título
		
		$this->Cell(255,-7, '"Ecuador - Guayaquil"',0,0,'C');
   // Salto de línea
		$this->Ln(4);
//////////////2222
		
		$this->SetTextColor(128,0,0);
		$this->SetFont('Arial','B',10);
		$this->Cell(250,-2, utf8_decode(' Cooperativa Nueva Prosperina'),0,0,'C');
   // Salto de línea
		$this->Ln(20);
		$this->Ln(8);
//////////////3
		
		$this->SetTextColor(128,0,0);
		$this->SetFont('Arial','B',10);
		$this->Cell(250,-46,('choezespinoza05@gmail.com'),0,0,'C');
   // Salto de línea
		$this->Ln(20);
//////////////4
		
		$this->SetTextColor(128,0,0);
		$this->SetFont('Arial','B',10);
		$this->Cell(250,-77, '0960717667 -0961337313',0,0,'C');
   // Salto de línea
		$this->Ln(-5);
		$this->SetTextColor(0, 0,0);
		$this->SetFont('Arial','B',10);
		$this->Cell(250,-37, 'ESPECIALIDAD DEL CONSULTORIO ODONTOLOGICO SMILE DENTAL',0,0,'C');
		$this->Ln(5);
//////////////
		
		
	}
	
	function Footer()
	{
    // Posición a 1,5 cm del final
		$this->SetY(-15);
			  // Arial itálica 10
   	  // Arial itálica 10
		$this->SetFont('Arial','B', 10);
		$this->SetTextColor(128,0,0);
		$this->Cell(0,-9, utf8_decode('CONSULTORIO ODONTOLOGICO SMILE DENTAL!
			'),0,0,'C');
   // Salto de línea
		$this->Ln(-6);
 // Número de página
		$this->SetTextColor(0,0,0);
		$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
	}		
}
?>