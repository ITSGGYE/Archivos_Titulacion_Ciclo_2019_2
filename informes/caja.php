<?php
require('mc_table.php');

require('conexion.php');

	
	
	$fecha=date("d/m/Y"); 
	
	
		$id = $_POST['popup_container2'];
	$id1 = $_POST['popup_container'];
	
	$fecha1=$id;
 $fechaString = $fecha1;
 $objetoFecha = DateTime::createFromFormat("d/m/Y", $fechaString );
$id11 = $objetoFecha ->format("Y-m-d");
  $fecha2=$id1;
 $fechaString = $fecha2;
  $objetoFecha = DateTime::createFromFormat("d/m/Y", $fechaString );
  $id12 = $objetoFecha ->format("Y-m-d");	
  
  
		mysql_connect("localhost","root","") or die ("No se pudo establecer la conexion!!!!"); //Conexiones por default del servidor de wampp
mysql_select_db("permisos") or die ("Imposible conectar a la base de datos!!!!"); //Seleecionas tu base
			


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


$con = new DB;
	$pacientes = $con->conectar();	
			
	
	



$direccion="Este documento es un apéndice de mi proyecto fin de carrera. Lo escribí después de leer tres o fgh gf hgfh";
//$pdf=new PDF('L','mm','A4');
//$pdf=new PDF_MC_Table('L','mm','A4');
$pdf=new PDF_MC_Table();


//$pdf=new PDF_MC_Table();
$pdf->AddPage();

$pdf->SetMargins(5,20,20);
	$pdf->Ln(10);

    

	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(0,6,'', 0, 1,'C'); 
		$pdf->Text(50,40,'MUNICIPIO DESCENTRALIZADO DE PLAYAS',0,'C', 0);
	$pdf->Text(80,48,'PLAYAS ECUADOR',0,'C', 0);
	$pdf->Text(60,56,'INGRESO A CAJA',0,'C', 0);
	
	
	$pdf->Ln(17);
	$pdf->SetFont('Arial','',12);
	
	
	$pdf->Cell(0,6,'Fecha de reporte...:'.$fecha,0,1); 
	$pdf->Cell(0,6,'Fecha Inicio.......:'.$id,0,1); 
	$pdf->Cell(0,6,'Fecha fin.......:'.$id1,0,1); 
	
	$pdf->Ln(4);
	//$pdf->Cell(85, 5, 'Vida Util  '.$vidautil.' Años', 0, 0,  False);
//	$pdf->Cell(0,6,'Libro de Activo Fijo ',0,1);
	//	$pdf->Cell(85, 5, 'Fecha Adquisión '.$feadqui, 0, 0,  False);
	//$pdf->Cell(0,6,'Valor Bien  $'.($valoruni, 2),0,1);
			
	
	
	
	
	


				
		//		$depreanu=mysql_result($result2211,0,3);
			
		
	
	$historial = $con->conectar();	
	
	
	$p=78;
		$tota=0;
			$i1=0;
			$i2=0;
			$p1=55;
			
			
        // Primero establece Donde estará la esquina superior izquierda donde estará tu celda
$pdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor(0, 0, 255); // establece el color del fondo de la celda (en este caso es AZUL
//$pdf->Cell(145, 20, 'LETRERO', 1, 0, 'C', True); // en orden lo que informan estos parametros es: 		
				
 
	
	$faltan=0;
	
	 $pdf->SetFont('Arial','B',10);
	 $pdf->SetFont('Arial','B',10);
 
   $pdf->SetTextColor(245);
    $pdf->SetFillColor(85,107,47);
	
	
		//$pdf->Row(array('Ord','Bien','Marca','Modelo','Fec. Rec.','Valor','Estado','Observacion'));			
		//$pdf->Row(array('Ord','Codigo','Est. Inicial','Existencia','         Est. Actual','Observacion','               Bien'));			
	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

					   $exi="";
		$pdf->Ln(4);				 
   $pdf->SetTextColor(245);
    $pdf->SetFillColor(85,107,47);
	$pdf->Cell(10, 5, 'Ord', 1, 0, 'C', True);
	$pdf->Cell(20, 5, 'Nº Solicitud', 1, 0, 'C', True);
	$pdf->Cell(40, 5, 'Local', 1, 0, 'C', True);
	$pdf->Cell(40, 5, 'Propietario', 1, 0, 'C', True);
	$pdf->Cell(40, 5, 'Tipo Permiso', 1, 0, 'C', True);
	$pdf->Cell(20, 5, 'Valor', 1, 0, 'C', True);
	
	


	$concepto="";
	
	
	
	$pdf->Ln();
	
				$pdf->SetWidths(array(10,20,40,40,40,20,30,30,30,30));	
					srand(microtime()*1000000);	
							$p=$p1;	

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);

