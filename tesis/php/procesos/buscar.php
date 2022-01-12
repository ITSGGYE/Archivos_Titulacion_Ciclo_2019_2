<?php 

	require "../conexion.php";

	$datos = $_POST['datos'];
	$pagina = $_POST['pagina'];

//###################################### BUSCAR ALUMNO ##############################################

	if ($pagina == "reporte_alumno") {
		if (!empty($datos)) {
			$obj = new conexion;
			$con = $obj ->conectar();

			$consulta = mysqli_real_escape_string($con, $datos);
			$sql = mysqli_query($con, "SELECT id, cedula, nombres, apellidos, telefono, celular, nacionalidad, sangre, genero, fech_nacimiento, edad, etnia, domicilio, correo, discapacidad, estado, nivel, procedencia, correo_edu, codigo_matricula, fech_matricula, fech_admision, periodoI, periodoF, jornada, grado_id FROM alumno where nombres like '%".$datos."%' or codigo_matricula like '%".$datos."%'");

			$table="";

			$table .='<table id="tabla">';
			$table .='<tr>';
			$table .='<th>Matricula</th>';
			$table .='<th>Nombres</th>';
			$table .='<th>Apellidos</th>';
			$table .='<th>Nacionalidad</th>';

			$table .='<th>Genero</th>';
			$table .='<th>Cedula</th>';
			$table .='<th>Telefono</th>';
			$table .='<th>Celular</th>';

			$table .='<th>Tipo de sangre</th>';
			$table .='<th>Fecha nacimiento</th>';
			$table .='<th>Edad</th>';
			$table .='<th>Etnia</th>';

			$table .='<th>Domicilio</th>';
			$table .='<th>Correo</th>';
			$table .='<th>Correo escolar</th>';
			$table .='<th>Nivel escolar</th>';

			$table .='<th>Grado</th>';
			$table .='<th>Periodo</th>';
			$table .='<th>Jornada</th>';
			$table .='<th>Fecha de matricula</th>';
			$table .='<th>Fecha de admision</th>';
			$table .='<th>Procedencia</th>';

			$table .='<th>Opcion</th>';
			$table .='</tr>';

			while ($fila2 = mysqli_fetch_assoc($sql)) {
				$i=$fila2['id'];
				$a="'actualizar_alumno.html'";
				$b="'eliminarAlumno.php'";

				$sql1 = "SELECT id, nombre_grado FROM grado WHERE id=".$fila2['grado_id']."";
				$res = mysqli_query($con, $sql1);
				$vista = mysqli_fetch_row($res);


				$table .= '<tr>';
				$table .= '<td>'.$fila2['codigo_matricula'].'</td>';
				$table .= '<td>'.$fila2['nombres'].'</td>';
				$table .= '<td>'.$fila2['apellidos'].'</td>';
				$table .= '<td>'.$fila2['nacionalidad'].'</td>';

				$table .= '<td>'.$fila2['genero'].'</td>';
				$table .= '<td>'.$fila2['cedula'].'</td>';
				$table .= '<td>'.$fila2['telefono'].'</td>';
				$table .= '<td>'.$fila2['celular'].'</td>';

				$table .= '<td>'.$fila2['sangre'].'</td>';
				$table .= '<td>'.$fila2['fech_nacimiento'].'</td>';
				$table .= '<td>'.$fila2['edad'].'</td>';
				$table .= '<td>'.$fila2['etnia'].'</td>';

				$table .= '<td>'.$fila2['domicilio'].'</td>';
				$table .= '<td>'.$fila2['correo'].'</td>';
				$table .= '<td>'.$fila2['correo_edu'].'</td>';
				$table .= '<td>'.$fila2['nivel'].'</td>';

				$table .= '<td>'.$vista[1].'</td>';
				$table .= '<td>'.$fila2['periodoI'].' - '.$fila2['periodoF'].'</td>';
				$table .= '<td>'.$fila2['jornada'].'</td>';
				$table .= '<td>'.$fila2['fech_matricula'].'</td>';
				
				$table .= '<td>'.$fila2['fech_admision'].'</td>';
				$table .= '<td>'.$fila2['procedencia'].'</td>';

				$table .= '<td>
				<a onclick="" ><img src="../imagenes/icono_imprimir.png" class="icon_opcion" id="icon_opcion">Imprimir</a> 
				<br><br>
				<a  onclick="enlace('.$a.',this.id)" id="'.$i.'"><img src="../imagenes/icono_editar.png" id="icon_opcion">Editar</a> 
				<br><br>	
				<a onclick="eliminar('.$b.','.$i.')" ><img src="../imagenes/icono_eliminar.png"  class="icon_opcion" id="icon_opcion">Eliminar</a>
				</td>';
				$table .='</tr>';
			}
			$table .='</table>';

			echo $table;	
		}
	}


