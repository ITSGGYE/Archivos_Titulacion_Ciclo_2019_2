<?php 

	require "../conexion.php";
	require "../metodosCRUD.php";

	$id = $_POST['id'];
	$codigo= $_POST['codigo'];
	$materia= $_POST['materia'];
	$jornada= $_POST['jornada'];
	$grado= $_POST['grado'];

	$datos = array($codigo, $jornada, $materia, $grado, $id);

	$obj = new metodos();
	if ($obj->actualizarmateria($datos)==1 ) {
		echo "<span style='color: green; text-align: center; font-size: 24px'>DATOS ACTUALIZADOS CORRECTO</span>";
	}
	else{
		echo "<span style='color: red; text-align: center; font-size: 24px'>DATOS NO ACTUALIZADOS</span>";
	}
		
?>