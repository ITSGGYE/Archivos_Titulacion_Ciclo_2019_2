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

$strConsulta56= $mysqli->query("SELECT * FROM tipoclie  order by tipoclie");	
	while($fila156 = $strConsulta56->fetch_array() )
		{
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
		$pdf->Cell(0,6,'INFORME DE CLIENTES REGISTRADOS', 0, 1,'C');
	
		
	
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
	



			$idconjunto=$fila156['idtipo'];
 			$descriconjunto=$fila156['tipoclie'];
			$tici=$fila156['idtipo'];
			
			
				$pdf->Ln(3);				 
   
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
	$pdf->Cell(60,6,"Tipo de Cliente......:    ".utf8_decode($descriconjunto),0,0);
	$pdf->Ln();
	$pdf->SetWidths(array(10,70,25,25,70));	
	 $pdf->SetTextColor(241);
    $pdf->SetFillColor(85,10,47);
				
				$pdf->Cell(10, 5, 'Ord', 1, 0, 'C', True);
	$pdf->Cell(70, 5, 'Cliente', 1, 0, 'C', True);
	$pdf->Cell(25, 5, 'Cedula', 1, 0, 'C', True);
	$pdf->Cell(25, 5, 'Telefono', 1, 0, 'C', True);
	$pdf->Cell(70, 5, 'Direccion', 1, 0, 'C', True);			
				
				
				
				$pdf->Ln();
		
	$strConsulta= $mysqli->query("SELECT * FROM clientes where  ticlie = '".$idconjunto."' and soc_esta = '".$modulo."'  order by soc_nombreapellido");
		
	$ord1=0;
	$toin=0;
	while($fila1 = $strConsulta->fetch_array() )
		{
			
			
			$ord1=$ord1+1;
			
			 $pdf->SetFont('Arial','B',8);
			  $pdf->SetTextColor(245);
    		$pdf->SetFillColor(85,107,47);
			
			
					$colo="";
			$copro="";
				$nomape=$fila1['soc_dire'];
							$ruc=$fila1['soc_cedula'];
							$modelo=$fila1['soc_nombreapellido'];
							$marca=$fila1['soc_tele'];
				
						
					srand(microtime()*1000000);	
							$p=$p1;	
					$pdf->SetAligns(array('R','L','R','R','J','R','R','R'));			

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
				$ord="";
				
				$pdf->SetFont('Arial','',8);
				
				$pdf->Row(array($ord1,utf8_decode(substr($modelo, 0, 35)),$ruc,$marca,utf8_decode(substr($nomape, 0, 37))));
				
				
			}
							
			
	
							  	
}
	   


					  

$pdf->Output('clientes.pdf','D');
?>
