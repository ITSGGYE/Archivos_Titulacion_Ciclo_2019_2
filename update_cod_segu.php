<?php
session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
     ?><script>  window.location.replace('index.php');</script><?php   
		exit;
        }
   
	require_once ("conexion_base_datos/conexion.php"); 
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <title>ARDUHOME_SEGURO</title>
 <link type="text/css" rel="stylesheet" href="css/style.css">
  </head>
  <body>    
      <center><div class="portadas">
         
    <form method="POST" action="update.php">   
        <h2>Actualizar Contraseña del alarma</h2>
        <p>Contraseña</p>
        <input type="password" name="pass_update"  > <br><br>
        <input type="submit" name="ingresar" value ="Actualizar">
        </form> <br><br><br><br><br><br>
      <button onclick="location.href='home.php'">Regresar</button>
      </div></center> 
      </body>
</html>
     

