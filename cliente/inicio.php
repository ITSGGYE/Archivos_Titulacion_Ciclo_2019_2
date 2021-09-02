<?php
	session_start();
		/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos 
 
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
     ?><script>  window.location.replace('login.php');</script><?php   
		exit;
        }
 
	require_once ("config/db.php"); 
	require_once ("config/conexion.php"); 
 
	$title="Inicio | Tenaza";
?>
<!DOCTYPE html>
<html>
<?php require_once 'header.php';?><head>
	 
<body>
<?php require_once 'head.php';?>

	<div class="content">
     	<div class="container">
     		<div class="col-md-8 col-sm-8 col-xs-12">
     			<br><br><br><br>
<p>Bienvenido</p>
 <p>Reservas</p>    		
     	
	 

     	</div>
    </div> <!-- /container -->
<?php require_once 'footer.php';?>
	
</body>
</html>