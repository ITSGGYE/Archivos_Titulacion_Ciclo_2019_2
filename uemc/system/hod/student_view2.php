<?php
session_start();
include ("../include/connect.php");
     if(!isset($_SESSION["did"])){
       header("location:../index.php");
     }
	 else{
	
	   $check_did = $_SESSION["did"];
		if($check_did !=2){
			 header("location:../index.php");
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
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="student_view2.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Ver detalles de los estudiantes </h3></caption>
			<tbody>
				<th class="danger" colspan="3">Ver				
				</th>
	
				<tr>
			
					<td class="info" colspan="3"> 	
						<select name="year" class="form-control">
					<option value="">-- SELECCIONE CURSO--</option>
								

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
					<option value="1">Informatica</option>
					<option value="2">Electónica</option>
					<option value="3">Electromecánica</option>
			
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
	 if($year == "Primero de Bachillerato"){
echo "<table class='table table-bordered table-hover'>
			<th class='danger'>ID registrado</th><th class='danger'>Nombre</th><th class='danger'>Año</th><th class='danger'>Sección</th><th class='danger'>Especialización</th><th class='danger'>Estado detenido</th>
		";
			$sql = mysqli_query( $conexion, "SELECT * FROM s4 WHERE sec = '$section' and especializacion = '$esp' ");
			while($row = mysqli_fetch_array($sql)){
                $id = $row["id"];
				$name = $row["sname"];
                $sec = $row["sec"];               
                $espc = $row["especializacion"];
                $ds = $row["detained"];

				
				echo "<tr> <td class='info'>$id</td>
				<td class='info'>$name</td>
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
			<th class='danger'>ID registrado</th><th class='danger'>Nombre</th><th class='danger'>Año</th><th class='danger'>Sección</th><th class='danger'>Especialización</th><th class='danger'>Estado detenido</th>
		";
			$sql = mysqli_query( $conexion, "SELECT * FROM s5 WHERE sec = '$section' and especializacion = '$esp' ");
			while($row = mysqli_fetch_array($sql)){
                $id = $row["id"];
				$name = $row["sname"];
                $sec = $row["sec"];               
                $espc = $row["especializacion"];
                $ds = $row["detained"];

				
				echo "<tr> <td class='info'>$id</td>
				<td class='info'>$name</td>
				<td class='info'>Segundo de Bachillerato</td>
                <td class='info'>$sec</td>
                <td class='info'>$espc</td>
				<td class='info'>$ds</td></tr>";
				
			}
			echo "</table>";

	}
	//3-2
	else if($year == "Tercero de Bachillerato"){
echo "<table class='table table-bordered table-hover'>
			<th class='danger'>ID registrado</th><th class='danger'>Nombre</th><th class='danger'>Año</th><th class='danger'>Sección</th><th class='danger'>Especialización</th><th class='danger'>Estado detenido</th>
		";
			$sql = mysqli_query($conexion, "SELECT * FROM s6 WHERE sec = '$section' and especializacion = '$esp' ");
			while($row = mysqli_fetch_array($sql)){
                $id = $row["id"];
				$name = $row["sname"];
                $sec = $row["sec"];               
                $espc = $row["especializacion"];
                $ds = $row["detained"];

				
				echo "<tr> <td class='info'>$id</td>
				<td class='info'>$name</td>
				<td class='info'>Tercero de Bachillerato</td>
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
