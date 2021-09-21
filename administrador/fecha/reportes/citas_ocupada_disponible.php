<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../../../index.html');
	
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Bootstrap Y JQuery -->
	<link href="../css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="../css/jquery/dist/jquery.min.js"></script>
	<script src="../css/pdf_object/pdfobject.js"></script>
	<link rel="stylesheet" type="text/css" href="../../fonts1/style.css">
	<link rel="stylesheet" href="../css/nav_inici.css">
	
	<style>
		.pdfobject-container {   height: 70rem;  }
		/*.modal-dialog{background-color: #fff; padding: 20px 15px;}*/
		#cancel{margin: 5px; display: block;}
		.cargando{position: absolute;width: 30px;right: -40px;top: -2px;}
		.hide{display: none;}
		.inicio a {text-decoration: none;}
	</style>	
	<link href="../css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	
</head>
<body>
	<?php
	include ('../nav.php');
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
									<h2>VER CITAS OCUPADAS Y DISPONIBLE</h2>
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
									<br><br>
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
										<?php include('../includes/imprimir_bitacoradisponible.php'); ?>
									</tbody>
								</div>
							</table>
						</div>
					</div>
				</div>
				<div class="modal fade" id="ver-pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<!--<div class="modal-dialog">-->
						<div class="x_panel">
							<div class="x_title">
								<!--<h2 class="text-center">Reporte Generado</h2>-->
								<div class="clearfix"></div>
							</div>
							<div id="view_pdf"></div>
							<a id="cancel" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancelar</a>
						</div>
						<!--</div>-->
					</div>
					
					<script type="text/javascript">
						(function(){	
							$('#rango_fecha').on('click',function(){
								var desde = $('#bd-desde').val();
								var hasta = $('#bd-hasta').val();
								var url = '../dao/busca_por_fechasdisponible.php';
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
					<div style="position: relative; top: 10px; ">
						<p style="color: black; font-weight: bold;" class="back-link">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Consultorio Odontologico Smile dental.  </p></div>
					</body>
					</html>