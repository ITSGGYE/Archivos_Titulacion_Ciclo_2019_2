<?php 
	require_once "../metodosCRUD.php";
	require_once "../conexion.php";

	$tab = new metodos;
	$sql = "SELECT  alumno.id, alumno.cedula, alumno.nombres, alumno.apellidos, alumno.telefono, alumno.celular, alumno.nacionalidad, alumno.sangre, alumno.genero, alumno.fech_nacimiento, alumno.edad, alumno.etnia, alumno.domicilio, alumno.correo, alumno.discapacidad, alumno.estado, alumno.nivel, alumno.procedencia, alumno.correo_edu, alumno.codigo_matricula, alumno.fech_matricula, alumno.fech_admision, alumno.periodoI, alumno.periodoF, alumno.jornada, grado.nombre_grado  FROM alumno INNER JOIN grado ON (alumno.grado_id = grado.id)"; 

	$datos = $tab->mostrar($sql);

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

	foreach ($datos as $key) {
		$i=$key['id'];
		$a="'actualizar_alumno.html'";
		$b="'eliminarAlumno.php'";
		$c="'imprimirAlumno.php'";


		$table .= '<tr>';
		$table .= '<td>'.$key['codigo_matricula'].'</td>';
		$table .= '<td>'.$key['nombres'].'</td>';
		$table .= '<td>'.$key['apellidos'].'</td>';
		$table .= '<td>'.$key['nacionalidad'].'</td>';

		$table .= '<td>'.$key['genero'].'</td>';
		$table .= '<td>'.$key['cedula'].'</td>';
		$table .= '<td>'.$key['telefono'].'</td>';
		$table .= '<td>'.$key['celular'].'</td>';

		$table .= '<td>'.$key['sangre'].'</td>';
		$table .= '<td>'.$key['fech_nacimiento'].'</td>';
		$table .= '<td>'.$key['edad'].'</td>';
		$table .= '<td>'.$key['etnia'].'</td>';

		$table .= '<td>'.$key['domicilio'].'</td>';
		$table .= '<td>'.$key['correo'].'</td>';
		$table .= '<td>'.$key['correo_edu'].'</td>';
		$table .= '<td>'.$key['nivel'].'</td>';

		$table .= '<td>'.$key['nombre_grado'].'</td>';
		$table .= '<td>'.$key['periodoI'].' - '.$key['periodoF'].'</td>';
		$table .= '<td>'.$key['jornada'].'</td>';
		$table .= '<td>'.$key['fech_matricula'].'</td>';
		
		$table .= '<td>'.$key['fech_admision'].'</td>';
		$table .= '<td>'.$key['procedencia'].'</td>';

		$table .= '<td>
		<a onclick="imprimir('.$c.','.$i.')" ><img src="../imagenes/icono_imprimir.png" class="icon_opcion" id="icon_opcion">Imprimir</a> 
		<br><br>
		<a  onclick="enlace('.$a.',this.id)" id="'.$i.'"><img src="../imagenes/icono_editar.png" id="icon_opcion">Editar</a> 
		<br><br>	
		<a onclick="eliminar('.$b.','.$i.')" ><img src="../imagenes/icono_eliminar.png"  class="icon_opcion" id="icon_opcion">Eliminar</a>
		</td>';
	}


	$table .='</table>';


	echo $table;

	
?>

