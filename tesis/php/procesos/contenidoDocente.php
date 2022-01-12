<?php 
	require_once "../conexion.php";
	$co = new conexion;
	$con = $co->conectar();

	$id = $_POST['id'];
	$sql = "SELECT cedula, nombres, apellidos, telefono, celular, nacionalidad, sangre, genero, fech_nacimiento, edad, etnia, domicilio, correo, discapacidad, nivel_edu, especialidad, correo_edu, turno, observacion  FROM docente WHERE id='$id'";

	$result = mysqli_query($con, $sql);
	$ver = mysqli_fetch_row($result);

?>

<form>
		<table id="tab_dato1">
			<tr>
				<td colspan="3" align="center" id="td_titulo1">ACTUALIZAR DOCENTE</td>
			</tr>
			<tr>
				<td colspan="3" align="left" id="td_titulo2">DATOS DEL DOCENTE:</td>
			</tr>
			<tr>
				<td><label>Cedula: <input type="number" id="txt_cedula" value="<?php echo $ver[0] ?>" required> </label></td>
				<td><label>telefono: <input type="number" id="txt_telefono" value="<?php echo $ver[3] ?>" required> </label></td>
				<td><label>Celular: <input type="number" id="txt_celular" value="<?php echo $ver[4] ?>" required> </label></td>				
			</tr>
			<tr>
				<td><label>Nombres: <input type="text" id="txt_nombres" value="<?php echo $ver[1] ?>" required> </label></td>
				<td><label>Apellidos: <input type="text" id="txt_apellidos" value="<?php echo $ver[2] ?>" required> </label></td>
				<td><label>Nacionalidad: <input type="text" id="txt_nacionalidad" value="<?php echo $ver[5] ?>" required> </label></td>
			</tr>
			<tr>
				<td>
					<label>Genero: 
						<select id="sel_genero">
							<option style="color: red; background: silver" value="<?php echo $ver[7] ?>"><?php echo $ver[7] ?></option>
							<option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option>					
						</select>
					</label>
				</td>
				<td>
					<label>Sangre:
						<select id="sel_sangre">
							<option style="color: red; background: silver" value="<?php echo $ver[6] ?>"><?php echo $ver[6] ?></option>
							<option>A positivo</option>
							<option>A negativo</option>
							<option>B positivo</option>
							<option>B negativo</option>
							<option>AB positivo</option>
							<option>AB negativo</option>
							<option>O positivo</option>
							<option>O negativo</option>					
						</select>
					</label>
				</td>
				<td><label>Discapacidad: <input type="text" id="txt_discapacidad" placeholder="si no tiene poner ninguna" value="<?php echo $ver[13] ?>" required> </label></td>
			</tr>
			<tr>
				<td><label>Fecha de Nacimiento: <input type="date" id="dat_fecha" min="1999-01-01" max="2099-01-01" value="<?php echo $ver[8] ?>"> </label></td>
				<td><label>Edad: <input type="number" id="txt_edad" min="1" max="999" value="<?php echo $ver[9] ?>"> </label></td>
				<td>
					<label>Etnia:
						<select id="sel_etnia">
							<option style="color: red; background: silver" value="<?php echo $ver[10] ?>"><?php echo $ver[10] ?></option>
							<option>Mestizo</option>
							<option>Indigena</option>
							<option>Afroecuatoriano</option>
							<option>Negro</option>
							<option>Mulato</option>
							<option>Montuvio</option>
							<option>Asiatico</option>
							<option>Blanco</option>
							<option>Otro</option>
							<option>No reconocida</option>					
						</select>
					</label>
				</td>
			</tr>
			<tr>
				<td><label>Domicilio: <br><input type="text" id="txt_domicilio" value="<?php echo $ver[11] ?>" required> </label></td>
				<td><label>Correo educativo: <br><input type="email" id="txt_correoI" placeholder="Example@rosa.edu.ec" value="<?php echo $ver[16] ?>" required> </label></td>
				<td><label>Correo: <br><input type="email" id="txt_correoP" placeholder="Example@gmail.com" value="<?php echo $ver[12] ?>" required> </label></td>
			</tr>
			<tr>
				<td>
					<label>Nivel educativo: 
						<select id="sel_nivel">
							<option style="color: red; background: silver" value="<?php echo $ver[14] ?>"><?php echo $ver[14] ?></option>
							<option>Bachillerato</option>
							<option>Tecnico</option>
							<option>Universitario</option>
							<option>Doctorado</option>				
						</select>
					</label>
				</td>
				<td><label>Especialidad: <input type="text" id="txt_especialidad" value="<?php echo $ver[15] ?>" required> </label></td>
				<td>
					<label>Turno:
						<select id="sel_turno">
							<option style="color: red; background: silver" value="<?php echo $ver[17] ?>"><?php echo $ver[17] ?></option>
							<option>Matutina</option>
							<option>Vespertina</option>	
							<option>Todas jornadas</option>									
						</select>
					</label>
				</td>
			</tr>	
			<tr>
				<td colspan="3">
					<label>Observacion:</label>
					<br>
					<textarea id="txtar_observacion" rows="10" cols="40" placeholder="Escribe su observacion  (si no tiene una observacion poner ninguna)"><?php echo $ver[18] ?></textarea>	
				</td>
			</tr>
		</table>
		<table id="tab_dato2">
			<tr>
				<td><input type="button" onclick="Udocente(<?php echo $id ?>)" id="btn_actualizar" value="Actualizar" title="Click para actualizar al docente"></td>
				<td>	<input type="button" id="btn_regresar" value="Regresar" title="Click para regresar al contenido de la tabla" onclick="enlacePag('reporte_profesor.html')"></td>
			</tr>
		</table>
		<table id="tab_dato2">
		<tr>
			<td><div id="respuesta" style="margin-left: auto; margin-right: auto"></div></td>
		</tr>
		</table>
	</form>