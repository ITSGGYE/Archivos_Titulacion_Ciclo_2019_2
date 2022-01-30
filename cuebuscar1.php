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

			
						$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
				$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
				
				
				$des=$descri;
				
				
					$codig = $codigo;
	
						
				
				$cedudes = htmlspecialchars(trim($_POST['ruc4']));
				$nomrcodi = htmlspecialchars(trim($_POST['nomre']));
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
		if ($nomrcodi != $codig)
			{
				
					
				
				$result222a = $mysqli->query("select *from modulos where  indice = '$codig'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}			
							
			
			
			}
			
			if ($cedudes != $des)
			{	
			
					
					
				$result222a = $mysqli->query("select *from modulos where  descrimar = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
							
			}

			
}	

			if ($opa==2)
	{

			
						$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
				$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
				
				
				$des=$descri;
				
				
					$codig = $codigo;
	
						
				
				$cedudes = htmlspecialchars(trim($_POST['ruc4']));
				$nomrcodi = htmlspecialchars(trim($_POST['nomre']));
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
			if ($cedudes != $des)
			{	
			
					
					
				$result222a = $mysqli->query("select *from opciones where  descriopcio = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
							
			}

			
}	
			if ($opa==3)
	{

			
						$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
			
				
				
				$des=$descri;
				
				
					$codig = $codigo;
	
						
				
				$cedudes = htmlspecialchars(trim($_POST['ruc4']));
				$nomrcodi = htmlspecialchars(trim($_POST['nomre']));
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
			if ($cedudes != $des)
			{	
			
					
					
				$result222a = $mysqli->query("select *from programas where  descripro = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
							
			}

			
}	

			if ($opa==4)
	{

			
						$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
				$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
				
				
				$des=$descri;
				
				
					$codig = $codigo;
	
						
				
				$cedudes = htmlspecialchars(trim($_POST['ruc4']));
				$nomrcodi = htmlspecialchars(trim($_POST['nomre']));
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
			if ($cedudes != $des)
			{	
			
					
					
				$result222a = $mysqli->query("select *from tipousu where  tipousu = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
							
			}

			
}	



			if ($opa==55)
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
				
				
				$cedudes = htmlspecialchars(trim($_POST['ced1']));
				$nombreco = htmlspecialchars(trim($_POST['nomre']));
				$usu1 = htmlspecialchars(trim($_POST['usu1']));
	
 
	//Variable donde recogemos el resultado de la consulta
	
			if ($cedudes != $cedula)
			{	
			
					
					
			
					$reult222a = $mysqli->query("select *from usuario where cedula = '$cedula'   ");					
						
							if ($reult222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
	
	
	
							
			}

			if ($nombrecomple != $nombreco)
			{	
			
					
					
		$result222a = $mysqli->query("select *from usuario where nomape = '$nombrecomple'   ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
							
			}
			

			if ($usu != $usu1)
			{	
			
					
					
						$result2a = $mysqli->query("select *from usuario where usuario = '$usu'   ");					
						
							if ($result2a->num_rows > 0 )
							{
							
							$nombre_jugador=3;
							
							}
							
			}						

			
}	




			if ($opa==6)
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
	
						
				
				$cedudes = htmlspecialchars(trim($_POST['ruc4']));
				$nomrcodi = htmlspecialchars(trim($_POST['nomre']));
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
		if ($nomrcodi != $codig)
			{
				
					
				
				$result222 = $mysqli->query("select *from pacientes where cedupa = '$codig'    ");	
					
				
							if ($result222->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
			
			
			}
			
			if ($cedudes != $des)
			{	
			
					
					
					
					$result222a = $mysqli->query("select *from pacientes where  nombrecomple = '$des' ");			
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
							
			}

			
}	



			if ($opa==61)
	{

					$doct = htmlspecialchars(trim($_POST['doct']));
				$feci = htmlspecialchars(trim($_POST['feci']));
				$hoci = htmlspecialchars(trim($_POST['hoci']));
				
				
									$doct1 = htmlspecialchars(trim($_POST['doct1']));
				$feci1 = htmlspecialchars(trim($_POST['feci1']));
				$hoci1 = htmlspecialchars(trim($_POST['hoci1']));
	
						
				
			
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
		if ($doct != $doct1 or $feci != $feci1 or $hoci != $hoci1 )
			{
				
					
				
				$result222 = $mysqli->query("select *from citas where iddoc = '$doct' and feci = '$feci' and hoci = '$hoci'   ");
					
				
							if ($result222->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
			
			
			}
			
		
			
}	

			if ($opa==62)
	{

					$doct = htmlspecialchars(trim($_POST['doct']));
				$feci = htmlspecialchars(trim($_POST['feci']));
				$hoci = htmlspecialchars(trim($_POST['hoci']));
				
				
									$doct1 = htmlspecialchars(trim($_POST['doct1']));
				$feci1 = htmlspecialchars(trim($_POST['feci1']));
				$hoci1 = htmlspecialchars(trim($_POST['hoci1']));
	
						
				
			
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
		if ($doct != $doct1 or $feci != $feci1 or $hoci != $hoci1 )
			{
				
					
				
				$result222 = $mysqli->query("select *from citas where iddoc = '$doct' and feci = '$feci' and hoci = '$hoci'   ");
					
				
							if ($result222->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
			
			
			}
			
		
			
}	




			if ($opa==7)
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
	
						
				
				$cedudes = htmlspecialchars(trim($_POST['ruc4']));
				$nomrcodi = htmlspecialchars(trim($_POST['nomre']));
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
		if ($nomrcodi != $codig)
			{
				
					
				
				$result222 = $mysqli->query("select *from profesionales where cedume = '$codig'    ");	
					
				
							if ($result222->num_rows > 0 )
							{
							
							$nombre_jugador=1;
							
							}
			
			
			}
			
			if ($cedudes != $des)
			{	
			
					
					
					
					$result222a = $mysqli->query("select *from profesionales where  nombrecomple = '$des' ");			
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
							
			}

			
}	




		if ($opa==8)
	{

						$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
				$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
				
				
					$codig = $codigo;
	
						
				
				$cedudes = htmlspecialchars(trim($_POST['ruc4']));
				$nomrcodi = htmlspecialchars(trim($_POST['nomre']));
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
		
			
			
			if ($cedudes != $descri)
			{	
			
					
					
					$result222a = $mysqli->query("select *from especialidad where  descridees = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
							
			}

			
}			

		if ($opa==9)
	{

						$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
				$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
				
				
					$codig = $codigo;
	
						
				
				$cedudes = htmlspecialchars(trim($_POST['ruc4']));
				$nomrcodi = htmlspecialchars(trim($_POST['nomre']));
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
		
			
			
			if ($cedudes != $descri)
			{	
			
					
					$result222a = $mysqli->query("select *from lugares where  descridepe = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
							
			}

			
}			
		if ($opa==19)
	{

						$codigo = htmlspecialchars(trim($_POST['equipo']));
				$descri = htmlspecialchars(trim($_POST['equipo1']));
				
				$minus=strtolower(utf8_decode($descri));
				
				$descri=ucwords($minus);
				
				
					$codig = $codigo;
	
						
				
				$cedudes = htmlspecialchars(trim($_POST['ruc4']));
				$nomrcodi = htmlspecialchars(trim($_POST['nomre']));
	

	
 
	//Variable donde recogemos el resultado de la consulta
	
		
			
			
			if ($cedudes != $descri)
			{	
			
					
					$result222a = $mysqli->query("select *from unidades where  descrideun = '$descri'  ");					
						
							if ($result222a->num_rows > 0 )
							{
							
							$nombre_jugador=2;
							
							}
							
			}

			
}			
					
	//Mostramos el resultado. Este 'echo' será el que recibirá la conexión AJAX
	echo $nombre_jugador;
	
	
	
 
?>


