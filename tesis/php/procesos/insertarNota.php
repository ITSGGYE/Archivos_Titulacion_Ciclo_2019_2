<?php 

	require "../conexion.php";
	require "../metodosCRUD.php";

	$grado= $_POST['grado'];
	$nivel= $_POST['nivel'];
	$quimestre= $_POST['quimestre'];
	$materia= $_POST['materia'];
	$alumno= $_POST['alumno'];

	$nota1= $_POST['nota1'];
	$nota2= $_POST['nota2'];
	$nota3= $_POST['nota3'];
	$promedio= $_POST['promedio'];

	$con = new conexion;
	$obj=$con->conectar();

	if (empty($nota1) || empty($nota2) || empty($nota3) || empty($promedio)) {
		echo "<span style='color: red; text-align: center; font-size: 24px'>EXISTE DATOS EN BLANCO</span>";
	}
	else {
		$datos = array($nota1, $nota2, $nota3, $promedio, $nivel, $quimestre, $materia, $alumno, $grado);

		$obj = new metodos();
		if ($obj->registronota($datos)==1 ) {
			echo "<span style='color: green; text-align: center; font-size: 24px'>REGISTRO CORRECTO</span>";
		}
		else{
			echo "<span style='color: red; text-align: center; font-size: 24px'>ERROR AL REGISTRAR</span>";
		}
	}
 ?>