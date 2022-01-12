<?php 
	
	require_once "../conexion.php";
	$co = new conexion;
	$con = $co->conectar();

	$id = $_POST['id'];
	$sql = "SELECT cedula, nombres, apellidos, telefono, celular, nacionalidad, sangre, genero, fech_nacimiento, edad, etnia, domicilio, correo, discapacidad, estado, nivel, procedencia, correo_edu, codigo_matricula, fech_matricula, fech_admision, periodoI, periodoF, jornada, grado_id FROM alumno WHERE id='$id'";
	$result = mysqli_query($con, $sql);
	$ver = mysqli_fetch_row($result);

// ######################################################################################

	$sql1 = "SELECT id, nombre_grado FROM grado WHERE id='$ver[24]'";
	$res = mysqli_query($con, $sql1);
	$vista = mysqli_fetch_row($res);

// #######################################################################################

	$sql2 = "SELECT id, nombre_grado FROM grado ORDER BY nombre_grado ASC";
	$r = mysqli_query($con, $sql2);

 ?>

<form>
		<table id="tab_dato1">
			<tr>
				<td colspan="3" align="center" id="td_titulo1">ACTUALIZAR ALUMNO</td>
			</tr>
			<tr>
				<td colspan="3" align="left" id="td_titulo2">DATOS PERSONALES:</td>
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
							<option>Masculino</option>
							<option>Femenino</option>					
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
				<td><label>Discapacidad: <input type="text" id="txt_discapacidad" value="<?php echo $ver[13] ?>" placeholder="si no tiene poner ninguna"> </label></td>
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
				<td><label>Correo educativo: <br><input type="email" id="txt_correoI" placeholder="Example@rosa.edu.ec" value="<?php echo $ver[17] ?>" required> </label></td>
				<td><label>Correo: <br><input type="email" id="txt_correoP" placeholder="Example@gmail.com" value="<?php echo $ver[12] ?>" required> </label></td>
			</tr>
		</table>
		<table id="tab_dato2">
			<tr>
				<td colspan="3" align="left" id="td_titulo3">DATOS EDUCATIVOS:</td>
			</tr>
			<tr>
				<td>
					<label>Estado Actual:
						<select id="sel_estado">
							<option style="color: red; background: silver" value="<?php echo $ver[14] ?>"><?php echo $ver[14] ?></option>
							<option>Activo</option>
							<option>Inactivo</option>					
						</select>
					</label>
				</td>
				<td><label>Matricula: <input type="number" id="txt_matricula" min="0" max="999999" value="<?php echo $ver[18] ?>" required readonly> </label></td>
				<td><label>Fecha de matricula: <input type="date" id="dat_fechaM" min="2020-01-01" max="2099-01-01" value="<?php echo $ver[19] ?>"> </label></td>
			</tr>
			<tr>
				<td><label>Fecha de admision: <input type="date" id="dat_fechaI" min="2020-01-01" max="2099-01-01" value="<?php echo $ver[20] ?>"> </label></td>
				<td>
					<label>Nivel escolar:
						<select id="sel_nivel">
							<option style="color: red; background: silver" value="<?php echo $ver[15] ?>"><?php echo $ver[15] ?></option>
							<option>Jardin</option>
							<option>Primero</option>
							<option>Segundo</option>					
						</select>
					</label>
				</td>
				<td><label>Periodo escolar: <input type="number" id="txt_Pinicial" min="0" max="999999" value="<?php echo $ver[21] ?>" required placeholder="Inicial"> - <input type="number" id="txt_Pfinal" min="0" max="999999" value="<?php echo $ver[22] ?>" required placeholder="Final"></label></td>
			</tr>
			<tr>
				<td>
					<label>Grado escolar: 
						<select id="sel_grado">
							<option style="color: red; background: silver" value="<?php echo $vista[0] ?>"><?php echo $vista[1] ?></option>
							<?php  
							while ($row = $r->fetch_assoc()) {
							?>	
								<option value="<?php echo $row['id'] ?>"><?php echo $row['nombre_grado'] ?></option>;
							<?php  
							}
							?>					
						</select>
					</label>
				</td>
				<td>
					<label>jornada escolar:
						<select id="sel_jornada">
							<option style="color: red; background: silver" value="<?php echo $ver[23] ?>"><?php echo $ver[23] ?></option>
							<option>Matutina</option>
							<option>Vespertina</option>					
						</select>
					</label>
				</td>
				<td>
					<label>Procedencia: 
						<select id="sel_procedencia">
							<option style="color: red; background: silver" value="<?php echo $ver[16] ?>"><?php echo $ver[16] ?></option>
							<option>Traslado/a</option>
							<option>Residente</option>					
						</select>
					</label>
				</td>
			</tr>
		</table>
		<table id="tab_dato3">
			<tr>
				<td><input type="button" id="btn_actualizar" onclick="Ualumno(<?php echo $id ?>)" value="Actualizar" title="Click para actualizar los datos del alumno"></td>
				<td><input type="button" id="btn_regresar" value="Regresar" title="Click para regresar al contenido de la tabla" onclick="enlacePag('reporte_alumno.html')"></td>
			</tr>
		</table>
		<table id="tab_dato2">
		<tr>
			<td><div id="respuesta" style="margin-left: auto; margin-right: auto"></div></td>
		</tr>
		</table>
	</form>