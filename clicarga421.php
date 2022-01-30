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

//Creado por Cesar wilmer gutierrez
//A manera de ejemplo solo lo realizo con array, pero para que realmente sea dinamico se debería traer las opciones de una base de datos.
$idpro= $_REQUEST['id'];
$opi= $_REQUEST['dorsal'];


		$opas=1;
		$codi="";
		$razon = "";
		$ruc="";
		$vida="";
	



if ($opi==2 )
	{	
	
	
		
	
		$result22 = $mysqli->query("select idop,descriopcio from opciones where idop = '$idpro'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				$codi=$idpro;
				$razon = $row1[0];
				$ruc = $row1[1];
				
	
}
$result22->close();

}

if ($opi==3 )
	{	
	
	
		
	
		$result22 = $mysqli->query("select idprog,descripro from programas where idprog = '$idpro'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				$codi=$idpro;
				$razon = $row1[0];
				$ruc = $row1[1];
				
	
}
$result22->close();

}

if ($opi==4 )
	{	
	
	
		
	
		$result22 = $mysqli->query("select idtipo1,tipousu from tipousu where idtipo1 = '$idpro'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				$codi=$idpro;
				$razon = $row1[0];
				$ruc = $row1[1];
				
	
}
$result22->close();

}


if ($opi==8 )
	{	
	
	
		
	
		$result22 = $mysqli->query("select iddees,descridees from especialidad where iddees1 = '$idpro'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				$codi=$idpro;
				$razon = $row1[0];
				$ruc = $row1[1];
				
	
}
$result22->close();

}


if ($opi==9 )
	{	
	
	
		
		$result22 = $mysqli->query("select iddepe,descridepe from lugares where iddepe1 = '$idpro'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				$codi=$idpro;
				$razon = $row1[0];
				$ruc = $row1[1];
				
	
}
$result22->close();

}


if ($opi==19 )
	{	
	
	
		
		$result22 = $mysqli->query("select iddeun,descrideun from unidades where iddeun1 = '$idpro'  ");

if ($result22->num_rows > 0 )
	{
	$row1 = $result22->fetch_array();
				

				$codi=$idpro;
				$razon = $row1[0];
				$ruc = $row1[1];
				
	
}
$result22->close();

}



	
$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$razon;
$variablephp3 =$ruc;
$variablephp4 =$vida;



?> 	
   
<script type="text/javascript">
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
var variablejs4 = "<?php echo $variablephp4; ?>" ;
document.formName.codi.value =variablejs;
document.formName.opes.value =variablejs1;
document.formName.razon.value =variablejs2;
document.formName.descri.value =variablejs3;
document.formName.vidautil.value =variablejs4;
document.formName.nombre2.value =variablejs2;
document.formName.cedula4.value =variablejs3;
document.formName.descri.focus();



</script>          
                
                
                
             
			
	
			
				