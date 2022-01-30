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



if ($opi==1 )
	{

		$esta=0;
	$mysqli->query("UPDATE usuario SET op = '$esta' where idusuario= '$idpro'" );
		
 	
}


if ($opi==0 )
	{

		$esta=1;
	$mysqli->query("UPDATE usuario SET op = '$esta' where idusuario= '$idpro'" );
		
 	
}

?> 	
   
<script type="text/javascript">
codiestu=0;

//$.post("home.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

$.post("usucue.php",{ codiestu:codiestu },function(data){$("#examplea").html(data);})

//$.post("carga_select2504.php",{ id:variablejs7,id1:variablejs8 },function(data){$("#subco").html(data);})

</script>          
                
                
                
             
			
	
			
				