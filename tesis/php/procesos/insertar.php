<?php 

	require "../conexion.php";
	require "../metodosCRUD.php";

	$codigo= $_POST['codigo'];
	$nivel= $_POST['nivel'];
	$alumnos= $_POST['cantidad'];
	$grado= $_POST['grado'];
	$observacion= $_POST['observacion'];


	if (empty($codigo) || $nivel == "seleccionar" || empty($alumnos) || empty($grado) || empty($observacion) )
	{
		echo "<span style='color: red; text-align: center; font-size: 24px'>VERIFIQUE LOS DATOS INGRESADOS</span>";
	}
	else{

		$datos = array($codigo, $grado, $nivel, $alumnos, $observacion);

		$obj = new metodos();
		if ($obj->registrogrado($datos)==1 ) {
			echo "<span style='color: green; text-align: center; font-size: 24px'>REGISTRO CORRECTO</span>";
		}
		else{
			echo "<span style='color: red; text-align: center; font-size: 24px'>ERROR AL REGISTRAR</span>";
		}	
	}
 ?>