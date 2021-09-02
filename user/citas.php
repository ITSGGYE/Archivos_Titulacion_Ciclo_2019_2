<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
	  header('Location: index.php');
	}
	include_once("conexion.php");  
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<link href="css/toastr.css" rel="stylesheet">
		<script src="js/toastr.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
		<link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="css/main.css">
		<script  type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
				</li>
				<li class="active">Citas</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;">
						<center> <strong>LISTA DE CITAS</strong></center>
					</div>
				</div>
				<div class="panel panel-default" >
					<div class="panel-body">
						<div class="col-md-15" >
							<div class="hero-unit-table">
								<button style="color: white; background:#ff7655;" type="button" class="btn " data-toggle="modal" data-target="#insertar">Nueva Cita</button>
								<button style="color: white; background:blue;float:right;" type="button" class="btn " >
								<a  href="pdf_cita_lista.php" target="_blank"  style="color: white;"> GENERAR CITAS ASIGNADA </a>
								</button> <br><br>
								<div>
									<div>
										<div class="col-8">
											<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered table-hover  text-dark" style="text-align: center; font-weight: bold;"   >
													<thead>
														<tr style="background:#222222;color:white; text-align: center; ">
															<th  scope="col">#</th>
															<th scope="col"  >Paciente</th>
															<th scope="col">Especialidad del Especialista</th>
															<th scope="col">Especialista</th>
															<th scope="col">Fecha</th>
															<th scope="col">Hora</th>
															<th scope="col">Estado</th>
															<th scope="col">Observacion</th>
															<th scope="col">Cancelar Cita</th>
															<th scope="col">Generar</th>
														</tr>
													</thead>
													<tbody>
														<!-- REGISTROS DE BD -->                                
														<?php
															include_once("conexion.php");
															
															$sentencia=$bd->query("SELECT * FROM cita c 
															 JOIN paciente p 
															 ON c.id_paciente=p.id_paciente 
															 JOIN especialista e
															 ON c.id_especialista =e.id_especialista 
															 JOIN especialidad d 
															 ON  e.id_especialidad=d.id_especialidad
															 WHERE  c.estado='asignado' AND p.correo= '".$_SESSION['nombre']."' ORDER BY c.id_cita;");
															$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
															?>
														<?php
															foreach($paciente as $row) {?>
														<tr >
															<td><?php echo $row->id_cita?></td>
															<td><?php echo $row->nombre_apellido?></td>
															<td><?php echo $row->nombre_especialidad?></td>
															<td><?php echo $row->nombre_doctor?></td>
															<td><?php echo $row->fecha?></td>
															<td><?php echo $row->hora?></td>
															<td><?php echo $row->estado?></td>
															<td><?php echo $row->observacion?></td>
															<td><button class="btn btn-danger deletebtn">Cancelar</button> </td>
															<td> <a href="reporte_pdf.php?id=<?php echo $row->id_cita?>" class="btn btn-success"  target="_blank" ><span class="glyphicon glyphicon-file">Reporte</a> </td>
														</tr>
														<?php }?>
													</tbody>
												</table>
												<!-- Modal Insertar -->
												<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size: 40px;" onclick="limpiarForm()">&times;</span></button> 
																<div style="background:#222222;color:white;letter-spacing: 12px;" class="alert ">
																	<strong>
																		<h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel">
																			<center>AGREGAR CITA</center>
																		</h5>
																	</strong>
																</div>
															</div>
															<div class="modal-body">
																<!----- Formulario  ---->
																<div class="form-group">
																	
                                                  <?php include_once("conexion.php");
																		$sql=$bd->query("SELECT * FROM paciente WHERE correo = '".$_SESSION['nombre']."';");
																		  $paciente=$sql->fetchAll(PDO::FETCH_OBJ);
																		?>                         
																	<label>PACIENTE</label>
																	<?php foreach($paciente as $row): ?> 
																	<input type="hidden" name="idpaciente" value="<?php echo $row->id_paciente; ?>" id="idpaciente">
																	<input  class="form-control" type="text" name="nombrepaciente" id="idnombre" value="<?php echo $row->nombre_apellido; ?>" readonly >
																	<?php endforeach; ?>                           
																</div>

																<div class="form-group">
																	<label for="">Especialidad</label>
																	<select name="especialidad" id="idEspecialidad" class="form-control" >
																		<option value=""> </option>
																		<?php  $sql=$bd->query("SELECT * FROM especialidad");
																			$especilaidad=$sql->fetchAll(PDO::FETCH_OBJ);
																			foreach($especilaidad as $row): ?> 
																		<option value="<?php echo $row->id_especialidad;?>"><?php echo $row->nombre_especialidad; ?></option>
																		<?php endforeach; ?>   
																	</select>
																</div>

																<div class="form-group">
																	<label for="">Especialista</label>
																	<select name="especialista" id="idEspecialista" class="form-control" disabled >
																		<option value=""> </option>
																	</select>
																</div>

																<div  id="result">
																</div>

																<?php
																	$hora1 = '11:45';
																	$hora2 = '20:30';
																	$intervarlo = '5';
																	$Inicio = new DateTime($hora1);
																	$fechaFin = new DateTime($hora2);
																	$fechaFin = $fechaFin->modify( '+5 minutes'); 
																	$fechasPeriodo = new DatePeriod($Inicio, new DateInterval('PT45M'), $fechaFin);
																	date_default_timezone_set('America/Guayaquil');
																	?>

																<div class="form-group">
																	<label for="">FECHA</label>
																	<input min="<?php echo date("Y-m-d");?>"  value="<?php echo date("Y-m-d");?>" class="form-control" type="date" name="fecha" id="fecha" disabled >
																</div>

																<div class="form-group">
																	<label for="">Horas</label>
																	<select id="idHora"  name="hora" class="form-control" disabled >
																		<option value="" >Seleccione horas disponible</option>
																		<?php foreach($fechasPeriodo as $fecha): ?>
																		<option value="<?php echo $fecha->format("H:i:s"); ?>"><?php echo $fecha->format("H:i:s");?></option>
																		<?php endforeach; ?>
																	</select>
																</div>

																<div class="form-group">
																	<label>ESTADO</label>
																	<input  class="form-control" type="text" name="estado" id="idestado" value="Asignado" readonly >
																</div>

																<div class="form-group">
																	<label>OBSERVACION-MOTIVO:</label>
																	<textarea placeholder="Escribir Motivo de Cita:" name="observacion" id="idobservacion" class="form-control" disabled ></textarea>
																</div><br>  

																<div class="modal-footer"><br>  
																	<button style="color: white; font-weight: bold; " type="button" class="btn btn-danger" data-dismiss="modal"  onclick="limpiarForm()">Cerrar</button>
																	<button style="color: black; background:#ff7655; " id="guardarCita"  onclick="validaGuardarCita()" class="btn ">Guardar</button>
																</div>

															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	<br>
				<div>
					<div class="col-sm-12">
						<br> <p class="back-link">Fundación Conexión Vital <a href="">Andrea Hernandez Gerente</a></p>
					</div>
				</div>
			</div>
		</div>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/chart.min.js"></script>
		<script src="js/chart-data.js"></script>
		<script src="js/easypiechart.js"></script>
		<script src="js/easypiechart-data.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/custom.js"></script>
		<!-- datatables JS -->
		<script type="text/javascript" src="datatables/datatables.min.js"></script>   
		<script src="js/userCitaGuardar.js"></script>
		<script type="text/javascript" src="js/main.js"></script>  
		<script>
			$('.deletebtn').on('click',function () {
			
			$tr=$(this).closest('tr');
			fila =$(this).closest('tr');
			var datos=$tr.children("td").map(function () {
			
			return $(this).text();
			
			});
			
			$('#delete_id').val(datos[0]);
			id = datos[0];
			swal({
			            title: "Atención!!",
			            text: "Seguro desea eliminar la cita?",
			            icon: "warning",
			            buttons: true,
			            dangerMode: true,
			        }).then((result) => {
			            if (result) {
			                deleteCita();
			            } else {
			                swal("Error al Guardar !");
			            }
			        });
			
			});
			
			function deleteCita() {
			  var estado = 'cancelado';
			$.ajax({
			
			    contentType: "application/json; charset=utf-8",
			    url: 'php/select_especialidaad.php?dato=' + 5 + "&id=" + id + "&estado=" + estado,
			    type: 'post',
			    success: function(data) {
			        swal("Eliminar!", "Cita Eliminada con Éxito", "success");
			        setTimeout(function() {
			            location.reload();
			        }, 500);
			    },
			    error: function(error) {
			        swal("Eliminar!", "Error al Eliminar Cita", "error");
			    }
			});
			}
			
		</script>
	</body>
</html>

