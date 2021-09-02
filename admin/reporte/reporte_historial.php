
<?php


  include 'plantilla_historial.php';
  

include_once("conexion.php");
$id=$_GET['id'];

$sentencia=$bd->query("
  SELECT * 
FROM 
  historial h
JOIN paciente p
on h.id_paciente= p.id_paciente

  WHERE h.id_paciente='$id'



  ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);



?>


<?php
  

  $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();


    $pdf->SetY(190);
$pdf->SetX(30);
    $pdf->SetFillColor(255, 118, 85);

    $pdf->SetTextColor(34,34,34);

    $pdf->SetFont('Arial','B',8);


$pdf->SetX(30);
 $pdf->Cell(55,-8,'OBSERVACION:',1,1,'C',1,false);
 $pdf->SetX(30);
 $pdf->Cell(55,-8,'MOTIVO:',1,1,'C',1,false);
$pdf->SetX(30);
 $pdf->Cell(55,-8,'CIVIL:',1,1,'C',1,false);
$pdf->SetX(30);
 $pdf->Cell(55,-8,'TELEFONO:',1,1,'C',1,false);
$pdf->SetX(30);
 $pdf->Cell(55,-8,'DIRECCION:',1,1,'C',1,false);
$pdf->SetX(30);
 $pdf->Cell(55,-8,'CIUDAD:',1,1,'C',1,false);

$pdf->SetX(30);
 $pdf->Cell(55,-8,'PROVINCIA',1,1,'C',1,false);
$pdf->SetX(30);
 $pdf->Cell(55,-8,'PAIS:',1,1,'C',1,false);
 $pdf->SetX(30);

 $pdf->Cell(55,-8,utf8_decode('EDAD:'),1,1,'C',1,false);
 $pdf->SetX(30);

 $pdf->Cell(55,-8,'CORREO:',1,1,'C',1,false);
$pdf->SetX(30);

 $pdf->Cell(55,-8,'GENERO',1,1,'C',1,false);

$pdf->SetX(30);
 $pdf->Cell(55,-8,'FECHA NACIMIENTO:',1,1,'C',1,false);

$pdf->SetX(30);

 $pdf->Cell(55,-8,'CEDULA:',1,1,'C',1,false); 

$pdf->SetX(30);
 $pdf->Cell(55,-8,'NOMBRE PACIENTE:',1,1,'C',1,false);
 $pdf->SetX(30);
 $pdf->Cell(55,-8,'CODIGO PACIENTE',1,1,'C',1,false);
$pdf->SetX(30);
 $pdf->Cell(55,-8,'CODIGO HISTORIAL:',1,1,'C',1,false);



    $pdf->SetFont('Arial','',8);
  $pdf->SetFillColor(255,255,255);
  $pdf->SetTextColor( 0, 0, 0);

  foreach($paciente as $row) {

  $pdf->SetX(84);

$pdf->Cell(-19);

         $pdf->SetX(85);
        








     $pdf->SetX(85);
        

       $pdf->Cell(83,8,'000',1,1,'C',false);
 $pdf->Cell(245,-8.2,$row->id_historial,0,0,'C',false);
       $pdf->SetX(85);
       $pdf->Cell(83,8,utf8_decode($row->cod_paciente),1,1,'C',false);

       $pdf->SetX(85);
$pdf->Cell(83,8,utf8_decode($row->nombre_apellido),1,1,'C',1,false);

    $pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->cedula),1,1,'C',1,false);
 $pdf->SetX(85);
$pdf->Cell(83,8,utf8_decode($row->fecha_nacimiento),1,1,'C',1,false);

 $pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->genero),1,1,'C',1,false);




 $pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->correo),1,1,'C',1,false);





 $pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->edad),1,1,'C',1,false);



 $pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->pais),1,1,'C',1,false);



$pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->provincia),1,1,'C',1,false);
$pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->ciudad),1,1,'C',1,false);

$pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->direccion),1,1,'C',1,false);

$pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->telefono),1,1,'C',1,false);
$pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->civil),1,1,'C',1,false);


$pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->mot),1,1,'C',1,false);

$pdf->SetX(85);
 
$pdf->Cell(83,8,utf8_decode($row->recom),1,1,'C',1,false);








    }
  $pdf->Output();
?>


