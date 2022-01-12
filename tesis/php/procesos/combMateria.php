<?php 
	require "../conexion.php";

	$valor= $_POST['selG'];

		$con = new conexion;
		$obj=$con->conectar();
		
		$sql = "SELECT id, nomb_materia, grado_id FROM materia WHERE grado_id ='$valor'";
		$res = mysqli_query($obj, $sql);

		$lista ="<option style='color: #F71919'>seleccionar</option>";
		
		while ($row = $res->fetch_assoc()) {
			$lista.= "<option value='$row[id]'>$row[nomb_materia]</option>";
		}

		echo $lista;
 ?>