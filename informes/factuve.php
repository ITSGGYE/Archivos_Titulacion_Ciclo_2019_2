<?php
//require('mc_tablegpafa.php');
require('mc_tablesgpa.php');

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


$codi="";



$codi=$_GET["covender"]; 	
$casa=trim($_GET["covender"]); 		
	

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
 	$result22 = $mysqli->query("select idprove,nombres,cedula,direcion,telefono,fecha,factu,subto,iva,topa,hora,descue,subdesc,topro,idve,fpago from datosventa where idcompra = '$codi'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				
		
			
				$idprove = $row1[0];

				$conta=$row1[1];
				$ruc = $row1[2];
				$direccion1 =  $row1[3];
				$telefono1 = $row1[4];
			$fecha =$row1[5];
				$factu = $row1[6];
				$subto =$row1[7];
				$iva = $row1[8];
				$toco=$row1[9];
				$hora=$row1[10];

				 $todesc = $row1[11];
				 $subdesc =$row1[12];
				
				
				
				$total = $row1[13];
				
								$idv = $row1[14];
				$fpa = $row1[15];

}
$result22->close();

$p1=$fecha;	
	$dia=substr($p1,0,2);
    $mes=substr($p1,3,2);
    $ano=substr($p1,6,4);	
 
 //sacamos datos de proveedor
 	$result22 = $mysqli->query("select cli_cedula,cli_nomape,cli_telefono,	cli_direcion from m_clientes where cli_id = '$idprove'  ");

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
				
				


 	$result22 = $mysqli->query("select nombres,apellidos from usuario where id = '$idv'  ");

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


//$pdf->SetMargins(5,20,20);
$pdf->SetMargins(5,10,0);
	
			
	//      '/../src/includeFile.php'			
			
