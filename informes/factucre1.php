<?php
require('mc_tablegpafa.php');

$fecha=date("d/m/Y");
require_once 'conectar.php';

$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexi�n a MySQL: (" . $mysqli -> mysqli_connect_errno(). ") " . $mysqli -> mysqli_connect_error());
}
else
{
//echo "Conexi�n exitosa!";
$mysqli->set_charset('utf8');
//$mysqli -> mysqli_close();
}			


$fecha5=date("d/m/Y");


$codi="";

$codi=$_GET["id"]; 
$codi4=$_GET["id1"]; 

//sacamos datos de compras
//sacamos datos de compras
$idprove = ""; //
 
 $prove =""; //
 $ruc = ""; //
 $conta = ""; //

 $fecha ="";
 $factu ="";
 $subto = "";

 $todesc = "";
 $subdesc =""; 
 $iva = "";
 $toco = "";
 $total = "";
 
 		$telefono1 = "";
		$direccion1 = "";
 
 $hora =""; //
 $ruc = ""; //
 $conta = ""; //
 
  $idv = ""; 
   $fpa = ""; 
   
   $valcre = ""; 
 
 	$tazar =""; 
	 $plaz = ""; 
 	$fecplaz = ""; 
 	$coucre ="";
 	$factucre ="";
   					$result22 = $mysqli->query("select valcre,taza,pla,fecha,cuota,idcli,factu from datoscredito where idcred = '$codi4'  ");
				
				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
								$valcre = $row1[0];
								$tazar=$row1[1];
								 $plaz = $row1[2];
								$fecplaz =  $row1[3];
								$coucre = $row1[4];
							$idprove =$row1[5];
							$factucre =$row1[6];
								
					}
					$result22->close();

$deuda=0;
$deuto=0;
$cancela=0;
$debe=0;
$consulta = $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codi4."'");
while($rowcre = $consulta->fetch_array() )
{
			
			$numes=$rowcre['esta'];
			$deus=$rowcre['cuo'];
			$deuto=$deuto+$deus;
			if($numes==0)
			$debe=$debe+$deus;
			else
			$cancela=$cancela+$deus;
			

}				
					
					
					
					
					
					  					$result22 = $mysqli->query("select idv,fepago,hopago,recipa from credito where reci = '$codi'  ");
				
				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
								$idv = $row1[0];
								$fecha=$row1[1];
								 $hora = $row1[2];
								$factu =  $row1[3];
								
								
					}
					$result22->close();
   
   
	 
 //sacamos datos de proveedor
 	$result22 = $mysqli->query("select soc_cedula,soc_nombreapellido,soc_tele,soc_dire from clientes where soc_id = '$idprove'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				
				$ruc = $row1[0];
				$conta = $row1[1];
				$telefono1 =  $row1[2];
				$direccion1 = $row1[3];
					
}
$result22->close();


 

//sacamos datos de vendedor
	$nombrena =  "";
				$apellidona = "";
				
			$nombrena1 =  "";	
				
				


 
	$result22 = $mysqli->query("select nombres,apellidos from usuario where idusuario = '$idv'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				
			$nombrena =  $row1[0];
				$apellidona = $row1[1];
				
				
				
				$nombrena1 =trim($apellidona)." ".trim($nombrena);
					
}
$result22->close();
					
	
$p1=$fecha5;	
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



	
	



$direccion="Este documento es un ap�ndice de mi proyecto fin de carrera. Lo escrib� despu�s de leer tres o fgh gf hgfh";
//$pdf=new PDF('L','mm','A4');
//$pdf=new PDF_MC_Table();
//$pdf=new PDF_MC_Table();
//$pdf->AddPage();

//$pdf->AddPage('P','A5');
//$pdf=new FPDF('L','cm','A4');


$pdf=new PDF_MC_Table();
//$pdf=new PDF_MC_Table();
$pdf->AddPage();


