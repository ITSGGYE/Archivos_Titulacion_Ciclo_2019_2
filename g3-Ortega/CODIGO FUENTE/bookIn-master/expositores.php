<?php 
session_start();
if ((!isset($_SESSION['user_id']) && $_SESSION['user_id'] == null ) && !$_SESSION['is_admin'] ) {
	header("location: index.php");
}
?>

<!DOCTYPE HTML>
<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Eventos</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	</HEAD>

	<BODY>

		<br>
		<div class="container">
	        <div class="page-header">
	            <h1>Registro de capacitadores</h1>
	        </div>
			<!-- formulario para registrar capacitadores, envia a script registrarCapacitador -->
			<form name="contactForm" action="registrarCapacitador.php" method="POST" class="form-horizontal">
			
				<div class="control-group">
	                <label class="control-label" for="input1">Nombre</label>
	                <div class="controls">
	                    <input type="text" name="nombre" id="input1" placeholder="Ingrese el nombre" class="span3" pattern="[A-z ]{3,}" title="Por favor ingrese un nombre valido." required>
	                </div>
	            </div>
				
				<div class="control-group">
	                <label class="control-label" for="input2">Cedula</label>
	                <div class="controls">
	                    <input type="text" name="cedula" pattern=".{10}" title="Favor ingrese un numero de max 10 digitos" class="span3" placeholder="Ingrese el numero de cedula" maxlength="10" required/>
	                </div>
	            </div>	           
			

	            <div class="form-actions">
	                <input type="hidden" name="save" value="contact">
					<button type="submit" class="btn btn-info">
						<i class="icon-ok icon-white"></i> Crear
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