<?php 
	require_once "../metodosCRUD.php";
	require_once "../conexion.php";

	$selgrado = $_POST['selG'];
	$selnivel = $_POST['selN'];
	$selmateria = $_POST['selM'];
	$selquimestre = $_POST['selQ'];


	if ($selgrado == "seleccionar" || $selnivel == "seleccionar" || $selmateria == "seleccionar" || $selquimestre == "seleccionar") {
	echo "<span style='color: red; text-align: center; font-size: 24px'>SELECCIONE LAS OPCIONES CORRESPONDIENTES</span>";
	}
	else{

	$tab = new metodos;

	$sql = "SELECT notas.id, notas.nota_uno, notas.nota_dos, notas.nota_tres, notas.promedio, notas.nivel, notas.quimestre, materia.nomb_materia, alumno.nombres, alumno.apellidos, grado.nombre_grado FROM notas 
				INNER JOIN materia ON (notas.materia_id = materia.id)
				INNER JOIN alumno ON (notas.alumno_id1 = alumno.id)
				INNER JOIN grado ON (notas.grado_id = grado.id)
				where materia.id = $selmateria
				and grado.id = $selgrado
				and notas.quimestre = '$selquimestre'";

	
	$datos = $tab->mostrar($sql);


	$table="";
	$table .='<input type="button" id="btn_editar" onclick="contenidoNota()" value="Editar" title="Click para editar las notas">';
	$table .='<table id="tabla">';
	$table .='<tr>';
	$table .='<th id="th_n" colspan="2">Alumno</th>';
	$table .='<th id="td_n">Materia</th>';
	$table .='<th id="td_n">Nivel</th>';
	$table .='<th id="td_n">Grado</th>';
	$table .='<th id="td_n">Quimestre</th>';
	$table .='<th id="td_n">Nota 1</th>';
	$table .='<th id="td_n">Nota 2</th>';
	$table .='<th id="td_n">Nota 3</th>';
	$table .='<th id="td_n">Promedio</th>';
	$table .='<th id="td_n">Eliminar</th>';
	$table .='</tr>';

	foreach ($datos as $key) {
		$i=$key['id'];
		$b="'eliminarNota.php'";

		$table .= '<tr>';
		$table .= '<td id="th_n" colspan="2">'.$key['nombres'].' '.$key['apellidos'].'</td>';
		$table .= '<td id="td_n">'.$key['nomb_materia'].'</td>';
		$table .= '<td id="td_n">'.$key['nivel'].'</td>';
		$table .= '<td id="td_n">'.$key['nombre_grado'].'</td>';
		$table .= '<td id="td_n">'.$key['quimestre'].'</td>';
		$table .= '<td id="td_n">'.$key['nota_uno'].'</td>';
		$table .= '<td id="td_n">'.$key['nota_dos'].'</td>';
		$table .= '<td id="td_n">'.$key['nota_tres'].'</td>';
		$table .= '<td id="td_n">'.$key['promedio'].'</td>';
		$table .= '<td id="td_n">	
		<a onclick="eliminar('.$b.','.$i.')" ><img src="../imagenes/icono_eliminar.png"  class="icon_opcion" id="icon_opcion">Eliminar</a>
		</td>';
		$table .= '</tr>';
	}
	$table .='</table>';
	echo $table;
	}

 ?>