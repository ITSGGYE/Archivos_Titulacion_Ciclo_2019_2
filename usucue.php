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

$consulta = $mysqli->query("select * from usuario order by nomape");




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
                     					  
					  <th width="30"><div align="center">Cedula</div></th>
					    <th width="50"><div align="center">Apellidos y Nombres</div></th>
							<th width="40"><div align="center">Tipo_Usuario</div></th>
							
							 <th width="40"><div align="center">Usuario_Alias</div></th>
							  <th width="30"><div align="center">Editar</div></th>
							   <th width="40"><div align="center">Desactivar/Activar</div></th>
						
				
			
				
					
					  
                    </tr>
                  </thead>
                  <tbody>
				  
 
				  
				  	 <?php
				$i=0;
			
			while($datocliente = $consulta->fetch_array() ){
				
			$i=$i+1;
			
			$op=$datocliente['op'];	
			
			$arti=$datocliente['tipousuario'];
				$cuecondescri="";

				$result22 = $mysqli->query("select tipousu from tipousu where idtipo1 = '$arti'");

				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
				

							
							$cuecondescri= $row1[0];
							
				
	
					}
					$result22->close();		
					
					
				
				$nom=$datocliente['nomape'];
								 	
		
			?>
			
			
						<tr class="gradeX" style="height:35px;">
						
						    <td><?php echo $datocliente['cedula'];?></td>
		 <td><?php echo $datocliente['nomape'];?></td>
		  <td><?php echo $cuecondescri;?></td>
		   <td><?php echo $datocliente['usuario'];?></td>
		     
   
   
   <td class="center">
							
							<a href="usuarioedi.php?id=<?php echo $datocliente['idusuario'];?>"   ><img src="dibujo/edi.png" width="16" height="16" title="Modificar" alt="Editar" /></a> </td>
		   
		   
		   
		   
						
						
						
						
						<td style="text-align:center;">
   <?php
			
			
			if ($op==1)
			{
            ?>
			
			
			
			
   <img src="images/off.png" alt="Desactivar" width="21" height="20"  title="Seleccionar"  onClick="suma1(<?php echo $i ?>,<?php echo $op ?>)" /> Desactivar
                    <input name="t1<?php echo $i ?>" type="hidden" id="t1<?php echo $i ?>" onclick="suma1(<?php echo $i ?>)" value="<?php echo $datocliente['idusuario'];?>">    
					
					<input name="t2<?php echo $i ?>" type="hidden" id="t2<?php echo $i ?>" value="<?php echo $nom;?>">   
            
             
          <?php
		  }
		  else
		  {
		   ?>  
          
			  
			  
			  	 <img src="images/on.png" alt="Desactivar" width="21" height="20"  title="Seleccionar"  onClick="suma1(<?php echo $i ?>,<?php echo $op ?>)" /> Activar
                    <input name="t1<?php echo $i ?>" type="hidden" id="t1<?php echo $i ?>" onclick="suma1(<?php echo $i ?>)" value="<?php echo $datocliente['idusuario'];?>">    
					
					<input name="t2<?php echo $i ?>" type="hidden" id="t2<?php echo $i ?>" value="<?php echo $nom;?>">    

             
            
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