
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
if( (isset($_POST["year"])) && (isset($_POST["section"]))  ){
	
	$year = $_POST["year"];
	$section=$_POST["section"];
	
	
	if( $year=="" || $section == "" ){
					$msg = "<font color=\"red\">Todos los campos son requeridos.</font>";

	}
	else{
	// FOR MONDAY	
	$mday = $_POST["Mday1"];
	$mper1 = $_POST["Mper1"]; 
	$mper2 = $_POST["Mper2"]; 
	$mper3 = $_POST["Mper3"]; 
	$mper4 = $_POST["Mper4"]; 
	$mper5 = $_POST["Mper5"]; 
	$mper6 = $_POST["Mper6"]; 
	$mper7 = $_POST["Mper7"]; 
	$mper8 = $_POST["Mper8"]; 
	// for tuesday
	$tday = $_POST["Tday1"];
	$tper1 = $_POST["Tper1"]; 
	$tper2 = $_POST["Tper2"]; 
	$tper3 = $_POST["Tper3"]; 
	$tper4 = $_POST["Tper4"]; 
	$tper5 = $_POST["Tper5"]; 
	$tper6 = $_POST["Tper6"]; 
	$tper7 = $_POST["Tper7"]; 
	$tper8 = $_POST["Tper8"]; 
	// for wednesday
	$wday = $_POST["Wday1"];
	$wper1 = $_POST["Wper1"]; 
	$wper2 = $_POST["Wper2"]; 
	$wper3 = $_POST["Wper3"]; 
	$wper4 = $_POST["Wper4"]; 
	$wper5 = $_POST["Wper5"]; 
	$wper6 = $_POST["Wper6"]; 
	$wper7 = $_POST["Wper7"];
	$wper8 = $_POST["Wper8"];  
	// FOR THURSDAY
	$thday = $_POST["THday1"];
	$thper1 = $_POST["THper1"]; 
	$thper2 = $_POST["THper2"]; 
	$thper3 = $_POST["THper3"]; 
	$thper4 = $_POST["THper4"]; 
	$thper5 = $_POST["THper5"]; 
	$thper6 = $_POST["THper6"]; 
	$thper7 = $_POST["THper7"]; 
	$thper8 = $_POST["THper8"]; 
	// FOR FRIDAY
	$fday = $_POST["Fday1"];
	$fper1 = $_POST["Fper1"]; 
	$fper2 = $_POST["Fper2"]; 
	$fper3 = $_POST["Fper3"]; 
	$fper4 = $_POST["Fper4"]; 
	$fper5 = $_POST["Fper5"]; 
	$fper6 = $_POST["Fper6"]; 
	$fper7 = $_POST["Fper7"]; 
	$fper8 = $_POST["Fper8"]; 
	
	// checking whether already registered or not
	$check = mysqli_query($conexion,"SELECT * FROM timetable2 WHERE year='$year' AND sec='$section'");
	$count = mysqli_num_rows($check);
	if(!$count){
	//means not added so add now	
	// NOW INSERTING INTO THE DATABASE 
	// for monday
	$monday = mysqli_query($conexion, "INSERT INTO timetable2 (day,per1,per2,per3,per4,per5,per6,per7,per8,year,sec) VALUES ('$mday','$mper1','$mper2','$mper3','$mper4','$mper5','$mper6','$mper7','$mper8','$year','$section')");
	// for tuesday
$tuesday = mysqli_query($conexion, "INSERT INTO timetable2 (day,per1,per2,per3,per4,per5,per6,per7,per8,year,sec) VALUES ('$tday','$tper1','$tper2','$tper3','$tper4','$tper5','$tper6','$tper7','$tper8','$year','$section')");
// for wednesday
$wednesday = mysqli_query($conexion, "INSERT INTO timetable2 (day,per1,per2,per3,per4,per5,per6,per7,per8,year,sec) VALUES ('$wday','$wper1','$wper2','$wper3','$wper4','$wper5','$wper6','$wper7','$wper8','$year','$section')");
// for thursday
$thursday = mysqli_query($conexion, "INSERT INTO timetable2 (day,per1,per2,per3,per4,per5,per6,per7,per8,year,sec) VALUES ('$thday','$thper1','$thper2','$thper3','$thper4','$thper5','$thper6','$thper7','$thper8','$year','$section')");
// for friday
$friday = mysqli_query($conexion, "INSERT INTO timetable2 (day,per1,per2,per3,per4,per5,per6,per7,per8,year,sec) VALUES ('$fday','$fper1','$fper2','$fper3','$fper4','$fper5','$fper6','$fper7','$fper8','$year','$section')");
	
	$msg = "<font color=\"green\">Guardado.</font>";
}
else{
	// dispaly error message
		$msg = "<font color=\"red\">lo Sentimos! Esta tabla está añadida.</font>";
}

	
	//end of else which indicates not null
	}
	
} 


