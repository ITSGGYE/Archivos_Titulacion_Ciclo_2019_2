<?php
//require('mc_tablegpa.php');
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


$fechaho=date("d/m/Y");


$codi="";

$codi=$_POST["covender"]; 	
$casa=trim($_POST["covender"]); 	

	

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
 
 
		
 
 


 
 
 
 
 	$result22 = $mysqli->query("select idprove,nombres,cedula,direcion,telefono,fecha,factu,subto,iva,topa,topro from datoscompra where idcompra = '$codi'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				
		
				$idprove = $row1[0];

				$prove=$row1[1];
				$ruc = $row1[2];
				$direccion1 =  $row1[3];
				$telefono1 = $row1[4];


				
				$fecha =$row1[5];
				$factu = $row1[6];
				$subto =$row1[7];

							
				$iva = $row1[8];
				$toco=$row1[9];
				$total = $row1[10];

}
$result22->close();


	

 
 //sacamos datos de proveedor
 	$result22 = $mysqli->query("select pro_ruc,pro_nombre,pro_apellido,protelefono,prodireccion from proveedores where idp = '$idprove'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

			
				$ruc = $row1[0];
				$prove = $row1[2]." ".$row1[1];
				$telefono1 =  $row1[3];
				$direccion1 = $row1[4];
					
}
$result22->close();


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
$pdf=new PDF_MC_Table();
//$pdf=new PDF_MC_Table();
$pdf->AddPage();

//$pdf->AddPage('P','A5');
//$pdf=new FPDF('L','cm','A4');



$pdf->SetMargins(5,10,0);
	

    

	$pdf->SetFont('Arial','B',8);
	
		
		$pdf->Cell(0,5,'', 0, 1,'C');
		
		$pdf->Cell(10,3, 'DIA',0,0,'C');
   $pdf->Cell(10,3, 'MES',0,0,'C');
	
	$pdf->Cell(10,3, 'AÑO',0,0,'C');
	
	$pdf->Cell(40,3, 'ORDEN/FACTURA '.$factu,0,1,'C');
	
	
	$pdf->Cell(10,3, $dia,0,0,'C');
   $pdf->Cell(10,3, $mes,0,0,'C');
	
	$pdf->Cell(10,3, $ano,0,1,'C');
	
	
	$pdf->Cell(0,2, '',0,1,'C');
  
  $pdf->SetFont('Arial','B',8);
		
		$pdf->Cell(20,3, 'Proveedor',0,0);
			$pdf->SetFont('Arial','U',8);
		$pdf->Cell(80,3, utf8_decode($prove),0,0);
		 $pdf->SetFont('Arial','B',8);
		$pdf->Cell(20,3, 'Ruc/Cedula',0,0);
		$pdf->SetFont('Arial','U',8);
		
		$pdf->Cell(60,3, utf8_decode($ruc),0,1);
		


 $pdf->SetFont('Arial','B',8);
		
		$pdf->Cell(20,3, 'Direccion',0,0);
			$pdf->SetFont('Arial','U',8);
		$pdf->Cell(80,3, utf8_decode($direccion1),0,0);
		 $pdf->SetFont('Arial','B',8);
		$pdf->Cell(20,3, 'Telefono',0,0);
		$pdf->SetFont('Arial','U',8);
		
		$pdf->Cell(60,3, $telefono1,0,1);		
		
		
		
	
	
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
	
	 $pdf->SetFont('Arial','B',9);
   $pdf->SetTextColor(245);
    $pdf->SetFillColor(85,107,47);
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

					   $exi="";
   $pdf->SetTextColor(241);
    $pdf->SetFillColor(85,10,47);
	
	$concepto="";
				
					srand(microtime()*1000000);	
							$p=$p1;	

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

$pdf->SetAligns(array('L','L'));

			
$topa1=0;					

