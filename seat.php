<?php
include('db_login.php');
session_start();
$connection = mysqli_connect($db_host, $db_username, $db_password);
if (!$connection) {
	die("Could not connect to the database: <br />" . mysql_error());
}
mysqli_select_db($connection, 'book');
$fecha = strip_tags(utf8_decode($_POST['fecha_evento']));

// VERIFICA QUE EL USUARIO YA NO SE HAYA REGISTRADO ANTES A ESTA CAPACITACION 
$query = "select cpc.descripcion from 
		capacitaciones cpc inner join ( 
		asientos ast inner join empleados emp 
		on ast.id_empleado = emp.ID_USER) 
		on cpc.id_capacitacion = ast.id_capacitacion 
		where fecha_inicio='" . $fecha . "'
		group by cpc.descripcion";

$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
$result;
if ($row) {
	//obtiene la descripcion de la capacitacion 
	$descripcion = $row['descripcion'];

	//query pra reconocer si no existe una reserva de esta capacitacion
	$query = "select * from 
	capacitaciones cpc inner join ( 
	asientos ast inner join empleados emp 
	on ast.id_empleado = emp.ID_USER) 
	on cpc.id_capacitacion = ast.id_capacitacion 
	where cpc.descripcion='" . $descripcion . "' 
	and ast.id_empleado=" . $_SESSION['user_id'];
	$result = mysqli_query($connection, $query);
	$numrows = mysqli_num_rows($result);

	if ($numrows > 0) {
		echo '<script> alert("Ya existe una reserva para esta capacitacion");
		window.location.href = "bookin.php";
		</script>';
	}

	// revisa si existen capacitaciones para la fecha seleccionada 
	$query = "select * from 
		capacitaciones 
		where fecha_inicio='" . $fecha . "' ";
	$result = mysqli_query($connection, $query);
	if (mysqli_num_rows($result) == 0) {
		echo '<script> alert("No existe capacitacion para la fecha seleccionada");
		window.location.href = "bookin.php";
		</script>';
	}
}

?>
<HTML>

<HEAD>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BookIn</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/custom_seats.css">
</HEAD>

<BODY>
	<br /><br /><br />
	<div class="container">
		<div class="row well">
			<div class="span10">
				<form action="book.php" method="POST" onsubmit="return validateCheckBox();">
					<ul class="thumbnails">
						<center>
							<?php
							$date = strip_tags(utf8_decode($_POST['fecha_evento']));
							// selecciona los asientos que se obtiene de la fecha
							$query = "select * from 
							capacitaciones cpc inner join ( 
							asientos ast inner join empleados emp 
							on ast.id_empleado = emp.ID_USER) 
							on cpc.id_capacitacion = ast.id_capacitacion 
							where fecha_inicio='" . $fecha . "' ";

							$result = mysqli_query($connection, $query);
							// de no existe asientos reservados crea asientos nuevos
							if (mysqli_num_rows($result) == 0) {
								// enumera y crea los asientos 
								for ($i = 1; $i < 71; $i++) {
									echo "<li class='span1'>";
									echo "<a href='#' class='thumbnail' title='Disponible'>";
									echo "<img src='img/available.png' alt='Asiento disponible'/>";
									echo "<label class='checkbox'>";
									echo "<input type='checkbox' name='ch" . $i . "'/>" . $i;
									echo "</label>";
									echo "</a>";
									echo "</li>";
									if (($i % 14) == 0) {
										echo '</ul>';
										echo '<ul class="thumbnails">';
									}
								}
							}
							// de existir asientos reservados crea asientos con reservas
							else {
								// creacion de arrays para llenar los asientos juntos con sus datos
								$seats = array_fill(0, 70, 0);
								$nombre = array_fill(0, 70, "");
								$email = array_fill(0, 70, "");
								while ($row = mysqli_fetch_array($result)) {
									//crea el asiento junto con los datos de reservacion en el array
									$pnr = intval($row["asiento"]) - 1;
									$seats[$pnr] = 1;
									$nombe[$pnr] = $row["NOMBRE"] . " " . $row["APELLIDO"];
									$email[$pnr] = $row["EMAIL"];
								}
								for ($i = 1; $i < 71; $i++) {
									$j = $i - 1;
									if ($seats[$j] == 1) {
										//crea el asiento con valores en la reserva
										echo "<li class='span1'>";
										echo "<a href='#' class='thumbnail' title='" . $nombre[$j] . " " . $email[$j] . "'>";
										echo "<img src='img/occupied.png' alt='Asiento ocupado'/>";
										echo "<label class='checkbox'>";
										echo "<input type='checkbox' name='ch" . $i . "' disabled/>" . $i;
										echo "</label>";
										echo "</a>";
										echo "</li>";
									} else {
										//crea asiento disponible
										echo "<li class='span1'>";
										echo "<a href='#' class='thumbnail' title='Disponible'>";
										echo "<img src='img/available.png' alt='Asiento disponible'/>";
										echo "<label class='checkbox'>";
										echo "<input type='checkbox' name='ch" . $i . "'/>" . $i;
										echo "</label>";
										echo "</a>";
										echo "</li>";
									}
									if (($i % 14) == 0) {
										// salto de linea 
										echo '</ul>';
										echo '<ul class="thumbnails">';
									}
								}
							}
							?>
					</ul>
					</center>
					<center>
						<label>Fecha del evento</label>
						<?php
						echo "<input type='text' class='span2' name='fecha_evento' value='" . $date . "' readonly/>";
						?>
						<br><br>
						<button type="submit" class="btn btn-info">
							<i class="icon-ok icon-white"></i> Enviar
						</button>
						<button type="reset" class="btn">
							<i class="icon-refresh icon-black"></i> Borrar
						</button>
						<a href="./index.php" class="btn btn-danger"><i class="icon-arrow-left icon-white"></i> Back </a>
					</center>
				</form>
			</div>
		</div>
	</div>

	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')
	</script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript">
		// validaciones para que no se escojan mas de un asiento o menos de uno 
		function validateCheckBox() {
			var c = document.getElementsByTagName('input');
			var contador_asiento = 0;
			for (var i = 0; i < c.length; i++) {
				if (c[i].type == 'checkbox') {
					if (c[i].checked) {
						contador_asiento += 1;
					}
				}
			}
			if (contador_asiento > 1) {
				alert('Por favor, seleccione solo 1 asiento.');
				return false;
			} else if (contador_asiento == 0) {
				alert('Por favor, al menos 1 asiento.');
				return false;
			} else if (contador_asiento == 1) {
				return true;
			}
		}
	</script>
</BODY>

</HTML>