<?php
require('mc_tableg.php');

$fecha=date("d/m/Y");
require_once 'conectar.php';

$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno(). ") " . $mysqli -> mysqli_connect_error());
}
else
{
//echo "Conexión exitosa!";
$mysqli->set_charset('utf8');
//$mysqli -> mysqli_close();
}			


$fecha=date("d/m/Y");




$p1=$fecha;	
	$dia=substr($p1,0,2);
    $mes=substr($p1,3,2);
    $ano=substr($p1,6,4);	

			


function GenerateWord()
{
	//Get a random word
	$nb=rand(3,10);
	$w='';
	for($i=1;$i<=$nb;$i++)
		$w.=chr(rand(ord('a'),ord('z')));
	return $w;
}

function GenerateSentence()
{
	//Get a random sentence
	$nb=rand(1,10);
	$s='';
	for($i=1;$i<=$nb;$i++)
		$s.=GenerateWord().' ';
	return substr($s,0,-1);
}





$direccion="Este documento es un apéndice de mi proyecto fin de carrera. Lo escribí después de leer tres o fgh gf hgfh";
//$pdf=new PDF('L','mm','A4');
//$pdf=new PDF_MC_Table('L','mm','A4');
$pdf=new PDF_MC_Table();
$pdf->AddPage();

$pdf->SetMargins(5,20,20);
	$pdf->Ln(4);

    

	$pdf->SetFont('Arial','B',14);
	//$pdf->Text(80,40,utf8_encode($cabeza),0,'C', 0);
	//$pdf->Text(70,45,$cabeza1,0,'C', 0);
//	$pdf->Text(55,50,$cabeza2,0,'C', 0);
	 $pdf->SetFont('Arial','B',12);
	//$pdf->Text(80,55,'Periodo Lectivo   '.$periodo,0,'C', 0);
	
	
	$pdf->Cell(0, 4, 'Control Stock de Productos', 0, 1, 'C');
	
	
		
	
	

	$pdf->Ln();

    $pdf->SetFont('Arial','',10);

	
	$pdf->Cell(0,4,'Fecha de Informe...:'.$fecha,0,1); 
	
	
	
	//$pdf->Cell(85, 5, 'Vida Util  '.$vidautil.' Años', 0, 0,  False);
//	$pdf->Cell(0,6,'Libro de Activo Fijo ',0,1);
	//	$pdf->Cell(85, 5, 'Fecha Adquisión '.$feadqui, 0, 0,  False);
	//$pdf->Cell(0,6,'Valor Bien  $'.($valoruni, 2),0,1);
			
	
	
	
	
	


				
		//		$depreanu=mysql_result($result2211,0,3);
			
		
	
	
	
	$p=78;
		$tota=0;
			$i1=0;
			$i2=0;
			$p1=55;
			
			
        // Primero establece Donde estará la esquina superior izquierda donde estará tu celda
$pdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor(0, 0, 255); // establece el color del fondo de la celda (en este caso es AZUL
//$pdf->Cell(145, 20, 'LETRERO', 1, 0, 'C', True); // en orden lo que informan estos parametros es: 		
				
 $estado=2;
	
	$faltan=0;
	
	 $pdf->SetFont('Arial','B',10);
	 $pdf->SetFont('Arial','B',8);
 
   $pdf->SetTextColor(245);
    $pdf->SetFillColor(85,107,47);
	
	
		//$pdf->Row(array('Ord','Bien','Marca','Modelo','Fec. Rec.','Valor','Estado','Observacion'));			
		//$pdf->Row(array('Ord','Codigo','Est. Inicial','Existencia','         Est. Actual','Observacion','               Bien'));			
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

					   $exi="";
						 
   $pdf->SetTextColor(241);
    $pdf->SetFillColor(85,10,47);
	
	
	
				
				
 $pdf->SetTextColor(245);
    $pdf->SetFillColor(85,107,47);
	 $pdf->SetWidths(array(7,55,25,80,12,12,12,10,15,10,15)); 
	 $pdf->SetTextColor(241);
    $pdf->SetFillColor(128, 128, 128);
	$pdf->Cell(7, 5, 'Ord', 1, 0, 'C', True);
	$pdf->Cell(55, 5, 'Categoria', 1, 0, 'C', True);
	$pdf->Cell(25, 5, 'Codigo', 1, 0, 'C', True);
			$pdf->Cell(80, 5, 'Descripción', 1, 0, 'C', True);
			$pdf->Cell(12, 5, 'Exist.', 1, 0, 'C', True);
				$pdf->Cell(12, 5, 'Stoc_Min', 1, 0, 'C', True);
				$pdf->Cell(12, 5, 'Pedir', 1, 0, 'C', True);
				
				$pdf->Ln();
	

	
	
	
	$concepto="";
	
	
	
				
				
					srand(microtime()*1000000);	
							$p=$p1;	

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

$pdf->SetAligns(array('L','L'));
$status="Activo";



$esta=1;

