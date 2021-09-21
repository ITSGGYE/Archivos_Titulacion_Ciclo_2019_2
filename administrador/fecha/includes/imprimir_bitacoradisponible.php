<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../dao/adminDAOdisponible.php';
$impr = new adminDAO();
$datos = $impr->allBitacora();
?>
<?php 
if(count($datos)>0){ 
	for($x=0; $x<count($datos); $x++){	 
		?>
		<tr>
			<td><?php echo $datos[$x]['id_cita']; ?></td>
			<td><?php echo $datos[$x]['nombre_apellido']; ?></td>
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
	<tr class="odd"><td valign="top" colspan="8" class="dataTables_empty">No hay datos disponibles en la tabla</td></tr>
	<?php
}
?>