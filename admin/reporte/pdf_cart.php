<?php



	include 'plantilla_pdf.php';
	include 'connect.php';

include 'session.php';

 $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();







$q = "


SELECT  d.pais,d.ciudad,d.canton,d.nombre_apellido,d.direccion,d.referencia,d.calle,d.telefono,t.email_cliente
FROM domicilio d
JOIN cliente t
 ON d.id_cliente=t.id_cliente
WHERE  d.id_cliente = $ses_id



";

    $resultad = $conn->query($q);


    $pdf->SetY(-252);
$pdf->SetX(30);
  

    $pdf->SetFont('Arial','B',11);

    $pdf->Cell(10,0,'Nombres:',0,0,'C');
  $pdf->Cell(-17,12,'Email:',0,0,'C');
    $pdf->Cell(24,24,'Direccion:',0,0,'C'); 
    
   $pdf->Cell(-34,37,'Pais:',0,0,'C');
    

     $pdf->Cell(140,37,'Cidudad:',0,0,'C');
      $pdf->Cell(-35,37,'Canton:',0,0,'C');
        
          $pdf->Cell(-164,52,'Referencia:',0,0,'C');
            $pdf->Cell(156,66,'Calles:',0,0,'C');
            $pdf->Cell(-12,12,'Telefono:',0,0,'C');
    $pdf->SetFont('Arial','',10);


    while($ro = $resultad->fetch_assoc())
    {
$pdf->SetX(55);
      
        $pdf->Cell(10,0,$ro['nombre_apellido'],0,0,'C');
        $pdf->Cell(-8,12,$ro['email_cliente'],0,0,'C');
        
        $pdf->Cell(15,24,$ro['direccion'],0,0,'C');
$pdf->Cell(-39,37,$ro['pais'],0,0,'C');
        
        $pdf->Cell(149,37,$ro['ciudad'],0,0,'C');
        $pdf->Cell(-44,37,$ro['canton'],0,0,'C');
        $pdf->Cell(-40,52,$ro['referencia'],0,0,'C');
        $pdf->Cell(-5,66,$ro['calle'],0,0,'C');
    $pdf->Cell(80,12,$ro['telefono'],0,0,'C');


    }


    




















$query = "


SELECT  o.id_producto,t.nombre,o.precio,o.qty,o.total 
FROM orden o
JOIN producto t
 ON o.id_producto=t.id_producto
WHERE  o.id_cliente = $ses_id
AND o.estado ='Pendiente'


";


	$resultado = $conn->query($query);


	$pdf->SetY(96);
$pdf->SetX(27);
    $pdf->SetFillColor(250,204,204);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(30,6,'Codigo',1,0,'C',1);
    $pdf->Cell(40,6,'Producto',1,0,'C',1);
    $pdf->Cell(30,6,'Precio',1,0,'C',1);
    $pdf->Cell(30,6,'Cantidad',1,0,'C',1);
    $pdf->Cell(30,6,'Total',1,1,'C',1);

    $pdf->SetFont('Arial','',10);


    while($row = $resultado->fetch_assoc())
    {
$pdf->SetX(27);
        $pdf->Cell(30,6,utf8_decode($row['id_producto']),1,0,'C');
        $pdf->Cell(40,6,$row['nombre'],1,0,'C');
        $pdf->Cell(30,6,$row['precio'],1,0,'C');
        $pdf->Cell(30,6,$row['qty'],1,0,'C');
        $pdf->Cell(30,6,$row['total'],1,1,'C');
    }


	


$consult = "


SELECT sum(total) FROM orden WHERE id_cliente='$ses_id' and estado = 'Pendiente'

";
    $result = $conn->query($consult);

	$pdf->SetY(160);
$pdf->SetX(136);
$pdf->SetFont('Arial','B',11);
 $pdf->SetFillColor(250,204,204);
$pdf->Cell(25,10,"TOTAL:",1,0,"C");




    while($rows = $result->fetch_assoc())
    {

  $pdf->Cell(25,10,$rows['sum(total)'],1,1,'C');

  }





	$pdf->Output(d,'orden.pdf');
?>