?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<title>
		Para Personas Con Escolaridad Inconclusa "Manuela Cañizares"
		</title>
	</head>
	<body>
		<div class="container" align="center">
			<div class="head pull-left"></br>
				<h2 class="pull-left">SGA<small>&nbsp;&nbsp;Para Personas Con Escolaridad Inconclusa</small>"Manuela Cañizares"</h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promotes">
			<form method="post" action="add_timetable2.php" name="regupdate">
			<table class="table table-bordered table-hover" width="600px">
			<caption align="center"><h3>Nuevo Horario para la Básica</h3></caption>
			<tbody>
				<th class="danger" colspan="8">Registro de Horarios			
				</th>
				<th class="danger" colspan="8">
				</th>
			</td>
			</tr>
				<tr>
				
					<td class="info" colspan="5"> 	
						<select name="year" class="form-control">
						<option value="">-- SELECCIONE UN CURSO--</option>
								
								<option value="Octavo">Octavo</option>
								<option value="Noveno">Noveno</option>
								<option value="Décimo">Décimo</option>
			
						</select>
						
					</td>
					<td class="info" colspan="4"> 	
						<select name="section" class="form-control">
					<option value=""> -- Sección--</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
			
						</select>
						
					</td>
					</td>
					<tr>
					<td class="danger">Dia</td><td class="danger">HORA-1</td><td class="danger">HORA-2</td><td class="danger">HORA-3</td><td class="danger">HORA-4</td><td class="danger">HORA-5</td><td class="danger">HORA-6</td><td class="danger">HORA-7</td><td class="danger">HORA-8</td>
				</tr>
				<!-- for selecting subject and day  FOR MONDAY-->
				<tr>
				<td class="info"><input type="text" name="Mday1" class="form-control" Readonly value="LUNES"/></td>
				<td class="info">
				<select name="Mper1" class="form-control">
					<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 2 -->
				<td class="info">
				<select name="Mper2" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 3 -->
				<td class="info">
				<select name="Mper3" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 4 -->
				<td class="info">
				<select name="Mper4" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 5 -->
				<td class="info">
				<select name="Mper5" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 6 -->
				<td class="info">
				<select name="Mper6" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 7 -->
				<td class="info">
				<select name="Mper7" class="form-control"><option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 8 -->
				<td class="info">
				<select name="Mper8" class="form-control"><option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				</tr>
				<!-- tuesday -->
	<tr>
				<td class="info"><input type="text" name="Tday1" class="form-control" Readonly value="MARTES"/></td>
				<td class="info">
				<select name="Tper1" class="form-control"><option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 2 -->
				<td class="info">
				<select name="Tper2" class="form-control"><option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 3 -->
				<td class="info">
				<select name="Tper3" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 4 -->
				<td class="info">
				<select name="Tper4" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 5 -->
				<td class="info">
				<select name="Tper5" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 6 -->
				<td class="info">
				<select name="Tper6" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 7 -->
				<td class="info">
				<select name="Tper7" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 8 -->
				<td class="info">
				<select name="Tper8" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				</tr>
			<!-- wednesday-->
	<tr>
				<td class="info"><input type="text" name="Wday1" class="form-control" Readonly value="MIÉRCOLES"/></td>
				<td class="info">
				<select name="Wper1" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 2 -->
				<td class="info">
				<select name="Wper2" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 3 -->
				<td class="info">
				<select name="Wper3" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 4 -->
				<td class="info">
				<select name="Wper4" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 5 -->
				<td class="info">
				<select name="Wper5" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 6 -->
				<td class="info">
				<select name="Wper6" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 7 -->
				<td class="info">
				<select name="Wper7" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 8 -->
				<td class="info">
				<select name="Wper8" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				</tr>
			<!-- thursday -->
	<tr>
				<td class="info"><input type="text" name="THday1" class="form-control" Readonly value="JUEVES"/></td>
				<td class="info">
				<select name="THper1" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 2 -->
				<td class="info">
				<select name="THper2" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 3 -->
				<td class="info">
				<select name="THper3" class="form-control">
				<option value="---">Sin Periodo</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 4 -->
				<td class="info">
				<select name="THper4" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 5 -->
				<td class="info">
				<select name="THper5" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 6 -->
				<td class="info">
				<select name="THper6" class="form-control">
				<option value="---">Sin Asignar
</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 7 -->
				<td class="info">
				<select name="THper7" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 8 -->
				<td class="info">
				<select name="THper8" class="form-control">
				<option value="---">Sin Asignar </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				</tr>
			<!-- friday-->
	<tr>
				<td class="info"><input type="text" name="Fday1" class="form-control" Readonly value="VIERNES"/></td>
				<td class="info">
				<select name="Fper1" class="form-control">
				<option value="---">Sin Asignar
 </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 2 -->
				<td class="info">
				<select name="Fper2" class="form-control">
				<option value="---">Sin Asignar
 </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 3 -->
				<td class="info">
				<select name="Fper3" class="form-control">
				<option value="---">Sin Asignar
</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 4 -->
				<td class="info">
				<select name="Fper4" class="form-control">
				<option value="---">Sin Asignar
 </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 5 -->
				<td class="info">
				<select name="Fper5" class="form-control">
				<option value="---">Sin Asignar
 </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 6 -->
				<td class="info">
				<select name="Fper6" class="form-control">
				<option value="---">Sin Asignar
 </option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 7 -->
				<td class="info">
				<select name="Fper7" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				<!-- period 8  -->
				<td class="info">
				<select name="Fper8" class="form-control">
				<option value="---">Sin Asignar</option>
					<?php				
					$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					
				?>
				</select>
				</td>
				</tr>
				<tr>
					<td colspan="9" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Registrar">	
					</td>
				
				</tr>
				<tr>
					<td colspan="9" align="center" class="success">
						<?php echo $msg; ?>	
				</tr>
			</tbody>			
			</table>
			</form>
		 </div>
		</div>
	</body>
</html>