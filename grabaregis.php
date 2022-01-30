<?php session_start();
require_once 'abrebase.php';
$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno(). ") " . $mysqli -> mysqli_connect_error());
}
else
{
//echo "Conexión exitosa!";
//$mysqli->set_charset('utf8');
//$mysqli -> mysqli_close();
}
$op = $_REQUEST['dorsal'];

$codi="";
		
$opas=1;



$_SESSION['codiho']=$codi;
$_SESSION['codihoy']=$codi;



if ($op == 1 )
{  
 
 		$codi="";
		
			
		

 		$des = htmlspecialchars(trim($_REQUEST['nome']));      
		
		
		$minus=strtolower(utf8_decode($des));
				
		$des=ucwords($minus);
		
	
		
			$mysqli->query("insert into tipoclie (tipoclie) VALUES ('".$des."')" );

			$result22 = $mysqli->query("SELECT MAX(idtipo) AS id FROM tipoclie");
		if ($result22->num_rows > 0 )
			{
			$row1 = $result22->fetch_array();
					$codi=$row1[0];
		
		}
			$result22->close();	


$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$des;
?>


<script type="text/javascript">

	//codiestu=0;

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;

document.miforma.codi.value =variablejs;
document.miforma.opes.value =variablejs1;
document.miforma.cedula4.value =variablejs2;
document.miforma.nombre.focus();



</script> 



<?php		
}

if ($op == 2 )
{  
 
 		$codi="";
		  $estado1="Activo";
		  
		 
  
       
		$nombre = htmlspecialchars(trim($_REQUEST['nome']));

		$minus=strtolower(($nombre));
				
		$nombre=ucwords($minus);

	
		$apellido = htmlspecialchars(trim($_REQUEST['apee']));

		$minus=strtolower(($apellido));
				
		$apellido=ucwords($minus);
		
		$nombrecomple = htmlspecialchars(trim($_REQUEST['apee']))." ".htmlspecialchars(trim($_REQUEST['nome']));


		$minus=strtolower(($nombrecomple));
				
		$nombrecomple=ucwords($minus);		


		
		$cedula = htmlspecialchars(trim($_REQUEST['cede']));
		$fecha = htmlspecialchars(trim($_REQUEST['fene']));
		$telefono = htmlspecialchars(trim($_REQUEST['tele']));
		$direccion = htmlspecialchars(trim($_REQUEST['dire']));
		$correo = htmlspecialchars(trim($_REQUEST['core']));
		$fere = htmlspecialchars(trim($_REQUEST['fere']));
		
		$genero = htmlspecialchars(trim($_REQUEST['gene']));
		
		$estado = htmlspecialchars(trim($_REQUEST['esta']));
		
		$ticli = htmlspecialchars(trim($_REQUEST['ticli'])); 

	$fecha1=$fecha;
 $fechaString = $fecha1;
 $objetoFecha = DateTime::createFromFormat("d/m/Y", $fechaString );
$id11 = $objetoFecha ->format("Y-m-d");


  $fecha2=$fere;
 $fechaString = $fecha2;
  $objetoFecha = DateTime::createFromFormat("d/m/Y", $fechaString );
  $id12 = $objetoFecha ->format("Y-m-d");			
		
		
		
		 		$codis="";
		
					$result22 = $mysqli->query("select socio from codigo");
					if ($result22->num_rows > 0 )
						{
									$row1 = $result22->fetch_array();
									$codis=$row1[0];
									$codis= $codis + 1;
									
						}
					$result22->close();
					$mysqli->query("UPDATE codigo SET socio= '".$codis."'" );
					
					if (strlen($codis)==1)
					$codis="0000".$codis;
					if (strlen($codis)==2)
					$codis="000".$codis;
					if (strlen($codis)==3)
					$codis="00".$codis;
					if (strlen($codis)==4)
					$codis="0".$codis;
		
		
		//
			
	
		
			$mysqli->query("insert into clientes (soc_cod,soc_cedula,soc_nombres,soc_apellidos,soc_nombreapellido,soc_fecha,soc_fecha1,soc_tele,soc_dire,soc_gene,soc_mail,soc_esci,soc_fein,soc_fein1,ticlie,soc_esta)VALUES('$codis','$cedula','$nombre','$apellido','$nombrecomple','$fecha','$id11','$telefono','$direccion','$genero','$correo','$estado','$fere','$id12','$ticli','$estado1')" );

			

			$result22 = $mysqli->query("SELECT MAX(soc_id) AS id FROM clientes");
		if ($result22->num_rows > 0 )
			{
			$row1 = $result22->fetch_array();
					$codi=$row1[0];
		
		}
			$result22->close();	


$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$nombrecomple;
$variablephp3 =$cedula;

?>


<script type="text/javascript">

	//codiestu=0;

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;

document.miforma.codi.value =variablejs;
document.miforma.opes.value =variablejs1;
document.miforma.nombre2.value =variablejs2;
document.miforma.cedula4.value =variablejs3;
document.miforma.cedula.focus();

</script> 



<?php		
}



if ($op == 55 )
{  
 
 		$codi="";
		  $estado1="Activo";
		  
		 
  
       
		$nombre = htmlspecialchars(trim($_REQUEST['nome']));

		$minus=strtolower(($nombre));
				
		$nombre=ucwords($minus);

	
		$apellido = htmlspecialchars(trim($_REQUEST['apee']));

		$minus=strtolower(($apellido));
				
		$apellido=ucwords($minus);
		
		$nombrecomple = htmlspecialchars(trim($_REQUEST['apee']))." ".htmlspecialchars(trim($_REQUEST['nome']));


		$minus=strtolower(($nombrecomple));
				
		$nombrecomple=ucwords($minus);		


		
		$cedula = htmlspecialchars(trim($_REQUEST['cede']));
		$usu = htmlspecialchars(trim($_REQUEST['usu']));
		$cla = htmlspecialchars(trim($_REQUEST['cla']));
	
		
		$ticli = htmlspecialchars(trim($_REQUEST['ticli'])); 

	$esta =1;
	
		
			$mysqli->query("insert into usuario(tipousuario,cedula,nombres,apellidos,nomape,usuario,clave,op)VALUES('$ticli','$cedula','$nombre','$apellido','$nombrecomple','$usu','$cla','$telefono','$esta')" );

			

			$result22 = $mysqli->query("SELECT MAX(idusuario) AS id FROM usuario");
		if ($result22->num_rows > 0 )
			{
			$row1 = $result22->fetch_array();
					$codi=$row1[0];
		
		}
			$result22->close();	


$variablephp =$codi;	
$variablephp1 =$opas;
$variablephp2 =$nombrecomple;
$variablephp3 =$cedula;
$variablephp4 =$usu;

?>


<script type="text/javascript">

	//codiestu=0;

//$.post("cuentacof.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})
var variablejs = "<?php echo $variablephp; ?>" ;
var variablejs1 = "<?php echo $variablephp1; ?>" ;
var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
var variablejs4 = "<?php echo $variablephp4; ?>" ;

document.miforma.codi.value =variablejs;
document.miforma.opes.value =variablejs1;
document.miforma.nombre2.value =variablejs2;
document.miforma.cedula4.value =variablejs3;
document.miforma.nombre3.value =variablejs4;
document.miforma.cedula.focus();

</script> 



<?php		
}


?>









	
