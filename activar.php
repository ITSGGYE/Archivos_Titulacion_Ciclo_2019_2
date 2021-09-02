<¡<?php
require_once ("conexion_base_datos/conexion.php");
$codigo = mysqli_real_escape_string($con,$_POST['codigo']);
$query = mysqli_query($con,"SELECT * FROM seguridad WHERE pass_seguridad = '$codigo'");
$contar = mysqli_num_rows($query);      
      if($contar == 1) 
      {
        while($row=mysqli_fetch_array($query)) 
        {
          if($codigo = $row['seguridad'])
          {
          	        $_SESSION['segu_id'] = $row['Codigo_seguridad'];
			$_SESSION['codigo'] = $row['pass_seguridad']; 
          ?><script> alert("Acción realizada con éxito..."); window.location='home.php'; </script> <?php
          }     
        }      
      }
      ?><script> alert("Ocurrió un error, por favor vuelva a intentar"); window.location='change_pass.php'; </script> <?php
      ?>                  
			
			       
			

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

