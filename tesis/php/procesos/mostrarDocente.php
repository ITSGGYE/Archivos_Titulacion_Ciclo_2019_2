<?php 
	require_once "../metodosCRUD.php";
	require_once "../conexion.php";

	$tab = new metodos;
	$sql = "SELECT id, cedula, nombres, apellidos, telefono, celular, nacionalidad, sangre, genero, fech_nacimiento, edad, etnia, domicilio, correo, discapacidad, nivel_edu, especialidad, correo_edu, turno, observacion  FROM docente"; 
	$datos = $tab->mostrar($sql);

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

	foreach ($datos as $key) {
		$i=$key['id'];
		$a="'actualizar_profesor.html'";
		$b="'eliminarDocente.php'";
		$c="'imprimirDocente.php'";


		$table .= '<tr>';
		$table .= '<td>'.$key['cedula'].'</td>';
		$table .= '<td>'.$key['nombres'].'</td>';
		$table .= '<td>'.$key['apellidos'].'</td>';
		$table .= '<td>'.$key['telefono'].'</td>';
		$table .= '<td>'.$key['celular'].'</td>';
		$table .= '<td>'.$key['nacionalidad'].'</td>';
		
		$table .= '<td>'.$key['sangre'].'</td>';
		$table .= '<td>'.$key['genero'].'</td>';
		$table .= '<td>'.$key['fech_nacimiento'].'</td>';
		$table .= '<td>'.$key['edad'].'</td>';
		$table .= '<td>'.$key['etnia'].'</td>';
		$table .= '<td>'.$key['domicilio'].'</td>';
		$table .= '<td>'.$key['correo'].'</td>';

		$table .= '<td>'.$key['discapacidad'].'</td>';
		$table .= '<td>'.$key['nivel_edu'].'</td>';
		$table .= '<td>'.$key['especialidad'].'</td>';
		$table .= '<td>'.$key['correo_edu'].'</td>';
		$table .= '<td>'.$key['turno'].'</td>';
		$table .= '<td>'.$key['observacion'].'</td>';
	
		$table .= '<td>
		<a onclick="imprimir('.$c.','.$i.')" ><img src="../imagenes/icono_imprimir.png" class="icon_opcion" id="icon_opcion">Imprimir</a> 
		<br><br>
		<a  onclick="enlace('.$a.',this.id)" id="'.$i.'"><img src="../imagenes/icono_editar.png" id="icon_opcion">Editar</a> 
		<br><br>	
		<a onclick="eliminar('.$b.','.$i.')" ><img src="../imagenes/icono_eliminar.png"  class="icon_opcion" id="icon_opcion">Eliminar</a>
		</td>';
		$table .='</tr>';
	}


	$table .='</table>';


	echo $table;
	
?>


