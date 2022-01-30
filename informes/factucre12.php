<?php
require('mc_tablegpafa.php');

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


$fecha5=date("d/m/Y");


$codi="";


$idpro = "";
$codicre=$_GET["id"]; 
		$valcre = ""; 
 
 	$tazar =""; 
	 $plaz = ""; 
 	$fecplaz = ""; 
 	$coucre ="";
 	$factucre ="";
	
 
 




$idtic="";
$idfo="";

$detic="";
$defo="";








				$result22 = $mysqli->query("select valcre,taza,pla,fecha,cuota,factu,idticue,idfpa,idcli from datoscredito where idcred = '$codicre'  ");
				
				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
								
						
							
								$valcre = $row1[0];
				
								$tazar=$row1[1];
								 $plaz = $row1[2];
								$fecplaz =  $row1[3];
								$coucre = $row1[4];
							$factucre =$row1[5];
							$idtic =$row1[6];
							$idfo =$row1[7];
							$idpro =$row1[8];
								
				}
				$result22->close();



$deuda=0;
$deuto=0;
$cancela=0;
$debe=0;
$consulta = $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codicre."'");
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
   
 
 			  					
      
	 
 //sacamos datos de proveedor
		$ruc = "";
		$nombre = "";
		$apellido ="";
		$direccion1 = "";
		$cla = "";
		
		
		$telefono1 = "";
		$telefono2 = "";
		$telefono3 = "";
		$fax = "";
		$correo1 ="";
		$correo2 ="";
		
		$nombre1 = "";
		
		$tici = "";
		$ruc1 = "";
		$pais = "";
		$esci = "";
		$direccion2 ="";
		
		
		$gene ="";			
		$acti = "";
		$feca = "";
		$feca1 = "";
	
	
$cocli = "";
		
		
		
	$result22 = $mysqli->query("select soc_cod,soc_cedula,soc_nombres,soc_apellidos,soc_nombreapellido,soc_fecha,soc_tele,soc_dire,soc_gene,soc_mail,soc_esci,soc_fein,ticlie from clientes where soc_id = '$idpro'  ");



if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				$cocli = $row1[0];
				$ruc = $row1[1];
				$nombre =  $row1[2];
				$apellido = $row1[3];
				$conta =$row1[4];
				$feca= $row1[5];
				$telefono1 =  $row1[6];
				$direccion1 = $row1[7];
				$gene = $row1[8];
				$correo1 =$row1[9];
				
				$esci = $row1[10];
				$feca1 = $row1[11];
				$tici = $row1[12];
			
				
				
}
$result22->close();
$i1=0;

$razon1 ="";

$result22 = $mysqli->query("select tipoclie from tipoclie where idtipo = '$tici'  ");
if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				
				$razon1 = $row1[0];

}
$result22->close();
//sacamos datos de vendedor
	$nombrena =  "";
				$apellidona = "";
				
			$nombrena1 =  "";	
				
				
				if ($idtic==1 )
					{
					$detic="cuentas por cobrar a corto plazo";
				}
			

				if ($idtic==2 )
					{
					$detic="cuentas por cobrar a largo plazo";
				}

				if ($idfo==1 )
					{
					$defo="letras de cambio";
				}
			

				if ($idfo==2 )
					{
					$defo="títulos de crédito";
				}
				
						if ($idfo==3 )
					{
					$defo="pagarés";
				}
				

 	
					
	
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



	
	



