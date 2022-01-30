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
		


$idtipo= $_REQUEST["codiestu"];
		
		$esta=1;
		$estaw=20;



$consulta = $mysqli->query("SELECT * FROM opciones order by descriopcio ");

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
                     					  
					  <th width="60"><div align="center">Descripci&oacute;n de Opcion</div></th>
						
				  <th width="98"><div align="center">Accion</div></th>
				 
				
						
							
							
							
					  
					  
                    </tr>
                  </thead>
                  <tbody>
				  
 
				  
				  	 <?php
				$i=0;
			
			while($datocliente = $consulta->fetch_array() ){
		$i=$i+1;	
			$op3=0;
			
			
					$arti=$datocliente['idop'];
				$idt="";
				

				$result22 = $mysqli->query("select id from protipo where idtipo = '$idtipo' and idpro1 = '$arti'");

				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
				

							
							$op3=1;
							$idt= $row1[0];
							
				
	
					}
					$result22->close();		
						 	
		
			?>
			
			
						<tr class="gradeX" style="height:27px;">
							<td><div align="left"><?php echo $datocliente['descriopcio'];?></div></td>
						
												
						
		   <td style="text-align:center;">
   <?php
			
			
			if ($op3==1)
			{
            ?>
			
			
			
			
   <img src="images/off.png" alt="Desactivar" width="21" height="20"  title="Seleccionar"  onClick="suma1(<?php echo $i ?>,<?php echo $op3 ?>)" /> <a onclick="suma1(<?php echo $i ?>,<?php echo $op3 ?>)">Desactivar</a>
             <input name="t1<?php echo $i ?>" type="hidden" id="t1<?php echo $i ?>"  value="<?php echo $datocliente['idop'];?>">    
					
					<input name="t2<?php echo $i ?>" type="hidden" id="t2<?php echo $i ?>" value="<?php echo $idt;?>">   
            
             
          <?php
		  }
		  else
		  {
		   ?>  
          
			  
			  
			  	 <img src="images/on.png" alt="Desactivar" width="21" height="20"  title="Seleccionar"  onClick="suma1(<?php echo $i ?>,<?php echo $op3 ?>)" /> <a onclick="suma1(<?php echo $i ?>,<?php echo $op3 ?>)">Activar</a> 
                    <input name="t1<?php echo $i ?>" type="hidden" id="t1<?php echo $i ?>" onclick="suma1(<?php echo $i ?>)" value="<?php echo $datocliente['idop'];?>">    
					
					<input name="t2<?php echo $i ?>" type="hidden" id="t2<?php echo $i ?>" value="<?php echo $idt;?>"> 

             
            
            <?php
		  }
		  
		   ?>
   
 
   
   
   
   
			   
			  
			   
			   
			   
   </td>
						
							
						
							
			
		
	
							
				
							
							
						
						</tr>
						
						
					
						
						 <?php 
			}?>
				  
				  
                    
                  </tbody>
                  
                </table>




</form>

 
</body>
</html>



