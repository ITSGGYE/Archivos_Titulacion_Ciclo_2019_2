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
   <link rel="icon" href="iconos/favicon.png" type="image" >

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	  <link rel="stylesheet" href="css/r.css">
	 
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


?>
	<?php

include ('sidebar.php');


?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
		<em class="fa fa-clone">&nbsp;</em> 

				</a></li>
				<li class="active">Reportes Citas</li>
			</ol>
		</div><!--/.row-->
		

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da; color: red;"><center><i style="color:red;" class="fa fa-file-pdf-o" aria-hidden="true"></i>
 <strong> REPORTES CITAS PDF</strong></center>

<!-- /.Informacion-->

					</div>
					
				</div><!-- /.panel-->

				
				<div class="panel panel-default" >
				
					<div class="panel-body">
						<div class="col-md-15" >
	<!-- /.Informacion-->						

<!--BUTTON MODAL -->
<a href="reporte_inicio.php"><button style="color: black; font-weight: bold; " type="button" class="btn btn-info" >
REGRESAR
</button></a>


<section>


<br><br>
<center>
  <button   type="button" class="btn by  i" style="margin:10px 0px 0px 0px;  background:#ff9177;">
     <center>
     <a href="reporte/pdf_cita_general.php" class="btn btn-link" style="text-decoration-line:none;" ><img width="120" src="iconos/pdf.png" />
 <br> <h5 class="i2  "> <strong>GENERAL</strong></h5>  </a></center>   


  </button>

 <!--   OTRO BOTON-->
  <button  type="button" class="btn btn-outline-light linea i" style="margin:10px 0px 0px 300px;  background:#ff9177;  ">
    
     <a href="reporte/pdf_cita_asignada.php" class="btn btn-link" style="text-decoration-line:none;" > <img width="120" src="iconos/pdf.png" title="click aqui"/>
 <br><center><h5 class="i2 "> <strong> ASIGNADAS</strong></h5></center>     </a> 


  </button>


</center>

 <!--   segunda columna-->
<br><br>
<center>
  <button title="Ingrese Instructores" type="button" class="btn btn-outline-light linea i " style="margin:10px 0px 0px 0px; background:#717171; ">
    
     <a href="reporte/pdf_cita_atendida.php" class="btn btn-link" style="text-decoration-line:none;"   > 
<img src="iconos/pdf.png" width="120"
title="click aqui"/>


 <br> <h5 class="i2"> <strong>ATENDIDAS</strong></h5>    </a> 


  </button>


</center>





<br><br><br>



</section>



					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			

			<div class="col-sm-12">
				<p class="back-link">Fundación Conexión Vital   <a href="index.php">Andrea Hernandez Gerente</a></p>
			</div>

		</div><!-- /.row -->
	</div><!--/.main-->
	
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