$op=1;	 		
$result511a= $mysqli->query("select * from articulos,bodega where idarti1 = cueart and op1 = '$op' and cantidad < canmini order by codiarti");
	
	$ord1=0;
	$toin=0;
	$i=0;
	$i1=0;
	while($row = $result511a->fetch_array() )
{
		
		
	
		$i=$i+1;
		$i1=$i1+1;
		
	
	
	
	
			$idconju=$row['idcuecon'];
			$idarti=$row['idarti1'];
			
			$pedi=$row['canmini']-$row['cantidad'];
			
										
								$canmi=$row['canmini'];
								$cantidad=$row['cantidad'];
	
	
				$subdescate="";
					
					$result22 = $mysqli->query("select descricue from categorias where idcue1 = '$idconju' ");
						if ($result22->num_rows > 0 )
							{
										$row1 = $result22->fetch_array();
									
										
							$desconju = $row1[0];
						}		
						$result22->close();	
			
					 
   
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
	
		
	
	
				
			
			$ord1=$ord1+1;
			
			 $pdf->SetFont('Arial','B',8);
			  $pdf->SetTextColor(245);
    		$pdf->SetFillColor(85,107,47);
			
			
					$colo="";
		
		
					
				
					
					
					srand(microtime()*1000000);	
							$p=$p1;	
					$pdf->SetAligns(array('R','L','L','L','R','R','R','R','R'));		

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
				$ord="";
				
			 $pdf->SetFont('Arial','',6);
				
				$pdf->Row(array($i,substr($desconju, 0, 55),$row['codiarti'],$row['descriarti'],$cantidad,$canmi,$pedi));
				//$pdf->Row(array($i,$row['codiarti'],$row['descriarti'],$cantidad,$canmi,$pedi));
				
			if ($i1==46)
			 {
				$i1=0;
				$pdf->AddPage();
				$pdf->SetMargins(5,20,20);

				
	$pdf->SetFont('Arial','B',14);
	//$pdf->Text(80,40,utf8_encode($cabeza),0,'C', 0);
	//$pdf->Text(70,45,$cabeza1,0,'C', 0);
//	$pdf->Text(55,50,$cabeza2,0,'C', 0);
	 $pdf->SetFont('Arial','B',12);
	//$pdf->Text(80,55,'Periodo Lectivo   '.$periodo,0,'C', 0);
	
	
	$pdf->Cell(0, 4, 'Control Stock de Productos', 0, 1, 'C');
	
	
		
	
	$pdf->Ln();

	

    $pdf->SetFont('Arial','',10);

	
	$pdf->Cell(0,4,'Fecha de Informe...:'.$fecha,0,1); 
	
	 $pdf->SetFont('Arial','B',10);
	 $pdf->SetFont('Arial','B',8);
 
   $pdf->SetTextColor(245);
    $pdf->SetFillColor(85,107,47);
	
	
		//$pdf->Row(array('Ord','Bien','Marca','Modelo','Fec. Rec.','Valor','Estado','Observacion'));			
		//$pdf->Row(array('Ord','Codigo','Est. Inicial','Existencia','         Est. Actual','Observacion','               Bien'));			
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

					   $exi="";
						 
   $pdf->SetTextColor(241);
    $pdf->SetFillColor(85,10,47);
				 $pdf->SetTextColor(245);
    $pdf->SetFillColor(85,107,47);
	 $pdf->SetWidths(array(7,55,25,80,12,12,12,10,15,10,15)); 
	 $pdf->SetTextColor(241);
    $pdf->SetFillColor(128, 128, 128);
	$pdf->Cell(7, 5, 'Ord', 1, 0, 'C', True);
	$pdf->Cell(55, 5, 'Subcategoria', 1, 0, 'C', True);
	$pdf->Cell(25, 5, 'Codigo', 1, 0, 'C', True);
			$pdf->Cell(80, 5, 'Descripción', 1, 0, 'C', True);
			$pdf->Cell(12, 5, 'Exist.', 1, 0, 'C', True);
				$pdf->Cell(12, 5, 'Stoc_Min', 1, 0, 'C', True);
				$pdf->Cell(12, 5, 'Pedir', 1, 0, 'C', True);
				$pdf->Ln();
			}
			
					
				
			}
			
			
			
			
   $fechats = strtotime($fecha); //pasamos a timestamp



$ta=date('w', $fechats);

if ($ta==1)
$tas="Domingo";
if ($ta==2)
$tas="Lunes";
if ($ta==3)
$tas="Martes";
if ($ta==4)
$tas="Miercoles";
if ($ta==5)
$tas="Jueves";
if ($ta==6)
$tas="Viernes";
if ($ta==7)
$tas="Sabado";



			
							  	
		$p1=$fecha;	
	$dia=substr($p1,0,2);
    $mes=substr($p1,3,2);
    $ano=substr($p1,6,4);	
	$mese="";
if ($mes=="01")
$mese="Enero";

if ($mes=="02")
$mese="Febrero";		
if ($mes=="03")
$mese="Marzo";

if ($mes=="04")
$mese="Abril";		
if ($mes=="05")
$mese="Mayo";

if ($mes=="06")
$mese="Junio";		
if ($mes=="07")
$mese="Julio";

if ($mes=="08")
$mese="Agosto";		
if ($mes=="09")
$mese="Septiembre";

if ($mes=="10")
$mese="Octubre";		
if ($mes=="11")
$mese="Noviembre";

if ($mes=="12")
$mese="Diciembre";	

$pdf->Ln(12);

		  $pdf->SetFont('Arial','B',10);	
						 
						
	$pdf->Cell(70,5,'______________________',0,0,'C');
	$pdf->Cell(40,5,'',0,0,'C');

$pdf->Cell(90,5,$tas.'  '.$dia.' de '.$mese.' del '.$ano,0,1,'C');	



//$pdf->Cell(100);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(70,5,'Control de Stock Efectuado por',0,1,'C');

							  
							  
							  

$pdf->Output('informe.pdf','D');
?>
