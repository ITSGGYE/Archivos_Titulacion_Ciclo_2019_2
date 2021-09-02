<?php




	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{

		
			 // imagen
			$this->Image('iconos/logor.png', 72, 2, 50 );

		/////1	

			 // Arial bold 15
			$this->SetFont('Arial','B',10);
			$this->Cell(30);


// Colores de los bordes, fondo y texto


//////////////2222
$this->SetTextColor(62,179,188);
 // Título
$this->SetFont('Arial','B',7);
 
			$this->Cell(130,18, utf8_decode('
				FUNDACIÓN CONEXIÓN VITAL TU PODER DE CREAR'),0,0,'C');


   // Salto de línea

			$this->Ln(15);


    $this->SetTextColor(62,179,188);
    $this->SetFont('Arial','B',7);
 // Título
 
			$this->Cell(185,-7, 'Urb. San Felipe Mz.136 V.17',0,0,'C');


   // Salto de línea

			$this->Ln(4);




//////////////2222
   
    $this->SetTextColor(62,179,188);
$this->SetFont('Arial','B',7);

			$this->Cell(185,-10, utf8_decode('Ecuador - Guayaquil'),0,0,'C');

   // Salto de línea

			$this->Ln(20);

//////////////3
   
    $this->SetTextColor(62,179,188);
    $this->SetFont('Arial','B',7);


			$this->Cell(185,-44,('conexionvitalfundacion@gmail.com'),0,0,'C');

   // Salto de línea

			$this->Ln(20);





//////////////4
   
    $this->SetTextColor(62,179,188);
$this->SetFont('Arial','B',7);

			$this->Cell(185,-77, '5059264-0992045476',0,0,'C');

   // Salto de línea

			$this->Ln(-15);


//////////////
   
    $this->SetFont('Arial','B',12);
    	$this->Cell(-10);
    $this->SetTextColor(34,34,34);


			$this->Cell(210,-5, 'CITA ASIGNADA
',0,00,'C');

   // Salto de línea

			$this->Ln(-30);







		}
		
		function Footer()
		{


    // Posición a 1,5 cm del final
			$this->SetY(-15);

			  // Arial itálica 10
			$this->SetFont('Arial','B', 7);

 // Color del texto en gris
    $this->SetTextColor(62,179,188);

$this->Cell(188,-7, utf8_decode('FUNDACÓN CONEXIÓN VITAL'),0,0,'C');
$this->Ln(4);


//////////////
   	  // Arial itálica 10
			$this->SetFont('Arial','B', 7);
    $this->SetTextColor(62,179,188);



			$this->Cell(0,-9, utf8_decode('DIRECTORA ECONOMISTA ANDREA HERNANDEZ LOPEZ
'),0,0,'C');

   // Salto de línea

			$this->Ln(-6);




 // Número de página

 $this->SetTextColor(0,0,0);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>