//###################################### BUSCAR DOCENTE ##############################################

	else if ($pagina == "reporte_profesor") {
		if (!empty($datos)) {

			$obj = new conexion;
			$con = $obj ->conectar();

			$consulta = mysqli_real_escape_string($con, $datos);
			$sql = mysqli_query($con ,"SELECT id, cedula, nombres, apellidos, telefono, celular, nacionalidad, sangre, genero, fech_nacimiento, edad, etnia, domicilio, correo, discapacidad, nivel_edu, especialidad, correo_edu, turno, observacion  FROM docente where nombres like '%".$datos."%' or cedula like '%".$datos."%'");

			$table="";

			$table .='<table id="tabla">';
			$table .='<tr>';
			$table .='<th>Cedula</th>';
			$table .='<th>Nombres</th>';
			$table .='<th>Apellidos</th>';
			$table .='<th>Telefono</th>';
			$table .='<th>celular</th>';
			$table .='<th>Nacionalidad</th>';
			$table .='<th>Sangre</th>';

			$table .='<th>Genero</th>';
			$table .='<th>Nacimiento</th>';
			$table .='<th>Edad</th>';
			$table .='<th>Etnia</th>';
			$table .='<th>Domicilio</th>';
			$table .='<th>Correo</th>';
			$table .='<th>Discapacidad</th>';

			$table .='<th>Nivel Educativo</th>';
			$table .='<th>Especializacion</th>';
			$table .='<th>Correo Educativo</th>';
			$table .='<th>Turno</th>';
			$table .='<th>Observacion</th>';

			$table .='<th>Opcion</th>';
			$table .='</tr>';

			while ($fila2 = mysqli_fetch_assoc($sql)) {

				$i=$fila2['id'];
				$a="'actualizar_profesor.html'";
				$b="'eliminarDocente.php'";

				$table .= '<tr>';
				$table .= '<td>'.$fila2['cedula'].'</td>';
				$table .= '<td>'.$fila2['nombres'].'</td>';
				$table .= '<td>'.$fila2['apellidos'].'</td>';
				$table .= '<td>'.$fila2['telefono'].'</td>';
				$table .= '<td>'.$fila2['celular'].'</td>';
				$table .= '<td>'.$fila2['nacionalidad'].'</td>';
				
				$table .= '<td>'.$fila2['sangre'].'</td>';
				$table .= '<td>'.$fila2['genero'].'</td>';
				$table .= '<td>'.$fila2['fech_nacimiento'].'</td>';
				$table .= '<td>'.$fila2['edad'].'</td>';
				$table .= '<td>'.$fila2['etnia'].'</td>';
				$table .= '<td>'.$fila2['domicilio'].'</td>';
				$table .= '<td>'.$fila2['correo'].'</td>';

				$table .= '<td>'.$fila2['discapacidad'].'</td>';
				$table .= '<td>'.$fila2['nivel_edu'].'</td>';
				$table .= '<td>'.$fila2['especialidad'].'</td>';
				$table .= '<td>'.$fila2['correo_edu'].'</td>';
				$table .= '<td>'.$fila2['turno'].'</td>';
				$table .= '<td>'.$fila2['observacion'].'</td>';

				$table .= '<td>
				<a onclick="" ><img src="../imagenes/icono_imprimir.png" class="icon_opcion" id="icon_opcion">Imprimir</a> 
				<br><br>
				<a  onclick="enlace('.$a.',this.id)" id="'.$i.'"><img src="../imagenes/icono_editar.png" id="icon_opcion">Editar</a> 
				<br><br>	
				<a onclick="eliminar('.$b.','.$i.')" ><img src="../imagenes/icono_eliminar.png"  class="icon_opcion" id="icon_opcion">Eliminar</a>
				</td>';

				$table .='</tr>';
			}
			$table .='</table>';

			echo $table;	
		}
	}

