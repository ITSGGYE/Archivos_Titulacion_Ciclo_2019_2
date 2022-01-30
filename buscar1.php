<?php require_once 'abrebase.php';
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
	
 $opa = $_POST['dorsal'];
 $nombre_jugador = null;
	//Variables recibidas por POST de nuestra conexión AJAX
	
		if ($opa==1)
	{

				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
				
				$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
				
				$cedudes = htmlspecialchars(trim($_POST['ruc4']));
		
			if ($cedudes != $descri)
			{	
			
					$result222a = $mysqli->query("select *from tipoclie where  tipoclie = '$descri'  ");
					
									
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
							
			}

			
	}			


				if ($opa==2)
	{

				$apelli = htmlspecialchars(trim($_POST['equipo1']));
				$noma = htmlspecialchars(trim($_POST['equipo2']));
				$cedula = htmlspecialchars(trim($_POST['equipo3']));
			
			
				$nombrecomple = $apelli." ".$noma;
				
				$minus=strtolower(utf8_decode($nombrecomple));
				
				$nombrecomple=ucwords($minus);
				
						
				
				$cedudes = htmlspecialchars(trim($_POST['ruc4']));
				$nomrcodi = htmlspecialchars(trim($_POST['nomre']));
			
				$minus1=strtolower(utf8_decode($nomrcodi));
				
				$nomrcodi=ucwords($minus1);
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
		if ($nomrcodi != $nombrecomple)
			{
				
					
				
				$result222 = $mysqli->query("select *from clientes where soc_nombreapellido = '$nombrecomple'   ");
				
					
				
							if ($result222->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
							
							$result222->close();	
			
			
			}
			
			if ($cedudes != $cedula)
			{	
			
					
					
					
					$result222a = $mysqli->query("select *from clientes where  soc_cedula = '$cedula'  ");		
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
							$result222a->close();	
							
			}

			
}	
		
	

					
	//Mostramos el resultado. Este 'echo' será el que recibirá la conexión AJAX
	echo $nombre_jugador;
	
	
	
 
?>


