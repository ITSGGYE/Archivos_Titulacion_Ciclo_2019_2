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

$consulta = $mysqli->query("select * from opciones order by descriopcio");




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
                     					  
					  <th width="60"><div align="center">Descripci&oacute;n de Opcion</div></th>
							<th width="40"><div align="center">Editar</div></th>
							<th width="50"><div align="center">Asignar_Programa</div></th>
														
				 <th width="50"><div align="center">Programa_Asignado</div></th>
				  <th width="98"><div align="center">Quitar_Programa_Asignado</div></th>
				 
				
						
							
							
							
					  
					  
                    </tr>
                  </thead>
                  <tbody>
				  
 
				  
				  	 <?php
				$i=0;
			
			while($datocliente = $consulta->fetch_array() ){
				$result51 = $mysqli->query("select * from programas order by descripro");
			$i=$i+1;	
			
			$arti1=$datocliente['idop'];


			$modi=0;

				$result22 = $mysqli->query("select idop from opciopro where idop = '$arti1'");

				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
				

							
							$modi= 1;
							
				
	
					}
					$result22->close();					
						 	
		
			?>
			
			
						<tr class="gradeX" style="height:30px;">
							<td><div align="right"><?php echo $datocliente['descriopcio'];?></div></td>
						
												
						
						 <td style="text-align:center;">
						 
						 
						  <img src="dibujo/edi.png" alt="Eliminar" width="16" height="16"  title="Seleccionar"  onClick="suma(<?php echo $i ?>)" /> 
                    <input name="t1<?php echo $i ?>" type="hidden" id="t1<?php echo $i ?>" onclick="suma(<?php echo $i ?>)" value="<?php echo $datocliente['idop'];?>">
	
						 
						 
						 
						</td>
						
							
						
							
				 <td style="text-align:center;">	 <?php
			
			
			if ($modi==0)
			{
            ?>
			
			
			
			
			
			
			<select name="pro<?php echo $i ?>" id="pro<?php echo $i ?>" onchange="suma6(<?php echo $i ?>)" style="width:200px; height:20px;">
                           
                           <option value="0">Seleccione Programa</option>
						   
                           <?php
			
			while($row = $result51->fetch_array()) { 
			$valor = $row["idprog"] ; //Asignamos el id del campo que quieras mostrar
			$nombre = $row["descripro"]; // Asignamos el nombre del campo que quieras mostrar
			echo "<option value=".$valor.">".$nombre."</option>";
			}
			?>
							
							
                          </select>
			
			
			<input name="opcio<?php echo $i ?>" type="hidden" id="opcio<?php echo $i ?>" value="<?php echo $datocliente['idop'];?>">
	
            
             
          <?php
		  }
		  
		   ?>  
	</td>			
							
		   <td style="text-align:center;">
			   
			  	 <?php
			
			
			if ($modi==1)
			{
			
			


				$copro="";
				$idpro="";
				$nopro="";

				$result22 = $mysqli->query("select id,idpro from opciopro where idop = '$arti1'");

				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
					
					
							$idpro= $row1[0];
							$copro= $row1[1];
				

							
							$modi= 1;
							
				
	
					}
					$result22->close();		
					

				$result22 = $mysqli->query("select descripro from programas where idprog = '$copro'");

				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
					
					
							$nopro= $row1[0];
				

							
							$modi= 1;
							
				
	
					}
					$result22->close();		

					
			
            ?>
			
			
			
			
			<span class="Estilo1"><?php echo $nopro;?></span>
			
	
            
             
          <?php
		  }
		  
		   ?>  
	
   </td>					
	 <td style="text-align:center;">
			   
			  		  	 <?php
			
			
			if ($modi==1)
			{
			
			?>


			 <img src="images/ver.png" alt="Desactivar" width="21" height="20"  title="Seleccionar"  onClick="sumae(<?php echo $i ?>)" /> 
			 
			 <input name="pr<?php echo $i ?>" type="hidden" id="pr<?php echo $i ?>" value="<?php echo $idpro;?>">
			 
                  
				
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