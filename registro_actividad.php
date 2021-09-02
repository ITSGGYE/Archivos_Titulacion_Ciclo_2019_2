<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
     ?><script>  window.location.replace('index.php');</script><?php   
		exit;
        }
   
	require_once ("conexion_base_datos/conexion.php"); 
  
?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ARDUHOME_SEGURO</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <center>
        <div class="portadas">
        <table class="actividad" style="
  border-collapse: collapse;
">
        
                            
                           
            <h2>Registro de actividad del sistema</h2><br><br>
               <tr>
                   
                   
                <th>COMENTARIO</th>
                <th> FECHA Y HORA </th>
                
               </tr>  


    <?php 
                            $query_categoria=mysqli_query($con,"select * from registro_de_actividad");
                            while($row=mysqli_fetch_array($query_categoria)) {


                       $situacion_actividad=$row['situacion_actividad'];
                        $hora_fecha=$row['hora_fecha'];
                        
                                ?>


                <tr>
                       
                        
                        <td><?php echo $situacion_actividad; ?></td>
                        <td><?php echo $hora_fecha; ?></td>

                    </tr>
                    <?php
                            }
                            ?>
        </table><br><br><br><br><br><br>

             
            <button onclick="location.href='home.php'">Regresar</button>
      </div>
        </center>

     </body>
</html>