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
		
		

		
		$esta=1;
		$estaw=20;

$consulta = $mysqli->query("select * from programas order by descripro");



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

 <table class="display table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                     					  
					  <th width="60"><div align="center">Descripci&oacute;n de Programa</div></th>
							<th width="40"><div align="center">Editar</div></th>
						
				
						
							
							
							
					  
					  
                    </tr>
                  </thead>
                  <tbody>
				  
 
				  
				  	 <?php
				$i=0;
			
			while($datocliente = $consulta->fetch_array() ){
				
			$i=$i+1;	
			
								 	
		
			?>
			
			
						<tr class="gradeX" style="height:28px;">
							<td><div align="left"><?php echo $datocliente['descripro'];?></div></td>
						
												
						
						 <td style="text-align:center;">
						 
						 
						  <img src="dibujo/edi.png" alt="Eliminar" width="16" height="16"  title="Seleccionar"  onClick="suma(<?php echo $i ?>)" /> 
                    <input name="t1<?php echo $i ?>" type="hidden" id="t1<?php echo $i ?>" onclick="suma(<?php echo $i ?>)" value="<?php echo $datocliente['idprog'];?>">
	
						 
						 
						 
						</td>
						
							
						
							
			
	
							
				
							
							
						
						</tr>
						
						
					
						
						 <?php 
			}?>
				  
				  
                    
                  </tbody>
                  
                </table>




</form>

            	
                        
                        
                        
                        
                       
	
            
           

            
			
	
</body>
</html>