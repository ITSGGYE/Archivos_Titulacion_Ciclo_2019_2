<?php
session_start();
include('db_login.php');
$connection = new mysqli($db_host, $db_username, $db_password);
if (!$connection) {
	die("Could not connect to the database: <br />" . mysql_error());
}
mysqli_select_db($connection, 'book');
//session_start();
if (!isset($_SESSION['user_id']) && $_SESSION['user_id'] == null) {
	header("location: index.php");
}
$hoy = new DateTime('NOW');
$cadenaHoy = $hoy->format('Y/m/d');
// muestra las capacitaciones disponibles 
$query = "select cpt.descripcion, cpt.fecha_inicio, 
	cpt.fecha_fin, cpc.nombre from capacitaciones cpt inner join capacitadores cpc 
	on cpt.ID_CAPACITADOR= cpc.ID_CAPACITADORES  
	where cpt.fecha_inicio>='" . $cadenaHoy . "' 
	order by cpt.fecha_inicio ";
$result = mysqli_query($connection, $query);
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BookIn</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/datepicker.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/menu_izq.css" /> -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script> -->

</head>
<style>
	body {
		background-image: url('assets/images/city.jpg');
	}
</style>

<body>

	<nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example" style="margin-bottom: 2%;">

		<div class="container-fluid">
			<a class="navbar-brand" href="#">bookIn</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsExample02">
				<ul class="navbar-nav me-auto">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="bookin.php">Registro</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="agenda.php">Agenda</a>
					</li>
					<?php 
						if ($_SESSION['is_admin']) { 
					?>
					<li class="nav-item">
						<a class="nav-link" href="asistencia.php">Asistencia</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-bs-toggle="dropdown" aria-expanded="false">Administración</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown05">
							<li><a class="dropdown-item" href="expositores.php">Agregar expositor</a></li>
							<li><a class="dropdown-item" href="eventos.php">Agregar capacitación</a></li>
							<li><a class="dropdown-item" href="./reporte.php">Reportes</a></li>
						</ul>
					</li>
					<?php 
					}
					?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<div class="btn-nav"><a class="btn btn-danger btn-small navbar-btn" href="./actions/destruirSesion.php">Cerrar sesión</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="card">
				<!-- incluye el modal para poder registrar el qr -->
				<?php include('modalQR.php'); ?>
				<div class="span10">
					<form action="seat.php" method="POST" id="reserva">
						<center>
							<h1>Planificación de capacitaciones</h1>
							<label>Buscar por: descripción del evento </label>
							<div class="col-md-6">
								<input type="text" id="busqueda" name="busqueda" size="16" class="form-control" onkeyup="load();" placeholder='Ingresa la capacitación' required>
								<span class="add-on"><i class="icon-school"></i></span>
							</div>
							<div class='outer_div'></div><!-- Carga los datos ajax -->

							<br><br>
							<button type="submit" class="btn btn-success">
								<!-- <i class="icon-ok icon-white"></i>  -->
								Registrar
							</button>
							<!--  <a href="./actions/destruirSesion.php" class="btn btn-danger"><i class="icon-remove icon-white"></i> Cerrar sesión</a> -->
							<br><br>
							<?php 
							if ($_SESSION['is_admin']) {
								// echo '<a href="./expositores.php" class="btn btn-warning">Agregar expositor </a>';
								// echo '<a href="./eventos.php" class="btn btn-info">Agregar evento </a>';
								// echo '<a href="./reporte.php" class="btn btn-dark">Reportes</a>';
								echo '<input id="admin" value="1" hidden></input>';
							}
							?>
					</form>
					</center>

				</div>
			</div>
		</div>
		<!-- muestra el lector de qr si es administrador -->
		<?php if ($_SESSION['is_admin']) {
			// echo '<div class="row card ">';
			// echo '	<div class="span10">';
			// echo '	<center>';
			// echo '	<div class="col-md-12" style="text-align: center;">';
			// echo '		<div id="qr" style="display: inline-block;">';
			// echo '			<div class="placeholder"></div>';
			// echo '		</div>';
			// echo '		<div id="scannedCodeContainer"></div>';
			// echo '		<div id="feedback"></div>';
			// echo '	</div>';
			// echo '	<div id="reader" width="600px"></div>';
			// echo '		<br>';
			// echo '		<div class="col-md-12 scan-type-region camera" id="scanTypeCamera">';
			// echo '			<div>										';
			// echo '					<strong>Escanear usando camara</strong>&nbsp;&nbsp;';
			// echo '					<code id="status">Pedir permiso para escanear</code>';
			// echo '					<button id="requestPermission" class="btn btn-success btn-sm" >Pedir permiso</button>';
			// echo '			</div>';
			// echo '			<br>';
			// echo '			<div>';
			// echo '				<div>';
			// echo '					<div id="selectCameraContainer" style="display: inline-block;">Seleccionar camara</div>';
			// echo '						<select id="cameraSelection"></select>';
			// echo '				</div>';
			// echo '				<br>';
			// echo '				<div>';
			// echo '						<button id="scanButton" class="btn btn-success btn-sm">Empezar escaneo</button>';
			// echo '						<button id="stopButton" class="btn btn-danger btn-sm" disabled="">Parar escaneo</button>';
			// echo '				</div>';
			// echo '			</div>';
			// echo '		</div>';
			// echo '		</center>';
			// echo '	</div>';
			// echo ' </div>';
		}
		?>


		<!-- <div class="row card">
			<div class="span10">
				<center>
					<h1>Agenda</h1>
					<label> Capacitaciones a realizarse </label>
					<?php
					// echo "<table class='table table-hover'>
					// 	<tr>
					// 	<th>Descripcion</th>
					// 	<th>Capacitador</th>
					// 	<th>Fecha inicio</th>
					// 	<th>Fecha fin</th>
					// 	</tr> ";
					// muestra las capacitaciones disponibles
					// while ($row = mysqli_fetch_array($result)) {
					// 	echo "<tr>";
					// 	echo "<td>" . $row['descripcion'] . "</td>";
					// 	echo "<td>" . $row['nombre'] . "</td>";
					// 	echo "<td>" . $row['fecha_inicio'] . "</td>";
					// 	echo "<td>" . $row['fecha_fin'] . "</td>";
					// 	echo "</tr>";
					// }
					// echo "</table>";

					// mysqli_close($connection);
					?>
				</center>
			</div>
		</div> -->
	</div>
	<script src="assets/js/html5-qrcode.min.js"></script>
	<script src="assets/js/LectorQR.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')
	</script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- <script type="text/javascript" src="js/bootstrap-datepicker.js"></script> -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script>
		// function ajax para cargar los resultados en base a 4 caracteres
		function load() {
			if (!$("#busqueda").val().trim()) {
				$('.outer_div').html('');
				return;
			}
			if ($("#busqueda").val().length < 4) return;
			var busqueda = $("#busqueda").val();
			$.ajax({
				url: './CapacitacionesAJAX.php?action=ajax&q=' + busqueda,
				success: function(data) {
					$(".outer_div").html(data).fadeIn('slow');
				}
			})
		}
		var hoy = new Date();
		//Modificacion por cantidad de dias para el registro
		var cantidadDias = 15;
		var primerDia = new Date(hoy.getFullYear(), hoy.getMonth(), 1);
		var ultimoDia = new Date(hoy.getFullYear(), hoy.getMonth() + 1, 0);
		var diferencia_en_tiempo = hoy.getTime() - primerDia.getTime();
		var diferencia_en_dias = diferencia_en_tiempo / (1000 * 3600 * 24);
		// diferencia en dias para el registro de capacitaciones 
		$(document).ready(function() {
			$('.myDatepicker').datepicker({
				changeMonth: false,
				changeYear: false,
				format: 'dd/mm/yyyy',
				startDate: primerDia,
				endDate: ultimoDia,
				autoclose: true
			});


			if (diferencia_en_dias > cantidadDias) {
				var admin = document.getElementById('admin');
				if (admin === null) {
					alert("Estimado usuario, al momento se encuentra fuera del rango para poder elegir una capacitacion");
					document.getElementById("myDate").disabled = true;
				}
			}

			// funcion ajax que registra la asistencia 
			$("#registrarAsiento").submit(function(e) {
				e.preventDefault();
				var id_asiento = document.getElementById('id_asiento').value;
				$.ajax({
					type: "POST",
					url: 'registrarAsistencia.php',
					data: {
						"id_asiento": id_asiento
					},
					success: function(data) {
						$('#qrmodal').modal('hide');
						alert('Se ha registrado la asistencia');
					},
					error: function() {
						alert('Hubo errores al tratar de grabar el asiento, favor intente luego');
					}
				});
			});

		});
	</script>
</body>

</html>