$pdf->SetAligns(array('L','L'));

			

$strConsulta = "SELECT * from m_pago where (pag_fecha1 >= '$id11' and  pag_fecha1 <= '$id12') ";
	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);
	$ord1=1;
	$p=78;
	$topa=0;
	$topa1=0;
	$topa2=0;
	$topa3=0;
	$topa4=0;
	$topa5=0;
	for ($i=0; $i<$numfilas; $i++)
		{
			$ord1=$ord1+1;
			$fila = mysql_fetch_array($historial);
			 $pdf->SetFont('Arial','B',10);
			  $pdf->SetTextColor(245);
    		$pdf->SetFillColor(85,107,47);
					
					srand(microtime()*1000000);	
							$p=$p1;	
					$pdf->SetAligns(array('R','L','L','L','L','R','R','R','R','R','R'));	
					
					
					
					$emple=$fila['pag_soli'];
			
			
			$nombreco="";
			$nombreco1="";
			
			 
			 $result211 = mysql_query("select sol_idloca,sol_tipe from m_solicita where sol_codi = '$emple' ");
			$rows211=mysql_num_rows($result211);
			if ($rows211 > 0)
			{
				$nombreco = mysql_result($result211,0,0);
				$nombreco1 = mysql_result($result211,0,1);
	
			}
			



			$tipermiso="";
		
			
			 
			 $result211x = mysql_query("select per_desc from m_permisos where per_id = '$nombreco1' ");
			$rows211x=mysql_num_rows($result211x);
			if ($rows211x > 0)
			{
				$tipermiso = mysql_result($result211x,0,0);
			
	
			}

			$nombreloca="";
			$idpro="";
			
			 
			 $result211v = mysql_query("select nombres,idpropie from  locales where id = '$nombreco' ");
			$rows211v=mysql_num_rows($result211v);
			if ($rows211v > 0)
			{
				$nombreloca = mysql_result($result211v,0,0);
				$idpro = mysql_result($result211v,0,1);
	
			}
						
	
		$propieta="";
		
			
			 
			 $result211xx = mysql_query("select nomape from  cliente where id = '$idpro' ");
			$rows211xx=mysql_num_rows($result211xx);
			if ($rows211xx > 0)
			{
				$propieta = mysql_result($result211xx,0,0);
			
	
			}
	
	
	
			
			$topa= $topa + $fila['pag_valo'];
		
				
			
		
			//////////
			
			
			
		

	  $pdf->SetFillColor(192,192,192);
    			$pdf->SetTextColor(0);
	
				$ord="";
				
				
				
				
				
				
				$pdf->Row(array($i + 1,$fila['pag_soli'],$nombreloca,$propieta,$tipermiso, number_format($fila['pag_valo'], 2)));
				
				
				
				
				
			}
							  	
	$i="";
		$insu="";
			$descri = "";
			$nombreco = "Totales";
			$precio= $topa;
			
			$pdf->Row(array($i,$insu,$insu,$insu,$nombreco, number_format($topa, 2)));
			
			
			
			
			
			
		
						
							  
							  
							  

$pdf->Output('caja.pdf','D');
?>
