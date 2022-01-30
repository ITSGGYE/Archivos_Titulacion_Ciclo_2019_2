<?php
 require_once 'abrebase.php';
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
	
	$Area1 = $_POST['dorsal'];
 
	//Variable donde recogemos el resultado de la consulta
	$nombre_jugador = null;
 
					if ($Area1==1)
					{
						$Area =htmlspecialchars(trim($_POST['equipo1'])); 
						$minus=strtolower(utf8_decode($Area));
				
							$Area=ucwords($minus);
						
										 
					$result222a = $mysqli->query("select *from tipoclie where  tipoclie = '$Area'  ");
					
					
						if ($result222a->num_rows > 0 )
		
						//$rows222a=mysql_num_rows($result222a);
							//if ($rows222a > 0)
							{
							
							$nombre_jugador=1;
							
							}
							
							$result222a->close();	
					
					
					
					}


					if ($Area1==2)
					{
							$apellido = htmlspecialchars(trim($_POST['equipo2']));
							$nombre = htmlspecialchars(trim($_POST['equipo1']));
							$cedul = htmlspecialchars(trim($_POST['equipo3']));
							
							
							
							
				
							$nombrecomple = $apellido." ".$nombre;
									
									
							$minus=strtolower(utf8_decode($nombrecomple));
									
							$nombrecomple=ucwords($minus);	
							
								
										 
						$result222a = $mysqli->query("select *from clientes where soc_nombreapellido = '$nombrecomple'   ");	
						
									if ($result222a->num_rows > 0 )
									{
									
									$nombre_jugador=1;
									
									}
							$result222a->close();		
										
						
						$result222a = $mysqli->query("select *from clientes where  soc_cedula = '$cedul'  ");					
								
									if ($result222a->num_rows > 0 )
									{
									
									$nombre_jugador=2;
									
									}
							$result222a->close();			
					
					
					}					
					
					
				
	
	
 
	//Mostramos el resultado. Este 'echo' será el que recibirá la conexión AJAX
	echo $nombre_jugador;
	
	
 
?>