//$codiven=($archi); 



	$pdf->SetFont('Arial','B',8);
	
		
		$pdf->Cell(0,5,'', 0, 1,'C');
		
		$pdf->Cell(10,4, 'DIA',1,0,'C');
   $pdf->Cell(10,4, 'MES',1,0,'C');
	
	$pdf->Cell(10,4, 'AÑO',1,0,'C');
	$pdf->Cell(130);
	$pdf->Cell(40,4, 'ORDEN DE PEDIDO',1,1,'C');
	
	
	$pdf->Cell(10,4, $dia,1,0,'C');
   $pdf->Cell(10,4, $mes,1,0,'C');
	
	$pdf->Cell(10,4, $ano,1,0,'C');
	$pdf->Cell(130);
	$pdf->Cell(40,4, $factu,1,1,'C');
	
	
	$pdf->Cell(0,2, '',0,1,'C');
  
  $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(20,5, 'Cliente',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, utf8_decode($conta),1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Telefono',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(75,5, $telefono1,1,1);
		


 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(20,5, 'Direccion',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, utf8_decode($direccion1),1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Forma de Pago',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(75,5, $fpa,1,1);		
		
		
		
	 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(20,5, 'Ruc/Cedula',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, $ruc,1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Vendedor',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(75,5, utf8_decode($nombrena1),1,1);			
		
	
		

		
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


	 $pdf->SetWidths(array(7,25,88,8,13,13,10,13,12,13)); 
	 $pdf->SetTextColor(241);
   $pdf->SetFillColor(128, 128, 128);
   $pdf->Cell(7, 5, 'Ord', 1, 0, 'C', True);
	$pdf->Cell(25, 5, 'Codigo', 1, 0, 'C', True);
			$pdf->Cell(88, 5, 'Descripción', 1, 0, 'C', True);
			$pdf->Cell(8, 5, 'Cant', 1, 0, 'C', True);
				$pdf->Cell(13, 5, 'Val.Uni', 1, 0, 'C', True);
				$pdf->Cell(13, 5, 'Subto', 1, 0, 'C', True);
				$pdf->Cell(10, 5, 'Desc', 1, 0, 'C', True);
				$pdf->Cell(13, 5, 'Sub-Des', 1, 0, 'C', True);
				$pdf->Cell(12, 5, 'Iva', 1, 0, 'C', True);
				$pdf->Cell(13, 5, 'V.Total', 1, 0, 'C', True);
				$pdf->Ln();
				
	

$ruta="ventas/";
 
$archi="../".$ruta.$casa."clientes.json";
	
$data = file_get_contents($archi);
$products = json_decode($data, true);			

 
 $sub=0;
	  
	    $topa=0;	
		$descue=0;

	
	$ord1=0;
	$toin=0;
	$i=0;
	$iv=0;
	foreach ($products as $cliente) 
	{
	
			$iv=$iv+1;
	
		$i=$i+1;
	$codipoa=$cliente['cp'];
	
	$cantid=$cliente['ca'];
	$valen=$cliente['pr'];
	$pagado=$cliente['vp'];

	$pagado1=$cliente['pd'];
	$pagado2=$cliente['td'];
	$pagado3=$cliente['sd'];
	$pagado4=$cliente['iv'];
	$pagado5=$cliente['tp'];		
	
	
		
	
	
	 $copro =""; 
	 $nopro =""; 
   
	
$result22 = $mysqli->query("select codiarti,descriarti from articulos where idarti1 = '$codipoa'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				
		
				$copro = $row1[0];
				$nopro =$row1[1];
				

}
$result22->close();
	
			
					 
   
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
	
		
	
	
				
			
			$ord1=$ord1+1;
			
			 $pdf->SetFont('Arial','B',8);
			  $pdf->SetTextColor(245);
    		$pdf->SetFillColor(85,107,47);
			
			
					$colo="";
			
				
				
				$minus=strtolower(utf8_decode($nopro));
				
				$mayus=ucwords($minus);
				
				
				
					
					
					srand(microtime()*1000000);	
							$p=$p1;	
					$pdf->SetAligns(array('R','L','L','R','R','R','R','R','R','R','R','R','R','R','R'));		

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
				$ord="";
				
			 $pdf->SetFont('Times','',8);
				
				$pdf->Row(array($i,substr($copro, 0, 15),substr($mayus, 0, 100),$cantid,number_format($valen, 2),number_format($pagado, 2),number_format($pagado2, 2),number_format($pagado3, 2),number_format($pagado4, 2),number_format($pagado5, 2)));
				
	///dedse aqui
				if ($iv==44)
			{
			
			

$pdf->AddPage();


//$pdf->SetMargins(5,20,20);
$pdf->SetMargins(5,10,0);

	$pdf->SetFont('Arial','B',8);
	
		
		$pdf->Cell(0,5,'', 0, 1,'C');
		
		$pdf->Cell(10,4, 'DIA',1,0,'C');
   $pdf->Cell(10,4, 'MES',1,0,'C');
	
	$pdf->Cell(10,4, 'AÑO',1,0,'C');
	$pdf->Cell(130);
	$pdf->Cell(40,4, 'ORDEN DE PEDIDO',1,1,'C');
	
	
	$pdf->Cell(10,4, $dia,1,0,'C');
   $pdf->Cell(10,4, $mes,1,0,'C');
	
	$pdf->Cell(10,4, $ano,1,0,'C');
	$pdf->Cell(130);
	$pdf->Cell(40,4, $factu,1,1,'C');
	
	
	$pdf->Cell(0,2, '',0,1,'C');
  
  $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(20,5, 'Cliente',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, utf8_decode($conta),1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Telefono',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(75,5, $telefono1,1,1);
		


 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(20,5, 'Direccion',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, utf8_decode($direccion1),1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Forma de Pago',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(75,5, $fpa,1,1);		
		
		
		
	 $pdf->SetFont('Arial','B',9);
		
		$pdf->Cell(20,5, 'Ruc/Cedula',1,0);
			$pdf->SetFont('Arial','',9);
		$pdf->Cell(80,5, $ruc,1,0);
		 $pdf->SetFont('Arial','B',9);
		$pdf->Cell(25,5, 'Vendedor',1,0);
		$pdf->SetFont('Arial','',9);
		
		$pdf->Cell(75,5, utf8_decode($nombrena1),1,1);			
		
	
		

		
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


	 $pdf->SetWidths(array(7,25,88,8,13,13,10,13,12,13)); 
	 $pdf->SetTextColor(241);
   $pdf->SetFillColor(128, 128, 128);
   $pdf->Cell(7, 5, 'Ord', 1, 0, 'C', True);
	$pdf->Cell(25, 5, 'Codigo', 1, 0, 'C', True);
			$pdf->Cell(88, 5, 'Descripción', 1, 0, 'C', True);
			$pdf->Cell(8, 5, 'Cant', 1, 0, 'C', True);
				$pdf->Cell(13, 5, 'Val.Uni', 1, 0, 'C', True);
				$pdf->Cell(13, 5, 'Subto', 1, 0, 'C', True);
				$pdf->Cell(10, 5, 'Desc', 1, 0, 'C', True);
				$pdf->Cell(13, 5, 'Sub-Des', 1, 0, 'C', True);
				$pdf->Cell(12, 5, 'Iva', 1, 0, 'C', True);
				$pdf->Cell(13, 5, 'V.Total', 1, 0, 'C', True);
				$pdf->Ln();
				
				
				$iv=0;
				
				}
	
	
	
			
			
				
	/////hasta aqui			
			}
			
			$nopro="";
			
			$limi=10 - $ord1;
			
			 $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
							
		for ($d=1;$d<=$limi;$d++ )
	{
						$pdf->Row(array($nopro,$nopro,$nopro,$nopro,$nopro,$nopro,$nopro,$nopro,$nopro,$nopro));
		

	}	
		
							  	
	// Set font
$pdf->SetFont('Times','B',9);
// Move to 8 cm to the right
$pdf->Cell(164);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(25,5,'Subtotal',1,0,'R');
$pdf->Cell(13,5,number_format($subto, 2),1,1,'R');

$pdf->Cell(164);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(25,5,'Descuento',1,0,'R');
$pdf->Cell(13,5,number_format($todesc, 2),1,1,'R');


$pdf->Cell(164);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(25,5,'Sub-Desc',1,0,'R');
$pdf->Cell(13,5,number_format($subdesc, 2),1,1,'R');


$pdf->Cell(44,5,'______________________',0,0,'R');

$pdf->Cell(120,5,'_______________________',0,0,'C');

$pdf->Cell(25,5,'Iva',1,0,'R');
$pdf->Cell(13,5,number_format($iva, 2),1,1,'R');

//$pdf->Cell(100);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(44,5,'ENTREGA CONFORME',0,0,'R');

$pdf->Cell(120,5,'RECIBIDO CONFORME',0,0,'C');

$pdf->Cell(25,5,'V.Total',1,0,'R');
$pdf->Cell(13,5,number_format($toco, 2),1,1,'R');
		
		
		
					  

$pdf->Output('articulos.pdf','D');
?>
