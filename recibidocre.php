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

		$codi="";
		$codi1="";


			$result22 = $mysqli->query("select venta1 from codigo");
			if ($result22->num_rows > 0 )
				{
							$row1 = $result22->fetch_array();
							$codi=$row1[0];
							$codi= $codi + 1;
							$codi1=$row1[0];
							$codi1= $codi1 + 1;
							
				}
		$result22->close();				
				
					$mysqli->query("UPDATE codigo SET venta1= '".$codi."'" );
			
			if (strlen($codi)==1)
			$codi="REPA0000".$codi;
			if (strlen($codi)==2)
			$codi="REPA000".$codi;
			if (strlen($codi)==3)
			$codi="REPA00".$codi;
			if (strlen($codi)==4)
			$codi="REPA0".$codi;		



 $t = htmlspecialchars(trim($_POST['contafi'])); //total de filas
 
 
 
 $fecha = htmlspecialchars(trim($_POST['fec2']));
 
 
 
 
 $todesc = htmlspecialchars(trim($_POST['todesc']));
 $subdesc = htmlspecialchars(trim($_POST['subdesc']));
  $toco = htmlspecialchars(trim($_POST['toco']));
 
 
 $hora = htmlspecialchars(trim($_POST['hoin']));
 
  $idve = htmlspecialchars(trim($_POST['uni']));
  
$total = htmlspecialchars(trim($_POST['contafi1']));

$numecre = htmlspecialchars(trim($_POST['cocreto']));


$esta=1;


$fecha1=$_POST['fec2'];
 $fechaString = $fecha1;
    //el formato va acorde a la fecha como string
    $objetoFecha = DateTime::createFromFormat("d/m/Y", $fechaString );
     
    //el formato ahora es acorde a lo que ocupamos, segun mysql
    $fechana1 = $objetoFecha ->format("Y-m-d");
	
	
	$fecha2j=date("d/m/Y");
	$p1=$fecha2j;	
    $ano=substr($p1,6,4);
	
	
	
	

for($i=1; $i<=$t; $i++)
{


		if (isset($_POST['codipa'.$i]))
		 {
		   $codipro=$_POST['codipa'.$i];
		  	$pord=$_POST['pord'.$i];
			 $tdes=$_POST['tdes'.$i];
	
			$sudeiv=$_POST['sudeiv'.$i];
   

	  
   			$mysqli->query("UPDATE credito SET  fepago= '$fecha',fepago1= '$fechana1',hopago= '$hora',idv= '$idve',porinte= '$pord',tointe= '$tdes',tocobra= '$sudeiv',recipa= '$codi',reci= '$codi1',esta= '$esta' where id1 = '$codipro'" );
   	
	


	
   
			}
	



	}
	
	
$esta=1;
$opsa=0;	
///verificamos si ya se cancelo todo el credito
$consulta = $mysqli->query("SELECT * FROM credito WHERE idcred = '".$numecre."'");
while($rowcre = $consulta->fetch_array() )
{
			
			$numes=$rowcre['esta'];
			if($numes==0)
			$opsa=1;

}				

			if($opsa==0)
			{
				$mysqli->query("UPDATE datoscredito SET  esta= '$esta' where idcred = '$numecre'" );
			}

//header("Location: impreventa.php?mensaje=".urlencode($codi1)); 

header('Location: imprecobrale.php?mensaje='.urlencode($codi1).'&mensaje1='.($numecre));
?>

