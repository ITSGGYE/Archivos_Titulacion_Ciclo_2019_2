<?php require_once 'abrebase.php';
$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno(). ") " . $mysqli -> mysqli_connect_error());
}
else
{
//echo "Conexión exitosa!";

//$mysqli -> mysqli_close();
}
$op = $_REQUEST['dorsal'];


if ($op == 1 )
{  
 
  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
 		$des = htmlspecialchars(trim($_REQUEST['nome']));      
		
		
		$minus=strtolower(utf8_decode($des));
				
				$des=ucwords($minus);
		
		
	$mysqli->query("UPDATE tipoclie SET  tipoclie = '$des' where idtipo = '$codi'" );	
    
		

$variablephp3 =$des;
?>
<script type="text/javascript">

var variablejs3 = "<?php echo $variablephp3; ?>" ;

document.miforma.cedula4.value =variablejs3;
document.miforma.nombre.focus();

</script> 
<?php 	
}




if ($op == 2 )
{  
 
  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
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
		
		
	
 
 $mysqli->query("UPDATE clientes SET soc_nombres = '$nombre',soc_apellidos= '$apellido',soc_nombreapellido = '$nombrecomple',soc_cedula = '$cedula',soc_fecha = '$fecha',soc_fecha1 = '$id11',soc_tele = '$telefono',soc_dire = '$direccion',soc_gene = '$genero',soc_mail = '$correo',soc_esci = '$estado',soc_fein = '$fere',soc_fein1 = '$id12',ticlie = '$ticli' where soc_id= '$codi' ") ;
 
 		
$variablephp2 =$nombrecomple;
$variablephp3 =$cedula;
?>
<script type="text/javascript">

var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;

document.miforma.nombre2.value =variablejs2;
document.miforma.cedula4.value =variablejs3;
document.miforma.cedula.focus();

</script> 
<?php 	
}


if ($op == 55 )
{  
 
  //datos del estudiante
        $codi= htmlspecialchars(trim($_REQUEST['code']));
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
		
		
	
 
 $mysqli->query("UPDATE usuario SET tipousuario = '$ticli',cedula = '$cedula',nombres = '$nombre',apellidos= '$apellido',nomape = '$nombrecomple',usuario = '$usu',clave = '$cla' where idusuario= '$codi' ") ;
 
 
  
 		
$variablephp2 =$nombrecomple;
$variablephp3 =$cedula;
$variablephp4 =$usu;
?>
<script type="text/javascript">

var variablejs2 = "<?php echo $variablephp2; ?>" ;
var variablejs3 = "<?php echo $variablephp3; ?>" ;
var variablejs4 = "<?php echo $variablephp4; ?>" ;

document.miforma.nombre2.value =variablejs2;
document.miforma.cedula4.value =variablejs3;
document.miforma.nombre3.value =variablejs4;
document.miforma.cedula.focus();

</script> 
<?php 	
}

?>

