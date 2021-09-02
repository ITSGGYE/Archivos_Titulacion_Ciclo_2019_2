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
  <center>  <div id="menu">  
              <ul>
                  <li><a href="en_apa_system.php" ><!--190.57.134.13:80-->Control del sistema</a></li>
                  <li><a href="registro_actividad.php">Registro de actividad</a></li>
                  <li><a href="pass_admin.php">Cambiar contraseña de administrador</a></li>
                  <li><a href="update_cod_segu.php">Cambiar contraseña de alarma</a></li>
                 <li><a href="logout.php"><i class='glyphicon glyphicon-off'></i> Cerrar sección</a></li>
              </ul>
      </div>    </center>
   <!-- <form method="POST" action="update.php">   
        <p>Actualizar Contraseña de seguridad</p>
        <p>Contraseña</p>
        <input type="password" name="pass_update"  > 
        <input type="submit" name="ingresar" value ="Actualizar">
    </form>
    <button onclick="location.href='pass_admin.php'">Cambiar contraseña del administrador </button>-->

  </body>
</html>
