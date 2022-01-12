<?php 
	require "../conexion.php";

	$pagina = $_POST['pagina'];
	$nivel = $_POST['sel'];

	if ($pagina == "registro_alumno") {

		$sql = "SELECT id, nombre_grado FROM grado where nivel = '$nivel'";

		$con = new conexion;
		$obj=$con->conectar();

		$res = mysqli_query($obj, $sql);

		$lista ="<option style='color: #F71919'>seleccionar</option>";
		while ($row = $res->fetch_assoc()) {
			$lista.= "<option value='$row[id]'>$row[nombre_grado]</option>";
		}
		echo $lista;
	}

	else if ($pagina == "registro_materia") {

		$sql = "SELECT id, nombre_grado FROM grado ORDER BY nombre_grado ASC";

		$con = new conexion;
		$obj=$con->conectar();

		$res = mysqli_query($obj, $sql);

		$lista ="<option style='color: #F71919'>seleccionar</option>";
		while ($row = $res->fetch_assoc()) {
			$lista.= "<option value='$row[id]'>$row[nombre_grado]</option>";
		}
		echo $lista;
	}

	else if($pagina == "registro_nota"){
		$sql = "SELECT id, nombre_grado FROM grado where nivel = '$nivel'";

		$con = new conexion;
		$obj=$con->conectar();

		$res = mysqli_query($obj, $sql);

		$lista ="<option style='color: #F71919'>seleccionar</option>";
		while ($row = $res->fetch_assoc()) {
			$lista.= "<option value='$row[id]'>$row[nombre_grado]</option>";
		}
		echo $lista;
	}
 ?>