$direccion="Este documento es un apéndice de mi proyecto fin de carrera. Lo escribí después de leer tres o fgh gf hgfh";
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
	
	$pdf->Cell(10,4, 'AÑO',1,0,'C');
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
		
		$pdf->Cell(25,5, 'Fec. Credito',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5,  $fecplaz,1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Valor credito',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(70,5, $valcre,1,1);			
		
	
	
	
	
	 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(25,5, 'Tasa %',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, $tazar,1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Plazo Meses',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(70,5, $plaz,1,1);		
		
		
		
	 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(25,5, 'Cuota',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, $coucre,1,0);
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
			
			
        // Primero establece Donde estará la esquina superior izquierda donde estará tu celda
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



	
	 
 
 $pdf->SetWidths(array(195,25,25,25,25,25,25,25,25,25)); 
	 $pdf->SetTextColor(241);
   $pdf->SetFillColor(128, 128, 128);
    $pdf->Cell(195, 5, 'DETALLE DE CREDITO', 1, 0, 'C', True);

			$pdf->Ln();
	//////			
				 $pdf->SetWidths(array(20,25,25,25,25,25,25,25,25,25)); 
	 $pdf->SetTextColor(241);
   $pdf->SetFillColor(128, 128, 128);
    $pdf->Cell(20, 5, 'Cuota#', 1, 0, 'C', True);
				 $pdf->Cell(25, 5, 'Fecha de Pago', 1, 0, 'C', True);
	$pdf->Cell(25, 5, 'Saldo Deuda', 1, 0, 'C', True);
			$pdf->Cell(25, 5, 'capiatl', 1, 0, 'C', True);
			$pdf->Cell(25, 5, 'Interes', 1, 0, 'C', True);
				$pdf->Cell(25, 5, 'cuota', 1, 0, 'C', True);
				$pdf->Cell(25, 5, 'Saldo final', 1, 0, 'C', True);
				$pdf->Cell(25, 5, 'Estado', 1, 0, 'C', True);
				
							
				$pdf->Ln();
				
				
$esta=1;



				

$resucre= $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codicre."'  ");

 
 $i=0;
 $ord1=0;
while($rowcre = $resucre->fetch_array() )
{

	$i=$i+1;
		
		
	
	$numes=$rowcre['perio'];
	
	$fecpago=$rowcre['fecpa'];
	$saldar=$rowcre['sald'];
	$capit=$rowcre['capi'];

	$intecre=$rowcre['inte'];
	$cucre=$rowcre['cuo'];
	$deusal=$rowcre['salf'];
	
	
	$estacre=$rowcre['esta'];
	 if ($estacre==1)
			$sada="Cancelado";
			 else
			$sada="Adeuda";
	
	
					 
   
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
				
				$pdf->Row(array($numes,$fecpago,number_format($saldar, 2),number_format($capit, 2),number_format($intecre, 2),number_format($cucre, 2),number_format($deusal, 2),$sada));
				
			
	
	
	
			
				
			}
			//////
	  $pdf->Ln();
 
 $pdf->SetWidths(array(195,25,25,25,25,25,25,25,25,25)); 
	 $pdf->SetTextColor(241);
   $pdf->SetFillColor(128, 128, 128);
    $pdf->Cell(195, 5, 'DETALLE DE COBRO DEL CREDITO', 1, 0, 'C', True);

			$pdf->Ln();
  
				 $pdf->SetWidths(array(20,25,25,25,25,25,25,25,25,25)); 
	 $pdf->SetTextColor(241);
   $pdf->SetFillColor(128, 128, 128);
  
    $pdf->Cell(20, 5, 'Ord', 1, 0, 'C', True);
				 $pdf->Cell(25, 5, 'Cuota#', 1, 0, 'C', True);
				 $pdf->Cell(25, 5, 'Fecha de Pago', 1, 0, 'C', True);
				  $pdf->Cell(25, 5, 'Recibo#', 1, 0, 'C', True);
	$pdf->Cell(25, 5, 'Valor', 1, 0, 'C', True);
			$pdf->Cell(25, 5, '%Interes', 1, 0, 'C', True);
			$pdf->Cell(25, 5, 'Interes', 1, 0, 'C', True);
				$pdf->Cell(25, 5, 'Tot. Pag', 1, 0, 'C', True);
				
				
				
				
				 				
				
				
							
				$pdf->Ln();
				
				
$esta=1;




$result511a= $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codicre."' and esta = '".$esta."' ");
 
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
	
						$recib=$row['recipa'];
				$fepagado=$row['fepago'];
				
				
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
				
				$pdf->Row(array($i,$copro,$fepagado,$recib,number_format($pagado, 2),number_format($pagado1, 2),number_format($pagado4, 2),number_format($pagado5, 2)));
				
			
				
			}
			
			
	$nopro="";
			
			$limi=5 - $ord1;
			
			
							
		for ($d=1;$d<=$limi;$d++ )
	{
						$pdf->Row(array($nopro,$nopro,$nopro,$nopro,$nopro,$nopro,$nopro,$nopro));
		

	}	
		
							  	
	// Set font
$pdf->SetFont('Arial','B',6);
// Move to 8 cm to the right
$pdf->Cell(145);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(25,5,'Subtotal',1,0,'R');
$pdf->Cell(25,5,number_format($subto, 2),1,1,'R');


$pdf->Cell(145);


$pdf->Cell(25,5,'Interes',1,0,'R');
$pdf->Cell(25,5,number_format($todesc, 2),1,1,'R');

//$pdf->Cell(100);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(145);
$pdf->Cell(25,5,'V.Total',1,0,'R');
$pdf->Cell(25,5,number_format($toco, 2),1,1,'R');
		
					  

$pdf->Output('detalle.pdf','D');
?>
