<?php
session_start();
include('db_login.php');
$connection = new mysqli($db_host, $db_username, $db_password);
if (!$connection) {
	die("Could not connect to the database: <br />" . mysql_error());
}
mysqli_select_db($connection, 'book');
//session_start();
if ((!isset($_SESSION['user_id']) && $_SESSION['user_id'] == null) || !$_SESSION['is_admin']) {
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
						<a class="nav-link" aria-current="page" href="bookin.php">Registro</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="agenda.php">Agenda</a>
					</li>
					<?php
					if ($_SESSION['is_admin']) {
					?>
						<li class="nav-item">
							<a class="nav-link active" href="asistencia.php">Asistencia</a>
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
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="modal fade" id="qrmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header" >
							<h5 class="modal-title" id="exampleModalLabel">Asistencia</h5>
						</div>
						<form id="registrarAsiento">
							<div class="modal-body" id="cuerpo_modal">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
								<button type="submit" class="btn btn-primary">Si</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="card card-body">
				<center>
					<div class="col-md-12" style="text-align: center;">
						<div id="qr" style="display: inline-block;">
							<div class="placeholder"></div>
						</div>
						<div id="scannedCodeContainer"></div>
						<div id="feedback"></div>
					</div>
					<div id="reader" width="1000px"></div>
					<br>
					<div class="col-md-12 scan-type-region camera" id="scanTypeCamera">
						<div>
							<strong>Escanear usando camara</strong>&nbsp;&nbsp;
							<code id="status">Pedir permiso para escanear</code>
							<button id="requestPermission" class="btn btn-success btn-sm">Pedir permiso</button>
						</div>
						<br>
						<div>
							<div>
								<div id="selectCameraContainer" style="display: inline-block;">Seleccionar camara</div>
								<select id="cameraSelection"></select>
							</div>
							<br>
							<div>
								<button id="scanButton" class="btn btn-success btn-sm">Empezar escaneo</button>
								<button id="stopButton" class="btn btn-danger btn-sm" disabled="">Parar escaneo</button>
							</div>
						</div>
					</div>
				</center>
			</div>
		</div>
	</div>

	
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
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
		var cantidadDias = 10;
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


			// if (diferencia_en_dias > cantidadDias) {
			// 	var admin = document.getElementById('admin');
			// 	if (admin === null) {
			// 		alert("Estimado usuario, al momento se encuentra fuera del rango para poder elegir una capacitacion");
			// 		document.getElementById("myDate").disabled = true;
			// 	}
			// }

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
</html>