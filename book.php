<?php 
	//inicia variables de sesion
	session_start();
	//incluye el codigo que contiene las credenciales
	include('db_login.php');
	$connection = mysqli_connect($db_host, $db_username, $db_password);
	if (!$connection)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
	mysqli_select_db($connection,'book');
	$_SESSION['nombre'] ;

?>

<!DOCTYPE HTML>
<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Reservar de asientos</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	</HEAD>

	<BODY>

		<br>
		<div class="container">
	        <div class="page-header">
	            <h1>Reserva de asientos</h1>
	        </div>			
			
			<form name="contactForm" action="register.php" method="POST" class="form-horizontal">
				<div class='control-group'>
					<label class='control-label' for='input1'>Asientos numerados</label>
					<div class='controls'>
					<?php 
						// crea los asientos en base a un array
						for($i=1; $i<71; $i++)
						{
							$chparam = "ch" . strval($i);
							if(isset($_POST[$chparam]))
							{
								echo "<input type='text' class='span3' name=ch value=".$i." readonly/><br>";
							}
						}
					?>
	                </div>
	            </div>
	  
					<?php
						//agrega la fecha del evento
						if(isset($_POST['fecha_evento']))
						{
							echo "<div class='control-group'>";
							echo "<label class='control-label' for='input1'>Fecha del evento</label>";
								echo "<div class='controls'>";
									echo "<input type='text' name='fecha_evento' id='input1' class='span3' value=". $_POST['fecha_evento'] ." readonly />";
								echo "</div>";
							echo "</div>";
						}
					?>
	            <!-- muestra el nombre de la reserva -->
				<div class="control-group">
	                <label class="control-label" for="input1">Nombre</label>
					<?php 
	                echo " <div class='controls'>";
	                echo "    <input type='text' name='nombre' id='input1' ";
					echo "	placeholder='Ingrese el nombre' class='span3' ";
					echo "	pattern='[A-z ]{3,}'   ";
					echo "	value = '". $_SESSION['nombre'] ." ".$_SESSION['apellido'] .  "' readonly> ";
					echo " </div> ";
					?>
	            </div>
				
				<!-- muestra el email de la reserva -->
	            <div class="control-group">
	                <label class="control-label" for="input5">Email </label>
	                <div class="controls">
						<?php 
	                    	echo "<input type='text' value=". $_SESSION['email']. " class='span3' placeholder='Ingrese al email' name='email' pattern='^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$'  readonly/> "
						?>
					</div>
	            </div>
					
	            <div class="form-actions">
	                <input type="hidden" name="save" value="contact">
					<button type="submit" class="btn btn-info">
						<i class="icon-ok icon-white"></i> Reservar
					</button>
					<button type="reset" class="btn">
						<i class="icon-refresh icon-black"></i> Borrar
					</button>
					<a href="./index.php" class="btn btn-danger" ><i class="icon-arrow-left icon-white"></i>Regresar</a>
					
					
				</div>

			</form>
		</div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</BODY>
</HTML>