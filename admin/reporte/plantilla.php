<?php

session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}



	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{

		
			 // imagen
			$this->Image('assets/img/logo.png', 5, 5, 30 );

		/////1	

			 // Arial bold 15
			$this->SetFont('Arial','B',10);
			$this->Cell(30);


// Colores de los bordes, fondo y texto
 
    $this->SetTextColor(4,4,77);
 // Título
 
			$this->Cell(0,5, 'Ecuador - Guayaquil',0,0,'C');


   // Salto de línea

			$this->Ln(20);




//////////////2222
   
    $this->SetTextColor(4,4,77);


			$this->Cell(220,-25, utf8_decode('Ismael Pérez Castro & Guayaquil 090408'),0,0,'C');

   // Salto de línea

			$this->Ln(20);

//////////////3
   
    $this->SetTextColor(4,4,77);


			$this->Cell(220,-55, utf8_decode('marianaperez@hotmail.com'),0,0,'C');

   // Salto de línea

			$this->Ln(20);





//////////////4
   
    $this->SetTextColor(4,4,77);


			$this->Cell(220,-84, '0992103810',0,0,'C');

   // Salto de línea

			$this->Ln(20);




//////////////
   
    $this->SetFont('Arial','B',20);
    	$this->Cell(-10);
    $this->SetTextColor(4,4,77);


			$this->Cell(220,-84, ' REPORTES DE CONTACTOS A LLAMAR
',0,00,'C');

   // Salto de línea

			$this->Ln(-30);






		}
		
		function Footer()
		{


    // Posición a 1,5 cm del final
			$this->SetY(-15);

			  // Arial itálica 10
			$this->SetFont('Arial','B', 12);

 // Color del texto en gris
    $this->SetTextColor(18,80,157);

$this->Cell(220,-84, ' GYM NINO',0,0,'C');
$this->Ln(4);


//////////////
   	  // Arial itálica 10
			$this->SetFont('Arial','B', 8);
    $this->SetTextColor(18,80,157);


			$this->Cell(220,-84, utf8_decode(' GERENTE GENERAL MARIANA DE JESÚS  PAZMIÑO TORRES
'),0,0,'C');

   // Salto de línea

			$this->Ln(20);




 // Número de página


			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>