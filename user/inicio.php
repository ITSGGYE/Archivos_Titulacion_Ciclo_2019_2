<?php
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: index.php');
}

?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Conexión Vital</title>
	<link rel="icon" href="iconos/favicon.png" type="image">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php
	include('sidebar.php');
	include('nav.php');
	?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">CONTEO</li>
			</ol>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">

					<div style="background: #f6c1b4 ;" class="panel-body alert " role="alert">




						<center>

							<h1 style="font-weight: bold; font-size: 28px; letter-spacing:20px; ">
								FUNDACIÓN CONEXIÓN VITAL <p style="font-weight: lighter; font-size: 24px; letter-spacing:30px">TU PODER DE CREAR </p>
							</h1>


						</center>



					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">

					<div style="background: #cdd1da ; " class="panel-body alert " role="alert">




						<!-- /.Informacion-->



						<div class="alert " style="font-size: 20px; letter-spacing: 7px; color:#2e2d2d;background: #cdd1da;font-weight: bold">
							<center>
								<p style="letter-spacing: 7px;float: left; color:#2e2d2d; float:left;font-size: 18px;"> BIENVENIDO </p>




								<?php


								include_once("conexion.php");

								$sentencia = $bd->query("SELECT * FROM paciente WHERE  correo= '" . $_SESSION['nombre'] . "'
    ");

								$paciente = $sentencia->fetchAll(PDO::FETCH_OBJ);

								//print_r($var);

								?>




								<?php
								foreach ($paciente as $row) { ?>

									<p style="color:#ff7655;text-transform: uppercase; margin: -2px;  float:left;font-size: 19px;"><?php echo $row->nombre_apellido ?></p>
							</center>
						<?php } ?><br><br>
						<center>
							<center>
								</strong> AL SISTEMA DEL AGENDAMIENTO DE CITA</center>




						</div>




					</div>
				</div>
			</div>
		</div>
		<!--/.row-->



		<!--/-->
		<div class="col-md-12">
			<div class="panel panel-default ">

				<br>
				<center>
					<h4 style="font-weight: bold; letter-spacing: 20px; font-size: 28px;">FUNCIONES DEL SISTEMA</h4>
				</center>
				<div class="panel-heading">


					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
				</div>
				<div class="panel-body timeline-container">
					<ul class="timeline">
						<li>
							<div style="background: #ff7655;" class="timeline-badge"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">Gestion de Citas</h4>
								</div>

							</div>
						</li>

						<li>
							<div style="background: #222222;" class="timeline-badge"><em class="fa fa-clone">&nbsp;</em></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h4 class="timeline-title">Reportes</h4>
								</div>

							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--/.col-->


		<?php
		include_once("conexion.php");


		$sentencia = $bd->query("
	SELECT * 
	FROM cita c
	 JOIN paciente p
	  ON c.id_paciente= p.id_paciente
JOIN especialista e
  ON c.id_especialista =e.id_especialista

  JOIN especialidad d
  ON  e.id_especialidad=d.id_especialidad

	WHERE  p.correo= '" . $_SESSION['nombre'] . "'

  ;");
		//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
		$pa = $sentencia->fetchAll(PDO::FETCH_OBJ);

		//print_r($var);

		?>


		<div class="col-sm-9 col-sm-offset-1 col-lg-16 col-lg-offset main">



			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-default articles">
						<div class="panel-heading">


							<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
							<h5 style="text-transform:uppercase; font-weight: bold; ">Citas del Paciente <p style="text-transform:uppercase; font-weight: bold; color: #f16e4e;"><?php echo $row->nombre_apellido; ?></p>
							</h5>


						</div>

						<div class="panel-body articles-container"><?php foreach ($pa as $row) : ?>
								<div class="article border-bottom">
									<div class="col-xs-12">
										<div class="row">
											<div class="col-xs-2 col-md-2 date">
												<div class="large"> <?php $row->fecha;
																		$date = DateTime::createFromFormat('Y-m-d', $row->fecha);
																		echo $date->format('d'); ?></div>
												<div class="text" style="font-weight: bold;"> <?php $row->fecha;
																								$date = DateTime::createFromFormat('Y-m-d', $row->fecha);
																								echo $date->format('M'); ?></div>
												<p> <?php $row->fecha;
																		$date = DateTime::createFromFormat('Y-m-d', $row->fecha);
																		echo $date->format('Y'); ?></p>
												<h6>

													<?php $row->hora;
																		$date = DateTime::createFromFormat('H:i:s', $row->hora);
																		echo $date->format('G:i');
													?></h6>
											</div>
											<div class="col-xs-10 col-md-10">

												<p style="text-transform:uppercase; font-weight: bold;color: black; "><?php echo $row->nombre_doctor; ?></p>
												<p style="text-transform:uppercase; font-weight: bold; "><?php echo $row->nombre_especialidad; ?></p>

												<p style="text-transform:capitalize; font-weight: bold;color: #f16e4e; "><?php echo $row->estado; ?></p>
											</div>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<!--End .article-->



							<?php endforeach; ?>
						</div>
					</div>
					<!--End .articles-->

					<!--End .articles-->




				</div>
				<!--/.col-->

				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">

							<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
							<h5 style="text-transform:uppercase; font-weight: bold; ">Cantidad de Cita <p style="text-transform:uppercase; font-weight: bold; color: #f16e4e;"><?php echo $row->nombre_apellido; ?></p>
							</h5>


						</div>


						<div class="panel-body">
							<!--/.INFORMACION-->
							<div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="  width: 60%;
 margin: 0 auto;text-align:center;">
								<div class="panel panel-teal panel-widget">
									<div class="row no-padding"><i style="color : #54b7d5;" class="fa fa-xl fa-pencil-square-o " aria-hidden="true"></i>
										<div class="large"> <?php
															include_once("conexion.php");

															$id = $_GET['id'];
															$sql = "SELECT COUNT(*) AS codigo
         
                FROM cita c
	 JOIN paciente p
  ON c.id_paciente= p.id_paciente
	WHERE  p.correo= '" . $_SESSION['nombre'] . "'

                 ";
															$stm = $bd->prepare($sql);
															//pasamos el parámetro almacenado en $id
															$stm->bindParam(PDO::PARAM_INT);
															$stm->execute();
															echo $stm->fetchColumn();
															?>
										</div>
										<div style="color:orange;" class="text-muted ">Citas</div>
									</div>
								</div>
							</div>



						</div>
					</div>


				</div>
				<!--/.col-->



				<div class="col-sm-12">
					<p class="back-link">Fundación Conexión Vital Tu Poder De Crear</p>
				</div>





			</div>
			<!--/.row-->
		</div>
		<!--/.main-->

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/chart.min.js"></script>
		<script src="js/chart-data.js"></script>
		<script src="js/easypiechart.js"></script>
		<script src="js/easypiechart-data.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/custom.js"></script>


</body>

</html>