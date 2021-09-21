<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../../../index.html');
	
} 
?>
<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="../css/jquery/dist/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../fonts1/style.css">
	<link rel="stylesheet" href="../css
	/nav_inici.css">
	
	<link href="../css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	
</head>
<body>
	<?php
	include ('../../nav.php');
	?>
	<?php
	include ('../iconos.php');
	?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<section  class="section">
						<div   class="wrapp">
							<article class="articles" >
								<div class="mensaje">
									<h2>VER CITAS OCUPADAS Y CITAS DISPONIBLE</h2>
								</div>
								<div class="table-responsive"> 
									<table id="example" class="table table-striped table-bordered table-hover  text-dark" style="text-align: center; font-weight: bold;"   >
										
										<div id="datatable_length">
											<!-- RANGO DE FECHAS A BUSCAR Y EXPORTAR -->
											<label style="font-weight: normal;">Desde: <input value="<?php echo date("Y-m-d");?>" class="form-control" type="date" id="bd-desde"/></label>
											<label style="font-weight: normal;">Hasta: <input value="<?php echo date("Y-m-d");?>" class="form-control" type="date" id="bd-hasta"/></label>
											<button style="" id="rango_fecha" class="btn-sm btn-primary">Buscar</button>
											<!-- BOTON PARA EXPORTAR EL RANGO DE FECHAS -->
										</div>
									</div>
									
								</div>
								<div class="row">
									<thead>
										<tr>
											<th width="10">#</th>
											<th width="30">Paciente</th>
											<th width="30">Especialidad</th>
											<th width="30">Especialista</th>
											<th width="30">Fecha</th>
											<th width="30">Hora</th>
											<th width="30">estado</th>
										</tr>
									</thead>
									<!-- CONTENEDOR DONDE SE IMPRIMEN LA CONSULTA POR FECHAS -->
									<tbody id="actualizar">
										<?php include('../includes/imprimir_bitacorasignados.php'); ?>
									</tbody>
								</div>
							</table>
						</div>
					</div>
					
					<script type="text/javascript">
						(function(){	
							$('#rango_fecha').on('click',function(){
								var desde = $('#bd-desde').val();
								var hasta = $('#bd-hasta').val();
								var url = '../dao/busca_por_fechasignados.php';
								$.ajax({
									type:'POST',
									url:url,
									data:'desde='+desde+'&hasta='+hasta,
									success: function(datos){
										$('#actualizar').html(datos);
									}
								});
								return false;
							});
						})();
						
					</script>
					
					<!-- Bootstrap -->
					<script src="../css/bootstrap/dist/js/bootstrap.min.js"></script>
				</div>
				
				<div style="position: relative; top: 10px; ">
					<p style="color: black; font-weight: bold;" class="back-link">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Consultorio Odontologico Smile dental.  </p></div>
					
				</body>
				</html>