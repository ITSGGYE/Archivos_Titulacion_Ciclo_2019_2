<?php 
	require_once "../metodosCRUD.php";
	require_once "../conexion.php";

	$tab = new metodos;
	$sql = "SELECT id, codigo, nombre_grado, numeros_alumnos, observacion FROM grado"; 
	$datos = $tab->mostrar($sql);

	$table="";

	$table .='<table id="tabla">';
	$table .='<tr>';
	$table .='<th>Codigo</th>';
	$table .='<th>Grado</th>';
	$table .='<th>Numeros de Alumnos</th>';
	$table .='<th>Observacion</th>';
	$table .='<th>Opcion</th>';
	$table .='</tr>';

	foreach ($datos as $key) {
		$i=$key['id'];
		$a="'actualizar_grado.html'";
		$b="'eliminar.php'";


		$table .= '<tr>';
		$table .= '<td>'.$key['codigo'].'</td>';
		$table .= '<td>'.$key['nombre_grado'].'</td>';
		$table .= '<td>'.$key['numeros_alumnos'].'</td>';
		$table .= '<td>'.$key['observacion'].'</td>';
		$table .= '<td>
		<a  onclick="enlace('.$a.',this.id)" id="'.$i.'"><img src="../imagenes/icono_editar.png" id="icon_opcion">Editar</a> 
		<br><br>	
		<a onclick="eliminar('.$b.','.$i.')" ><img src="../imagenes/icono_eliminar.png"  class="icon_opcion" id="icon_opcion">Eliminar</a>
		</td>';
	}


	$table .='</table>';


	echo $table;
	
?>


