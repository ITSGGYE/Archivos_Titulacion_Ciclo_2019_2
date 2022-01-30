<?php 
require_once 'abrebase.php';
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
	 
  $creant = htmlspecialchars(trim($_POST['cocre'])); //
  $facre = htmlspecialchars(trim($_POST['facre']));
  

  
  
  
 $idcli = htmlspecialchars(trim($_POST['codi'])); //
  $ticue = htmlspecialchars(trim($_POST['ticue']));
  $forpa = htmlspecialchars(trim($_POST['forpa']));
  $idve = htmlspecialchars(trim($_POST['uni']));
 
 
 
 $fecha = htmlspecialchars(trim($_POST['fec']));
 $hora = htmlspecialchars(trim($_POST['hoin']));
 
 
 
 		$fecha2j=date("d/m/Y");
	$p1=$fecha2j;	
    $ano=substr($p1,6,4);
 
 


////variables de credito
$cre18 = htmlspecialchars(trim($_POST['cre18']));
$taz = htmlspecialchars(trim($_POST['taz']));
$mes = htmlspecialchars(trim($_POST['mes']));
$cuota = htmlspecialchars(trim($_POST['copa']));


$fecre=$_POST['fec'];
 $fechaString2 = $fecre;
    //el formato va acorde a la fecha como string
    $objetoFecha2 = DateTime::createFromFormat("d/m/Y", $fechaString2 );
     
    //el formato ahora es acorde a lo que ocupamos, segun mysql
    $fecre1 = $objetoFecha2 ->format("Y-m-d");


////seccion de credito si lo llegase haber

$sicre=0;
$codicre1=0;
if ($cre18>0)
{
	///grabamos en la tabla datos credito
	$sicre=1;
			$codicre="";
			$codicre1=0;


			$result22 = $mysqli->query("select cred from codigo");
			if ($result22->num_rows > 0 )
				{
							$row1 = $result22->fetch_array();
							$codicre=$row1[0];
							$codicre= $codicre + 1;
							$codicre1=$row1[0];
							$codicre1= $codicre1 + 1;
							
				}
				$result22->close();
				
					$mysqli->query("UPDATE codigo SET cred= '".$codicre."'" );
			
			if (strlen($codicre)==1)
			$codicre="CRE0000".$codicre;
			if (strlen($codicre)==2)
			$codicre="CRE000".$codicre;
			if (strlen($codicre)==3)
			$codicre="CRE00".$codicre;
			if (strlen($codicre)==4)
			$codicre="CRE0".$codicre;	
			
			
			
			////calculamos credito

			$cre = htmlspecialchars(trim($_POST['cre18']));
			$taz = htmlspecialchars(trim($_POST['taz']));
			$mes = htmlspecialchars(trim($_POST['mes']));
			$fec = $_POST['fec'];
			
			
			
			  $esta2=2;
  ///actualizamos el credito que feue refinanciado y ponemos su estado a 2 que significa cancelaso por refinancciaminto
  $mysqli->query("UPDATE datoscredito SET  esta= '$esta2',idcrefi= '$codicre1',facrefi= '$codicre' where idcred = '$creant'" );
  
  $factufa ="";
  				$result22 = $mysqli->query("select factu from datoscredito where idcred = '$creant'  ");
				
				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
								
						
							$factufa =$row1[0];
			}
				$result22->close();
			
		

		$estacre=0;
	$mysqli->query("INSERT INTO datoscredito (idcred,idcli,valcre,taza,pla,fecha,fechain,cuota,factu,perio,esta,idticue,idfpa,idven,hora,idcrefi,facrefi)VALUES('$codicre1','$idcli','$cre18','$taz','$mes','$fecre','$fecre1','$cuota','$codicre','$ano','$estacre','$ticue','$forpa','$idve','$hora','$creant','$factufa')" );	
	


	
	/////generamos la tabla de amortiacion

$size = count($_POST['idp']);

    $i = 0;
    while ($i < $size) 
	{
	  
	   $np1 = $_POST['idpa'][$i];

	   $pizza  = $np1;
		$pieces = explode("-", $pizza);
		$isa= $pieces[0]; // piece1
		$fepa= $pieces[1]; // piece1
		
		$cre3= $pieces[2]; // piece1
		$capi= $pieces[3]; // piece1
		$inte= $pieces[4]; // piece1
		$couta= $pieces[5]; // piece1
		$sal= $pieces[6]; // piece1
	
		$fecre3=$fepa;
 $fechaString23 = $fecre3;
    //el formato va acorde a la fecha como string
    $objetoFecha23 = DateTime::createFromFormat("d/m/Y", $fechaString23 );
     
    //el formato ahora es acorde a lo que ocupamos, segun mysql
    $fecre13 = $objetoFecha23 ->format("Y-m-d");
	
	  
		$mysqli->query("INSERT INTO credito (idcred,perio,fecpa,fecpa1,sald,capi,inte,cuo,salf,esta)VALUES('$codicre1','$isa','$fepa','$fecre13','$cre3','$capi','$inte','$couta','$sal','$estacre')" );

   ++$i;
	   }	
	
				

		
}

$codi2=$codi1+1;
//header("Location: impreventa.php?mensaje=".urlencode($codi1)); 

header('Location: imprerefi.php?creanti='.urlencode($creant).'&crenue='.($codicre1));



?>

