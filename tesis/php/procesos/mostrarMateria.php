<?php 
	require_once "../metodosCRUD.php";
	require_once "../conexion.php";

	$tab = new metodos;
	$sql = "SELECT materia.id, materia.codigo, materia.jornada, grado.nombre_grado, materia.nomb_materia FROM materia INNER JOIN grado ON (materia.grado_id = grado.id)"; 
	
	$datos = $tab->mostrar($sql);

	$table="";

	$table .='<table id="tabla">';
	$table .='<tr>';
	$table .='<th>Codigo</th>';
	$table .='<th>Jornada</th>';
	$table .='<th>Grado</th>';
	$table .='<th>Materia</th>';
	$table .='<th>Opcion</th>';
	$table .='</tr>';

	foreach ($datos as $key) {
		$i=$key['id'];
		$a="'actualizar_materia.html'";
		$b="'eliminarMateria.php'";


		$table .= '<tr>';
		$table .= '<td>'.$key['codigo'].'</td>';
		$table .= '<td>'.$key['jornada'].'</td>';
		$table .= '<td>'.$key['nombre_grado'].'</td>';
		$table .= '<td>'.$key['nomb_materia'].'</td>';
		$table .= '<td>
		<a  onclick="enlace('.$a.',this.id)" id="'.$i.'"><img src="../imagenes/icono_editar.png" id="icon_opcion">Editar</a> 
		<br><br>	
		<a onclick="eliminar('.$b.','.$i.')" ><img src="../imagenes/icono_eliminar.png"  class="icon_opcion" id="icon_opcion">Eliminar</a>
		</td>';
	}


	$table .='</table>';


	echo $table;




 ?>