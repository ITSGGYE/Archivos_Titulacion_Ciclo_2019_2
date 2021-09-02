<?
include('../connect_db.php');//CONEXION A LA BD

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

if(isset($_POST['generar_reporte']))
{
	// NOMBRE DEL ARCHIVO Y CHARSET
	header('Content-Type:text/csv; charset=latin1');
	header('Content-Disposition: attachment; filename="Reporte_Fechas_Ingreso.csv"');

	// SALIDA DEL ARCHIVO
	$salida=fopen('php://output', 'w');
	// ENCABEZADOS
	fputcsv($salida, array('Id ', 'id paciente', 'id especialidad', 'id especialita', 'Fecha ', 'hora ', 'estado', 'obser'));
	// QUERY PARA CREAR EL REPORTE
	$reporteCsv=$mysqli->query("SELECT *  FROM cita where fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY id_cita");
	while($filaR= $reporteCsv->fetch_assoc())
		fputcsv($salida, array($filaR['id_cita'], 
								$filaR['id_paciente'],
								$filaR['id_especialidad'],
								$filaR['id_especialista'],
								$filaR['fecha'],
									$filaR['hora'],
	$filaR['estado'],
	$filaR['observacion']
							));

}

?>