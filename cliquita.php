<?php require_once 'abrebase.php';
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
$op = $_REQUEST['dorsal'];

		$codi="";




$opas=1;




if ($op == 10 )
{  
 
 		

 		$comodu = htmlspecialchars(trim($_REQUEST['codiestu']));  
		$comodu1 = htmlspecialchars(trim($_REQUEST['id']));    
	$mysqli->query("delete from moduopcio where id = '$comodu1'" );
		
	
$variablephp =$comodu;	

?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
codiestu=variablejs;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cuemoduop.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})


		

</script> 



<?php		
}




if ($op == 2 )
{  
 
 		

 		$comodu = htmlspecialchars(trim($_REQUEST['codiestu']));  
		$comodu1 = htmlspecialchars(trim($_REQUEST['id']));    
	$mysqli->query("delete from opciopro where id = '$comodu1'" );
		
	
$variablephp =$comodu;	

?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
codiestu=variablejs;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cueop.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})


		

</script> 



<?php		
}



if ($op == 11 )
{  
 
 	
 		$idop = htmlspecialchars(trim($_REQUEST['idop']));  
		$idtipo = htmlspecialchars(trim($_REQUEST['idtipo'])); 
		$op3 = htmlspecialchars(trim($_REQUEST['op']));  
		$idt = htmlspecialchars(trim($_REQUEST['idt'])); 
		
		if ($op3 == 0 )
		{ 
			$mysqli->query("INSERT INTO protipo(idtipo,idpro1)VALUES('$idtipo','$idop')" );
		}


		if ($op3 == 1 )
		{ 
			$mysqli->query("delete from protipo where id = '$idt'" );
		}		
		
	
$variablephp =$idtipo;	

?>


<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
codiestu=variablejs;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
$.post("tipoopci.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})


		

</script> 



<?php		
}

?>









	
