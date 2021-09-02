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
			<div class="hidden-print"><?php include("../include/hodmenu.txt");?></div>
			<div align="center" class="promote hidden-print">
			<form method="post" action="attendance_print_report.php">			
			<table class="table table-bordered table-hover">
				<caption>Ver Asistencia Estudiantil</caption>
				<tbody>
					<th class="danger" colspan="2">Asistencia del estudiante</th>
					<tr>
						<td class="active">
								ASISTENCIA DESDE:<input type ="date" name="dateFrom" class="form-control"/>
						</td>
													<td class="active">
							ASISTENCIA A:<input type="date" name="dateTo" class="form-control"/>
							
						</td>

					
					</tr>
					<tr>
						<td class="active" colspan="2"><br/>
								<select name="sem" class="form-control">
			<option value="">Curso</option>
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
	
					<td class="active" align="center" colspan="2">
						<input type="submit" name="submit" class="btn btn-success" value="Consultar"/>
					</td>
					</tr>
				</tbody>
			</table>
			</form>
			
			</div>
	<?php
	$msg="";
	$id="";
	$sec="";
	$sub="";
		if((isset($_POST["sem"])) && (isset($_POST["dateFrom"])) && (isset($_POST["dateTo"])) ){
			$sem = $_POST["sem"];
			$from = $_POST["dateFrom"];
			 $to = $_POST["dateTo"];
			 $final = $_POST["dateTo"];
			//checking whether all values are posted properly or not
			if($sem=="" || $from=="" || $to=""){
				//alert if there is null value i.e some field is not selected properly
				$msg = "<div align='center'><font color='red'>Seleccione todas las opciones apropiadamente
</font></div>";
			}
		  else{
			
			//indicates everything is posted properly so begin the task
				if($sem =="Octavo"){
					$sql = mysqli_query($conexion, "SELECT name FROM faculty WHERE yr='Octavo' ");
					echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
					<caption><b>REPORTE DE ASISTENCIA DE $sem AÑO DESDE EL $from HASTA $final </b></caption>
					<th class='danger'><b>ID</th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
					while($row = mysqli_fetch_array($sql)){
						$sub=$row["name"];
						//subject showing
						echo "<th class='danger'><b>$sub&nbsp;<b></th>";
				    }
					//echo "$from : $final";
					echo "<th class='danger'><b>Clase total</b></th>";
					echo "<th class='danger'><b>Porcentaje&nbsp;<b></th>";
					echo "<tr>";
					$sql1 = mysqli_query( $conexion, "SELECT distinct(id) as id,sec,sname FROM a1 order by id asc ");
					while($row = mysqli_fetch_array($sql1)){
							$ids=$row["id"];
							$sec = $row["sec"];
							$nom = $row["sname"];
							//displaying ids and section 
							echo "<td class='active'>$ids</td><td class='active'>$sec</td> <td class='active'>$nom</td>";
							$sql11 = mysqli_query( $conexion, "SELECT  name  FROM faculty WHERE yr= 'Octavo' ");
							while($row = mysqli_fetch_array($sql11) ){
						
							$sub = $row["name"];
							
							//counting total number of days based on registered id i.e total of all subjects
					$sql31 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a1` WHERE  atten='0' and `id`='$ids' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql31)){
								//retriving number of absent days 
									$totalall2 = $rows["LOSS"];
							}
						
								
							//counting total number of days based on registered id i.e total of all subjects
				$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `a1` WHERE `id`='$ids' and atten = '1' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql3)){
								//retriving number of absent days 
								$totalall1 = $rows["LOSS"];
							}
						
							//counting toal days for particular registered id
							 $totalall = $totalall1+$totalall2;
							
							//counting the total number of present days subject wise
	$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `a1` WHERE (`id`='$ids' and `fac` = '$sub' and atten = '1' and day between '$from' and '$final') ");
							while($rows = mysqli_fetch_array($sql2)){
								//retriving number of present days 
								 $total1 = $rows["ATTEN"];
								echo "<td class='active'>$total1</td>";
							}
							if($totalall!=0){
								$per = round((($totalall1/$totalall)*100),2);
							}
							else{
								$per = 0;
							}
						
							

						}
						echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
					}
					echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";
	
			    }
				// end of IF
			//indicates everything is posted properly so begin the task
				else if($sem =="Noveno"){
					$sql = mysqli_query( $conexion,"SELECT name FROM faculty WHERE yr='Noveno' ");
					echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
					<caption><b>REPORTE DE ASISTENCIA DE $sem AÑO DESDE EL $from HASTA $final </b></caption>
					<th class='danger'><b>ID</th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
					while($row = mysqli_fetch_array($sql)){
						$sub=$row["name"];
						//subject showing
						echo "<th class='danger'><b>$sub&nbsp;<b></th>";
				    }
					//echo "$from : $final";
					echo "<th class='danger'><b>Clase total</b></th>";
					echo "<th class='danger'><b>Porcentaje&nbsp;<b></th>";
					echo "<tr>";
					$sql1 = mysqli_query($conexion,"SELECT distinct(id) as id,sec,sname FROM a2 order by id asc ");
					while($row = mysqli_fetch_array($sql1)){
							$ids=$row["id"];
							$sec = $row["sec"];
							$nom = $row["sname"];
							//displaying ids and section 
							echo "<td class='active'>$ids</td><td class='active'>$sec</td><td class='active'>$nom</td>";
							$sql11 = mysqli_query( $conexion,"SELECT  name  FROM faculty WHERE yr= 'Noveno' ");
							while($row = mysqli_fetch_array($sql11) ){
						
							$sub = $row["name"];
							
							//counting total number of days based on registered id i.e total of all subjects
					$sql31 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `a2` WHERE  atten='0' and `id`='$ids' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql31)){
								//retriving number of absent days 
									$totalall2 = $rows["LOSS"];
							}
						
								
							//counting total number of days based on registered id i.e total of all subjects
				$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `a2` WHERE `id`='$ids' and atten = '1' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql3)){
								//retriving number of absent days 
								$totalall1 = $rows["LOSS"];
							}
						
							//counting toal days for particular registered id
							 $totalall = $totalall1+$totalall2;
							
							//counting the total number of present days subject wise
	$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `a2` WHERE (`id`='$ids' and `fac` = '$sub' and atten = '1' and day between '$from' and '$final') ");
							while($rows = mysqli_fetch_array($sql2)){
								//retriving number of present days 
								 $total1 = $rows["ATTEN"];
								echo "<td class='active'>$total1</td>";
							}
							if($totalall!=0){
								$per = round((($totalall1/$totalall)*100),2);
							}
							else{
								$per = 0;
							}
						
							

						}
						echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
					}
					echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";
	
			    }
				// end of IF
			//indicates everything is posted properly so begin the task
				else if($sem =="Décimo"){
					$sql = mysqli_query($conexion,"SELECT name FROM faculty WHERE yr='Décimo' ");
					echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
					<caption><b>REPORTE DE ASISTENCIA DE $sem AÑO DESDE EL $from HASTA $final </b></caption>
					<th class='danger'><b>ID</th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
					while($row = mysqli_fetch_array($sql)){
						$sub=$row["name"];
						//subject showing
						echo "<th class='danger'><b>$sub&nbsp;<b></th>";
				    }
					//echo "$from : $final";
					echo "<th class='danger'><b>Clase total</b></th>";
					echo "<th class='danger'><b>Porcentaje&nbsp;<b></th>";
					echo "<tr>";
					$sql1 = mysqli_query( $conexion,"SELECT distinct(id) as id,sec,sname FROM a3 order by id asc ");
					while($row = mysqli_fetch_array($sql1)){
							$ids=$row["id"];
							$sec = $row["sec"];
							$nom = $row["sname"];
							//displaying ids and section 
							echo "<td class='active'>$ids</td><td class='active'>$sec</td><td class='active'>$nom</td>";
							$sql11 = mysql_query($conexion,"SELECT  name  FROM faculty WHERE yr= 'Décimo' ");
							while($row = mysql_fetch_array($sql11) ){
						
							$sub = $row["name"];
							
							//counting total number of days based on registered id i.e total of all subjects
					$sql31 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `a3` WHERE  atten='0' and `id`='$ids' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql31)){
								//retriving number of absent days 
									$totalall2 = $rows["LOSS"];
							}
						
								
							//counting total number of days based on registered id i.e total of all subjects
				$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `a3` WHERE `id`='$ids' and atten = '1' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql3)){
								//retriving number of absent days 
								$totalall1 = $rows["LOSS"];
							}
						
							//counting toal days for particular registered id
							 $totalall = $totalall1+$totalall2;
							
							//counting the total number of present days subject wise
	$sql2 = mysqli_query( $conexion,"SELECT count(atten) AS ATTEN FROM `a3` WHERE (`id`='$ids' and `fac` = '$sub' and atten = '1' and day between '$from' and '$final') ");
							while($rows = mysqli_fetch_array($sql2)){
								//retriving number of present days 
								 $total1 = $rows["ATTEN"];
								echo "<td class='active'>$total1</td>";
							}
							if($totalall!=0){
								$per = round((($totalall1/$totalall)*100),2);
							}
							else{
								$per = 0;
							}
						
							

						}
						echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
					}
					echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";
	
			    }
				// end of IF
			//indicates everything is posted properly so begin the task
				else if($sem =="Primero de Bachillerato"){
					$sql = mysqli_query($conexion, "SELECT name FROM faculty WHERE yr='Primero de Bachillerato' ");
					echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
					<caption><b>CSE $sem YEAR ATTENDANCE FROM $from TO $final </b></caption>
					<th class='danger'><b>ID</th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
					while($row = mysqli_fetch_array($sql)){
						$sub=$row["name"];
						//subject showing
						echo "<th class='danger'><b>$sub&nbsp;<b></th>";
				    }
					//echo "$from : $final";
					echo "<th class='danger'><b>Clase total</b></th>";
					echo "<th class='danger'><b>Porcentaje&nbsp;<b></th>";
					echo "<tr>";
					$sql1 = mysqli_query($conexion,"SELECT distinct(id) as id,sec,sname FROM a4 order by id asc ");
					while($row = mysqli_fetch_array($sql1)){
							$ids=$row["id"];
							$sec = $row["sec"];
							$nom = $row["sname"];
							//displaying ids and section 
							echo "<td class='active'>$ids</td><td class='active'>$sec</td><td class='active'>$nom</td>";
							$sql11 = mysqli_query( $conexion,"SELECT  name  FROM faculty WHERE yr= 'Primero de Bachillerato' ");
							while($row = mysqli_fetch_array($sql11) ){
						
							$sub = $row["name"];
							
							//counting total number of days based on registered id i.e total of all subjects
					$sql31 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `a4` WHERE  atten='0' and `id`='$ids' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql31)){
								//retriving number of absent days 
									$totalall2 = $rows["LOSS"];
							}
						
								
							//counting total number of days based on registered id i.e total of all subjects
				$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `a4` WHERE `id`='$ids' and atten = '1' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql3)){
								//retriving number of absent days 
								$totalall1 = $rows["LOSS"];
							}
						
							//counting toal days for particular registered id
							 $totalall = $totalall1+$totalall2;
							
							//counting the total number of present days subject wise
	$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `a4` WHERE (`id`='$ids' and `fac` = '$sub' and atten = '1' and day between '$from' and '$final') ");
							while($rows = mysqli_fetch_array($sql2)){
								//retriving number of present days 
								 $total1 = $rows["ATTEN"];
								echo "<td class='active'>$total1</td>";
							}
							if($totalall!=0){
								$per = round((($totalall1/$totalall)*100),2);
							}
							else{
								$per = 0;
							}
						
							

						}
						echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
					}
					echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";
	
			    }
				// end of IF AND STARTING OF III-I
			//indicates everything is posted properly so begin the task
				else if($sem =="Segundo de Bachillerato"){
					$sql = mysqli_query($conexion,"SELECT name FROM faculty WHERE yr='Segundo  de Bachillerato' ");
					echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
					<caption><b>CSE $sem YEAR ATTENDANCE FROM $from TO $final </b></caption>
					<th class='danger'><b>ID</th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
					while($row = mysqli_fetch_array($sql)){
						$sub=$row["name"];
						//subject showing
						echo "<th class='danger'><b>$sub&nbsp;<b></th>";
				    }
					//echo "$from : $final";
					echo "<th class='danger'><b>Clase total</b></th>";
					echo "<th class='danger'><b>Porcentaje&nbsp;<b></th>";
					echo "<tr>";
					$sql1 = mysqli_query($conexion,"SELECT distinct(id) as id,sec,sname FROM a5 order by id asc ");
					while($row = mysqli_fetch_array($sql1)){
							$ids=$row["id"];
							$sec = $row["sec"];
							$nom = $row["sname"];
							//displaying ids and section 
							echo "<td class='active'>$ids</td><td class='active'>$sec</td><td class='active'>$nom</td>";
							$sql11 = mysqli_query($conexion,"SELECT  name  FROM faculty WHERE yr= 'Segundo de Bachillerato' ");
							while($row = mysqli_fetch_array($sql11) ){
						
							$sub = $row["name"];
							
							//counting total number of days based on registered id i.e total of all subjects
					$sql31 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `a5` WHERE  atten='0' and `id`='$ids' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql31)){
								//retriving number of absent days 
									$totalall2 = $rows["LOSS"];
							}
						
								
							//counting total number of days based on registered id i.e total of all subjects
				$sql3 = mysqli_query($conexion,"SELECT count(atten) AS LOSS FROM `a5` WHERE `id`='$ids' and atten = '1' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql3)){
								//retriving number of absent days 
								$totalall1 = $rows["LOSS"];
							}
						
							//counting toal days for particular registered id
							 $totalall = $totalall1+$totalall2;
							
							//counting the total number of present days subject wise
	$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `a5` WHERE (`id`='$ids' and `fac` = '$sub' and atten = '1' and day between '$from' and '$final') ");
							while($rows = mysqli_fetch_array($sql2)){
								//retriving number of present days 
								 $total1 = $rows["ATTEN"];
								echo "<td class='active'>$total1</td>";
							}
							if($totalall!=0){
								$per = round((($totalall1/$totalall)*100),2);
							}
							else{
								$per = 0;
							}
						
							

						}
						echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
					}
					echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";
	
			    }
				// end of IF STARTING III-II
			//indicates everything is posted properly so begin the task
				else if($sem =="Tercero  de Bachillerato"){
					$sql = mysqli_query($conexion,"SELECT name FROM faculty WHERE yr='Tercero  de Bachillerato' ");
					echo "<table border='1' class='table table-hover table-bordered' width='100%' align='center'>
					<caption><b>CSE $sem YEAR ATTENDANCE FROM $from TO $final </b></caption>
					<th class='danger'><b>ID</th><th class='danger'>Section</font></th><b><th class='danger'>Nombre</font></th>";
					while($row = mysqli_fetch_array($sql)){
						$sub=$row["name"];
						//subject showing
						echo "<th class='danger'><b>$sub&nbsp;<b></th>";
				    }
					//echo "$from : $final";
					echo "<th class='danger'><b>Clase total</b></th>";
					echo "<th class='danger'><b>Percentage&nbsp;<b></th>";
					echo "<tr>";
					$sql1 = mysqli_query($conexion,"SELECT distinct(id) as id,sec,sname FROM a6 order by id asc ");
					while($row = mysqli_fetch_array($sql1)){
							$ids=$row["id"];
							$sec = $row["sec"];
							$nom = $row["sname"];
							//displaying ids and section 
							echo "<td class='active'>$ids</td><td class='active'>$sec</td><td class='active'>$nom</td>";
							$sql11 = mysqli_query( $conexion,"SELECT  name  FROM faculty WHERE yr= 'Tercero  de Bachillerato' ");
							while($row = mysqli_fetch_array($sql11) ){
						
							$sub = $row["name"];
							
							//counting total number of days based on registered id i.e total of all subjects
					$sql31 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `a6` WHERE  atten='0' and `id`='$ids' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql31)){
								//retriving number of absent days 
									$totalall2 = $rows["LOSS"];
							}
						
								
							//counting total number of days based on registered id i.e total of all subjects
				$sql3 = mysqli_query( $conexion,"SELECT count(atten) AS LOSS FROM `a6` WHERE `id`='$ids' and atten = '1' and day between '$from' and '$final' ");
							if($rows = mysqli_fetch_array($sql3)){
								//retriving number of absent days 
								$totalall1 = $rows["LOSS"];
							}
						
							//counting toal days for particular registered id
							 $totalall = $totalall1+$totalall2;
							
							//counting the total number of present days subject wise
	$sql2 = mysqli_query($conexion,"SELECT count(atten) AS ATTEN FROM `a6` WHERE (`id`='$ids' and `fac` = '$sub' and atten = '1' and day between '$from' and '$final') ");
							while($rows = mysqli_fetch_array($sql2)){
								//retriving number of present days 
								 $total1 = $rows["ATTEN"];
								echo "<td class='active'>$total1</td>";
							}
							if($totalall!=0){
								$per = round((($totalall1/$totalall)*100),2);
							}
							else{
								$per = 0;
							}
						
							

						}
						echo "<td class='active'>$totalall</td><td class='active'>$per</td></tr>";
					}
					echo "<form><input type='button' class='hidden-print btn btn-success' onClick='javascript:print()' value='Impresión'/></form>";
	
			    }
				// end of IF STARTING 4-1						
		 }
		}
	?>
<?php
	echo $msg;
?>
		</div>
	</body>
</html>