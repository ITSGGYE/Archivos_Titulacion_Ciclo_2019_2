<?php require_once "iniciasesion.php";
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

				$idde = $_GET['id'];

     $estado="Inactivo";
				
			$mysqli->query("UPDATE clientes SET  soc_esta = '$estado' where soc_id= '$idde'" );

	
?>
  
  
  
  
<script type="text/javascript">

				window.location="proceclientes.php";
				
				</script>