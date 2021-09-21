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
	<link rel="stylesheet" href="css/mainn.css">
</head>
<body>
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
									<h2 > NUESTRAS GESTIONES </h2></div>
									<img class="imc"  src="img/reservar.png"  style="" >
									<div class="principal_vista"><br>
										<div class=""><a  href="citas.php" ><p >Gestion de Citas Asignadas<br/>
<!-- <?php
include_once("conexion.php");
$sql = "SELECT COUNT(*) AS codigo
                FROM cita WHERE  estado='asignado' ";
$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
$stm->bindParam( PDO::PARAM_INT);
$stm->execute();
echo $stm->fetchColumn(); 
?>-->
</p></a>
<br><br><br>
</div>
<div   class=""><a  href="citas_atendida.php" ><p >Gestion de Citas Atendidas <br/>
	
</p></a>
</div>
<br><br>
<div  class=""><a  href="citas_perdida.php" ><p >Gestion de Citas Perdidas <br/>
	
</p></a>
</div><br><br><br>
<div style="position: relative; top: 30px; ">
	<p style="color: black; font-weight: bold;" class="back-link">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Consultorio Odontologico Smile dental.  </p></div>
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