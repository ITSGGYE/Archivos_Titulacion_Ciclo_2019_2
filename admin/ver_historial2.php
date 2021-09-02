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
	<link href="css/card.css" rel="stylesheet">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
		<i style="font-size: 14px;color: #64afcb;" class="fa fa-globe" aria-hidden="true"></i>
				</a></li>
				<li class="active">Historial</li>
			</ol>
		</div><!--/.row-->
		

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;"><center> <strong> HISTORIAL PACIENTE</strong></center>

<!-- /.Informacion-->

					</div>
					
				</div><!-- /.panel-->

			
	 <?php
include_once("conexion.php");
$id=$_GET['id'];

$sentencia=$bd->query("
	SELECT * 
	FROM cita c
	 JOIN paciente p
	  ON c.id_paciente= p.id_paciente
JOIN especialista e
  ON c.id_especialista =e.id_especialista

  JOIN especialidad d
  ON  e.id_especialidad=d.id_especialidad

	  where p.id_paciente= '$id'

  ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$pa=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>


	<div class="col-sm-9 col-sm-offset-1 col-lg-16 col-lg-offset main">
		
		

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default articles">
				<div class="panel-heading">
				
					
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
	<h5 style="text-transform:uppercase; font-weight: bold; "  >Citas del Paciente  <p style="text-transform:uppercase; font-weight: bold; color: #f16e4e;" ><?php echo $row->nombre_apellido; ?></p></h5>	


					</div>
					
<div class="panel-body articles-container"><?php foreach($pa as $row): ?>
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<div class="large">   <?php $row->fecha;
                   $date = DateTime::createFromFormat( 'Y-m-d', $row->fecha);
echo $date->format( 'd');?></div>
										<div class="text" style="font-weight: bold;"> <?php $row->fecha;
                   $date = DateTime::createFromFormat( 'Y-m-d', $row->fecha);
echo $date->format( 'M');?></div>
<p> <?php $row->fecha;
                   $date = DateTime::createFromFormat( 'Y-m-d', $row->fecha);
echo $date->format( 'Y');?></p>
<h6 > 

	<?php $row->hora;
                   $date = DateTime::createFromFormat( 'H:i:s', $row->hora);
echo $date->format( 'G:i'); 
             ?></h6>
									</div>
									<div class="col-xs-10 col-md-10">
									
										<p style="text-transform:uppercase; font-weight: bold;color: black; " ><?php echo $row->nombre_doctor; ?></p>
 <p style="text-transform:uppercase; font-weight: bold; "  ><?php echo $row->nombre_especialidad; ?></p>

 <p style="text-transform:capitalize; font-weight: bold;color: #f16e4e; "  ><?php echo $row->estado; ?></p>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->
						
						

							  <?php endforeach; ?>
					</div>
				</div><!--End .articles-->

<!--End .articles-->



		
			</div><!--/.col-->
			
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
					
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
	<h5 style="text-transform:uppercase; font-weight: bold; "  >Cantidad de Cita <p style="text-transform:uppercase; font-weight: bold; color: #f16e4e;" ><?php echo $row->nombre_apellido; ?></p></h5>	
				

					</div>
			

					<div class="panel-body">
				<!--/.INFORMACION-->
	<div class="col-xs-6 col-md-3 col-lg-3 no-padding" style="  width: 60%;
 margin: 0 auto;text-align:center;">
					<div class="panel panel-teal panel-widget"   >
						<div class="row no-padding"><i style="color : #54b7d5;" class="fa fa-xl fa-pencil-square-o " aria-hidden="true"></i>
						<div class="large">  <?php
include_once("conexion.php");

$id=$_GET['id'];
$sql = "SELECT COUNT(*) AS codigo
         
                FROM cita c
	 JOIN paciente p
  ON c.id_paciente= p.id_paciente
	  where p.id_paciente= '$id'

                 ";
$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
$stm->bindParam( PDO::PARAM_INT);
$stm->execute();
echo $stm->fetchColumn(); 
?>
</div>							<div style="color:orange;" class="text-muted ">Citas</div>
						</div>
					</div>
				</div>



					</div>
				</div>
		
			
			</div><!--/.col-->
		<br><br>	<br><br><div>	<br><br>	<br><br>	<br><br><br><br>	<br><br><div>	<br><br>	<br><br>	<br><br>
				<div class="panel panel-default" >
			<div>	
<!-- /.Informacion-->	<a href="inicio_hospital.php"><button style="color: black; font-weight: bold;margin: 20px 20px;font-size: 17px; " type="button" class="btn btn-info" >
REGRESAR
</button></a>

<a href="reporte/reporte_historial.php?id=<?php echo $row->id_paciente?>" target="_blank"><button target="_blank" style="color: black; font-weight: bold;margin: 20px 20px;font-size: 17px; " type="button" class="btn btn-warning" >
<svg style="font-size: 22px;" class="bi bi-file-earmark-arrow-down" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M4 1h5v1H4a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1V6h1v7a2 2 0 01-2 2H4a2 2 0 01-2-2V3a2 2 0 012-2z"/>
  <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 019 4.5z"/>
  <path fill-rule="evenodd" d="M5.646 9.146a.5.5 0 01.708 0L8 10.793l1.646-1.647a.5.5 0 01.708.708l-2 2a.5.5 0 01-.708 0l-2-2a.5.5 0 010-.708z" clip-rule="evenodd"/>
  <path fill-rule="evenodd" d="M8 6a.5.5 0 01.5.5v4a.5.5 0 01-1 0v-4A.5.5 0 018 6z" clip-rule="evenodd"/>
</svg> REPORTE HISTORIAL
</button></a>
</div>
 <center><h1 style="">DATOS DEL PACIENTE</h1></center>

					<div class="panel-body" style="">
						<div class="col-md-5" style="" >
	<!-- /.Informacion-->						

       <!----- Formulario  ---->
	<!-- /.Informacion-->		
	
	 <?php
include_once("conexion.php");

$id=$_GET['id'];

$sentencia=$bd->query("SELECT * 
  FROM 
  historial h
JOIN paciente p
on h.id_paciente= p.id_paciente

  WHERE h.id_paciente='$id'



  ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$pa=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>		
								
<form role="form"  >						
					


					

   <?php foreach($pa as $row): ?>

<div class="form-group">

<label>Codigo Historial</label>
<input type="text" class="form-control" value="000<?php echo $row->id_historial; ?>" readonly>
</div>

	
	<div class="form-group">

<label>Codigo Paciente</label>
	<input type="text" class="form-control" value="000<?php echo $row->id_paciente; ?>" readonly>
</div>
				
<div class="form-group">
<label>Paciente</label>
<select class="form-control"  readonly>
<option value="<?php echo $row->id_paciente; ?>" ><?php echo $row->nombre_apellido; ?></option>
</select>
</div>

<div class="form-group">
<label>Cedula</label>
<input type="text" class="form-control"  value="<?php echo $row->cedula; ?>"  readonly>
</div>


<div class="form-group">
<label>Fecha Nacimiento</label>
<input type="date" class="form-control" value="<?php echo $row->fecha_nacimiento; ?>"  readonly> 
</div>


<div class="form-group">
									<label>Genero</label>
		<input type="text" class="form-control" readonly value="<?php echo $row->genero; ?>" n > 
								</div>

<div class="form-group">
									<label>Coreeo Electronico</label>
									<input type="email" class="form-control" readonly value="<?php echo $row->correo; ?>"  > 
								</div>
								 

</div>


								<div class="col-md-7">
							

                                 <div class="form-group">
									<label>Edad</label>
									<input type="text" class="form-control" readonly value="<?php echo $row->edad; ?>" > 
								</div>

                           <div class="form-group">
									<label>Pais</label>
									<input type="text" class="form-control" readonly value="<?php echo $row->pais; ?>" > 
								</div>
                        <div class="form-group">
									<label>Provincia</label>
									<input type="text" class="form-control" readonly value="<?php echo $row->provincia; ?>" > 
								</div>

                         <div class="form-group">
									<label>Ciudad</label>
									<input type="text" class="form-control" readonly value="<?php echo $row->ciudad; ?>"> 
								</div>



                            <div class="form-group">
									<label>Dirección</label>
									<input type="text" class="form-control" readonly value="<?php echo $row->direccion; ?>"> 
								</div>

                            <div class="form-group">
									<label>Telefono</label>
									<input type="text" class="form-control" readonly value="<?php echo $row->telefono; ?>"> 
								</div>

  <div class="form-group">
										<label>Estado Civil</label>
										<input type="text" class="form-control" readonly value="<?php echo $row->civil; ?>"> 
                                     </div>
</div>
	
		
                          
									
										


										<div class="form-group">
										<label>Motivo/Sintomas/Observacion</label>
 
                                     <textarea class="form-control" rows="3" readonly ><?php echo $row->mot; ?></textarea> 
									</div>			

                                      <div class="form-group">
										<label>Recomendaciones</label>
											<textarea class="form-control" rows="3" readonly ><?php echo $row->recom; ?></textarea  >							
	
								 
									</div>
				
	
								
 <?php endforeach; ?>


							</form>

					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->

			<div class="col-sm-12">
				<p class="back-link">Fundación Conexión Vital   <a href="index.php">Andrea Hernandez Gerente</a></p>
			</div>

		</div><!--/.row-->
	</div>	<!--/.main-->
	  



</div>
</div>

	


								
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
