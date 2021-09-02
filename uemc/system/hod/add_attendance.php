
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
			<form method="post" action="add_attendance.php" >
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Agregar asistencia estudiantil  </h3></caption>
			<tbody>
				<th class="danger" colspan="3">Seleccione Un Curso y Sección		
				</th>
			
				<tr>
					<td class="active" colspan="2">	
								<select name="sem" class="form-control">
			<option >-- Curso --</option>
			<option value="Octavo">Octavo</option>
			<option value="Noveno">Noveno</option>
			<option value="Décimo">Décimo</option>
					
		</select>
					</td>
					<td class="active">	
								<select name="section" class="form-control">
			<option >-- Sección --</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>

					
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
	include("../include/connect.php");
	$i=1;
	$j = 1;
	
if(isset($_POST["sem"]) && isset($_POST["section"])){
	$a = $_POST["sem"];
	$section = $_POST["section"];
	// for first year first semester attendance
	if($a == "Octavo"){
		$sql = mysqli_query($conexion,"SELECT id,sem,sec,sname FROM s1 WHERE sec = '$section'");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='add_attendance.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='3'>Asistencia del estudiante</th>
				<tr><td class='info'>			
				<input type='date' class='form-control' name='date' ></td>";
			  	echo "
				<td class='info'><select class='form-control' name='fac'>";
				 $ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty` WHERE yr='Octavo' GROUP BY `name` ORDER BY `name`");
				    $count1= mysqli_num_rows($ans);
				while($j<=$count1){
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
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
				</td>
				</tr></tbody></table>
				<input type='hidden' name='year' value='Octavo'/> 
				";
				while($row = mysqli_fetch_array($sql)){
					$id = $row["id"];
					$sem = $row["sem"];
					$sections = $row["sec"];
					$nm = $row["sname"];
					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='text' readonly value='$id' name='ids$i'>
						<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
				
					";
					$i++;
				}
				echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>	</td></tr>
				
				</table></form></div></div>";
	}
	// for first year second semester attendance
	else if($a == "Noveno"){
		$sql = mysqli_query( $conexion, "SELECT id,sem,sec,sname FROM s2 WHERE sec = '$section'");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='add_attendance.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='3'>Asistencia del estudiante</th>
				<tr><td class='info'>			
				<input type='date' class='form-control' name='date' ></td>";
			  	echo "
				<td class='info'><select class='form-control' name='fac'>";
				 $ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty` WHERE yr='Noveno' GROUP BY `name` ORDER BY `name`");
				    $count1= mysqli_num_rows($ans);
				while($j<=$count1){
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
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
				</td>
				</tr></tbody></table>
				<input type='hidden' name='year' value='Noveno'/> 
				";
				while($row = mysqli_fetch_array($sql)){
					$id = $row["id"];
					$sem = $row["sem"];
					$sections = $row["sec"];
					$nm = $row["sname"];
					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='text' readonly value='$id' name='ids$i'>
						<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
				
					";
					$i++;
				}
				echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Add'>	</td></tr>
				
				</table></form></div></div>";
	}
	// second year first semester attendance
	else if($a == "Décimo"){
		$sql = mysqli_query($conexion,"SELECT id,sem,sec,sname FROM s3 WHERE sec = '$section'");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='add_attendance.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='3'>Asistencia del estudiante</th>
				<tr><td class='info'>			
				<input type='date' class='form-control' name='date' ></td>";
			  	echo "
				<td class='info'><select class='form-control' name='fac'>";
				 $ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty` WHERE yr='Décimo' GROUP BY `name` ORDER BY `name`");
				    $count1= mysqli_num_rows($ans);
				while($j<=$count1){
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
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
					$id = $row["id"];
					$sem = $row["sem"];
					$sections = $row["sec"];
					$nm = $row["sname"];
					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='text' readonly value='$id' name='ids$i'>
						<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
				
					";
					$i++;
				}
				echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>	</td></tr>
				
				</table></form></div></div>";
	}
	//second year second semester attendacne
	else if($a == "Primero de Bachillerato"){
				$sql = mysqli_query($conexion,"SELECT id,sem,sec,sname FROM s4 WHERE sec = '$section'");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='add_attendance.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='3'>Asistencia del estudiante</th>
				<tr><td class='info'>			
				<input type='date' class='form-control' name='date' ></td>";
			  	echo "
				<td class='info'><select class='form-control' name='fac'>";
				 $ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty` WHERE yr='Primero de Bachillerato' GROUP BY `name` ORDER BY `name`");
				    $count1= mysqli_num_rows($ans);
				while($j<=$count1){
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
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
					$id = $row["id"];
					$sem = $row["sem"];
					$sections = $row["sec"];
					$nm = $row["sname"];
					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='text' readonly value='$id' name='ids$i'>
						<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
				
					";
					$i++;
				}
				echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>	</td></tr>
				
				</table></form></div></div>";
	}
	//third year first semester attendance
	else if($a == "Segundo de Bachillerato"){
		$sql = mysqli_query($conexion,"SELECT id,sem,sec,sname FROM s5 WHERE sec = '$section'");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='add_attendance.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='3'>	Asistencia del estudiante</th>
				<tr><td class='info'>			
				<input type='date' class='form-control' name='date' ></td>";
			  	echo "
				<td class='info'><select class='form-control' name='fac'>";
				 $ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty` WHERE yr='Segundo de Bachillerato' GROUP BY `name` ORDER BY `name`");
				    $count1= mysqli_num_rows($ans);
				while($j<=$count1){
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
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
					$id = $row["id"];
					$sem = $row["sem"];
					$sections = $row["sec"];
					$nm = $row["sname"];
					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='text' readonly value='$id' name='ids$i'>
						<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
				
					";
					$i++;
				}
				echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>	</td></tr>
				
				</table></form></div></div>";
	}
	// third year second semester aattendance
	else if($a == "Tercero de Bachillerato"){
		$sql = mysqli_query($conexion,"SELECT id,sem,sec,sname FROM s6 WHERE sec = '$section'");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='add_attendance.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='3'>Asistencia del estudiante</th>
				<tr><td class='info'>			
				<input type='date' class='form-control' name='date' ></td>";
			  	echo "
				<td class='info'><select class='form-control' name='fac'>";
				 $ans = mysqli_query($conexion,"SELECT COUNT(*) AS `Rows`, `name` FROM `faculty` WHERE yr='Tercero de Bachillerato' GROUP BY `name` ORDER BY `name`");
				    $count1= mysqli_num_rows($ans);
				while($j<=$count1){
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
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
					$id = $row["id"];
					$sem = $row["sem"];
					$sections = $row["sec"];
					$nm = $row["sname"];
					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='checkbox'  name='result$i' value='1'>&nbsp;<br/>
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
				
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
		$ides = $_POST["ids$i"];
		$names = $_POST["nm$i"];

		//first year attendance first semester
	 if($sem == "Octavo"){
		$check = mysqli_query($conexion,"select id from a1 where(fac='$fac' and day='$date') and (sec = '$sec' and per = '$period') ");
		$countCheck = mysqli_num_rows($check);
		//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select per from a1 where day='$date' and per = '$period' and sec='$sec' ");
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
			$sql1 = mysqli_query($conexion,"INSERT INTO `a1` (`id`, `sem`, `day`, `atten`, `fac`,`sec`,`per`,`sname`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names');");
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este tema ya está insertada
</b></font></div>";
			break;
		}
		}
		
	 }
	 // first year second semester attendance
	 else if($sem == "Noveno"){
		$check = mysqli_query( $conexion,"select id from a2 where (fac='$fac' and day='$date') and (sec = '$sec' and per = '$period') ");
		$countCheck = mysqli_num_rows($check);
		//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select per from a2 where day='$date' and per = '$period' and sec='$sec' ");
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
			$sql1 = mysqli_query($conexion,"INSERT INTO `a2` (`id`, `sem`, `day`, `atten`, `fac`,`sec`,`per`,`sname`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names');");
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este tema ya está insertada
</b></font></div>";
			break;
		}
		}
		
	 }
	 //second year first semester attendance
	 else if($sem == "Décimo"){
		$check = mysqli_query($conexion,"select id from a3 where (fac='$fac' and day='$date') and (sec = '$sec' and per = '$period') ");
		$countCheck = mysqli_num_rows($check);
		//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select per from a3 where day='$date' and per = '$period' and sec='$sec' ");
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
			$sql1 = mysqli_query($conexion,"INSERT INTO `a3` (`id`, `sem`, `day`, `atten`, `fac`,`sec`,`per`,`sname`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names');");
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este tema ya está insertada
</b></font></div>";
			break;
		}
		}
		
	 }
	 // second year second semester attendance
	 else if($sem == "Primero de Bachillerato"){
		$check = mysqli_query($conexion,"select id from a4 where (fac='$fac' and day='$date') and (sec = '$sec' and per = '$period') ");
		$countCheck = mysqli_num_rows($check);
		//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select per from a4 where day='$date' and per = '$period' and sec='$sec' ");
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
			$sql1 = mysqli_query($conexion,"INSERT INTO `a4` (`id`, `sem`, `day`, `atten`, `fac`,`sec`,`per`,`sname`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names');");
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
		$check = mysqli_query($conexion,"select id from a5 where (fac='$fac' and day='$date') and (sec = '$sec' and per = '$period') ");
		$countCheck = mysqli_num_rows($check);
	//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select per from a5 where day='$date' and per = '$period' and sec='$sec' ");
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
			$sql1 = mysqli_query($conexion,"INSERT INTO `a5` (`id`, `sem`, `day`, `atten`, `fac`,`sec`,`per`,`sname`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names');");
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este período ya está insertada
</b></font></div>";
			break;
		}
		}
	 }
	 // third year second semester attendance
	 else if($sem == "Tercero de Bachillerato"){
		$check = mysqli_query($conexion,"select id from a6 where (fac='$fac' and day='$date') and (sec = '$sec' and per = '$period') ");
		$countCheck = mysqli_num_rows($check);
	//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select per from a6 where day='$date' and per = '$period' and sec='$sec' ");
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
			$sql1 = mysqli_query($conexion,"INSERT INTO `a6` (`id`, `sem`, `day`, `atten`, `fac`,`sec`,`per`,`sname`) VALUES ('$ides','$sem','$date','$res','$fac','$sec','$period','$names');");
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este período ya está insertada
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