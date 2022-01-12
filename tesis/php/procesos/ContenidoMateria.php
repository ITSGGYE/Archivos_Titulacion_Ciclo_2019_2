<?php 
	
	require_once "../conexion.php";
	$co = new conexion;
	$con = $co->conectar();

	$id = $_POST['id'];
	$sql = "SELECT codigo, jornada, nomb_materia, grado_id FROM materia WHERE id='$id'";
	$result = mysqli_query($con, $sql);
	$ver = mysqli_fetch_row($result);

// ######################################################################################

	$sql1 = "SELECT id, nombre_grado FROM grado WHERE id='$ver[3]'";
	$res = mysqli_query($con, $sql1);
	$vista = mysqli_fetch_row($res);

// #######################################################################################

	$sql2 = "SELECT id, nombre_grado FROM grado ORDER BY nombre_grado ASC";
	$r = mysqli_query($con, $sql2);

 ?>

 <form>
		<table id="tab_dato1">
			<tr>
				<td colspan="3" align="center" id="td_titulo1">ACTUALIZAR  MATERIA</td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
			<td><label>Codigo: <input type="number" id="txt_codigo" value="<?php echo $ver[0] ?>" required readonly> </label></td>
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
			</tr>
			<tr>
				<td><label>Materia: <input type="text" id="txt_materia" value="<?php echo $ver[2] ?>" required> </label></td>
				<td>
					<label>jornada escolar:
						<select id="sel_jornada">
							<option style="color: red; background: silver" value="<?php echo $ver[1] ?>"><?php echo $ver[1] ?></option>
							<option value="Matutina">Matutina</option>
							<option value="Vespertina">Vespertina</option>					
						</select>
					</label>
				</td>
			</tr>
		</table>
		<table id="tab_dato2">
			<tr>
				<td><input type="button" id="btn_actualizar" value="Actualizar" onclick="Umateria(<?php echo $id ?>)" title="Click para actualizar la materia"></td>
				<td>	<input type="button" id="btn_regresar" value="Regresar" title="Click para regresar al contenido de la tabla" onclick="enlacePag('reporte_materia.html')"></td>
			</tr>
		</table>
		<table id="tab_dato2">
		<tr>
			<td><div id="respuesta" style="margin-left: auto; margin-right: auto"></div></td>
		</tr>
	</table>
	</form>