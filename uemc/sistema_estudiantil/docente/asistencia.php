
<?php
session_start();
include ("../menu_conexion/conectar.php");
     if(!isset($_SESSION["tipo_usuario"])){
       header("location:../inicio.php");
     }
	 else{
	
	   $check_did = $_SESSION["tipo_usuario"];
		if($check_did !=1){
			 header("location:../inicio.php");
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
			<div class="head pull-left"></br>
				<h2 class="pull-left">SGA<small>&nbsp;&nbsp;Para Personas Con Escolaridad Inconclusa </small>"Manuela Cañizares"</h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../menu_conexion/docentemenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="asistencia.php" >
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Agregar asistencia estudiantil  </h3></caption>
			<tbody>
				<th class="danger" colspan="3">Seleccione Un curso, sección, ciclo o especialización.
				</th>
			
				<tr>
					<td class="active" colspan="2">	
								<select name="sem" class="form-control">
			<option >-- Curso --</option>
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

					<td class="active">	
								<select name="section" class="form-control">
			<option >-- Sección --</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
		</select>
					</td>
				</tr>
				<tr>

                    <td class="active">	
			<select name="espe" class="form-control">
             <option >-- Especialización --</option>
			                    <option value="Básica">Básica</option>
								<option value="Bachillerato en Informática">Bachillerato en Informática</option>
								<option value="Bachillerato en Electrónica">Bachillerato en Electrónica</option>
								<option value="Bachillerato en Electromecánica">Bachillerato en Electromecánica</option>
             </select>
             </td>
             </tr>
				<tr><td class="active" align="center" colspan="3"><input type="submit" class="btn btn-success" value="Consultar"/></td></tr>

			</tbody>			
			</table>
			</form>
		 </div>
		</div>

<?php
	include("../menu_conexion/conectar.php");
	$i=1;
	$j = 1;
	
if(isset($_POST["sem"]) && isset($_POST["section"]) && isset($_POST["espe"]) ){
	$a = $_POST["sem"];
	$section = $_POST["section"];
	$espc = $_POST["espe"];
	//Asistencia de Octavo
    if($a == "Octavo"){
		$sql = mysqli_query($conexion,"SELECT idEst,nombreEst,Curso,seccion,cicloEsp FROM estudiantes WHERE seccion = '$section' AND cicloEsp = '$espc' ");
$count =  mysqli_num_rows($sql);
			echo "
			<div class='container'><div class='promotess'>
		<form method='post' action='asistencia.php'>
		<table class='table table-bordered table-hover'>
		<tbody>
		<th class='danger' colspan='3'>Asistencia del estudiante</th>
		<tr><td class='info'>			
		<input type='date' class='form-control' name='date' ></td>";
		  echo "
		<td class='info'><select class='form-control' name='fac'>";
		 $ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `asignatura` FROM `materiadoc` WHERE año='Octavo' GROUP BY `asignatura` ORDER BY `asignatura`");
			$count1= mysqli_num_rows($ans);
		while($j<=$count1){
			while($row = mysqli_fetch_array($ans)){
				 $fname = $row["asignatura"];
				echo "<option value='$fname'>$fname</option>";	
			}
			$j++;
		};
		echo "
		</select></td>
						<td class='info'>
				<select name='period' class='form-control'>
			<option value='1'>Primera hora</option>
					<option value='2'>Segunda hora</option>
					<option value='3'>Tercera hora</option>
					<option value='4'>Cuarta hora</option>
					<option value='5'>Quinta hora</option>
					<option value='6'>Sexta hora</option>
					<option value='7'>Septima hora</option>
					<option value='8'>Octava hora</option>
				</select>
		</td></tr></tbody></table>
		<input type='hidden' name='year' value='Octavo'/> 
		";
		while($row = mysqli_fetch_array($sql)){
			$id = $row["idEst"];
			$sem = $row["Curso"];
			$sections = $row["seccion"];
			$sectionss = $row["cicloEsp"];
			$nm = $row["nombreEst"];
			echo "
				<input type='text' readonly value='$nm' name='nm$i'>
				<input type='text' readonly value='$id' name='ids$i'>
				<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
			<input type='hidden' name='count' value='$count'/> 
			<input type='hidden' name='sect$i' value='$sections'/> 
			<input type='hidden' name='secti$i' value='$sectionss'/> 
		
			";
			$i++;
		}
		echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>	</td></tr>
		
		</table></form></div></div>";
}
    //asistencia de Noveno
    if($a == "Noveno"){
		$sql = mysqli_query($conexion,"SELECT idEst,nombreEst,Curso,seccion,cicloEsp FROM estudiantes WHERE seccion = '$section' AND cicloEsp = '$espc' ");
$count =  mysqli_num_rows($sql);
			echo "
			<div class='container'><div class='promotess'>
		<form method='post' action='asistencia.php'>
		<table class='table table-bordered table-hover'>
		<tbody>
		<th class='danger' colspan='3'>Asistencia del estudiante</th>
		<tr><td class='info'>			
		<input type='date' class='form-control' name='date' ></td>";
		  echo "
		<td class='info'><select class='form-control' name='fac'>";
		$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `asignatura` FROM `materiadoc` WHERE año='Noveno' GROUP BY `asignatura` ORDER BY `asignatura`");
		$count1= mysqli_num_rows($ans);
	while($j<=$count1){
		while($row = mysqli_fetch_array($ans)){
			 $fname = $row["asignatura"];
			echo "<option value='$fname'>$fname</option>";	
			}
			$j++;
		};
		echo "
		</select></td>
						<td class='info'>
				<select name='period' class='form-control'>
			<option value='1'>Primera hora</option>
					<option value='2'>Segunda hora</option>
					<option value='3'>Tercera hora</option>
					<option value='4'>Cuarta hora</option>
					<option value='5'>Quinta hora</option>
					<option value='6'>Sexta hora</option>
					<option value='7'>Septima hora</option>
					<option value='8'>Octava hora</option>
				</select>
		</td></tr></tbody></table>
		<input type='hidden' name='year' value='Noveno'/> 
		";
		while($row = mysqli_fetch_array($sql)){
			$id = $row["idEst"];
			$sem = $row["Curso"];
			$sections = $row["seccion"];
			$sectionss = $row["cicloEsp"];
			$nm = $row["nombreEst"];
			echo "
				<input type='text' readonly value='$nm' name='nm$i'>
				<input type='text' readonly value='$id' name='ids$i'>
				<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
			<input type='hidden' name='count' value='$count'/> 
			<input type='hidden' name='sect$i' value='$sections'/> 
			<input type='hidden' name='secti$i' value='$sectionss'/> 
		
			";
			$i++;
		}
		echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>	</td></tr>
		
		</table></form></div></div>";
}
    //Asistencia de Décimo
    if($a == "Décimo"){
		$sql = mysqli_query($conexion,"SELECT idEst,nombreEst,Curso,seccion,cicloEsp FROM estudiantes WHERE seccion = '$section' AND cicloEsp = '$espc' ");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='asistencia.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='3'>Asistencia del estudiante</th>
				<tr><td class='info'>			
				<input type='date' class='form-control' name='date' ></td>";
				  echo "
				<td class='info'><select class='form-control' name='fac'>";
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `asignatura` FROM `materiadoc` WHERE año='Décimo' GROUP BY `asignatura` ORDER BY `asignatura`");
				$count1= mysqli_num_rows($ans);
			while($j<=$count1){
				while($row = mysqli_fetch_array($ans)){
					 $fname = $row["asignatura"];
					echo "<option value='$fname'>$fname</option>";	
					}
					$j++;
				};
				echo "
				</select></td>
								<td class='info'>
						<select name='period' class='form-control'>
					<option value='1'>Primera hora</option>
							<option value='2'>Segunda hora</option>
							<option value='3'>Tercera hora</option>
							<option value='4'>Cuarta hora</option>
							<option value='5'>Quinta hora</option>
							<option value='6'>Sexta hora</option>
							<option value='7'>Septima hora</option>
							<option value='8'>Octava hora</option>
						</select>
				</td></tr></tbody></table>
				<input type='hidden' name='year' value='Décimo'/> 
				";
				while($row = mysqli_fetch_array($sql)){
					$id = $row["idEst"];
					$sem = $row["Curso"];
					$sections = $row["seccion"];
					$sectionss = $row["cicloEsp"];
					$nm = $row["nombreEst"];
					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='text' readonly value='$id' name='ids$i'>
						<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
					<input type='hidden' name='secti$i' value='$sectionss'/> 
				
					";
					$i++;
				}
				echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>	</td></tr>
				
				</table></form></div></div>";
		}
	//second year second semester attendacne
    if($a == "Primero de Bachillerato"){
		$sql = mysqli_query($conexion,"SELECT idEst,nombreEst,Curso,seccion,cicloEsp FROM estudiantes WHERE seccion = '$section' AND cicloEsp = '$espc' ");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='asistencia.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='3'>Asistencia del estudiante</th>
				<tr><td class='info'>			
				<input type='date' class='form-control' name='date' ></td>";
				  echo "
				<td class='info'><select class='form-control' name='fac'>";
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `asignatura` FROM `materiadoc` WHERE año='Primero de Bachillerato' GROUP BY `asignatura` ORDER BY `asignatura`");
				$count1= mysqli_num_rows($ans);
			while($j<=$count1){
				while($row = mysqli_fetch_array($ans)){
					 $fname = $row["asignatura"];
					echo "<option value='$fname'>$fname</option>";	
					}
					$j++;
				};
				echo "
				</select></td>
								<td class='info'>
						<select name='period' class='form-control'>
					<option value='1'>Primera hora</option>
							<option value='2'>Segunda hora</option>
							<option value='3'>Tercera hora</option>
							<option value='4'>Cuarta hora</option>
							<option value='5'>Quinta hora</option>
							<option value='6'>Sexta hora</option>
							<option value='7'>Septima hora</option>
							<option value='8'>Octava hora</option>
						</select>
				</td></tr></tbody></table>
				<input type='hidden' name='year' value='Primero de Bachillerato'/> 
				";
				while($row = mysqli_fetch_array($sql)){
					$id = $row["idEst"];
					$sem = $row["Curso"];
					$sections = $row["seccion"];
					$sectionss = $row["cicloEsp"];
					$nm = $row["nombreEst"];
					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='text' readonly value='$id' name='ids$i'>
						<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
					<input type='hidden' name='secti$i' value='$sectionss'/> 
				
					";
					$i++;
				}
				echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>	</td></tr>
				
				</table></form></div></div>";
		}
	//third year first semester attendance
	else if($a == "Segundo de Bachillerato"){
		$sql = mysqli_query($conexion,"SELECT idEst,nombreEst,Curso,seccion,cicloEsp FROM estudiantes WHERE seccion = '$section' AND cicloEsp = '$espc' ");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='asistencia.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='3'>Asistencia del estudiante</th>
				<tr><td class='info'>			
				<input type='date' class='form-control' name='date' ></td>";
				  echo "
				<td class='info'><select class='form-control' name='fac'>";
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `asignatura` FROM `materiadoc` WHERE año='Segundo de Bachillerato' GROUP BY `asignatura` ORDER BY `asignatura`");
				$count1= mysqli_num_rows($ans);
			while($j<=$count1){
				while($row = mysqli_fetch_array($ans)){
					 $fname = $row["asignatura"];
					echo "<option value='$fname'>$fname</option>";
					}
					$j++;
				};
				echo "
				</select></td>
								<td class='info'>
						<select name='period' class='form-control'>
					<option value='1'>Primera hora</option>
							<option value='2'>Segunda hora</option>
							<option value='3'>Tercera hora</option>
							<option value='4'>Cuarta hora</option>
							<option value='5'>Quinta hora</option>
							<option value='6'>Sexta hora</option>
							<option value='7'>Septima hora</option>
							<option value='8'>Octava hora</option>
						</select>
				</td></tr></tbody></table>
				<input type='hidden' name='year' value='Segundo de Bachillerato'/> 
				";
				while($row = mysqli_fetch_array($sql)){
					$id = $row["idEst"];
					$sem = $row["Curso"];
					$sections = $row["seccion"];
					$sectionss = $row["cicloEsp"];
					$nm = $row["nombreEst"];
					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='text' readonly value='$id' name='ids$i'>
						<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
					<input type='hidden' name='secti$i' value='$sectionss'/> 
				
					";
					$i++;
				}
				echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>	</td></tr>
				
				</table></form></div></div>";
		}
	// third year second semester aattendance
	else if($a == "Tercero de Bachillerato"){
	$sql = mysqli_query($conexion,"SELECT idEst,nombreEst,Curso,seccion,cicloEsp FROM estudiantes WHERE seccion = '$section' AND cicloEsp = '$espc' ");
	$count =  mysqli_num_rows($sql);
				echo "
				<div class='container'><div class='promotess'>
			<form method='post' action='aasistencia.php'>
			<table class='table table-bordered table-hover'>
			<tbody>
			<th class='danger' colspan='3'>Asistencia del estudiante</th>
			<tr><td class='info'>			
			<input type='date' class='form-control' name='date' ></td>";
			  echo "
			<td class='info'><select class='form-control' name='fac'>";
			$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `asignatura` FROM `materiadoc` WHERE año='Tercero de Bachillerato' GROUP BY `asignatura` ORDER BY `asignatura`");
			$count1= mysqli_num_rows($ans);
		while($j<=$count1){
			while($row = mysqli_fetch_array($ans)){
				 $fname = $row["asignatura"];
				echo "<option value='$fname'>$fname</option>";	
				}
				$j++;
			};
			echo "
			</select></td>
							<td class='info'>
					<select name='period' class='form-control'>
				<option value='1'>Primera hora</option>
						<option value='2'>Segunda hora</option>
						<option value='3'>Tercera hora</option>
						<option value='4'>Cuarta hora</option>
						<option value='5'>Quinta hora</option>
						<option value='6'>Sexta hora</option>
						<option value='7'>Septima hora</option>
						<option value='8'>Octava hora</option>
					</select>
			</td></tr></tbody></table>
			<input type='hidden' name='year' value='Tercero de Bachillerato'/> 
			";
			while($row = mysqli_fetch_array($sql)){
				$id = $row["idEst"];
				$sem = $row["Curso"];
				$sections = $row["seccion"];
				$sectionss = $row["cicloEsp"];
				$nm = $row["nombreEst"];
				echo "
					<input type='text' readonly value='$nm' name='nm$i'>
					<input type='text' readonly value='$id' name='ids$i'>
					<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
				<input type='hidden' name='count' value='$count'/> 
				<input type='hidden' name='sect$i' value='$sections'/> 
				<input type='hidden' name='secti$i' value='$sectionss'/> 
			
				";
				$i++;
			}
			echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>	</td></tr>
			
			</table></form></div></div>";
	}
}
?>

<?php

	$msg="";
	$succ="";
	$count="";
	$sem="";
	$res="";
	$i=1;
	do{
	if(isset($_POST["ids$i"]) && isset($_POST["date"]) && (isset($_POST["period"]))){
		 if(isset($_POST["result$i"]) == null){
			$res = 0;
		 }
		 else{
			$res = $_POST["result$i"];
		}
		
		$period = $_POST["period"];
		$date = $_POST["date"];
		$count = $_POST["count"];
		$fac = $_POST["fac"];
		$sem = $_POST["year"];
		$sec = $_POST["sect$i"];
		$especi = $_POST["secti$i"];
		$ides = $_POST["ids$i"];
		$names = $_POST["nm$i"];

	 // second year second semester attendance
	 if($sem == "Octavo"){
		$check = mysqli_query($conexion,"select idAsis from asistencia where (materia='$fac' and dia='$date') and (seccion = '$sec' and hora = '$period' and asistEsp='$especi') ");
		$countCheck = mysqli_num_rows($check);
	//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select hora from asistencia where dia='$date' and hora = '$period' and seccion='$sec' and asistEsp='$especi'");
		$pers = mysqli_num_rows($checkSub);
		//checking period
		if($pers == $count){
			// attendance for that period is already inserted
					echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este período ya está insertada
</b></font></div>";
			break;
		}
		else{
		//attendance for that period is not inserted so insert into the database
		if($countCheck != $count){
			$sql1 = mysqli_query($conexion,"INSERT INTO `asistencia` (`idAsis`, `curso`, `dia`, `atten`, `materia`,`seccion`,`hora`,`nombre`,`asistEsp`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names','$especi');");
			if($sql1){
				echo "<div align='center'><font color='green'><b>Guardado
				</b></font></div>";
			  }
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este tema ya está insertada
</b></font></div>";
			break;
		}
		}
		
	 }

	  // third year first semester attendance
	  else if($sem == "Noveno"){
		$check = mysqli_query($conexion,"select idAsis from asistencia where (materia='$fac' and dia='$date') and (seccion = '$sec' and hora = '$period' and asistEsp='$especi') ");
		$countCheck = mysqli_num_rows($check);
	//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select hora from asistencia where dia='$date' and hora = '$period' and seccion='$sec' and asistEsp='$especi'");
		$pers = mysqli_num_rows($checkSub);
		//checking period
		if($pers == $count){
			// attendance for that period is already inserted
					echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este período ya está insertada
</b></font></div>";
			break;
		}
		else{
		//attendance for that period is not inserted so insert into the database
		if($countCheck != $count){
			$sql1 = mysqli_query($conexion,"INSERT INTO `asistencia` (`idAsis`, `curso`, `dia`, `atten`, `materia`,`seccion`,`hora`,`nombre`,`asistEsp`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names','$especi');");
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este tema ya está insertada
</b></font></div>";
			break;
		}
		}
		
	 }

	  // third year first semester attendance
	  else if($sem == "Décimo"){
		$check = mysqli_query($conexion,"select idAsis from asistencia where (materia='$fac' and dia='$date') and (seccion = '$sec' and hora = '$period' and asistEsp='$especi') ");
		$countCheck = mysqli_num_rows($check);
	//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select hora from asistencia where dia='$date' and hora = '$period' and seccion='$sec' and asistEsp='$especi'");
		$pers = mysqli_num_rows($checkSub);
		//checking period
		if($pers == $count){
			// attendance for that period is already inserted
					echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este período ya está insertada
</b></font></div>";
			break;
		}
		else{
		//attendance for that period is not inserted so insert into the database
		if($countCheck != $count){
			$sql1 = mysqli_query($conexion,"INSERT INTO `asistencia` (`idAsis`, `curso`, `dia`, `atten`, `materia`,`seccion`,`hora`,`nombre`,`asistEsp`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names','$especi');");
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este tema ya está insertada
</b></font></div>";
			break;
		}
		}
		
	 }


	  // third year first semester attendance
	  else if($sem == "Primero de Bachillerato"){
		$check = mysqli_query($conexion,"select idAsis from asistencia where (materia='$fac' and dia='$date') and (seccion = '$sec' and hora = '$period' and asistEsp='$especi') ");
		$countCheck = mysqli_num_rows($check);
	//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select hora from asistencia where dia='$date' and hora = '$period' and seccion='$sec' and asistEsp='$especi'");
		$pers = mysqli_num_rows($checkSub);
		//checking period
		if($pers == $count){
			// attendance for that period is already inserted
					echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este período ya está insertada
</b></font></div>";
			break;
		}
		else{
		//attendance for that period is not inserted so insert into the database
		if($countCheck != $count){
			$sql1 = mysqli_query($conexion,"INSERT INTO `asistencia` (`idAsis`, `curso`, `dia`, `atten`, `materia`,`seccion`,`hora`,`nombre`,`asistEsp`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names','$especi');");
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este tema ya está insertada
</b></font></div>";
			break;
		}
		}
		
	 }


	 // third year first semester attendance
	 else if($sem == "Segundo de Bachillerato"){
		$check = mysqli_query($conexion,"select idAsis from asistencia where (materia='$fac' and dia='$date') and (seccion = '$sec' and hora = '$period' and asistEsp='$especi') ");
		$countCheck = mysqli_num_rows($check);
	//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select hora from asistencia where dia='$date' and hora = '$period' and seccion='$sec' and asistEsp='$especi'");
		$pers = mysqli_num_rows($checkSub);
		//checking period
		if($pers == $count){
			// attendance for that period is already inserted
					echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este período ya está insertada
</b></font></div>";
			break;
		}
		else{
		//attendance for that period is not inserted so insert into the database
		if($countCheck != $count){
			$sql1 = mysqli_query($conexion,"INSERT INTO `asistencia` (`idAsis`, `curso`, `dia`, `atten`, `materia`,`seccion`,`hora`,`nombre`,`asistEsp`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names','$especi');");
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este tema ya está insertada
</b></font></div>";
			break;
		}
		}
		
	 }
	 // third year second semester attendance
	 else if($sem == "Tercero de Bachillerato"){
		$check = mysqli_query($conexion,"select idAsis from asistencia where (materia='$fac' and dia='$date') and (seccion = '$sec' and hora = '$period' and asistEsp='$especi') ");
		$countCheck = mysqli_num_rows($check);
	//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select hora from asistencia where dia='$date' and hora = '$period' and seccion='$sec' and asistEsp='$especi'");
		$pers = mysqli_num_rows($checkSub);
		//checking period
		if($pers == $count){
			// attendance for that period is already inserted
					echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este período ya está insertada
</b></font></div>";
			break;
		}
		else{
		//attendance for that period is not inserted so insert into the database
		if($countCheck != $count){
		  	$sql1 = mysqli_query($conexion,"INSERT INTO `asistencia` (`idAsis`, `curso`, `dia`, `atten`, `materia`,`seccion`,`hora`,`nombre`,`asistEsp`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names','$especi');");
			  if($sql1){
			  $msg = "<font color=\"green\">Suspendido con exito</font>";
			}
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este tema ya está insertada
</b></font></div>";
			break;
		}
		}
		
	 }

	
	}
	$i++;

	}while($i<=$count);
	 
		
?>


	</body>
</html>