<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8" name = "viewport" content = "width=device-width, initial-scale=1"/>
	 <title>Conexión Vital</title>
   <link rel="icon" href="../iconos/favicon.png" type="image" >

	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--
	<!fecha css-->
	<link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.css">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
		<i class="fa fa-calendar" aria-hidden="true"></i>

				</a></li>
				<li class="active">Inicio Sitio</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;"><center> <strong> Reporte y busqueda por Fechas</strong></center>
<!-- /.Informacion-->
					</div>		
				</div><!-- /.panel-->
				<div class="panel panel-default" >
					<div class="panel-body">
						
	<!-- /.Informacion-->						
	<br>
<a href="../reporte_citas.php"><button style="color: black; font-weight: bold;float: left; "  type="button" class="btn btn-info" >
REGRESAR
</button></a>

<!--FECHAAAAAAA FORM  ajax-->
	<div class = "row-fluid">
		<div class = "col-md-3"></div>
		<div class = "">
		<div class="panel panel-default">
			<div class="panel-body">
			<br>	<br>
				<div class = "form-inline">
					<form method="post" class="form" action="pdf_fecha.php" target="_blank">
				<label>Desde:</label>
				<input type = "text" class = "form-control" placeholder = "dd/mm/aaaa"  id = "date1" name="date1">
				<label>Hasta</label>
				<input type = "text" class = "form-control" placeholder = "dd/mm/aaaa"  id = "date2" name="date2">
					
	<button type = "button" class = "btn btn-danger" id = "btn_search" onclick="load();"><span class = "glyphicon glyphicon-search"></span></button>
				 <button type = "button" id = "reset" class = "btn btn-primary"><span class = "glyphicon glyphicon-refresh"><span></button>
 <button type="submit" class="btn" style="color: black; font-weight: bold;background: #ef9178;" >	<span class="glyphicon glyphicon-file " ><span> REPORTE </button>	
	
	</form>	
					
           
			</div>
			<br ><br >
<div >
        <div>
                <div class="col-8">


			<div class = "table-responsive">	
				<table  class="table table-striped table-bordered table-hover text-dark"  style="text-align: center; font-weight: bold;">
					<thead>
						<tr style="background:#222222;color:white; text-align: center; ">
						<th style = "width:30%;">Cedula</th>
							<th style = "width:30%;">Paciente</th>
				
							<th style = "width:20%;">Especialista</th>
								<th style = "width:20%;">Especialidad</th>
									<th style = "width:20%;">Fecha</th>
										<th style = "width:20%;">Hora</th>
											<th style = "width:20%;">Estado</th>
												<th style = "width:20%;">Observacion</th>
										
						</tr>
					</thead>
					<tbody id = "load_data">
						
					</tbody>
				</table>
			</div>	
			  
			  </div>
		</div>
		
		
		</div>
	

<!--FECHAAAAAAA FORM--->
					
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			

			<div class="col-sm-12">
				<p class="back-link">Fundación Conexión Vital   <a href="#">Andrea Hernandez Gerente</a></p>
			</div>

		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>
	
<script src = "js/jquery-ui.js"></script>
<script src = "js/ajax.js"></script>

</body>
</html>
