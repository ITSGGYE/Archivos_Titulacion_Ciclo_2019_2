<?php 		

	require "../conexion.php";
	require "../metodosCRUD.php";

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


	$co = new conexion;
	$con = $co->conectar();

	$sql = "SELECT numeros_alumno FROM grado where nivel ='$nivel'";
	$res = mysqli_query($con, $sql);
	$vista = mysqli_fetch_row($res);

	$sql2 = "SELECT * FROM alumno";
	$resu = mysqli_query($con, $sql2);
	$numeros_registros =mysqli_num_rows($resu);



	if (empty($cedula) || empty($telefono) || empty($celular) || empty($nombres) || empty($apellidos) || 
		empty($nacionalidad) || $genero == "seleccionar" || $sangre == "seleccionar" || empty($discapacidad) || 
		empty($fecha) || empty($edad) || $etnia == "seleccionar" || empty($domicilio) || 
		empty($correop) || empty($correoi) || $estado == "seleccionar" || empty($matricula) || 
		empty($fechaM) || empty($fechaI) || $nivel == "seleccionar" || $grado == "seleccionar" || 
		$jornada == "seleccionar" || $procedencia == "seleccionar")
	{
		echo "<span style='color: red; text-align: center; font-size: 24px'>VERIFIQUE LOS DATOS INGRESADOS</span>";
	}
	else if($vista[0] == $numeros_registros){
		echo "<span style='color: red; text-align: center; font-size: 24px'>CUPOS DE ALUMNOS COMPLETO</span>";
	}
	else if($vista[0] != $numeros_registros)
	{
		$datos = array($cedula, $nombres, $apellidos, $telefono, $celular, $nacionalidad, $sangre, $genero, $fecha, $edad, $etnia, $domicilio, $correop, $discapacidad, $estado, $nivel, $procedencia, $correoi, $matricula, $fechaM, $fechaI, $periodoI, $periodoF, $jornada, $grado);

		$obj = new metodos();
		if ($obj->registroalumno($datos) ==1 ) {
			echo "<span style='color: green; text-align: center; font-size: 24px'>REGISTRO CORRECTO</span>";
		}
		else{
			echo "<span style='color: red; text-align: center; font-size: 24px'>ERROR AL REGISTRAR</span>";
		}
	}
 ?>