//###################################### BUSCAR GRADO ##############################################

	else if ($pagina == "reporte_grado") {
		if (!empty($datos)) {

			$obj = new conexion;
			$con = $obj->conectar();

			$consulta = mysqli_real_escape_string($con, $datos);
			$sql = mysqli_query($con ,"SELECT id, codigo, nombre_grado, numeros_alumnos, observacion FROM grado where nombre_grado like '%".$datos."%' or codigo like '%".$datos."%'");

			$table="";

			$table .='<table id="tabla">';
			$table .='<tr>';
			$table .='<th>Codigo</th>';
			$table .='<th>Grado</th>';
			$table .='<th>Numeros de Alumnos</th>';
			$table .='<th>Observacion</th>';
			$table .='<th>Opcion</th>';
			$table .='</tr>';

			while ($fila2 = mysqli_fetch_assoc($sql)) {

				$i=$fila2['id'];
				$a="'actualizar_grado.html'";
				$b="'eliminar.php'";

				$table .= '<tr>';
				$table .= '<td>'.$fila2['codigo'].'</td>';
				$table .= '<td>'.$fila2['nombre_grado'].'</td>';
				$table .= '<td>'.$fila2['numeros_alumnos'].'</td>';
				$table .= '<td>'.$fila2['observacion'].'</td>';

				$table .= '<td>
				<a onclick="" ><img src="../imagenes/icono_imprimir.png" class="icon_opcion" id="icon_opcion">Imprimir</a> 
				<br><br>
				<a  onclick="enlace('.$a.',this.id)" id="'.$i.'"><img src="../imagenes/icono_editar.png" id="icon_opcion">Editar</a> 
				<br><br>	
				<a onclick="eliminar('.$b.','.$i.')" ><img src="../imagenes/icono_eliminar.png"  class="icon_opcion" id="icon_opcion">Eliminar</a>
				</td>';

				$table .='</tr>';
			}

			$table .='</table>';

			echo $table;	
		}
	}

//###################################### BUSCAR MATERIA ##############################################

	else if ($pagina == "reporte_materia") {
		if (!empty($datos)) {

			$obj = new conexion;
			$con = $obj->conectar();

			$consulta = mysqli_real_escape_string($con, $datos);
			$sql = mysqli_query($con ,"SELECT id, codigo, jornada, nomb_materia, grado_id FROM materia where nomb_materia like '%".$datos."%' or codigo like '%".$datos."%'"); 

			$table="";

			$table .='<table id="tabla">';
			$table .='<tr>';
			$table .='<th>Codigo</th>';
			$table .='<th>Jornada</th>';
			$table .='<th>Grado</th>';
			$table .='<th>Materia</th>';
			$table .='<th>Opcion</th>';
			$table .='</tr>';

			while ($fila2 = mysqli_fetch_assoc($sql)) {

				$i=$fila2['id'];
				$a="'actualizar_materia.html'";
				$b="'eliminarMateria.php'";

				$sql1 = "SELECT id, nombre_grado FROM grado WHERE id=".$fila2['grado_id']."";
				$res = mysqli_query($con, $sql1);
				$vista = mysqli_fetch_row($res);


				$table .= '<tr>';
				$table .= '<td>'.$fila2['codigo'].'</td>';
				$table .= '<td>'.$fila2['jornada'].'</td>';
				$table .= '<td>'.$vista[1].'</td>';
				$table .= '<td>'.$fila2['nomb_materia'].'</td>';

				$table .= '<td>
				<a onclick="" ><img src="../imagenes/icono_imprimir.png" class="icon_opcion" id="icon_opcion">Imprimir</a> 
				<br><br>
				<a  onclick="enlace('.$a.',this.id)" id="'.$i.'"><img src="../imagenes/icono_editar.png" id="icon_opcion">Editar</a> 
				<br><br>	
				<a onclick="eliminar('.$b.','.$i.')" ><img src="../imagenes/icono_eliminar.png"  class="icon_opcion" id="icon_opcion">Eliminar</a>
				</td>';

				$table .='</tr>';
			}

			$table .='</table>';

			echo $table;	
		}
	}

