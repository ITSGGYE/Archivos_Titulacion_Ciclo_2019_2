<?php 
	require_once "../conexion.php";
	$co = new conexion;
	$con = $co->conectar();

	$id = $_POST['id'];
	$sql = "SELECT codigo, nombre_grado, nivel, numeros_alumnos, observacion FROM grado WHERE id='$id'";

	$result = mysqli_query($con, $sql);
	$ver = mysqli_fetch_row($result);

?>

 <form>
	<table id="tab_dato1">
		<tr>
			<td colspan="2" align="center" id="td_titulo1">ACTUALIZAR GRADO</td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td><label>Codigo: <input type="number" id="txt_codigo" value="<?php echo $ver[0] ?>" required readonly> </label></td>
			<td>
				<label>Nivel escolar:
					<select id="sel_nivel">
						<option style="color: red" value="<?php echo $ver[2] ?>"><?php echo $ver[2] ?></option>
						<option value="Jardin">Jardin</option>
						<option value="Primero">Primero</option>
						<option value="Segundo">Segundo</option>					
					</select>
				</label>
			</td>
		</tr>
		<tr>
			<td><label>Nro. Alumnos: <input type="number" id="txt_cantidad" value="<?php echo $ver[3] ?>"  required> </label></td>
			<td><label>Grado nuevo: <input type="text" id="txt_grado" value="<?php echo $ver[1] ?>" required placeholder="ej: Primero A"> </label></td>
		</tr>
		<tr>
			<td colspan="2">
				<label>Observacion:</label>
				<br>
				<textarea id="txtar_observacion"rows="10" placeholder="Escribe su observacion  (si no tiene una observacion poner ninguna)" cols="40"><?php echo $ver[4] ?></textarea>
			</td>
		</tr>
	</table>
	<table id="tab_dato2">
		<tr>
			<td><input type="button" id="btn_actualizar" onclick="UGrado(<?php echo $id ?>)" value="Actualizar" title="Click para actualizar los datos del grado"></td>
			<td><input type="button" id="btn_regresar" value="Regresar" title="Click para regresar al contenido de la tabla" onclick="enlacePag('reporte_grado.html')"></td>
		</tr>
	</table>
	<table id="tab_dato2">
		<tr>
			<td><div id="respuesta" style="margin-left: auto; margin-right: auto"></div></td>
		</tr>
	</table>
</form>