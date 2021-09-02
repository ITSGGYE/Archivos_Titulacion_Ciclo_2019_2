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
			<div align="center" class="promote">
			<form method="post" action="view_monthly.php">			
			<table class="table table-bordered table-hover">
				<caption>Ver Asistencia Estudiantil</caption>
				<tbody>
					<th class="danger" colspan="2">Asistencia del estudiante</th>
					<tr>
						<td class="active">
									ASISTENCIA DESDE:<input type ="date" name="date" class="form-control"/>
						</td>
						<td class="active"><br/>
								<select name="sem" class="form-control">
			<option>Curso</option>
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
							ASISTENCIA A:<input type="date" name="subject" class="form-control"/>
							
						</td>
						<td class="active"><br/>
								<select name="section" class="form-control">
			<option >Sección</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>

					
		     </select>
						</td>
					</tr>
					<tr>
					<td class="active" align="center" colspan="2">
						<input type="submit" name="submit" class="btn btn-success" value="Consultar"/>
					</td>
					</tr>
				</tbody>
			</table>
			</form>
			</div>
	<?php
				$i = 1;
				$stat="";
				$total="";
	 if( (isset($_POST["date"])) && (isset($_POST["sem"])) && (isset($_POST["subject"])) && (isset($_POST["section"])) ){
					$dates = $_POST["date"];
					$sem = $_POST["sem"];
					$subject = $_POST["subject"];
					$section = $_POST["section"];
					
			// RETRIVING RESULT FOR I-I	
			if($sem == "Octavo"){
				$sql1 = mysqli_query($conexion, "SELECT distinct(id),sec FROM a1 WHERE day BETWEEN ('$dates' AND '$subject') and sec = '$section' ");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>REG ID</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysqli_fetch_array($sql1) ){
						$id = $row["id"];
						$sec = $row["sec"];
					$sql11 = mysqli_query($conexion, "SELECT DISTINCT(fac) as fac FROM a1 WHERE id = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["fac"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `a1` WHERE `id`='$id' and `fac` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a1` WHERE `id`='$id' and `fac` = '$sub' and atten = '0'");
						while($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$total2 = $rows["LOSS"];
						}
						// a means present number of days
						$a = $total1;
						// b means number of absent days
						$b = $total2 ;
						//CALCULATING total number of days
						$total = $a+$b;
						//calculating the attendance percentage
						$percent = round((($a/$total)*100),2);
						echo "
							<tr>
								<td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$dates TO $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
							</tr>
						";
					 
					}
				}
				}
				
				else{
					echo "<div align='center'><b><font color='red'>Selection Parameter do not Match</font></b></div>";
				}
			}
			//RETRIVING ATTENDANCE OF I-II 
			else if($sem == "Noveno"){
				$sql1 = mysqli_query($conexion, "SELECT distinct(id),sec FROM a2 WHERE day BETWEEN ('$dates' AND '$subject') and sec = '$section' ");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>REG ID</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysqli_fetch_array($sql1) ){
						$id = $row["id"];
						$sec = $row["sec"];
					$sql11 = mysqli_query($conexion, "SELECT DISTINCT(fac) as fac FROM a2 WHERE id = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["fac"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `a2` WHERE `id`='$id' and `fac` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a2` WHERE `id`='$id' and `fac` = '$sub' and atten = '0'");
						while($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$total2 = $rows["LOSS"];
						}
						// a means present number of days
						$a = $total1;
						// b means number of absent days
						$b = $total2 ;
						//CALCULATING total number of days
						$total = $a+$b;
						//calculating the attendance percentage
						$percent = round((($a/$total)*100),2);
						
						echo "
							<tr>
								<td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$dates TO $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
							</tr>
						";
					 
					}
				}
				}
				
				else{
					echo "<div align='center'><b><font color='red'>Selection Parameter do not Match</font></b></div>";
				}
			}
			//RETRIVING ATTENDANCE OF II-I 
			else if($sem == "Décimo"){
				$sql1 = mysqli_query($conexion,"SELECT distinct(id),sec FROM a3 WHERE day BETWEEN ('$dates' AND '$subject') and sec = '$section' ");
				$count = mysqli_num_rows($sql1);
					echo "<table class='table table-bordered table-hover'>
				<th class='danger'>REG ID</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysql_fetch_array($sql1) ){
						$id = $row["id"];
						$sec = $row["sec"];
					$sql11 = mysql_query($conexion,"SELECT DISTINCT(fac) as fac FROM a3 WHERE id = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["fac"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query( $conexion,"SELECT count(atten) AS ATTEN FROM `a3` WHERE `id`='$id' and `fac` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a3` WHERE `id`='$id' and `fac` = '$sub' and atten = '0'");
						while($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$total2 = $rows["LOSS"];
						}
						// a means present number of days
						$a = $total1;
						// b means number of absent days
						$b = $total2 ;
						//CALCULATING total number of days
						$total = $a+$b;
						//calculating the attendance percentage
						$percent = round((($a/$total)*100),2);
						
						echo "
							<tr>
								<td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$dates TO $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
							</tr>
						";
					 
					}
				}
				}
				
				else{
					echo "<div align='center'><b><font color='red'>Selection Parameter do not Match</font></b></div>";
				}
			}
			//RETRIVING ATTENDANCE OF II-II 
			else if($sem == "Primero de Bachillerato"){
				$sql1 = mysql_query($conexion, "SELECT distinct(id),sec FROM a4 WHERE day BETWEEN ('$dates' AND '$subject') and sec = '$section' ");
				$count = mysql_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>REG ID</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysqli_fetch_array($sql1) ){
						$id = $row["id"];
						$sec = $row["sec"];
					$sql11 = mysqli_query($conexion,"SELECT DISTINCT(fac) as fac FROM a4 WHERE id = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["fac"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `a4` WHERE `id`='$id' and `fac` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a4` WHERE `id`='$id' and `fac` = '$sub' and atten = '0'");
						while($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$total2 = $rows["LOSS"];
						}
						// a means present number of days
						$a = $total1;
						// b means number of absent days
						$b = $total2 ;
						//CALCULATING total number of days
						$total = $a+$b;
						//calculating the attendance percentage
						$percent = round((($a/$total)*100),2);
						
						echo "
							<tr>
								<td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$dates TO $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
							</tr>
						";
					 
					}
				}
				}
				
				else{
					echo "<div align='center'><b><font color='red'>Selection Parameter do not Match</font></b></div>";
				}
			}
			//RETRIVING ATTENDANCE OF III-I 
			else if($sem == "Segundo de Bachillerato"){
				$sql1 = mysqli_query($conexion, "SELECT distinct(id),sec FROM a5 WHERE day BETWEEN ('$dates' AND '$subject') and sec = '$section' ");
				$count = mysqli_num_rows($sql1);
					echo "<table class='table table-bordered table-hover'>
				<th class='danger'>REG ID</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysqli_fetch_array($sql1) ){
						$id = $row["id"];
						$sec = $row["sec"];
					$sql11 = mysqli_query($conexion, "SELECT DISTINCT(fac) as fac FROM a5 WHERE id = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["fac"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `a5` WHERE `id`='$id' and `fac` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a5` WHERE `id`='$id' and `fac` = '$sub' and atten = '0'");
						while($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$total2 = $rows["LOSS"];
						}
						// a means present number of days
						$a = $total1;
						// b means number of absent days
						$b = $total2 ;
						//CALCULATING total number of days
						$total = $a+$b;
						//calculating the attendance percentage
						$percent = round((($a/$total)*100),2);
						
						echo "
							<tr>
								<td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$dates TO $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
							</tr>
						";
					 
					}
				}
				}
				
				else{
					echo "<div align='center'><b><font color='red'>Selection Parameter do not Match</font></b></div>";
				}
			}
			//RETRIVING ATTENDANCE OF III-II 
			else if($sem == "Tercero de Bachillerato"){
				$sql1 = mysqli_query($conexion, "SELECT distinct(id),sec FROM a6 WHERE day BETWEEN ('$dates' AND '$subject') and sec = '$section' ");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>REG ID</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysqli_fetch_array($sql1) ){
						$id = $row["id"];
						$sec = $row["sec"];
					$sql11 = mysqli_query($conexion, "SELECT DISTINCT(fac) as fac FROM a6 WHERE id = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["fac"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `a6` WHERE `id`='$id' and `fac` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a6` WHERE `id`='$id' and `fac` = '$sub' and atten = '0'");
						while($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$total2 = $rows["LOSS"];
						}
						// a means present number of days
						$a = $total1;
						// b means number of absent days
						$b = $total2 ;
						//CALCULATING total number of days
						$total = $a+$b;
						//calculating the attendance percentage
						$percent = round((($a/$total)*100),2);
						
						echo "
							<tr>
								<td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$dates TO $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
							</tr>
						";
					 
					}
				}
				}
				
				else{
					echo "<div align='center'><b><font color='red'>Selection Parameter do not Match</font></b></div>";
				}
			}
			//RETRIVING ATTENDANCE OF IV-I 
			else if($sem == "IV-I"){
				$sql1 = mysqli_query($conexion, "SELECT distinct(id),sec FROM a7 WHERE day BETWEEN ('$dates' AND '$subject') and sec = '$section' ");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>REG ID</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysqli_fetch_array($sql1) ){
						$id = $row["id"];
						$sec = $row["sec"];
					$sql11 = mysqli_query($conexion, "SELECT DISTINCT(fac) as fac FROM a7 WHERE id = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["fac"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `a7` WHERE `id`='$id' and `fac` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a7` WHERE `id`='$id' and `fac` = '$sub' and atten = '0'");
						while($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$total2 = $rows["LOSS"];
						}
						// a means present number of days
						$a = $total1;
						// b means number of absent days
						$b = $total2 ;
						//CALCULATING total number of days
						$total = $a+$b;
						//calculating the attendance percentage
						$percent = round((($a/$total)*100),2);
						
						echo "
							<tr>
								<td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$dates TO $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
							</tr>
						";
					 
					}
				}
				}
				
				else{
					echo "<div align='center'><b><font color='red'>Selection Parameter do not Match</font></b></div>";
				}
			}
			//RETRIVING ATTENDANCE OF IV-II 
			else if($sem == "IV-II"){
				$sql1 = mysqli_query($conexion, "SELECT distinct(id),sec FROM a8 WHERE day BETWEEN ('$dates' AND '$subject') and sec = '$section' ");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>REG ID</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysqli_fetch_array($sql1) ){
						$id = $row["id"];
						$sec = $row["sec"];
					$sql11 = mysqli_query($conexion, "SELECT DISTINCT(fac) as fac FROM a8 WHERE id = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["fac"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query( $conexion,"SELECT count(atten) AS ATTEN FROM `a8` WHERE `id`='$id' and `fac` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `a8` WHERE `id`='$id' and `fac` = '$sub' and atten = '0'");
						while($rows = mysqli_fetch_array($sql3)){
							//retriving number of absent days 
							$total2 = $rows["LOSS"];
						}
						// a means present number of days
						$a = $total1;
						// b means number of absent days
						$b = $total2 ;
						//CALCULATING total number of days
						$total = $a+$b;
						//calculating the attendance percentage
						$percent = round((($a/$total)*100),2);
						
						echo "
							<tr>
								<td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$dates TO $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
							</tr>
						";
					 
					}
				}
				}
				
				else{
					echo "<div align='center'><b><font color='red'>El parámetro de selección no coincide</font></b></div>";
				}
			}
	}

			?>
		</div>
	</body>
</html>