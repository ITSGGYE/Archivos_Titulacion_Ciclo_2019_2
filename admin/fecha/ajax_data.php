<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: ../index.php');
	}	
?>
<?php
$date1 = date("Y-m-d", strtotime($_POST['date1']));
$date2 = date("Y-m-d", strtotime($_POST['date2']));

if (!empty($_POST['date1']) and  !empty($_POST['date1'])){
	list($dia,$mes,$anio)=explode("/",$_POST['date1']);
	$date1="$anio-$mes-$dia";
	list($dia,$mes,$anio)=explode("/",$_POST['date2']);
	$date2="$anio-$mes-$dia";
	
	$sWhere="WHERE fecha BETWEEN '$date1' AND '$date2'";
	
} else {
	$sWhere="";	
}

#Conectare a la base de datos
include("conexion.php");
	
$q_book = $conn->query("SELECT * FROM cita 

INNER JOIN paciente
ON cita.id_paciente = paciente.id_paciente
INNER JOIN especialista 
ON cita.id_especialista = especialista.id_especialista

INNER JOIN  especialidad
 ON especialista.id_especialidad=especialidad.id_especialidad
 
	$sWhere ORDER BY cita.id_cita") or die(mysqli_error());
$v_book = $q_book->num_rows;
if($v_book > 0){
	while($f_book = $q_book->fetch_array()){
	?>
	<tr>
		<td><?php echo $f_book['cedula']?></td>
		<td><?php echo $f_book['nombre_apellido']?></td>
		<td><?php echo $f_book['nombre_doctor']?></td>
		<td><?php echo $f_book['nombre_especialidad']?></td>
		<td><?php echo date("d/m/Y", strtotime($f_book['fecha']))?></td>
		<td><?php echo $f_book['hora']?></td>
		<td><?php echo $f_book['estado']?></td>
		<td><?php echo $f_book['observacion']?></td>
	</tr>
	<?php
	}
}else{
		echo '
		<tr>
			<td colspan = "4" class="text-center">No se encontraron registros</td>
		</tr>
		';
}
	?>

	