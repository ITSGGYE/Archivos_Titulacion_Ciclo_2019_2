<?php session_start(); 
	
	require_once "abrebase.php";
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
	

	$usuario = htmlspecialchars(trim($_POST['cuenta']));
$clave = htmlspecialchars(trim($_POST['clave']));
	
	$ve=0;
	
 
 $result211 = $mysqli->query("SELECT usuario,nombres,apellidos,idusuario,tipousuario FROM usuario WHERE usuario='".$usuario."' and clave='".$clave."'");

	
if ($result211->num_rows > 0 ){

			
			$user = $result211->fetch_array();

	
				
				$_SESSION['usuario'] = mysql_result($result211,0,0);
				
				$ve=1;
				
		$_SESSION['fullnombre']= $user["nombres"] ;
		$_SESSION['fullnombre1']= $user["apellidos"];
			
		
			$_SESSION['usuario']=$user["usuario"];
			$_SESSION['idusuario']=$user['idusuario'];
			$_SESSION['coditipousu'] = $user["tipousuario"];
		
		$tipo=$user["tipousuario"];
				
				
				
				
				
		

				$result23 = $mysqli->query("SELECT tipousu FROM tipousu WHERE idtipo1='$tipo'");
					//$num4 = mysql_num_rows($result23);	
					if ($result23->num_rows > 0 ){
					//if($num4>0){	
						$reg2 = $result23->fetch_array();
						
						$_SESSION['tipodeusuario']=$reg2["tipousu"];	
							
						}


				
			
			
					header('Location: princi.php'); 

	}
else
{
	header('Location: renuevo.php'); 
}

?>