<?php 
	require "../conexion.php";
	require "../metodosCRUD.php";

	$id = $_POST['id'];
	
	$nota1= $_POST['nota1'];
	$nota2= $_POST['nota2'];
	$nota3= $_POST['nota3'];
	$promedio= $_POST['promedio'];


	$datos = array($nota1, $nota2, $nota3, $promedio, $id);

	$obj = new metodos();
	if ($obj->actualizarnota($datos)==1 ) {
		echo "<span style='color: green; text-align: center; font-size: 24px'>DATOS ACTUALIZADOS CORRECTO</span>";
	}
	else{
		echo "<span style='color: red; text-align: center; font-size: 24px'>DATOS NO ACTUALIZADOS</span>";
	}
 ?>