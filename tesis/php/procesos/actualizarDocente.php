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
	$especialidad= $_POST['especialidad'];
	$correoi= $_POST['correoi'];
	$turno= $_POST['turno'];
	$observacion= $_POST['observacion'];

	$datos = array($cedula, $nombres, $apellidos, $telefono, $celular, $nacionalidad, $sangre, $genero, $fecha, $edad, $etnia, $domicilio, $correop, $discapacidad, $nivel, $especialidad, $correoi, $turno, $observacion, $id);

	$obj = new metodos();
	if ($obj->actualizardocente($datos)==1 ) {
		echo "<span style='color: green; text-align: center; font-size: 24px'>DATOS ACTUALIZADOS CORRECTO</span>";
	}
	else{
		echo "<span style='color: red; text-align: center; font-size: 24px'>DATOS NO ACTUALIZADOS</span>";
	}
 ?>