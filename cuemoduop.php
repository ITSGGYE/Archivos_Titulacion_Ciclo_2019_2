<?php 
require_once 'abrebase.php';
$mysqli = new mysqli($hostname, $username,$password, $database);
if ($mysqli -> connect_errno) {
die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() . ") " . $mysqli -> mysqli_connect_error());
}
else
{
//echo "Conexión exitosa!";
$mysqli->set_charset('utf8');
//$mysqli -> mysqli_close();
}
		
		
$idmodu= $_REQUEST["codiestu"];
		
		$esta=1;
		$estaw=20;

$consulta = $mysqli->query("SELECT * FROM moduopcio where idmodu = '".$idmodu."' ");



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<?php //require_once "cliinicial.php";?>
		


    <style type="text/css">
<!--
.style24 {color: #0000FF; font-size: 12px; }
-->
    </style>
</head>
<body>
<?php include "archivos.php";?>	 
<table  class="display table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                     					  
					  <th width="60"><div align="center">Descripci&oacute;n de Opcion asignada</div></th>
						
				  <th width="98"><div align="center">Quitar</div></th>
				 
				
						
							
							
							
					  
					  
                    </tr>
                  </thead>
                  <tbody>
				  
 
				  
				  	 <?php
				$i=0;
			
			while($datocliente = $consulta->fetch_array() ){
				$result51 = $mysqli->query("select * from programas order by descripro");
			$i=$i+1;	
			
			
			
					$arti=$datocliente['idopci'];
				$cuecondescri="";

				$result22 = $mysqli->query("select descriopcio from opciones where idop = '$arti'");

				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
				

							
							$cuecondescri= $row1[0];
							
				
	
					}
					$result22->close();		
						 	
		
			?>
			
			
						<tr class="gradeX" style="height:35px;">
							<td><div align="right"><?php echo $cuecondescri;?></div></td>
						
												
						
						 <td style="text-align:center;">
						 
						 
						  <img src="images/ver.png" alt="Desactivar" width="16" height="16"  title="Seleccionar"  onClick="suma(<?php echo $i ?>)" /> 
                    <input name="t1<?php echo $i ?>" type="hidden" id="t1<?php echo $i ?>" onclick="suma(<?php echo $i ?>)" value="<?php echo $datocliente['id'];?>">
	
						 
						 
						 
						</td>
						
							
						
							
			
		
	
							
				
							
							
						
						</tr>
						
						
					
						
						 <?php 
			}?>
				  
				  
                    
                  </tbody>
                  
                </table>




</form>

 
</body>
</html>



