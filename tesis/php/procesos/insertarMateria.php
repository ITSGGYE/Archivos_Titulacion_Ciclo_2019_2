<?php 

	require "../conexion.php";
	require "../metodosCRUD.php";

	$codigo= $_POST['codigo'];
	$materia= $_POST['materia'];
	$jornada= $_POST['jornada'];
	$grado= $_POST['grado'];


	if (empty($codigo) || empty($materia) || $grado == "seleccionar" || $jornada == "seleccionar") {
		echo "<span style='color: red; text-align: center; font-size: 24px'>VERIFIQUE LOS DATOS INGRESADOS</span>";
	}
	else{

		$datos = array($codigo, $jornada, $materia, $grado);
		
		$obj = new metodos();
		if ($obj->registromateria($datos)==1 ) {
			echo "<span style='color: green; text-align: center; font-size: 24px'>REGISTRO CORRECTO</span>";
		}
		else{
			echo "<span style='color: red; text-align: center; font-size: 24px'>ERROR AL REGISTRAR</span>";
		}
	}
 ?>