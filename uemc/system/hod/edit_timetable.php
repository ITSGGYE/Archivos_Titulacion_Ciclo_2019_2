
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
if( (isset($_POST["year"])) && (isset($_POST["section"]))  && (isset($_POST["espe"]))  ){
	
	$year = $_POST["year"];
	$section = $_POST["section"];
	$especialization = $_POST["espe"];
	
	
	if( $year=="" || $section == "" || $especialization == "" ){
					$msg = "<font color=\"red\">Todos los campos son requeridos.</font>";

	}

	
} 
if(isset($_POST["updateChange"])){
//getting year and section
$year = $_POST["year"];
$sec = $_POST["sec"];
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
	
	// updating change
	// for monday
$monday = mysqli_query($conexion, "UPDATE  timetable SET per1='$mper1',per2='$mper2',per3='$mper3',per4='$mper4',per5='$mper5',per6='$mper6' ,per7='$mper7', per8= '$mper8'  WHERE day='$mday' and year='$year' and sec='$sec'"); 
//for thuesday
$tuesday = mysqli_query($conexion, "UPDATE  timetable SET per1='$tper1',per2='$tper2',per3='$tper3',per4='$tper4',per5='$tper5',per6='$tper6', per7='$tper7', per8= '$thper8'  WHERE day='$tday' and year='$year' and sec='$sec' ");
// for wednesday
 $wednesday = mysqli_query($conexion, "UPDATE  timetable SET per1='$wper1',per2='$wper2',per3='$wper3',per4='$wper4',per5='$wper5',per6='$wper6', per7='$wper7', per8= '$wper8'  WHERE day='$wday' and year='$year' and sec='$sec' ");
// for thursday
 $thursday = mysqli_query($conexion, "UPDATE  timetable SET per1='$thper1',per2='$thper2',per3='$thper3',per4='$thper4',per5='$thper5',per6='$thper6', per7='$thper7', per8= '$thper8'  WHERE day='$thday' and year='$year' and sec='$sec' ");
// for friday
 $friday =mysqli_query($conexion, "UPDATE  timetable SET per1='$fper1',per2='$fper2',per3='$fper3',per4='$fper4',per5='$fper5',per6='$fper6', per7='$fper7', per8= '$fper8'  WHERE day='$fday' and year='$year' and sec='$sec' ");
// for saturday
	
	$msg = "<font color=\"green\">Modificado.</font>";
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
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="edit_timetable.php" name="regupdate">
			<table class="table table-bordered table-hover" width="600px">
			<caption align="center"><h3>Editar Horario para Bachillerato</h3></caption>
			<tbody>
				<th class="danger" colspan="4">Editar Horarios			
				</th>
			</td>
			</tr>
				<tr>
				
					<td class="info" colspan="2"> 	
						<select name="year" class="form-control">
					<option value="">-- SELECCIONE UN CURSO--</option>
			<option value="Primero de Bachillerato">Primero de Bachillerato</option>
			<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
			<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
			
						</select>
						
					</td>
					<td class="info" colspan="2"> 	
						<select name="section" class="form-control">
					<option value=""> --SECCIÓN--</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
			
						</select>
						
					</td>
					</tr>

					<tr>
					<td class="info" colspan="4"> 	
						<select name="espe" class="form-control">
					<option value="">--ESPECIALIZACIÓN--</option>
					<option value="1">Informática</option>
					<option value="2">Electrónica</option>
					<option value="3">Electromecánica</option>
			
						</select>
						
					</td>
				    </tr>
			
				<tr>
					<td colspan="4" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Consultar">	
					</td>		
				</tr>
				<tr>
					<td colspan="4" align="center" class="success">
						<?php echo $msg; ?>
					</td>
				</tr>
			</tbody>			
			</table>
			</form>
		 </div>
<?php if( (isset($_POST["year"])) && (isset($_POST["section"])) && (isset($_POST["espe"])) ){
	
	$year = $_POST["year"];
	$section =$_POST["section"];
	$especialization = $_POST["espe"];
	
	
	if( $year=="" || $section == "" || $especialization == ""  ){
					$msg = "<font color=\"red\">Todos los campos son requeridos.</font>";

	}
	else{
		// both values are passed so display form to edit
		echo "
		<form method='post' action='edit_timetable.php'>
		<table class='table table-hover table-bordered' width='600px'>";
		echo '				<tr>
					<td class="danger">Day</td><td class="danger">HORA-1</td><td class="danger">HORA-2</td><td class="danger">HORA-3</td><td class="danger">HORA-4</td><td class="danger">HORA-5</td><td class="danger">HORA-6</td><td class="danger">HORA-7</td><td class="danger">HORA-8</td>
				</tr>';
			// for monday
			// for first period
		echo '				<tr>
				<td class="info"><input type="text" name="Mday1" class="form-control" Readonly value="LUNES"/></td>
				<td class="info">
				<select name="Mper1" class="form-control">';
				$get1 = mysqli_query($conexion, "select per1 from timetable WHERE day = 'LUNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get1)){
					$sub = $row["per1"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		
		// for second period
		echo '				
				
				<td class="info">
				<select name="Mper2" class="form-control">';
				$get1 = mysqli_query($conexion, "select per2 from timetable WHERE day = 'LUNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get1)){
					$sub = $row["per2"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		// third period
		echo '				
				
				<td class="info">
				<select name="Mper3" class="form-control">';
				$get2 = mysqli_query($conexion, "select per3 from timetable WHERE day = 'LUNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per3"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
//fourth period
		echo '				
				
				<td class="info">
				<select name="Mper4" class="form-control">';
				$get2 = mysqli_query($conexion, "select per4 from timetable WHERE day = 'LUNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per4"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
			// fifth period
		echo '				
				
				<td class="info">
				<select name="Mper5" class="form-control">';
				$get2 = mysqli_query($conexion, "select per5 from timetable WHERE day = 'LUNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per5"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		// sixth period
		echo '				
				
				<td class="info">
				<select name="Mper6" class="form-control">';
				$get2 = mysqli_query($conexion, "select per6 from timetable WHERE day = 'LUNES' AND sec = '$section' AND year = '$year'  AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per6"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
	//seventh period
		echo '				
				
				<td class="info">
				<select name="Mper7" class="form-control">';
				$get2 = mysqli_query($conexion, "select per7 from timetable WHERE day = 'LUNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per7"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
	//eigth period
	echo '				
				
	<td class="info">
	<select name="Mper8" class="form-control">';
	$get2 = mysqli_query($conexion, "select per8 from timetable WHERE day = 'LUNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
	while($row = mysqli_fetch_array($get2)){
		$sub = $row["per8"];
	echo "<option value='$sub'>$sub</option>";
	}
	$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
		while($row = mysqli_fetch_array($ans)){
			 $fname = $row["name"];
			echo "<option value='$fname'>$fname</option>";	
		}
echo "<option value=\"---\">No Period </option>			</select>
	</td>";
		echo "</tr>"; //end for monday
		//FOR TUESDAY
			// for first period
		echo '				<tr>
				<td class="info"><input type="text" name="Tday1" class="form-control" Readonly value="MARTES"/></td>
				<td class="info">
				<select name="Tper1" class="form-control">';
				$get1 = mysqli_query($conexion, "select per1 from timetable WHERE day = 'MARTES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get1)){
					$sub = $row["per1"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		
		// for second period
		echo '				
				
				<td class="info">
				<select name="Tper2" class="form-control">';
				$get1 = mysqli_query($conexion, "select per2 from timetable WHERE day = 'MARTES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get1)){
					$sub = $row["per2"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		// third period
		echo '				
				
				<td class="info">
				<select name="Tper3" class="form-control">';
				$get2 = mysqli_query($conexion, "select per3 from timetable WHERE day = 'MARTES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per3"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
//fourth period
		echo '				
				
				<td class="info">
				<select name="Tper4" class="form-control">';
				$get2 = mysqli_query($conexion,"select per4 from timetable WHERE day = 'MARTES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per4"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
			// fifth period
		echo '				
				
				<td class="info">
				<select name="Tper5" class="form-control">';
				$get2 = mysqli_query($conexion,"select per5 from timetable WHERE day = 'MARTES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per5"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		// sixth period
		echo '				
				
				<td class="info">
				<select name="Tper6" class="form-control">';
				$get2 = mysqli_query($conexion, "select per6 from timetable WHERE day = 'MARTES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per6"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
	//seventh period
		echo '				
				
				<td class="info">
				<select name="Tper7" class="form-control">';
				$get2 = mysqli_query($conexion, "select per7 from timetable WHERE day = 'MARTES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per7"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		//eigth period
		echo '				
				
				<td class="info">
				<select name="Tper8" class="form-control">';
				$get2 = mysqli_query($conexion, "select per8 from timetable WHERE day = 'MARTES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per8"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		echo "</tr>"; //end for TUESDAY
	//FOR WEDNESDAY 
			// for first period
		echo '				<tr>
				<td class="info"><input type="text" name="Wday1" class="form-control" Readonly value="MIÉRCOLES"/></td>
				<td class="info">
				<select name="Wper1" class="form-control">';
				$get1 = mysqli_query($conexion, "select per1 from timetable WHERE day = 'MIÉRCOLES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get1)){
					$sub = $row["per1"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		
		// for second period
		echo '				
				
				<td class="info">
				<select name="Wper2" class="form-control">';
				$get1 = mysqli_query($conexion, "select per2 from timetable WHERE day = 'MIÉRCOLES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get1)){
					$sub = $row["per2"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		// third period
		echo '				
				
				<td class="info">
				<select name="Wper3" class="form-control">';
				$get2 = mysqli_query($conexion,"select per3 from timetable WHERE day = 'MIÉRCOLES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per3"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
//fourth period
		echo '				
				
				<td class="info">
				<select name="Wper4" class="form-control">';
				$get2 = mysqli_query($conexion, "select per4 from timetable WHERE day = 'MIÉRCOLES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per4"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
			// fifth period
		echo '				
				
				<td class="info">
				<select name="Wper5" class="form-control">';
				$get2 = mysqli_query($conexion, "select per5 from timetable WHERE day = 'MIÉRCOLES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per5"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		// sixth period
		echo '				
				
				<td class="info">
				<select name="Wper6" class="form-control">';
				$get2 = mysqli_query($conexion,"select per6 from timetable WHERE day = 'MIÉRCOLES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per6"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
	//seventh period
		echo '				
				
				<td class="info">
				<select name="Wper7" class="form-control">';
				$get2 = mysqli_query($conexion,"select per7 from timetable WHERE day = 'MIÉRCOLES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per7"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		//eigth period
		echo '				
				
				<td class="info">
				<select name="Wper8" class="form-control">';
				$get2 = mysqli_query($conexion,"select per8 from timetable WHERE day = 'MIÉRCOLES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per8"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		echo "</tr>"; //end for WEDNESDAY
			// for THURSDAY
			// for first period
		echo '				<tr>
				<td class="info"><input type="text" name="THday1" class="form-control" Readonly value="JUEVES"/></td>
				<td class="info">
				<select name="THper1" class="form-control">';
				$get1 = mysqli_query($conexion,"select per1 from timetable WHERE day = 'JUEVES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get1)){
					$sub = $row["per1"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		
		// for second period
		echo '				
				
				<td class="info">
				<select name="THper2" class="form-control">';
				$get1 = mysqli_query($conexion, "select per2 from timetable WHERE day = 'JUEVES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get1)){
					$sub = $row["per2"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		// third period
		echo '				
				
				<td class="info">
				<select name="THper3" class="form-control">';
				$get2 = mysqli_query($conexion, "select per3 from timetable WHERE day = 'JUEVES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per3"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
//fourth period
		echo '				
				
				<td class="info">
				<select name="THper4" class="form-control">';
				$get2 = mysqli_query($conexion,"select per4 from timetable WHERE day = 'JUEVES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per4"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
			// fifth period
		echo '				
				
				<td class="info">
				<select name="THper5" class="form-control">';
				$get2 = mysqli_query($conexion,"select per5 from timetable WHERE day = 'JUEVES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per5"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		// sixth period
		echo '				
				
				<td class="info">
				<select name="THper6" class="form-control">';
				$get2 = mysqli_query($conexion, "select per6 from timetable WHERE day = 'JUEVES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per6"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
	//seventh period
		echo '				
				
				<td class="info">
				<select name="THper7" class="form-control">';
				$get2 = mysqli_query($conexion, "select per7 from timetable WHERE day = 'JUEVES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per7"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
	//eight period
		echo '				
				
		<td class="info">
		<select name="THper8" class="form-control">';
		$get2 = mysqli_query($conexion, "select per8 from timetable WHERE day = 'JUEVES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
		while($row = mysqli_fetch_array($get2)){
			$sub = $row["per8"];
		echo "<option value='$sub'>$sub</option>";
		}
		$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
			while($row = mysqli_fetch_array($ans)){
				 $fname = $row["name"];
				echo "<option value='$fname'>$fname</option>";	
			}
	echo "<option value=\"---\">No Period </option>			</select>
		</td>";
		echo "</tr>"; //end for THURSDAY
			// for FRIDAY
			// for first period
		echo '				<tr>
				<td class="info"><input type="text" name="Fday1" class="form-control" Readonly value="VIERNES"/></td>
				<td class="info">
				<select name="Fper1" class="form-control">';
				$get1 = mysqli_query($conexion,"select per1 from timetable WHERE day = 'VIERNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get1)){
					$sub = $row["per1"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		
		// for second period
		echo '				
				
				<td class="info">
				<select name="Fper2" class="form-control">';
				$get1 = mysqli_query($conexion,"select per2 from timetable WHERE day = 'VIERNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get1)){
					$sub = $row["per2"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		// third period
		echo '				
				
				<td class="info">
				<select name="Fper3" class="form-control">';
				$get2 = mysqli_query($conexion, "select per3 from timetable WHERE day = 'VIERNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per3"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
//fourth period
		echo '				
				
				<td class="info">
				<select name="Fper4" class="form-control">';
				$get2 = mysqli_query($conexion, "select per4 from timetable WHERE day = 'VIERNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per4"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
			// fifth period
		echo '				
				
				<td class="info">
				<select name="Fper5" class="form-control">';
				$get2 = mysqli_query($conexion, "select per5 from timetable WHERE day = 'VIERNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per5"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
		// sixth period
		echo '				
				
				<td class="info">
				<select name="Fper6" class="form-control">';
				$get2 = mysqli_query($conexion, "select per6 from timetable WHERE day = 'VIERNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per6"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
	//seventh period
		echo '				
				
				<td class="info">
				<select name="Fper7" class="form-control">';
				$get2 = mysqli_query($conexion, "select per7 from timetable WHERE day = 'VIERNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
				while($row = mysqli_fetch_array($get2)){
					$sub = $row["per7"];
				echo "<option value='$sub'>$sub</option>";
				}
				$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
			echo "<option value=\"---\">No Period </option>			</select>
				</td>";
	//eight period
		echo '				
				
		<td class="info">
		<select name="Fper8" class="form-control">';
		$get2 = mysqli_query($conexion, "select per8 from timetable WHERE day = 'VIERNES' AND sec = '$section' AND year = '$year' AND esp = '$especialization' LIMIT 1 ");
		while($row = mysqli_fetch_array($get2)){
			$sub = $row["per8"];
		echo "<option value='$sub'>$sub</option>";
		}
		$ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty`  GROUP BY `name` ORDER BY `name`");				
			while($row = mysqli_fetch_array($ans)){
				 $fname = $row["name"];
				echo "<option value='$fname'>$fname</option>";	
			}
	echo "<option value=\"---\">No Period </option>			</select>
		</td>";
		echo "</tr>"; //end for FRIDAY
		
		echo "<tr><input type='hidden' name='year' value='$year'/>
		<input type='hidden' name='sec' value='$section'/><td class='info' align='center' colspan='9'><input type='submit' class='btn btn-success' name='updateChange' value='Actualizar cambio'/></td></tr>";
				
		echo "</table>";
		echo "</form>";
	
	//end of else which indicates not null
	}

	
} ?>
		</div>
	</body>
</html>