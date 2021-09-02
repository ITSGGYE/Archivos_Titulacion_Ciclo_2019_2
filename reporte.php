<?php 
	session_start();
	include('db_login.php');
	$connection = new mysqli($db_host, $db_username, $db_password);
	if (!$connection)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
	mysqli_select_db($connection,'book');

	$query = mysqli_query($connection," SELECT cpt.descripcion"
	." from capacitaciones cpt group by cpt.descripcion");

	//Revisa si se ha enviado una peticion de descarga en excel
	if(isset($_POST["excel"])) {
		$cadena_query = "SELECT cpt.id_capacitacion, cpt.fecha_inicio, cpt.descripcion,	emp.nombre,". 
			" emp.apellido, ast.asiento, case when ast.asistencia = true then 'X' else '' END as asistencia   ". 
			" from capacitaciones cpt inner join ".
			" (asientos ast inner join empleados emp ". 
			" on ast.id_empleado = emp.ID_USER) ". 
			" on cpt.id_capacitacion = ast.id_capacitacion and ". 
			" cpt.descripcion='".$capacitacion."' ";

		$query = mysqli_query($connection,$cadena_query);
		$developer_records = mysqli_fetch_array($query);
		$filename = "reporte_".date('Ymd') . ".xls";
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=".$filename."");
		$show_column = false;
		if(!empty($developer_records)) {
			foreach($developer_records as $record) {
				if(!$show_column) {
				echo implode("t", array_keys($record)) . "n";
				$show_column = true;
				}
			echo implode("t", array_values($record)) . "n";
			}
		}
		exit;
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
	            <h1>Reportes</h1>
	        </div>
						
				<div class="control-group">
	                <label class="control-label" for="input1">Elegir capacitacion</label>
	                <div class="controls">
	                	<div class="col-md-6 col-sm-4 col-xs-4">
                                <select class="form-control" name="capacitacion" required id="capacitacion">
                                      <?php foreach($query as $p):?>
                                        <option value="<?php echo $p['descripcion']; ?>"><?php echo $p['descripcion']; ?></option>
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
					<button  class="btn btn-info" id='submit'>
						<i class="icon-ok icon-white"></i> Generar
					</button>
					
						<button class="btn" id='excel'>
							<i class="icon-refresh icon-black"></i> Descargar
						</button>
					
					<a href="./index.php" class="btn btn-danger" ><i class="icon-arrow-left icon-white"></i>Regresar</a>
					
				</div>
				<div id="resultado"></div>
				
	
		</div>

		<script>
			// scripts para la descarga de excel y para la revision del reporte en ajax 	
			$('#submit').click(function(){
					var capacitacion = {"capacitacion": $('#capacitacion').val()};
					$.ajax({
						type: "POST",
						url: "verReporte.php",
						data: capacitacion,
						success: function(result) {
							$('#resultado').html(result);
						}						
					});
			});
			$('#excel').click(function(){
					var capacitacion = {"capacitacion": $('#capacitacion').val()};
					$.ajax({
						type: "POST",
						url: "DescargarExcel.php",
						data: capacitacion		,
						success: function(result) {
							console.log(result);
							var blob = new Blob([result], { type: 'data:application/vnd.ms-excel' });
							var downloadUrl = URL.createObjectURL(blob);
							var a = document.createElement("a");
							a.href = downloadUrl;
							a.download = "Reporte.xls";
							document.body.appendChild(a);
							a.click();
						}									
					});
			});
			$(document).ready(function(){
				$("#datetime").datetimepicker(); 				
				$("#datetime2").datetimepicker(); 


				

    		});			
			
		</script>
	</BODY>
</HTML>