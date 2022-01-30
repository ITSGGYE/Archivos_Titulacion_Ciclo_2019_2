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
$codi=$_GET["id"]; 		

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
   $fpa = "Credito"; 
   
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



 	$result22 = $mysqli->query("select idcli,valcre,taza,pla,fecha,cuota,factu,idven,idticue,idfpa from datoscredito where idcred = '$codi'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				
		
			
				$idprove = $row1[0];

				$valcre=$row1[1];
				$tazar = $row1[2];
				 $plaz =  $row1[3];
				$fecplaz = $row1[4];
			$coucre =$row1[5];
				$factucre = $row1[6];
				$idv =$row1[7];
			$idtic =$row1[8];
							$idfo =$row1[9];
				

}
$result22->close();

		
				
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
 
 //sacamos datos de proveedor
 	$result22 = $mysqli->query("select soc_cod,soc_cedula,soc_nombres,soc_apellidos,soc_nombreapellido,soc_fecha,soc_tele,soc_dire,soc_gene,soc_mail,soc_esci,soc_fein,ticlie from clientes where soc_id = '$idprove'  ");

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
				
				


 	$result22 = $mysqli->query("select nombres,apellidos from usuario where idusuario = '$idv'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				
			$nombrena =  $row1[0];
				$apellidona = $row1[1];
				
				
				
				$nombrena1 =trim($apellidona)." ".trim($nombrena);
					
}
$result22->close();
					
			


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
		
		$pdf->Cell(25,5, 'Vendedor',1,0);
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

$pdf->SetMargins(25,20,20);

	 $pdf->SetWidths(array(20,25,25,20,13,13,20,13,12,13)); 
	 
   $pdf->Cell(20, 5, '', 0, 0, 'C');

				
				$pdf->Ln();
				
				 $pdf->SetWidths(array(20,25,25,25,25,25,25,25,12,13)); 
	 $pdf->SetTextColor(241);
   $pdf->SetFillColor(128, 128, 128);
				 $pdf->Cell(20, 5, 'Periodo', 1, 0, 'C', True);
	$pdf->Cell(25, 5, 'Fecha de Pago', 1, 0, 'C', True);
			$pdf->Cell(25, 5, 'Saldo Deuda', 1, 0, 'C', True);
			$pdf->Cell(25, 5, 'capiatl', 1, 0, 'C', True);
				$pdf->Cell(25, 5, 'interes', 1, 0, 'C', True);
				$pdf->Cell(25, 5, 'cuota', 1, 0, 'C', True);
				$pdf->Cell(25, 5, 'Saldo final', 1, 0, 'C', True);
				
				$pdf->Ln();
				
				
			
							
				

$result511a= $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codi."' ");

 
 $sub=0;
	  
	    $topa=0;	
		$descue=0;

	
	$ord1=0;
	$toin=0;
	$i=0;
	while($row = $result511a->fetch_array() )
{
		
		
	
		$i=$i+1;
$numes=$row['perio'];
	
	$fecpago=$row['fecpa'];
	$saldar=$row['sald'];
	$capit=$row['capi'];

	$intecre=$row['inte'];
	$cucre=$row['cuo'];
	$deusal=$row['salf'];
	
	
					 
   
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
				
				$pdf->Row(array($numes,$fecpago,number_format($saldar, 2),number_format($capit, 2),number_format($intecre, 2),number_format($cucre, 2),number_format($deusal, 2)));
				
			
			
			
				
				
			}
			
			
		$pdf->Ln(20);
	


$pdf->Cell(44,5,'______________________',0,0,'R');

$pdf->Cell(120,5,'_______________________',0,1,'C');


//$pdf->Cell(100);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(44,5,'ENTREGA CONFORME',0,0,'R');

$pdf->Cell(120,5,'RECIBIDO CONFORME',0,1,'C');
	
		
					  

$pdf->Output('articulos.pdf','D');
?>
