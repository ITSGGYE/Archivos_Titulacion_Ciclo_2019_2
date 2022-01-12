<?php 
	require "../conexion.php";
	require "../metodosCRUD.php";

	$id = $_POST['id'];

	$cedula= $_POST['cedula'];
	$telefono= $_POST['telefono'];
	$celular= $_POST['celular'];
	$nombres= $_POST['nombres'];
	$apellidos= $_POST['apellidos'];
	$nacionalidad= $_POST['nacionalidad'];

	$genero= $_POST['genero'];
	$sangre= $_POST['sangre'];
	$discapacidad= $_POST['discapacidad'];
	$fecha= $_POST['fecha'];
	$edad= $_POST['edad'];
	$etnia= $_POST['etnia'];
	$domicilio= $_POST['domicilio'];

	$correop= $_POST['correop'];
	$nivel= $_POST['nivel'];
	$estado= $_POST['estado'];
	$correoi= $_POST['correoi'];
	$matricula= $_POST['matricula'];
	$procedencia= $_POST['procedencia'];

	$fechaM= $_POST['fechaM'];
	$fechaI= $_POST['fechaI'];
	$periodoI= $_POST['periodoI'];
	$periodoF= $_POST['periodoF'];
	$grado= $_POST['grado'];
	$jornada= $_POST['jornada'];


	$datos = array($cedula, $nombres, $apellidos, $telefono, $celular, $nacionalidad, $sangre, $genero, $fecha, $edad, $etnia, $domicilio, $correop, $discapacidad, $estado, $nivel, $procedencia, $correoi, $matricula, $fechaM, $fechaI, $periodoI, $periodoF, $jornada, $grado, $id);

	$obj = new metodos();
	if ($obj->actualizaralumno($datos)==1 ) {
		echo "<span style='color: green; text-align: center; font-size: 24px'>DATOS ACTUALIZADOS CORRECTO</span>";
	}
	else{
		echo "<span style='color: red; text-align: center; font-size: 24px'>DATOS NO ACTUALIZADOS</span>";
	}
 ?>