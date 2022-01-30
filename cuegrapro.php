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

$op= $_POST["opcion1"];
$pro= $_POST["proga"];

$ugador=0;
$deta="";
	
				$result222a = $mysqli->query("select *from opciopro where  idpro = '$pro'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$ugador=1;
								$deta="El programa no puede ser asignado a la opcion ya que ya se encuetra asignado";
							}
				
$variablephp1 =$deta;	

							if ($ugador==0 )
							{
		
					$mysqli->query("INSERT INTO opciopro(idop,idpro)VALUES('$op','$pro')" );

							}
		
?>

<script type="text/javascript">

	//codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("cueop.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

var variablejs1 = "<?php echo $variablephp1; ?>" ;
document.formName.deta.value =variablejs1;
		

</script> 
