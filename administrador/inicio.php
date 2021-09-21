<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Consultorio Odontologico</title>
	<link rel="icon" href="img/logooo.png" type="image" >
	<link rel="stylesheet" href="css/iconos.css">
	<link rel="stylesheet" href="css/mai.css">
</head>
<body >
	<?php
	include ('nav.php');
	?>
	<?php
	include ('iconos.php');
	?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<section  class="section">
						<div   class="wrapp">
							<article class="articles" >
								<div class="mensaje">
									<h2 > NUESTRAS GESTIONES </h2>
									<a  href="notificaciones.php" style="position: relative;top:-60px;left:-40%; font-weight: bold;"  > <img width="30px" src="img/notificacion.jpg" width="50"> </a>
									
								</div>
									<div class="principal_vista"><br>
										<a  class="cita" href="citas.php" ><p >Gestion  Citas <br/>
											<?php
											include_once("conexion.php");
											$sql = "SELECT COUNT(*) AS codigo
											FROM cita WHERE cit_estado='asignado' ";
											$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
											$stm->bindParam( PDO::PARAM_INT);
											$stm->execute();
											echo $stm->fetchColumn(); 
											?>
										</p></a><span class="icon-calendar"></span>
										
										<a class="especialista" href="especialista.php"><p class="" >Gestion  Especialista <br>
											<?php
											include_once("conexion.php");
											$sql = "SELECT COUNT(*) AS e
											FROM especialista ";
											$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
											$stm->bindParam( PDO::PARAM_INT);
											$stm->execute();
											echo $stm->fetchColumn(); 
											?></p></a><br/>
											<span class="icon-user"></span>			
											<a class="vista2" href="paciente.php"><p class="" >Gestion  Pacientes <br/>
												<?php
												include_once("conexion.php");
												$sql = "SELECT COUNT(*) AS p
												FROM paciente ";
												$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
												$stm->bindParam( PDO::PARAM_INT);
												$stm->execute();
												echo $stm->fetchColumn(); 
												?></p></a><span class="icon-man"></span>	
												<br><br><br>
												<a class="vista3" href="especialidad.php" ><p class="" >Gestion Especialidad<br/>
													<?php
													include_once("conexion.php");
													$sql = "SELECT COUNT(*) AS es
													FROM especialidad ";
													$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
													$stm->bindParam( PDO::PARAM_INT);
													$stm->execute();
													echo $stm->fetchColumn(); 
													?></p></a> <span class="icon-list"></span>
													<a class="vista4" href="reporte_inicio.php"><p class=""  >Reporte<br/>
														<?php
														include_once("conexion.php");
														$sql = "SELECT COUNT(*) AS es
														FROM cita ";
														$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
														$stm->bindParam( PDO::PARAM_INT);
														$stm->execute();
														echo $stm->fetchColumn(); 
														?>	
													</p></a><span  class="icon-history"></span>
													<a class="vista5" href="admin.php"><p class=""  >Usuarios <br/>
														<?php
														include_once("conexion.php");
														$sql = "SELECT COUNT(*) AS es
														FROM administrador ";
														$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
														$stm->bindParam( PDO::PARAM_INT);
														$stm->execute();
														echo $stm->fetchColumn(); 
														?>						
													</p></a><span  class="icon-users"></span>
												</div>	<br>
												<div style="position: relative; top: 30px; ">
													<p style="color: black;font-weight: bold;" class="back-link">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Consultorio Odontologico Smile dental.  </p></div>
												</article></div></section>
												
												
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