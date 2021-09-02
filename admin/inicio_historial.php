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
				<li class="active">historial</li>
			</ol>
		</div><!--/.row-->
		

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;"><center> <strong> AGREGAR HISTORIAL DEL PACIENTE</strong></center>

<!-- /.Informacion-->

					</div>
					
				</div><!-- /.panel-->

	
				<div class="panel panel-default" >
				
<!-- /.Informacion-->	<a href="inicio_hospital.php"><button style="color: black; font-weight: bold;margin: 20px 20px; " type="button" class="btn btn-info" >
REGRESAR
</button></a>

			



					<div class="panel-body" style="">
						<div class="col-md-5" style="" >
	<!-- /.Informacion-->						

       <!----- Formulario  ---->


	<style type="text/css"> 

h1 {
  text-align: center; font-family: verdana; font-size: 24px;
  color: #f16e4e; font-weight: bold; letter-spacing: 7px;
}

p {
 

}

	 </style>

	 <?php
include_once("conexion.php");
$id=$_GET['id'];
$sentencia=$bd->query("SELECT * 
  FROM 
  paciente WHERE id_paciente='$id'



  ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$pa=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>		
					
				
<form role="form"  action="guardar_historial.php" method="post" >						
					


							<center><h1 style="">DATOS DEL PACIENTE</h1></center>

   <?php foreach($pa as $row): ?>



	<div class="form-group">



									
									<label>Codigo Paciente</label>
									<input type="text" class="form-control" name="codigo" value="000<?php echo $row->id_paciente; ?>" readonly>
								</div>
				<div class="form-group">

									<label>Paciente</label>
								<select class="form-control"  name="nombre" readonly>
											
											<option value="<?php echo $row->id_paciente; ?>" ><?php echo $row->nombre_apellido; ?></option>
											
										</select>

								</div>




							


								<div class="form-group">
									<label>Cedula</label>
									<input type="text" class="form-control" name="cedula" value="<?php echo $row->cedula; ?>"    readonly>



								</div>




<div class="form-group">
									<label>Fecha Nacimiento</label>
									<input type="date" class="form-control" name="fecha" value="<?php echo $row->fecha_nacimiento; ?>"  readonly> 
								</div>


<div class="form-group">
									<label>Genero</label>
		<input type="text" class="form-control" readonly value="<?php echo $row->sexo; ?>" name="genero" > 
								</div>

<div class="form-group">
									<label>Coreeo Electronico</label>
									<input type="email" class="form-control" readonly value="<?php echo $row->correo; ?>" name="correo" > 
								</div>
								  <?php endforeach; ?>

</div>


								<div class="col-md-7">
							
<center><h1 style="">REGISTRAR DATOS </h1></center>

                                 <div class="form-group">
									<label>Edad</label>
									<input type="text" class="form-control" name="edad" > 
								</div>

                           <div class="form-group">
									<label>Pais</label>
									<input type="text" class="form-control" name="pais" > 
								</div>
                        <div class="form-group">
									<label>Provincia</label>
									<input type="text" class="form-control" name="provincia" > 
								</div>

                         <div class="form-group">
									<label>Ciudad</label>
									<input type="text" class="form-control" name="ciudad" > 
								</div>



                            <div class="form-group">
									<label>Dirección</label>
									<input type="text" class="form-control" name="direccion"> 
								</div>

                            <div class="form-group">
									<label>Telefono</label>
									<input type="text" class="form-control" name="telefono" > 
								</div>



	                        <div class="form-group">
										<label>Estado Civil</label>
										<select class="form-control"  name="civil" >
											
											<option value="Soltero/a" >Soltero/a</option>
											<option value="Casado/a" >Casado/a</option>
											<option  value="Viudo/a" >Viudo/a</option>
										</select>


                                     </div>
</div>
	
		
                             <div class="col-md-12"><br> 
									
										


										<div class="form-group">
										<label>Motivo/Sintomas/Observacion</label>
 
                                     <textarea class="form-control" rows="3" value="" name="mot" ></textarea> 
									</div>			




                                      <div class="form-group">
										<label>Recomendaciones</label>
											<textarea class="form-control" rows="3" name="recom" ></textarea  > 
									</div>
									
		
									
								<button 

style="color: black; background:#ff7655; "


         type="submit" class="btn ">REGISTRAR</button>
      </div>
								



							</form>

	<!-- /.Informacion-->		



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
