<?php 
	session_start();
	include('db_login.php');
	$connection = new mysqli($db_host, $db_username, $db_password);
	if (!$connection)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
	mysqli_select_db($connection,'book');
	//Segunda Quer
	
	//query para mostrar capacitadores
	$query = mysqli_query($connection,"select id_capacitadores, nombre from capacitadores");

?>

<?php 
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

		<!-- Minified Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Minified JS library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Minified Bootstrap JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
		<link src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
		</HEAD>

	<BODY>

		<br>
		<div class="container">
	        <div class="page-header">
	            <h1>Registro de eventos</h1>
	        </div>
			<!-- form que envia el registro hacia el script de registrar evento  -->
			<form name="contactForm" action="registrarEvento.php" method="POST" class="form-horizontal">

				<div class="control-group">
	                <label class="control-label" for="input1">Titulo de capacitacion</label>
	                <div class="controls">
	                    <input type="text" name="titulo" id="input1" placeholder="Ingrese el titulo" class="span3" pattern="[A-z ]{3,}" title="Por favor ingrese un nombre valido." required>
	                </div>
	            </div>

				<div class="control-group">
	                <label class="control-label" for="input1">Fecha de inicio </label>
	                <div class="controls">
						<div class="input-group date" id="startDate" style="position: relative">
								<input type="text" value="" 
								id="datetime" name="fecha_inicio" size="16" class="form-control" required>
							    <span class="add-on"><i class="icon-calendar"></i></span>
						</div>
					</div>
	            </div>

				<div class="control-group">
	                <label class="control-label" for="input1">Fecha finalizacion </label>
	                <div class="controls">
							<div class="input-group date" id="endDate" style="position: relative">
									<input type="text" value="" 
									id="datetime2" name="fecha_fin" size="16" class="form-control" required>
									<span class="add-on"><i class="icon-calendar"></i></span>
							</div>
					</div>
	            </div>

				<div class="control-group">
	                <label class="control-label" for="input1">Capacitador</label>
	                <div class="controls">
	                	<div class="col-md-2 col-sm-2 col-xs-2">
						<!-- muestra todos los capacitadores  -->
                                <select class="form-control" name="capacitador" required id="mod_kind_id">
                                      <?php foreach($query as $p):?>
                                        <option value="<?php echo $p['id_capacitadores']; ?>"><?php echo $p['nombre']; ?></option>
                                      <?php endforeach; ?>
                                </select>
                         </div>
					</div>
	            </div>
							
		<br>				
		<br>				
		<br>
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

		
		<script>		
			$(document).ready(function(){
				$("#datetime").datetimepicker(); 				
				$("#datetime2").datetimepicker(); 
    		});			
		</script>
	</BODY>
</HTML>