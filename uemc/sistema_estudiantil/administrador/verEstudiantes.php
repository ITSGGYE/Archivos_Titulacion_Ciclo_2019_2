<?php
session_start();
include ("../menu_conexion/conectar.php");
     if(!isset($_SESSION["tipo_usuario"])){
       header("location:../inicio.php");
     }
	 else{
	
	   $check_did = $_SESSION["tipo_usuario"];
		if($check_did !=2){
			 header("location:../inicio.php");
		}
	}
	$msg ="";
if((isset($_POST["year"]))  && (isset($_POST["section"])) && (isset($_POST["espe"])) ){
	
    $year=$_POST["year"];
    $section=$_POST["section"];
	$esp=$_POST["espe"];
	
	if($year == "" || $section == "" || $esp==""){
					$msg = "<font color=\"red\">Todos los campos son obligatorios.</font>";

	}
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<title>
		Unidad Educativa PCEI "Manuela Cañizares"
		</title>
	</head>
	<body>
		<div class="container" align="center">
			<div class="head pull-left">
				<h2 class="pull-left">SGA<small>&nbsp;&nbsp;Para Personas Con Escolaridad Inconclusa "Manuela Cañizares"</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../menu_conexion/administradormenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="verEstudiantes.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Ver detalles de los estudiantes </h3></caption>
			<tbody>
				<th class="danger" colspan="3">Ver				
				</th>
	
				<tr>
			
					<td class="info" colspan="3"> 	
						<select name="year" class="form-control">
					<option value="">-- SELECCIONE CURSO--</option>
								

					            <option value="Octavo">Octavo</option>
								<option value="Noveno">Noveno</option>
								<option value="Décimo">Décimo</option>
								<option value="Primero de Bachillerato">Primero de Bachillerato</option>
								<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
								<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
			
						</select>
					</td> 

				</tr>

                <tr>
                </td>
					<td class="info" colspan="3"> 	
						<select name="section" class="form-control">
					<option value=""> -- Seccion--</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
			
						</select>
					</td>
                </tr>
                <tr>
                <td class="info" colspan="3"> 	
						<select name="espe" class="form-control">
					<option value=""> -- Especializacion--</option>
					            <option value="Básica">Básica</option>
								<option value="Bachillerato en Informática">Bachillerato en Informática</option>
								<option value="Bachillerato en Electrónica">Bachillerato en Electrónica</option>
								<option value="Bachillerato en Electromecánica">Bachillerato en Electromecánica</option>
			
						</select>
					</td>

				</tr>
				<tr>
					<td colspan="3" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Consultar">	
								<p>Note:<font color="red"> 1 indica detenido</font> | <font color="green"> 0 indica no detenidos</font></p>	
					</td>
				</tr>
				<tr>
					<td colspan="3" align="center" class="success">
						<?php echo $msg; ?>
					</td>
				</tr>
			</tbody>			
			</table>
			</form>
		 </div>
		</div>
	</body>
</html>
<?php

if((isset($_POST["year"])) && (isset($_POST["section"])) && (isset($_POST["espe"])) ){
	
	$year=$_POST["year"];
    $section=$_POST["section"];
	$esp=$_POST["espe"];
	
	if($year == ""  ||  $section == ""  || $esp==""){
					$msg = "<font color=\"red\">Todos los campos son obligatorios.</font>";

	}
	else{
	// 2 -2
	if($year == "Octavo"){
		echo "<table class='table table-bordered table-hover'>
					<th class='danger'>ID registrado</th><th class='danger'>Nombre</th><th class='danger'>Representante</th><th class='danger'>Fecha de Nacimiento</th><th class='danger'>Edad</th><th class='danger'>Correo</th><th class='danger'>Curso</th><th class='danger'>Sección</th><th class='danger'>Especialización</th><th class='danger'>Estado</th>";
					$sql = mysqli_query( $conexion, "SELECT * FROM estudiantes WHERE seccion = '$section' and cicloEsp = '$esp' ");
					while($row = mysqli_fetch_array($sql)){
						$id = $row["idEst"];
						$name = $row["nombreEst"];
						$rep = $row["repEst"];               
						$fechnac = $row["fechaNacimiento"];
						$edad = $row["edad"];
						$corr = $row["correo"];
						$sec = $row["seccion"];               
						$espc = $row["cicloEsp"];
						$ds = $row["Estado"];
		
						
						echo "<tr> <td class='info'>$id</td>
						<td class='info'>$name</td>
					     <td class='info'>$rep</td>
						<td class='info'>$fechnac</td>
					    <td class='info'>$edad</td>
						<td class='info'>$corr</td>
						<td class='info'>Primero de Bachillerato</td>
						<td class='info'>$sec</td>
						<td class='info'>$espc</td>
						<td class='info'>$ds</td></tr>";
						
					}
					echo "</table>";
		
			}
			//3 -1
			else if($year == "Noveno"){
			echo "<table class='table table-bordered table-hover'>
			<th class='danger'>ID registrado</th><th class='danger'>Nombre</th><th class='danger'>Representante</th><th class='danger'>Fecha de Nacimiento</th><th class='danger'>Edad</th><th class='danger'>Correo</th><th class='danger'>Curso</th><th class='danger'>Sección</th><th class='danger'>Especialización</th><th class='danger'>Estado</th>";
			$sql = mysqli_query( $conexion, "SELECT * FROM estudiantes WHERE seccion = '$section' and cicloEsp = '$esp' ");
			while($row = mysqli_fetch_array($sql)){
				$id = $row["idEst"];
				$name = $row["nombreEst"];
				$rep = $row["repEst"];               
				$fechnac = $row["fechaNacimiento"];
				$edad = $row["edad"];
				$corr = $row["correo"];
				$sec = $row["seccion"];               
				$espc = $row["cicloEsp"];
				$ds = $row["Estado"];

				
				echo "<tr> <td class='info'>$id</td>
				<td class='info'>$name</td>
			    <td class='info'>$rep</td>
				<td class='info'>$fechnac</td>
			    <td class='info'>$edad</td>
				<td class='info'>$corr</td>
				<td class='info'>Primero de Bachillerato</td>
				<td class='info'>$sec</td>
				<td class='info'>$espc</td>
				<td class='info'>$ds</td></tr>";
						
					}
					echo "</table>";
		
			}

			else if($year == "Décimo"){
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>ID registrado</th><th class='danger'>Nombre</th><th class='danger'>Representante</th><th class='danger'>Fecha de Nacimiento</th><th class='danger'>Edad</th><th class='danger'>Correo</th><th class='danger'>Curso</th><th class='danger'>Sección</th><th class='danger'>Especialización</th><th class='danger'>Estado</th>";
					$sql = mysqli_query( $conexion, "SELECT * FROM estudiantes WHERE seccion = '$section' and cicloEsp = '$esp' ");
					while($row = mysqli_fetch_array($sql)){
						$id = $row["idEst"];
						$name = $row["nombreEst"];
						$rep = $row["repEst"];               
						$fechnac = $row["fechaNacimiento"];
						$edad = $row["edad"];
						$corr = $row["correo"];
						$sec = $row["seccion"];               
						$espc = $row["cicloEsp"];
						$ds = $row["Estado"];
		
						
						echo "<tr> <td class='info'>$id</td>
						<td class='info'>$name</td>
						<td class='info'>$rep</td>
						<td class='info'>$fechnac</td>
					    <td class='info'>$edad</td>
						<td class='info'>$corr</td>
						<td class='info'>Primero de Bachillerato</td>
						<td class='info'>$sec</td>
						<td class='info'>$espc</td>
						<td class='info'>$ds</td></tr>";
							
						}
						echo "</table>";
			
				}
	else if($year == "Primero de Bachillerato"){
echo "<table class='table table-bordered table-hover'>
<th class='danger'>ID registrado</th><th class='danger'>Nombre</th><th class='danger'>Representante</th><th class='danger'>Fecha de Nacimiento</th><th class='danger'>Edad</th><th class='danger'>Correo</th><th class='danger'>Curso</th><th class='danger'>Sección</th><th class='danger'>Especialización</th><th class='danger'>Estado</th>";
		$sql = mysqli_query( $conexion, "SELECT * FROM estudiantes WHERE seccion = '$section' and cicloEsp = '$esp' ");
		while($row = mysqli_fetch_array($sql)){
			$id = $row["idEst"];
			$name = $row["nombreEst"];
			$rep = $row["repEst"];               
			$fechnac = $row["fechaNacimiento"];
			$edad = $row["edad"];
			$corr = $row["correo"];
			$sec = $row["seccion"];               
			$espc = $row["cicloEsp"];
			$ds = $row["Estado"];

			
			echo "<tr> <td class='info'>$id</td>
			<td class='info'>$name</td>
		    <td class='info'>$rep</td>
			<td class='info'>$fechnac</td>
		    <td class='info'>$edad</td>
			<td class='info'>$corr</td>
			<td class='info'>Primero de Bachillerato</td>
			<td class='info'>$sec</td>
			<td class='info'>$espc</td>
			<td class='info'>$ds</td></tr>";
				
			}
			echo "</table>";

	}
	//3 -1
	else if($year == "Segundo de Bachillerato"){
	echo "<table class='table table-bordered table-hover'>
	<th class='danger'>ID registrado</th><th class='danger'>Nombre</th><th class='danger'>Representante</th><th class='danger'>Fecha de Nacimiento</th><th class='danger'>Edad</th><th class='danger'>Correo</th><th class='danger'>Curso</th><th class='danger'>Sección</th><th class='danger'>Especialización</th><th class='danger'>Estado</th>";
		$sql = mysqli_query( $conexion, "SELECT * FROM estudiantes WHERE seccion = '$section' and cicloEsp = '$esp' ");
		while($row = mysqli_fetch_array($sql)){
			$id = $row["idEst"];
			$name = $row["nombreEst"];
			$rep = $row["repEst"];               
			$fechnac = $row["fechaNacimiento"];
			$edad = $row["edad"];
			$corr = $row["correo"];
			$sec = $row["seccion"];               
			$espc = $row["cicloEsp"];
			$ds = $row["Estado"];

			
			echo "<tr> <td class='info'>$id</td>
			<td class='info'>$name</td>
		    <td class='info'>$rep</td>
			<td class='info'>$fechnac</td>
		    <td class='info'>$edad</td>
			<td class='info'>$corr</td>
			<td class='info'>Primero de Bachillerato</td>
			<td class='info'>$sec</td>
			<td class='info'>$espc</td>
			<td class='info'>$ds</td></tr>";
				
			}
			echo "</table>";

	}
	//3-2
	else if($year == "Tercero de Bachillerato"){
echo "<table class='table table-bordered table-hover'>
<th class='danger'>ID registrado</th><th class='danger'>Nombre</th><th class='danger'>Representante</th><th class='danger'>Fecha de Nacimiento</th><th class='danger'>Edad</th><th class='danger'>Correo</th><th class='danger'>Curso</th><th class='danger'>Sección</th><th class='danger'>Especialización</th><th class='danger'>Estado</th>";
		$sql = mysqli_query( $conexion, "SELECT * FROM estudiantes WHERE seccion = '$section' and cicloEsp = '$esp' ");
		while($row = mysqli_fetch_array($sql)){
			$id = $row["idEst"];
			$name = $row["nombreEst"];
			$rep = $row["repEst"];               
			$fechnac = $row["fechaNacimiento"];
			$edad = $row["edad"];
			$corr = $row["correo"];
			$sec = $row["seccion"];               
			$espc = $row["cicloEsp"];
			$ds = $row["Estado"];

			
			echo "<tr> <td class='info'>$id</td>
			<td class='info'>$name</td>
			<td class='info'>$rep</td>
			<td class='info'>$fechnac</td>
			<td class='info'>$edad</td>
			<td class='info'>$corr</td>
			<td class='info'>Primero de Bachillerato</td>
			<td class='info'>$sec</td>
			<td class='info'>$espc</td>
			<td class='info'>$ds</td></tr>";
				
			}
			echo "</table>";

	}
	//end of else indicating not null
 }
	
} 



?>
