<?php require_once "iniciasesion.php";

require_once 'abrebase.php';
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


		 $ano=0;
		
	
$consulta = $mysqli->query("select * from datoscredito where esta = '$ano' order by factu");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/x-icon" href="dibujo/ico.png">
<title>Sistema de Gestion Admnistrativa </title>

<?php include "archivos.php";?>	


</head>
<body class="dark_theme  fixed_header left_nav_fixed">

  <!--\\\\\\\ wrapper Start \\\\\\-->
  <div class="header_bar">
    <!--\\\\\\\ header Start \\\\\\-->
    <div class="brand">
      <!--\\\\\\\ brand Start \\\\\\-->
   <?php include "final.php";?>	
          
        
    </div>
</div>
    <!--\\\\\\\ header top bar end \\\\\\-->
  </div>
  <!--\\\\\\\ header end \\\\\\-->
  <div class="inner">
    <!--\\\\\\\ inner start \\\\\\-->
    <div class="left_nav">
      <!--\\\\\\\left_nav start \\\\\\-->
  <?php include "menu.php";?>	
    </div>
    <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
    
     
     
        
       <div id="main-content">
	  
    <div class="page-content">
      
     
      <div class="row">
        <div class="col-md-12">
          <div class="block-web">
           <div class="header">
		   
		   
		  
              
              <h3 class="content-header">Refinanciamiento de Cuentas por cobrar 
			  
			   <div class="pull-right">
          <ol class="breadcrumb">
           
           
			
          </ol>
        </div>
			  
			  </h3>
            </div>
         <div class="porlets-content">
            <div class="table-responsive">
               <table class="display table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                     					
					  <th width="50"><div align="center">#Credito</div></th>
							<th width="93"><div align="center">Cliente</div></th>
							<th width="93"><div align="center">Fec. Ing.</div></th>
							<th width="93"><div align="center">Valor Credito</div></th>
							
							<th width="55"><div align="center">Deuda Actual</div></th>
							
							
							<th width="55"><div align="center">Refinanciar</div></th>
							
							
							
							
							
							
					  
					  
                    </tr>
                  </thead>
                  <tbody>
				  
 
				  
				  	 <?php
				$i=0;
			
			while($datocliente = $consulta->fetch_array() ){
			 $i=$i+1;
			 $descli="";
						$idca=$datocliente['idven'];
			
 			$idvent=$datocliente['idven'];

			$nombre="";
			
			
			

		$codi4y=$datocliente['idcred'];
		$codi4yu=0;

$consultah = $mysqli->query("SELECT sum(cuo) FROM credito WHERE idcred = '".$codi4y."' and esta = '".$codi4yu."' ");
$rowh = mysqli_fetch_row($consultah);
$sume = $rowh[0];


/*$deuda=0;
$deuto=0;
$cancela=0;
$debe=0;
$consultaj = $mysqli->query("SELECT * FROM credito WHERE idcred = '".$codi4y."'");
while($rowcre = $consultaj->fetch_array() )
{
			
			$numes=$rowcre['esta'];
			$deus=$rowcre['cuo'];
			$deuto=$deuto+$deus;
			if($numes==0)
			$debe=$debe+$deus;
			else
			$cancela=$cancela+$deus;
			

}	*/			
		
				
			
			
			$idpro="";
			$idpro=$datocliente['idcli'];

			
			
									$result22 = $mysqli->query("select soc_nombreapellido from clientes where soc_id = '$idpro'  ");
				
				if ($result22->num_rows > 0 )
					{
					$row1 = $result22->fetch_array();
								
				
					
								$nombre =  $row1[0];
							
								
											
								
				}
				$result22->close();
			 
			 	
		
			?>
			
			
						<tr class="gradeX" style="height:30px;">
							
						
						 <td style="text-align:right"><?php echo $datocliente['factu'];?></td>
						 
						   <td><?php echo $nombre;?></td>
	 
	    <td style="text-align:right"><?php echo $datocliente['fecha'];?></td>
		      
   
      
	   
		 <td style="text-align:right"><?php echo number_format($datocliente['valcre'], 2);?></td>
		  <td style="text-align:right"><?php echo number_format($sume, 2);?></td>
		  
		  
		   <td style="text-align:center;">
 
	
	 <a href="cuentarefi.php?id=<?php echo $datocliente['idcred'];?> " ><img src="images/ver.png" title="Modificar" alt="Editar" /></a>
	
	</td>
							
							
						
							
						
							
													
									
	
	
							
							
						
						</tr>
						
						
					
						
						 <?php 
			}?>
				  
				  
                    
                  </tbody>
                
                </table>
              </div><!--/table-responsive-->
            </div><!--/porlets-content-->
          </div><!--/block-web--> 
        </div>
        <!--/col-md-12--> 
      </div><!--/row-->
        </div><!--/page-content end--> 
  </div><!--/main-content end--> 
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
</div>
    <!--\\\\\\\ content panel end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\-->
<!-- Modal -->

 
</nav>
<!-- /sidebar chats -->   



<footer class="footer">
  <div class="post-footer Estilo1">
 <?php require_once "pie.php";?>
   </div>
</footer>















 

</body>
</html>
