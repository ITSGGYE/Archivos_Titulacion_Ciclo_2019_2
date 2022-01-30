<?php  require_once 'abrebase.php';
	//Configuracion de la conexion a base de datos
	 $mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
. ") " . $mysqli -> mysqli_connect_error());
}
else
{
//echo "Conexión exitosa!";
$mysqli->set_charset('utf8');
//$mysqli -> mysqli_close();
}

	//Variables recibidas por POST de nuestra conexión AJAX
	

	
	$op = $_POST['dorsal'];
	
$nombre_jugador = null;	


if ($op == 1 )
{
				
				$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
					$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
						$codig = $codigo;
					//Variable donde recogemos el resultado de la consulta
					
				$result222a = $mysqli->query("select *from modulos where  indice = '$codigo'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}			
							
								
				
				$result222a = $mysqli->query("select *from modulos where  descrimar = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
			
}		


if ($op == 2 )
{
				
				$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
					$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
						$codig = $codigo;
					//Variable donde recogemos el resultado de la consulta
					
								
				
				$result222a = $mysqli->query("select *from opciones where  descriopcio = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
			
}		

if ($op == 3 )
{
				
				$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
					
						$codig = $codigo;
					//Variable donde recogemos el resultado de la consulta
					
								
				
				$result222a = $mysqli->query("select *from programas where  descripro = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
			
}		

if ($op == 4 )
{
				
				$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
					$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
						$codig = $codigo;
					//Variable donde recogemos el resultado de la consulta
					
								
				
				$result222a = $mysqli->query("select *from tipousu where  tipousu = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
			
}	



if ($op==55)
	{
	
	
$nombre = htmlspecialchars(trim($_POST['nom']));
	$ape = htmlspecialchars(trim($_POST['ape']));
	$cedula = htmlspecialchars(trim($_POST['ced']));
	$usu = htmlspecialchars(trim($_POST['usu']));
	


				$minus=strtolower(utf8_decode($ape));
				
				$ape=ucwords($minus);
				

				$minus=strtolower(utf8_decode($nombre));
				
				$nombre=ucwords($minus);	
				
				$nombrecomple = $ape." ".$nombre;		
	
	
	
		$result222a = $mysqli->query("select *from usuario where nomape = '$nombrecomple'   ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
	
	
	
	
						
			
					$reult222a = $mysqli->query("select *from usuario where cedula = '$cedula'   ");					
						
							if ($reult222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
			
		
			
			
			
					$result2a = $mysqli->query("select *from usuario where usuario = '$usu'   ");					
						
							if ($result2a->num_rows > 0 )
							{
							
							$nombre_jugador=3;
							
							}
			
			
		}	
	


if ($op == 6 )
{
			  
 		
				$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				$descri1 = htmlspecialchars(trim($_POST['equipo2']));
				
					$minus=strtolower(utf8_decode($descri));
					$minus1=strtolower(utf8_decode($descri1));
				
				$descri=ucwords($minus);
				$descri1=ucwords($minus1);
				
				$des=$descri." ".$descri1;
				
						$codig = $codigo;
					//Variable donde recogemos el resultado de la consulta
					
				$result222 = $mysqli->query("select *from pacientes where cedupa = '$codig'   ");	
				
							if ($result222->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
							
	
							
							
				
				$result222a = $mysqli->query("select *from pacientes where  nombrecomple = '$des'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
			
}	




if ($op == 61 )
{
		
				$doct = htmlspecialchars(trim($_POST['doct']));
				$feci = htmlspecialchars(trim($_POST['feci']));
				$hoci = htmlspecialchars(trim($_POST['hoci']));
				
				
				
					
					//Variable donde recogemos el resultado de la consulta
					
				$result222 = $mysqli->query("select *from citas where iddoc = '$doct' and feci = '$feci' and hoci = '$hoci'   ");	
				
							if ($result222->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
							
	
							
							
				
}		

	


if ($op == 7 )
{
			  
 		
				$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				$descri1 = htmlspecialchars(trim($_POST['equipo2']));
				
					$minus=strtolower(utf8_decode($descri));
					$minus1=strtolower(utf8_decode($descri1));
				
				$descri=ucwords($minus);
				$descri1=ucwords($minus1);
				
				$des=$descri." ".$descri1;
				
						$codig = $codigo;
					//Variable donde recogemos el resultado de la consulta
					
				$result222 = $mysqli->query("select *from profesionales where cedume = '$codig'   ");	
				
							if ($result222->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
							
	
							
							
				
				$result222a = $mysqli->query("select *from profesionales where  nombrecomple = '$des'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
			
}		


if ($op == 8 )
{
				
				$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
					$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
						$codig = $codigo;
					//Variable donde recogemos el resultado de la consulta
					
				
							
								
				
				$result222a = $mysqli->query("select *from especialidad where  descridees = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
			
}		

if ($op == 9 )
{
				
				$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
					$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
						$codig = $codigo;
					//Variable donde recogemos el resultado de la consulta
					
				
							
								
				
				$result222a = $mysqli->query("select *from lugares where  descridepe = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
			
}		
	
if ($op == 10 )
{
				
				$codigo = htmlspecialchars(trim($_POST['equipo']));
				
				
							
								
				
				$result222a = $mysqli->query("select *from moduopcio where  idopci = '$codigo'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
			
}		
		

	//Mostramos el resultado. Este 'echo' será el que recibirá la conexión AJAX
	echo $nombre_jugador;

 
?>


