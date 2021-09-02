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
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <title>Conexión Vital</title>
   <link rel="icon" href="iconos/favicon.png" type="image" >

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
include ('nav.php');
include ('sidebar.php');
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">CONTEO</li>
			</ol>
		</div><!--/.row-->


			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
				
					<div style="background: #f6c1b4 ;" class="panel-body alert " role="alert">				
					<center>
					<h1 style="font-weight: bold; font-size: 28px; letter-spacing:20px; "> 
						FUNDACIÓN CONEXIÓN VITAL <p style="font-weight: lighter; font-size: 24px; letter-spacing:30px">TU PODER DE CREAR </p></h1>
					</center>
					</div>
				</div>
			</div>
		</div>
		
	
<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div  style="background: #cdd1da ; " class="panel-body alert " role="alert">
					<div  style="font-size: 17px; color:#2e2d2d;font-weight: bold;">
									<?php date_default_timezone_set('America/Guayaquil'); echo date("Y-m-d H:i:s");?>		
					</div>	

					<div class="alert " style="font-size: 22px; letter-spacing: 5px; color:#2e2d2d;background: #cdd1da;font-weight: bold;">
					<center> BIENVENIDO <strong><p style="color:#ff7655;text-transform: uppercase;"><?php echo $_SESSION['nombre'] ?></p></strong> 
					AL SISTEMA DEL AGENDAMIENTO DE CITA</center>
					</div>	
					</div>
				</div>
			</div>
		</div>

		<section  style="  width: 40%;margin: 0 auto;" >
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><i style="color : #54b7d5;" class="fa fa-xl fa-pencil-square-o " aria-hidden="true"></i>
							<div class="large">  <?php include_once("conexion.php");


$sql = "SELECT COUNT(*) AS codigo
                FROM cita ";
$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
$stm->bindParam( PDO::PARAM_INT);
$stm->execute();
echo $stm->fetchColumn(); 
?>
</div>
							<div style="color:orange;" class="text-muted ">Citas</div>
						</div>
					</div>
				</div>



				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"> <i class="fa fa-xl fa-user-o color-black" aria-hidden="true"></i>
							<div class="large"> <?php
include_once("conexion.php");


$sql = "SELECT COUNT(*) AS p
                FROM paciente ";
$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
$stm->bindParam( PDO::PARAM_INT);
$stm->execute();
echo $stm->fetchColumn(); 
?></div>
							<div style="color:orange;" class="text-muted">Pacientes</div>
						</div>
					</div>
				</div>



				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><i class="fa fa-xl fa-user  color-dark" aria-hidden="true"></i>
							<div class="large"><?php
include_once("conexion.php");


$sql = "SELECT COUNT(*) AS e
                FROM especialista ";
$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
$stm->bindParam( PDO::PARAM_INT);
$stm->execute();
echo $stm->fetchColumn(); 
?></div>
							<div style="color:orange;" class="text-muted">Especialistas</div>
						</div>
					</div>
				</div>



				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><i style="color : #54b7d5;" class="fa fa-xl fa-plus-square-o " aria-hidden="true"></i>
							<div class="large"><?php
include_once("conexion.php");


$sql = "SELECT COUNT(*) AS es
                FROM especialidad ";
$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
$stm->bindParam( PDO::PARAM_INT);
$stm->execute();
echo $stm->fetchColumn(); 
?></div>
							<div style="color:orange;" class="text-muted">Especialidades</div>
						</div>
					</div>
				</div>

			</div><!--/.row-->
		</div>
</section>
			
			
			<div class="col-md-12">
				<div class="panel panel-default ">
<div style="text-align: center;">
			<br>				<center> <h4 style="font-weight: bold; letter-spacing: 30px; font-size: 28px;">FUNCIONES DEL SISTEMA</h4></center>
	</div><div class="panel-heading" >
						
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
								<div  style="background: #ff7655;"  class="timeline-badge"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Gestion de Citas</h4>
									</div>
								
								</div>
							</li>
							<li>
								<div style="background: #222222;" class="timeline-badge "><i class="fa fa-user" aria-hidden="true"></i></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Gestion de Especialista</h4>
									</div>
									
								</div>
							</li>
							<li>
								<div style="background: #ff7655;" class="timeline-badge"><i class="fa fa-user-o" aria-hidden="true"></i></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Gestion de Pacientes</h4>
									</div>
									
								</div>
							</li>
							<li>
								<div style="background: #222222;" class="timeline-badge"><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Gestion Especialidades</h4>
									</div>
									
								</div>
							</li>
							<li>
								<div style="background: #ff7655;" class="timeline-badge"><i class="fa fa-users" aria-hidden="true"></i></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Gestion Usuario</h4>
									</div>
									
								</div>
							</li>



							<li>
								<div style="background: #222222;" class="timeline-badge"><i class="fa fa-address-card-o" aria-hidden="true"></i></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Historial General</h4>
									</div>
									
								</div>
							</li>
							<li>
								<div style="background: #ff7655;" class="timeline-badge"><em class="fa fa-clone">&nbsp;</em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Reportes</h4>
									</div>
									
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div><!--/.col-->





			<div class="col-sm-12">
				<p class="back-link">Fundación Conexión Vital   <a href="index.php">Andrea Hernandez Gerente</a></p>
			</div>





		</div><!--/.row-->
	</div>	<!--/.main-->
	
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