$esta=1;
 $pdf->SetWidths(array(7,30,90,15,15,15,15,15,15,15)); 
	 $pdf->SetTextColor(241);
    $pdf->SetFillColor(128, 128, 128);
	$pdf->Cell(7, 5, 'Ord', 1, 0, 'C', True);
	$pdf->Cell(30, 5, 'Codigo', 1, 0, 'C', True);
			$pdf->Cell(90, 5, 'Descripción', 1, 0, 'C', True);
			$pdf->Cell(15, 5, 'Cant', 1, 0, 'C', True);
				$pdf->Cell(15, 5, 'Val.Uni', 1, 0, 'C', True);
				$pdf->Cell(15, 5, 'Subto', 1, 0, 'C', True);
				$pdf->Cell(15, 5, 'Iva', 1, 0, 'C', True);
				$pdf->Cell(15, 5, 'V.Total', 1, 0, 'C', True);
				$pdf->Ln();
				
				
	
	$ruta="compras/";
 
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
		
		
	
		$i=$i+1;
		$iv=$iv+1;
		
	
	$codipoa=$cliente['cp'];
	
	$cantid=$cliente['ca'];
	$valen=$cliente['pr'];
	$pagado=$cliente['vp'];

	
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
					$pdf->SetAligns(array('R','L','L','R','R','R','R','R','R'));		

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
				$ord="";
				
			 $pdf->SetFont('Arial','',7);
				
				$pdf->Row(array($i,substr($copro, 0, 15),substr($mayus, 0, 70),$cantid,number_format($valen, 2),number_format($pagado, 2),number_format($pagado4, 2),number_format($pagado5, 2)));
				
			if ($iv==44)
			{
			
			


$pdf->AddPage();

//$pdf->AddPage('P','A5');
//$pdf=new FPDF('L','cm','A4');



$pdf->SetMargins(5,10,0);
	

    

	$pdf->SetFont('Arial','B',8);
	
		
		$pdf->Cell(0,5,'', 0, 1,'C');
		
		$pdf->Cell(10,3, 'DIA',0,0,'C');
   $pdf->Cell(10,3, 'MES',0,0,'C');
	
	$pdf->Cell(10,3, 'AÑO',0,0,'C');
	
	$pdf->Cell(40,3, 'ORDEN/FACTURA '.$factu,0,1,'C');
	
	
	$pdf->Cell(10,3, $dia,0,0,'C');
   $pdf->Cell(10,3, $mes,0,0,'C');
	
	$pdf->Cell(10,3, $ano,0,1,'C');
	
	
	$pdf->Cell(0,2, '',0,1,'C');
  
  $pdf->SetFont('Arial','B',8);
		
		$pdf->Cell(20,3, 'Proveedor',0,0);
			$pdf->SetFont('Arial','U',8);
		$pdf->Cell(80,3, utf8_decode($prove),0,0);
		 $pdf->SetFont('Arial','B',8);
		$pdf->Cell(20,3, 'Ruc/Cedula',0,0);
		$pdf->SetFont('Arial','U',8);
		
		$pdf->Cell(60,3, utf8_decode($ruc),0,1);
		


 $pdf->SetFont('Arial','B',8);
		
		$pdf->Cell(20,3, 'Direccion',0,0);
			$pdf->SetFont('Arial','U',8);
		$pdf->Cell(80,3, utf8_decode($direccion1),0,0);
		 $pdf->SetFont('Arial','B',8);
		$pdf->Cell(20,3, 'Telefono',0,0);
		$pdf->SetFont('Arial','U',8);
		
		$pdf->Cell(60,3, $telefono1,0,1);		
		
		
		
	
	
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
	
	 $pdf->SetFont('Arial','B',9);
   $pdf->SetTextColor(245);
    $pdf->SetFillColor(85,107,47);
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

					   $exi="";
   $pdf->SetTextColor(241);
    $pdf->SetFillColor(85,10,47);
	
	$concepto="";
				
					srand(microtime()*1000000);	
							$p=$p1;	

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

$pdf->SetAligns(array('L','L'));

			
$topa1=0;					

$esta=1;
 $pdf->SetWidths(array(7,30,90,15,15,15,15,15,15,15)); 
	 $pdf->SetTextColor(241);
    $pdf->SetFillColor(128, 128, 128);
	$pdf->Cell(7, 5, 'Ord', 1, 0, 'C', True);
	$pdf->Cell(30, 5, 'Codigo', 1, 0, 'C', True);
			$pdf->Cell(90, 5, 'Descripción', 1, 0, 'C', True);
			$pdf->Cell(15, 5, 'Cant', 1, 0, 'C', True);
				$pdf->Cell(15, 5, 'Val.Uni', 1, 0, 'C', True);
				$pdf->Cell(15, 5, 'Subto', 1, 0, 'C', True);
				$pdf->Cell(15, 5, 'Iva', 1, 0, 'C', True);
				$pdf->Cell(15, 5, 'V.Total', 1, 0, 'C', True);
				$pdf->Ln();
				
				
				$iv=0;
				
				}

	
			
				
			}
			
			$nopro="";
			
			$limi=17 - $ord1;
			
			
							
		for ($d=1;$d<=$limi;$d++ )
	{
						$pdf->Row(array($nopro,$nopro,$nopro,$nopro,$nopro,$nopro,$nopro,$nopro));
		

	}	
		
							  	
	// Set font
$pdf->SetFont('Arial','B',7);
// Move to 8 cm to the right
$pdf->Cell(157);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(30,5,'Subtotal',1,0,'R');
$pdf->Cell(15,5,number_format($subto, 2),1,1,'R');





$pdf->Cell(63,5,'______________________',0,0,'R');

$pdf->Cell(94,5,'_______________________',0,0,'C');

$pdf->Cell(30,5,'Iva',1,0,'R');
$pdf->Cell(15,5,number_format($iva, 2),1,1,'R');

//$pdf->Cell(100);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(63,5,'ENTREGUE CONFORME',0,0,'R');

$pdf->Cell(94,5,'RECIBI CONFORME',0,0,'C');

$pdf->Cell(30,5,'V.Total',1,0,'R');
$pdf->Cell(15,5,number_format($toco, 2),1,1,'R');
		
		
		
					  

$pdf->Output('articulos.pdf','D');
?>
