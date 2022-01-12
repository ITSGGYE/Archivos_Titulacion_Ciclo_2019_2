<?php 
	require "../conexion.php";
	require "../metodosCRUD.php";

	$id = $_POST['id'];
	$codigo= $_POST['codigo'];
	$nivel= $_POST['nivel'];
	$alumnos= $_POST['cantidad'];
	$grado= $_POST['grado'];
	$observacion= $_POST['observacion'];

	$datos = array($codigo, $grado, $nivel, $alumnos, $observacion, $id);

	$obj = new metodos();
	if ($obj->actualizargrado($datos)==1 ) {
		echo "<span style='color: green; text-align: center; font-size: 24px'>DATOS ACTUALIZADOS CORRECTO</span>";
	}
	else{
		echo "<span style='color: red; text-align: center; font-size: 24px'>DATOS NO ACTUALIZADOS</span>";
	}
 ?>