$pdf->SetMargins(5,20,20);
	

    

	$pdf->SetFont('Arial','B',8);
	
		
		$pdf->Cell(0,5,'', 0, 1,'C');
		
		$pdf->Cell(10,4, 'DIA',1,0,'C');
   $pdf->Cell(10,4, 'MES',1,0,'C');
	
	$pdf->Cell(10,4, 'A�O',1,0,'C');
	$pdf->Cell(130);
	$pdf->Cell(40,4, 'CREDITO #',1,1,'C');
	
	
	$pdf->Cell(10,4, $dia,1,0,'C');
   $pdf->Cell(10,4, $mes,1,0,'C');
	
	$pdf->Cell(10,4, $ano,1,0,'C');
	$pdf->Cell(130);
	$pdf->Cell(40,4, $factucre,1,1,'C');
	
	
	$pdf->Cell(0,2, '',0,1,'C');
  
  $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(25,5, 'Cliente',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, utf8_decode($conta),1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Telefono',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(70,5, $telefono1,1,1);
		


 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(25,5, 'Direccion',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, utf8_decode($direccion1),1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Ruc/Cedula',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(70,5, $ruc,1,1);		
		
		
		
	 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(25,5, 'Cobrador',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, utf8_decode($nombrena1),1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Fec. Credito',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(70,5, $fecplaz,1,1);			
		
	
	
	
	
	 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(25,5, 'Valor credito',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, $valcre,1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Tasa %',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(70,5, $tazar,1,1);		
		
		
		
	 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(25,5, 'Plazo Meses',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, $plaz,1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Cuota',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(70,5, $coucre,1,1);	
		
		
		
		
		 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(25,5, 'Recibo pago',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, $factu,1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Deuda Total',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(70,5, $deuto,1,1);	
		
		
		 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(25,5, 'Val Cancelado',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, $cancela,1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Adeuda',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(70,5, $debe,1,1);	





		
	$pdf->Ln();
	
	$pdf->SetFont('Arial','',12);
	

	
	
	
		
	
	
	
	$p=78;
		$tota=0;
			$i1=0;
			$i2=0;
			$p1=55;
			
			
        // Primero establece Donde estar� la esquina superior izquierda donde estar� tu celda
$pdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor(0, 0, 255); // establece el color del fondo de la celda (en este caso es AZUL
//$pdf->Cell(145, 20, 'LETRERO', 1, 0, 'C', True); // en orden lo que informan estos parametros es: 		
				
 $estado=2;
	
	$faltan=0;
	
	
	 $pdf->SetFont('Arial','B',8);
 
   $pdf->SetTextColor(245);
    $pdf->SetFillColor(85,107,47);
	
	
			
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

					   $exi="";
						 
   $pdf->SetTextColor(241);
    $pdf->SetFillColor(85,10,47);
	
	
	
				


 



	
				
	
	///grabar en tabla compras
	
	
	
	
	
	
	
	
	
	
	
	
	$concepto="";
	

	
				
					srand(microtime()*1000000);	
							$p=$p1;	

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

$pdf->SetAligns(array('L','L'));

			
$topa1=0;					

$esta=1;

$pdf->SetMargins(25,20,20);

	 $pdf->SetWidths(array(20,25,25,20,13,13,20,13,12,13)); 
	 
   $pdf->Cell(20, 5, '', 0, 0, 'C');

				
				$pdf->Ln();
				
				 $pdf->SetWidths(array(20,25,25,25,25,25,25,25,12,13)); 
	 $pdf->SetTextColor(241);
   $pdf->SetFillColor(128, 128, 128);
    $pdf->Cell(20, 5, 'Ord', 1, 0, 'C', True);
				 $pdf->Cell(25, 5, 'Cuota#', 1, 0, 'C', True);
	$pdf->Cell(25, 5, 'Valor', 1, 0, 'C', True);
			$pdf->Cell(25, 5, '%Interes', 1, 0, 'C', True);
			$pdf->Cell(25, 5, 'Interes', 1, 0, 'C', True);
				$pdf->Cell(25, 5, 'Tot. Pag', 1, 0, 'C', True);
				
							
				$pdf->Ln();

$result511a= $mysqli->query("SELECT * FROM credito WHERE reci = '".$codi."' ");

 
 $sub=0;
	  
	    $topa=0;	
		$descue=0;
$subto=0;
	$todesc=0;
	$toco=0;
	$iva=0;
	$ord1=0;
	$toin=0;
	$i=0;
	while($row = $result511a->fetch_array() )
{
		
		
	
		$i=$i+1;
				$copro =$row['perio'];
				$pagado=$row['cuo'];
	
			
				
				
				$pagado1=$row['porinte'];
				
				$pagado4=$row['tointe'];
				
				$pagado5=$row['tocobra'];
				
				$subto=$subto+$pagado;	
				$todesc=$todesc+$pagado4;	
				$toco=$toco+$pagado5;			
	
	
					 
   
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
	
		
	
	
				
			
			$ord1=$ord1+1;
			
			 $pdf->SetFont('Arial','B',8);
			  $pdf->SetTextColor(245);
    		$pdf->SetFillColor(85,107,47);
			
			
					$colo="";
			
				
				
				
				
					
					
					srand(microtime()*1000000);	
							$p=$p1;	
					$pdf->SetAligns(array('R','R','R','R','R','R','R','R','R','R','R','R','R','R','R'));		

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
				$ord="";
				
			 $pdf->SetFont('Times','',9);
				
				$pdf->Row(array($i,$copro,number_format($pagado, 2),number_format($pagado1, 2),number_format($pagado4, 2),number_format($pagado5, 2)));
				
			
				
			}
			
			
	$nopro="";
			
			$limi=10 - $ord1;
			
			
							
		for ($d=1;$d<=$limi;$d++ )
	{
						$pdf->Row(array($nopro,$nopro,$nopro,$nopro,$nopro,$nopro));
		

	}	
		
							  	
	// Set font
$pdf->SetFont('Arial','B',6);
// Move to 8 cm to the right
$pdf->Cell(95);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(25,5,'Subtotal',1,0,'R');
$pdf->Cell(25,5,number_format($subto, 2),1,1,'R');





$pdf->Cell(39,5,'______________________',0,0,'R');

$pdf->Cell(56,5,'_______________________',0,0,'C');

$pdf->Cell(25,5,'Interes',1,0,'R');
$pdf->Cell(25,5,number_format($todesc, 2),1,1,'R');

//$pdf->Cell(100);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(39,5,'ENTREGUE CONFORME',0,0,'R');

$pdf->Cell(56,5,'RECIBI CONFORME',0,0,'C');

$pdf->Cell(25,5,'V.Total',1,0,'R');
$pdf->Cell(25,5,number_format($toco, 2),1,1,'R');
		
					  

$pdf->Output('articulos.pdf','D');
?>
