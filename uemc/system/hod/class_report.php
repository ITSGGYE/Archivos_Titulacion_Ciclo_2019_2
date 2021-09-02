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
			<form method="post" action="class_report.php">			
			<table class="table table-bordered table-hover">
				<caption>Ver el informe de la clase diaria del Curso</caption>
				<tbody>
					<th class="danger" colspan="2">Informe de clase</th>
					<tr>
						<td class="active" colspan="3">
							<input type ="date" name="date" class="form-control"/>
						</td>

					
					</tr>
					<tr>
						<td class="active">
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
						<td class="active">
								<select name="section" class="form-control">
			<option >Seccion</option>
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
	 if( (isset($_POST["date"])) && (isset($_POST["sem"]))  && (isset($_POST["section"])) ){
					$date = $_POST["date"];
					$sem = $_POST["sem"];
					$section = $_POST["section"];
					
			// RETRIVING RESULT FOR I-I	
			if($sem == "I-I"){
				$sql12 = mysqli_query($conexion, "SELECT  distinct(per) as perd,fac,sec FROM a1 WHERE day = '$date'  and sec = '$section' order by per asc ");
				$count = mysqli_num_rows($sql12);
				if($count){
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>FECHA</th><th class='danger'>SECTION</th><th class='danger'>SUBJECT</th><th class='danger'>PERIOD</th><th class='danger'>TOTAL</th><th class='danger'>PRESENT</th><th class='danger'>ABSENT</th>";
				
					while($rowa = mysqli_fetch_array($sql12) ){
						$dsub = $rowa["fac"];
						$period = $rowa["perd"];
						$sec = $rowa["sec"];
						$sub = $rowa["fac"];
						
						$sql2 = mysqli_query( $conexion,"SELECT count(atten) AS ATTEN FROM `a1` WHERE `fac` = '$sub' and atten = '1' and per='$period' ");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `a1` WHERE  `fac` = '$sub' and atten = '0' and per='$period' ");
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

						
						echo "
							<tr>
								<td class='info'>$date</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$period</td><td class='info'>$total</td><td class='info'><font color='green'>$total1</font></td><td class='info'><font color='red'>$total2<font></td>
							</tr>
						";
					
					
				}
				}
				else{
					echo "<div align='center'><b><font color='red'>El parámetro de selección no coincide
</font></b></div>";
				}
			}
			//RETRIVING ATTENDANCE OF I-II 
			else if($sem == "I-II"){
					$sql12 = mysqli_query($conexion, "SELECT  distinct(per) as perd,fac,sec FROM a2 WHERE day = '$date'  and sec = '$section' order by per asc ");
				$count = mysqli_num_rows($sql12);
				if($count){
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>FECHA</th><th class='danger'>SECTION</th><th class='danger'>SUBJECT</th><th class='danger'>PERÍODO
</th><th class='danger'>TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>AUSENTE</th>";
				
					while($rowa = mysqli_fetch_array($sql12) ){
						$dsub = $rowa["fac"];
						$period = $rowa["perd"];
						$sec = $rowa["sec"];
						$sub = $rowa["fac"];
						
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `a2` WHERE `fac` = '$sub' and atten = '1' and per='$period' ");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `a2` WHERE  `fac` = '$sub' and atten = '0' and per='$period' ");
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

						
						echo "
							<tr>
								<td class='info'>$date</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$period</td><td class='info'>$total</td><td class='info'><font color='green'>$total1</font></td><td class='info'><font color='red'>$total2<font></td>
							</tr>
						";
					
					
					}
			}
		}
			//RETRIVING ATTENDANCE OF II-I 
			else if($sem == "II-I"){
					$sql12 = mysqli_query($conexion, "SELECT  distinct(per) as perd,fac,sec FROM a3 WHERE day = '$date'  and sec = '$section' order by per asc ");
				$count = mysqli_num_rows($sql12);
				if($count){
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>FECHA</th><th class='danger'>SECCIÓN</th><th class='danger'>TEMA</th><th class='danger'>PERÍODO</th><th class='danger'>TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>AUSENTE</th>";
				
					while($rowa = mysqli_fetch_array($sql12) ){
						$dsub = $rowa["fac"];
						$period = $rowa["perd"];
						$sec = $rowa["sec"];
						$sub = $rowa["fac"];
						
						$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `a3` WHERE `fac` = '$sub' and atten = '1' and per='$period' ");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `a3` WHERE  `fac` = '$sub' and atten = '0' and per='$period' ");
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

						
						echo "
							<tr>
								<td class='info'>$date</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$period</td><td class='info'>$total</td><td class='info'><font color='green'>$total1</font></td><td class='info'><font color='red'>$total2<font></td>
							</tr>
						";
					
					
					}
			}
			}
			//RETRIVING ATTENDANCE OF II-II 
			else if($sem == "II-II"){
					$sql12 = mysqli_query($conexion, "SELECT  distinct(per) as perd,fac,sec FROM a4 WHERE day = '$date'  and sec = '$section' order by per asc ");
				$count = mysqli_num_rows($sql12);
				if($count){
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>FECHA</th><th class='danger'>SECCIÓN</th><th class='danger'>TEMA</th><th class='danger'>PERIODO</th><th class='danger'>TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>AUSENTE</th>";
				
					while($rowa = mysqli_fetch_array($sql12) ){
						$dsub = $rowa["fac"];
						$period = $rowa["perd"];
						$sec = $rowa["sec"];
						$sub = $rowa["fac"];
						
						$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `a4` WHERE `fac` = '$sub' and atten = '1' and per='$period' ");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `a4` WHERE  `fac` = '$sub' and atten = '0' and per='$period' ");
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

						
						echo "
							<tr>
								<td class='info'>$date</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$period</td><td class='info'>$total</td><td class='info'><font color='green'>$total1</font></td><td class='info'><font color='red'>$total2<font></td>
							</tr>
						";
					
					
					}
			}
			}
			//RETRIVING ATTENDANCE OF III-I 
			else if($sem == "III-I"){
					$sql12 = mysqli_query($conexion,"SELECT  distinct(per) as perd,fac,sec FROM a5 WHERE day = '$date'  and sec = '$section' order by per asc ");
				$count = mysqli_num_rows($sql12);
				if($count){
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>FECHA</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>PERIODO</th><th class='danger'>TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>AUSENTE</th>";
				
					while($rowa = mysqli_fetch_array($sql12) ){
						$dsub = $rowa["fac"];
						$period = $rowa["perd"];
						$sec = $rowa["sec"];
						$sub = $rowa["fac"];
						
						$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `a5` WHERE `fac` = '$sub' and atten = '1' and per='$period' ");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a5` WHERE  `fac` = '$sub' and atten = '0' and per='$period' ");
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

						
						echo "
							<tr>
								<td class='info'>$date</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$period</td><td class='info'>$total</td><td class='info'><font color='green'>$total1</font></td><td class='info'><font color='red'>$total2<font></td>
							</tr>
						";
					
					
					}
			 }
			}
			//RETRIVING ATTENDANCE OF III-II 
			else if($sem == "III-II"){
					$sql12 = mysqli_query($conexion, "SELECT  distinct(per) as perd,fac,sec FROM a6 WHERE day = '$date'  and sec = '$section' order by per asc ");
				$count = mysqli_num_rows($sql12);
				if($count){
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>FECHA</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>PERIODO</th><th class='danger'>TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>AUSENTE</th>";
				
					while($rowa = mysqli_fetch_array($sql12) ){
						$dsub = $rowa["fac"];
						$period = $rowa["perd"];
						$sec = $rowa["sec"];
						$sub = $rowa["fac"];
						
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `a6` WHERE `fac` = '$sub' and atten = '1' and per='$period' ");
						while($rows = mysql_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a6` WHERE  `fac` = '$sub' and atten = '0' and per='$period' ");
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

						
						echo "
							<tr>
								<td class='info'>$date</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$period</td><td class='info'>$total</td><td class='info'><font color='green'>$total1</font></td><td class='info'><font color='red'>$total2<font></td>
							</tr>
						";
					
					
					}
			}
			}
			//RETRIVING ATTENDANCE OF IV-I 
			else if($sem == "IV-I"){
					$sql12 = mysqli_query($conexion,"SELECT  distinct(per) as perd,fac,sec FROM a7 WHERE day = '$date'  and sec = '$section' order by per asc ");
				$count = mysqli_num_rows($sql12);
				if($count){
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>FECHA</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>PERIODO</th><th class='danger'>TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>AUSENTE</th>";
				
					while($rowa = mysqli_fetch_array($sql12) ){
						$dsub = $rowa["fac"];
						$period = $rowa["perd"];
						$sec = $rowa["sec"];
						$sub = $rowa["fac"];
						
						$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `a7` WHERE `fac` = '$sub' and atten = '1' and per='$period' ");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a7` WHERE  `fac` = '$sub' and atten = '0' and per='$period' ");
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

						
						echo "
							<tr>
								<td class='info'>$date</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$period</td><td class='info'>$total</td><td class='info'><font color='green'>$total1</font></td><td class='info'><font color='red'>$total2<font></td>
							</tr>
						";
					
					
					}
			}
			}
			//RETRIVING ATTENDANCE OF IV-II 
			else if($sem == "IV-II"){
					$sql12 = mysqli_query( $conexion, "SELECT  distinct(per) as perd,fac,sec FROM a8 WHERE day = '$date'  and sec = '$section' order by per asc ");
				$count = mysqli_num_rows($sql12);
				if($count){
					echo "<table class='table table-bordered table-hover'>
				<th class='danger'>FECHA</th><th class='danger'>SECCION</th><th class='danger'>TEMA</th><th class='danger'>PERIODO</th><th class='danger'>TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>AUSENTE</th>";
				
					while($rowa = mysqli_fetch_array($sql12) ){
						$dsub = $rowa["fac"];
						$period = $rowa["perd"];
						$sec = $rowa["sec"];
						$sub = $rowa["fac"];
						
						$sql2 = mysqli_query( $conexion,"SELECT count(atten) AS ATTEN FROM `a8` WHERE `fac` = '$sub' and atten = '1' and per='$period' ");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a8` WHERE  `fac` = '$sub' and atten = '0' and per='$period' ");
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

						
						echo "
							<tr>
								<td class='info'>$date</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$period</td><td class='info'>$total</td><td class='info'><font color='green'>$total1</font></td><td class='info'><font color='red'>$total2<font></td>
							</tr>
						";
					
					
					}
			}
			}
	}

			?>
		</div>
	</body>
</html>