//###################################### BUSCAR NOTA ##############################################

	else if ($pagina == "reporte_nota") {
		if (!empty($datos)) {

			$obj = new conexion;
			$con = $obj->conectar();

			$consulta = mysqli_real_escape_string($con, $datos);
			$sql = mysqli_query($con ,"SELECT notas.id, notas.nota_uno, notas.nota_dos, notas.nota_tres, notas.promedio, materia.nomb_materia, docente.nombres as docenteN, docente.apellidos as docenteA, alumno.nombres, alumno.apellidos, grado.nombre_grado FROM notas 
				INNER JOIN materia ON (notas.materia_id = materia.id)
				INNER JOIN docente ON (notas.docente_id = docente.id)
				INNER JOIN alumno ON (notas.alumno_id1 = alumno.id)
				INNER JOIN grado ON (notas.grado_id = grado.id) 
				where materia.nomb_materia like '%".$datos."%' or alumno.nombres like '%".$datos."%'"); 

			$table="";

			$table .='<table id="tabla">';
			$table .='<tr>';
			$table .='<th colspan="2">Alumno</th>';
			$table .='<th>Materia</th>';
			$table .='<th colspan="2">Docente</th>';
			$table .='<th>Grado</th>';
			$table .='<th>Primer parcial</th>';
			$table .='<th>Segundo parcial</th>';
			$table .='<th>Tercer parcial</th>';
			$table .='<th>Promedio</th>';
			$table .='<th>Opcion</th>';
			$table .='</tr>';

			while ($fila2 = mysqli_fetch_assoc($sql)) {

				$i=$fila2['id'];
				$a="'actualizar_nota.html'";
				$b="'eliminarNota.php'";

				$table .= '<tr>';
				$table .= '<td colspan="2">'.$fila2['nombres'].' '.$fila2['apellidos'].'</td>';
				$table .= '<td>'.$fila2['nomb_materia'].'</td>';
				$table .= '<td colspan="2">'.$fila2['docenteN'].' '.$fila2['docenteA'].'</td>';
				$table .= '<td>'.$fila2['nombre_grado'].'</td>';

				$table .= '<td>'.$fila2['nota_uno'].'</td>';
				$table .= '<td>'.$fila2['nota_dos'].'</td>';
				$table .= '<td>'.$fila2['nota_tres'].'</td>';
				$table .= '<td>'.$fila2['promedio'].'</td>';

				$table .= '<td>
				<a onclick="" ><img src="../imagenes/icono_imprimir.png" class="icon_opcion" id="icon_opcion">Imprimir</a> 
				<br><br>
				<a  onclick="enlace('.$a.',this.id)" id="'.$i.'"><img src="../imagenes/icono_editar.png" id="icon_opcion">Editar</a> 
				<br><br>	
				<a onclick="eliminar('.$b.','.$i.')" ><img src="../imagenes/icono_eliminar.png"  class="icon_opcion" id="icon_opcion">Eliminar</a>
				</td>';

				$table .='</tr>';
			}

			$table .='</table>';

			echo $table;	
		}
	}
?>