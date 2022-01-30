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

	

	
				
					
			
$topa1=0;					

$modulo = "Activo";


 $sub=0;
	   $iva=0;
	    $topa=0;	
		$descue=0;

	
	$ord1=1;
	$toin=0;


			$pdf->AddPage();

$pdf->SetMargins(5,10,0);
   srand(microtime()*1000000);	
							

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

$pdf->SetAligns(array('L','L'));


$pdf->SetFont('Arial','B',12);
	$pdf->Cell(0,6,'', 0, 1,'C'); 
		$pdf->Cell(0,6,'Registro y Control de Cuentas Por Cobrar', 0, 1,'C'); 
		$pdf->Cell(0,6,'COASTMAN ECUADOR CONSULTORA Cia. Ltda.', 0, 1,'C');
		$pdf->Cell(0,6,'INFORME DE CUENTAS POR COBRAR', 0, 1,'C');
	
		
	
	$pdf->Ln(2);
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(60,6,'Fecha de Informe ',0,0);
	$pdf->Cell(0,6,$fecha,0,1);
	
	
	
	
			
	
	
	
	
	$pdf->Ln(2);
	
			
		
	
	
	
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
	
	
			
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

					   $exi="";
						 
   $pdf->SetTextColor(241);
    $pdf->SetFillColor(85,10,47);
	
	
	
	///grabar en tabla compras
	
	
	
	$concepto="";
	



			
				$pdf->Ln(3);				 
   
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
	
	$pdf->SetWidths(array(7,17,50,20,17,10,10,17,17,17,17));	
	 $pdf->SetTextColor(241);
    $pdf->SetFillColor(85,10,47);
				
				$pdf->Cell(7, 5, 'Ord', 1, 0, 'C', True);
				$pdf->Cell(17, 5, '#Cuenta', 1, 0, 'C', True);
	$pdf->Cell(50, 5, 'Cliente', 1, 0, 'C', True);
	$pdf->Cell(20, 5, 'Fec.Ini', 1, 0, 'C', True);
	$pdf->Cell(17, 5, 'Valor', 1, 0, 'C', True);
	$pdf->Cell(10, 5, '%tasa', 1, 0, 'C', True);	
	$pdf->Cell(10, 5, 'plazo', 1, 0, 'C', True);	
	$pdf->Cell(17, 5, 'cuota', 1, 0, 'C', True);	
	$pdf->Cell(17, 5, 'Deuda', 1, 0, 'C', True);	
	$pdf->Cell(17, 5, 'Abono', 1, 0, 'C', True);
	$pdf->Cell(17, 5, 'Debe', 1, 0, 'C', True);				
				
		
				
				$pdf->Ln();
			 $ano=0;
		
	
$consulta = $mysqli->query("select * from datoscredito where esta = '$ano' order by factu");
	
		$i=0;	
	$ord1=0;
	$toin=0;
	while($datocliente = $consulta->fetch_array() )
		{
			
			
			$ord1=$ord1+1;
			
			 $pdf->SetFont('Arial','B',8);
			  $pdf->SetTextColor(245);
    		$pdf->SetFillColor(85,107,47);
			
			
					$colo="";
			 $i=$i+1;
			 
			 
			 
			 		$codi4y=$datocliente['idcred'];
			


				$deuto=0;
				$cancela=0;
				$debe=0;
				$consultaf = $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codi4y."'");
				while($rowcref = $consultaf->fetch_array() )
				{
							
							$numes=$rowcref['esta'];
							$deus=$rowcref['cuo'];
							$deuto=$deuto+$deus;
							if($numes==0)
							$debe=$debe+$deus;
							else
							$cancela=$cancela+$deus;
							
				
				}				
			 
			 
			 
			 $descli="";
						$idca=$datocliente['idven'];
			
 			$idvent=$datocliente['idven'];

			$nombre="";
				
			
			
			$idpro="";
			$idpro=$datocliente['idcli'];

			
			
									$result22 = $mysqli->query("select soc_nombreapellido from clientes where soc_id = '$idpro'  ");
				
				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
								
				
					
								$nombre =  $row1[0];
							
								
											
								
				}
				$result22->close();
				
						
					srand(microtime()*1000000);	
							$p=$p1;	
					$pdf->SetAligns(array('R','L','L','R','R','R','R','R','R','R','R','R','R'));			

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
				$ord="";
				
				$pdf->SetFont('Arial','',8);
				
				$pdf->Row(array($ord1,$datocliente['factu'],utf8_decode(substr($nombre, 0, 35)),$datocliente['fecha'],number_format($datocliente['valcre'], 2, ".", ""),$datocliente['taza'],$datocliente['pla'],$datocliente['cuota'],number_format($deuto, 2, ".", ""),number_format($cancela, 2, ".", ""),number_format($debe, 2, ".", "")));
	
							  	
}


					  

$pdf->Output('cuenas.pdf','D');
?>
