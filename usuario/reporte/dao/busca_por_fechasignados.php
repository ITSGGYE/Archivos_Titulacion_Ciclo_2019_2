<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../dao/adminDAOasignados.php';
$impr = new adminDAO();
if($_POST['desde']==false || $_POST['hasta']==false){
	include('../includes/imprimir_bitacorasignados.php');
}else{
	$desde = $_POST['desde'];
	$hasta = $_POST['hasta'];
	$datos = $impr->buscarAllBitacoraFecha($desde,$hasta);
	?>
	<?php 
	if(count($datos)>0){ 
		for($x=0; $x<count($datos); $x++){
			?>
			<tr>
				<td><?php echo $datos[$x]['id_cita']; ?></td>
				<td>???</td>
				<td><?php echo $datos[$x]['nombre_especialidad']; ?></td>
				<td><?php echo $datos[$x]['nombre_doctor']; ?></td>
				<td><?php echo fechaNormal($datos[$x]['fecha']); ?></td>
				<td><?php echo $datos[$x]['hora']; ?></td>
				<td>ocupada</td>
			</tr>
			<?php
		}
	}else{
		?>
		<tr class="odd"><td valign="top" colspan="6" class="dataTables_empty">No hay datos disponibles en la tabla</td>
			<td valign="top" class="dataTables_empty">Esta citas esta disponible</td></tr>
			<?php
		}
	}			
	?>