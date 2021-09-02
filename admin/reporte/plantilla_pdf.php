<?php




	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{

		
			 // imagen
			$this->Image('images/logo.jpg', 5, 5, 30 );

		/////1	

			 // Arial bold 15
			$this->SetFont('Arial','B',10);
			$this->Cell(30);


// Colores de los bordes, fondo y texto


//////////////2222
$this->SetTextColor(0,0,0);
 // Título
 
			$this->Cell(0,-5, 'EL ARMARIO DE KEB BOUTIQUE',0,0,'C');


   // Salto de línea

			$this->Ln(15);


    $this->SetTextColor(108,68,170);
 // Título
 
			$this->Cell(220,-26, 'Ecuador - Pedro Carbo',0,0,'C');


   // Salto de línea

			$this->Ln(4);




//////////////2222
   
    $this->SetTextColor(108,68,170);


			$this->Cell(220,-25, utf8_decode('9 de Octubre  y Quito '),0,0,'C');

   // Salto de línea

			$this->Ln(20);

//////////////3
   
    $this->SetTextColor(108,68,170);


			$this->Cell(220,-55, utf8_decode('kebelyn261992@gmail.com'),0,0,'C');

   // Salto de línea

			$this->Ln(20);





//////////////4
   
    $this->SetTextColor(108,68,170);


			$this->Cell(220,-84, '0960467681',0,0,'C');

   // Salto de línea

			$this->Ln(20);


//////////////
   
    $this->SetFont('Arial','B',20);
    	$this->Cell(-10);
    $this->SetTextColor(108,68,170);


			$this->Cell(220,2, ' NOTA DE VENTA DEL PEDIDO REALIZADO
',0,00,'C');

   // Salto de línea

			$this->Ln(-30);

//////////////
   
    $this->SetFont('Arial','B',13);
    	$this->Cell(-70);
    $this->SetTextColor(0,0,0);


			$this->Cell(222,-43, 'DATOS DEL CLIENTE:
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
    $this->SetTextColor(108,68,170);

$this->Cell(180,-10, 'EL ARMARIO DE KEB BOUTIQUE',0,0,'C');
$this->Ln(4);


//////////////
   	  // Arial itálica 10
			$this->SetFont('Arial','B', 8);
    $this->SetTextColor(108,68,170);


			$this->Cell(180,-10, utf8_decode(' GERENTE GENERAL KEBELYN RODRIGUEZ PEÑAHERRERA
'),0,0,'C');

   // Salto de línea

			$this->Ln(-6);




 // Número de página

 $this->SetTextColor(0,0,0);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>