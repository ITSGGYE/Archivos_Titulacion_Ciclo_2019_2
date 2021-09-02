<!-- Modal Editar -->
<div class="modal fade" id="editarCitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarFormedit()">
					<span aria-hidden="true" style="font-size: 40px;">&times;</span>
				</button>
				<div style="background:#222222;color:white;letter-spacing: 12px;" class="alert ">
					<strong>
						<h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel">
							<center>EDITAR CITAS</center>
						</h5>
					</strong>
				</div>
			</div>
			<div class="modal-body">
				<!----- Formulario  ---->
				
					<input type="hidden" name="IDCita" id="IDCita">
					<br>
					<?php
					include_once "conexion.php";
					date_default_timezone_set('America/Guayaquil');
					$sentencia = $bd->query("SELECT * FROM paciente");
					$pa = $sentencia->fetchAll(PDO::FETCH_OBJ);
					?>
					<!-- <div class="form-group">
						<label for="">PACIENTE
						</label>
						<select style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px;" name="paciente" id="IDPaciente" class="form-control">
							<?php foreach ($pa as $row) :?>
								<option value="<?php echo $row->id_paciente; ?>">
									<?php echo $row->nombre_apellido; ?>
								</option>
							<?php endforeach; ?>
						</select>
						<br>
					</div> -->
					<div class="form-group">
						<label for="">PACIENTE
						</label>
						<input type="hidden" id="IDPaciente" class="form-control">
						<input type="text" style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px;" name="paciente" id="nombrePaciente" class="form-control" disabled>
						<br>
					</div>
					<div class="form-group">
						<label for="">Especialidad
						</label>
						<select style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px;"  name="especialidad" id="IDEspecialidad" class="form-control"  >
							<option value="">Seleccione Especialidad</option>
							<?php $sql = $bd->query("SELECT * FROM especialidad");
							$especilaidad = $sql->fetchAll(PDO::FETCH_OBJ);
							foreach ($especilaidad as $row) : ?>
								<option value="<?php echo $row->id_especialidad; ?>"><?php echo $row->nombre_especialidad; ?></option>
							<?php endforeach; ?>
						</select>
						<br>
					</div>
					<div class="form-group">
						<label for="">Especialista
						</label>
						<select style="margin:-40px 0px 0px 115px; width:75%; 
						color: black; height: 40px; font-size: 13px;" name="especialista" id="IDEspecialista" class="form-control"  >
						</select>
					</div>
					<br>
					<div class="form-group">
						<label for="">FECHA
						</label>
						<input style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px; " class="form-control" type="date" name="fecha" id="IDfecha" class="form-control">
					</div>
					<br>
					<div class="form-group">
						<label>Hora
							<br>Disponible
						</label>
						<select style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px; " 
						name="hora" id="IDHora" class="form-control">
						
							<?php
							date_default_timezone_set('America/Guayaquil'); 
							$var1 = '9:00';
							$var2 = '19:00';
							$intervarlo = '5';
							$fechaInicio = new DateTime($var1);
							$fechaFin = new DateTime($var2);
							$fechaFin = $fechaFin->modify('+5 minutes');
							$rangoFechas = new DatePeriod($fechaInicio, new DateInterval('PT45M'), $fechaFin);
							foreach ($rangoFechas as $fecha) : ?>
								<option value="<?php echo $fecha->format("H:i:s"); ?>">
									<?php echo $fecha->format("H:i:s"); ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
					<br>
					<div class="form-group">
						<label for="">ESTADO
						</label>
						<select style="margin:-40px 0px 0px 115px; width:75%;  color: black; height: 40px; font-size: 13px;" name="estado" id="IDEstado" class="form-control">
						<option value="">Selecione un Estado</option>
							<option value="asignado">Asignado
							</option>
							<option value="atendido">Atendido
							</option>
							<option value="cancelado">Cancelado
							</option>
						</select>
					</div>
					<br>
					<div class="form-group">
						<label>Observacion
						</label>
						<textarea style="margin:-40px 0px 0px 115px; width:75%;  color: black; height: 40px; font-size: 13px;" placeholder="Escriba una Observacion" name="observacion" id="IDObservacion" class="form-control">
					</textarea>
					</div>
					<div class="modal-footer"><br>
						<button style="color: white; font-weight: bold;" type="button" } class="btn btn-danger" data-dismiss="modal">Cerrar</button>
						<button style="color: black; background:#ff7655;" type="submit" id="idActualizar" onclick="limpiarFormedit()" class="btn "> Actualizar</button>
					</div>
			</div>
		</div>
	</div>
</div>