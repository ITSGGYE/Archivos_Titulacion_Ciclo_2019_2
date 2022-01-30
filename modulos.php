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
$estado="Activo";

$consulta = $mysqli->query("select * from modulos order by descrimar");




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
		   
		   
		  
              
              <h3 class="content-header">Modulos del sistema
			   <div class="pull-right">
          <ol class="breadcrumb">
            <li><a href="modulo.php">Nuevo <img src="dibujo/nue.png" width="30" height="25" title="Nuevo registro" /> </a>  </li>
           
          </ol>
        </div>
			  
			  </h3>
            </div>
         <div class="porlets-content">
            <div class="table-responsive">
                <table  class="display table-bordered table-striped" id="dynamic-table">
                  <thead>
                    <tr>
                     					   <th width="50"><div align="center">Orden Menu</div></th>
					  <th width="50"><div align="center">Descripci&oacute;n de Modulo</div></th>
							<th width="93"><div align="center">Editar</div></th>
							<th width="93"><div align="center">Asignar Opciones al modulo</div></th>
														
							
							
							
					  
					  
                    </tr>
                  </thead>
                  <tbody>
				  
 
				  
				  	 <?php
				$i=0;
			
			while($datocliente = $consulta->fetch_array() ){
			 $i=$i+1;
			 $descli="";
						 	
		
			?>
			
			
						<tr class="gradeX" style="height:35px;">
							<td><div align="right"><?php echo $datocliente['indice'];?></div></td>
						
						<td><div align="right"><?php echo $datocliente['descrimar'];?></div></td>
						
						
						 <td style="text-align:center;"><a href="moduloedi.php?id=<?php echo $datocliente['idmar'];?>"><img src="dibujo/edi.png" alt="Eliminar" width="16" height="16"  title="Modificar" /></a></td>
						
							
						
							
				 <td style="text-align:center;"><a href="opmodu.php?id=<?php echo $datocliente['idmar'];?>"><img src="dibujo/edi.png" alt="Eliminar" width="16" height="16"  title="Modificar" /></a></td>			
							
							
							
							
				
							
							
						
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
