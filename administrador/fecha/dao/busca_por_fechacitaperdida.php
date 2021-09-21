<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../dao/adminDAOcitasperdida.php';
$impr = new adminDAO();
if($_POST['desde']==false || $_POST['hasta']==false){
	include('../includes/imprimir_bitacoracitas_perdida.php');
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
				<td>⏰</td>
				<td><?php echo $datos[$x]['nombre_apellido']; ?></td>
				<td><?php echo $datos[$x]['nombre_especialidad']; ?></td>
				<td><?php echo $datos[$x]['nombre_doctor']; ?></td>
				<td><?php echo fechaNormal($datos[$x]['fecha']); ?></td>  		
				<td><?php echo $datos[$x]['hora']; ?></td>
				<td><?php echo $datos[$x]['cit_estado']; ?></td>
				<td><?php echo $datos[$x]['cit_observacion']; ?></td>
			</tr>
			<?php
		}
	}else{
		?>
		<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No hay datos disponibles en la tabla</td></tr>
		<?php
	}
}			
?>