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
			<div align="center" class="promote">
			<form method="post" action="verAsistMensual.php">			
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
					<tr>
					<td class="active" colspan = "2"><br/>
								<select name="esp" class="form-control">
			<option >----Especialización-----</option>
			                    <option value="Básica">Básica</option>
								<option value="Bachillerato en Informática">Bachillerato en Informática</option>
								<option value="Bachillerato en Electrónica">Bachillerato en Electrónica</option>
								<option value="Bachillerato en Electromecánica">Bachillerato en Electromecánica</option>

					
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
	 if( (isset($_POST["date"])) && (isset($_POST["sem"])) && (isset($_POST["subject"])) && (isset($_POST["section"])) && (isset($_POST["esp"])) ){
					$dates = $_POST["date"];
					$sem = $_POST["sem"];
					$subject = $_POST["subject"];
					$section = $_POST["section"];
					$especi = $_POST["esp"];
					

			//RETRIVING ATTENDANCE OF II-II 
			 if($sem == "Octavo"){
				$sql1 = mysqli_query($conexion, "SELECT distinct(idAsis),nombre,seccion,asistEsp FROM asistencia WHERE dia BETWEEN ('$dates' AND '$subject') and seccion = '$section' and asistEsp = '$especi'");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>NOMBRE</th><th class='danger'>REG ID</th><th class='danger'>SECCIÓN</th><th class='danger'>ESPECIALIZACIÓN</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysqli_fetch_array($sql1) ){
					    $nom = $row["nombre"];
						$id = $row["idAsis"];
						$sec = $row["seccion"];
						$especializacion = $row["asistEsp"];
					$sql11 = mysqli_query($conexion,"SELECT DISTINCT(materia) as materia FROM asistencia WHERE idAsis = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["materia"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '0'");
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
							<td class='info'>$nom</td><td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$especializacion</td><td class='info'>$sub</td><td class='info'>$dates a $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
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
			else if($sem == "Noveno"){
				$sql1 = mysqli_query($conexion, "SELECT distinct(idAsis),nombre,seccion,asistEsp FROM asistencia WHERE dia BETWEEN ('$dates' AND '$subject') and seccion = '$section' and asistEsp = '$especi'");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>NOMBRE</th><th class='danger'>REG ID</th><th class='danger'>SECCIÓN</th><th class='danger'>ESPECIALIZACIÓN</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysqli_fetch_array($sql1) ){
					    $nom = $row["nombre"];
						$id = $row["idAsis"];
						$sec = $row["seccion"];
						$especializacion = $row["asistEsp"];
					$sql11 = mysqli_query($conexion,"SELECT DISTINCT(materia) as materia FROM asistencia WHERE idAsis = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["materia"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '0'");
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
							<td class='info'>$nom</td><td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$especializacion</td><td class='info'>$sub</td><td class='info'>$dates a $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
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
						$sql1 = mysqli_query($conexion, "SELECT distinct(idAsis),nombre,seccion,asistEsp FROM asistencia WHERE dia BETWEEN ('$dates' AND '$subject') and seccion = '$section' and asistEsp = '$especi'");
						$count = mysqli_num_rows($sql1);
						echo "<table class='table table-bordered table-hover'>
						<th class='danger'>NOMBRE</th><th class='danger'>REG ID</th><th class='danger'>SECCIÓN</th><th class='danger'>ESPECIALIZACIÓN</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
						if($count){
						while($row = mysqli_fetch_array($sql1) ){
								$nom = $row["nombre"];
								$id = $row["idAsis"];
								$sec = $row["seccion"];
								$especializacion = $row["asistEsp"];
							$sql11 = mysqli_query($conexion,"SELECT DISTINCT(materia) as materia FROM asistencia WHERE idAsis = '$id' ");
							while($row = mysqli_fetch_array($sql11) ){
								
								$sub = $row["materia"];
								//$date = $row["day"];
								//$atten = $row["atten"];
								//counting the total number of present days
								$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '1'");
								while($rows = mysqli_fetch_array($sql2)){
									//retriving number of present days 
									$total1 = $rows["ATTEN"];
								}
								//counting the toal number of absent days
								$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '0'");
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
									<td class='info'>$nom</td><td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$especializacion</td><td class='info'>$sub</td><td class='info'>$dates a $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
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
			else if($sem == "Primero de Bachillerato"){
				$sql1 = mysqli_query($conexion, "SELECT distinct(idAsis),nombre,seccion,asistEsp FROM asistencia WHERE dia BETWEEN ('$dates' AND '$subject') and seccion = '$section' and asistEsp = '$especi'");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>NOMBRE</th><th class='danger'>REG ID</th><th class='danger'>SECCIÓN</th><th class='danger'>ESPECIALIZACIÓN</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysqli_fetch_array($sql1) ){
					    $nom = $row["nombre"];
						$id = $row["idAsis"];
						$sec = $row["seccion"];
						$especializacion = $row["asistEsp"];
					$sql11 = mysqli_query($conexion,"SELECT DISTINCT(materia) as materia FROM asistencia WHERE idAsis = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["materia"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '0'");
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
							<td class='info'>$nom</td><td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$especializacion</td><td class='info'>$sub</td><td class='info'>$dates a $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
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
							$sql1 = mysqli_query($conexion, "SELECT distinct(idAsis),nombre,seccion,asistEsp FROM asistencia WHERE dia BETWEEN ('$dates' AND '$subject') and seccion = '$section' and asistEsp = '$especi'");
							$count = mysqli_num_rows($sql1);
							echo "<table class='table table-bordered table-hover'>
							<th class='danger'>NOMBRE</th><th class='danger'>REG ID</th><th class='danger'>SECCIÓN</th><th class='danger'>ESPECIALIZACIÓN</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
							if($count){
							while($row = mysqli_fetch_array($sql1) ){
									$nom = $row["nombre"];
									$id = $row["idAsis"];
									$sec = $row["seccion"];
									$especializacion = $row["asistEsp"];
								$sql11 = mysqli_query($conexion,"SELECT DISTINCT(materia) as materia FROM asistencia WHERE idAsis = '$id' ");
								while($row = mysqli_fetch_array($sql11) ){
									
									$sub = $row["materia"];
									//$date = $row["day"];
									//$atten = $row["atten"];
									//counting the total number of present days
									$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '1'");
									while($rows = mysqli_fetch_array($sql2)){
										//retriving number of present days 
										$total1 = $rows["ATTEN"];
									}
									//counting the toal number of absent days
									$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '0'");
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
										<td class='info'>$nom</td><td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$especializacion</td><td class='info'>$sub</td><td class='info'>$dates a $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
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
				$sql1 = mysqli_query($conexion, "SELECT distinct(idAsis),seccion,asistEsp FROM asistencia WHERE dia BETWEEN ('$dates' AND '$subject') and seccion = '$section' and asistEsp = '$especi'");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>REG ID</th><th class='danger'>SECCIÓN</th><th class='danger'>ESPECIALIZACIÓN</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>CLASE TOTAL</th><th class='danger'>PRESENTE</th><th class='danger'>PORCENTAJE</th>";
				if($count){
				while($row = mysqli_fetch_array($sql1) ){
						$id = $row["idAsis"];
						$sec = $row["seccion"];
						$especializacion = $row["asistEsp"];
					$sql11 = mysqli_query($conexion,"SELECT DISTINCT(materia) as materia FROM asistencia WHERE idAsis = '$id' ");
					while($row = mysqli_fetch_array($sql11) ){
						
						$sub = $row["materia"];
						//$date = $row["day"];
						//$atten = $row["atten"];
						//counting the total number of present days
						$sql2 = mysqli_query($conexion, "SELECT count(atten) AS ATTEN FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '1'");
						while($rows = mysqli_fetch_array($sql2)){
							//retriving number of present days 
							$total1 = $rows["ATTEN"];
						}
						//counting the toal number of absent days
						$sql3 = mysqli_query($conexion, "SELECT count(atten) AS LOSS FROM `asistencia` WHERE `idAsis`='$id' and `materia` = '$sub' and atten = '0'");
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
								<td class='info'>$id</td><td class='info'>$sec</td><td class='info'>$especializacion</td><td class='info'>$sub</td><td class='info'>$dates TO $subject</td><td class='info'>$total</td><td class='info'>$total1</td><td class='info'>$percent</td>
							</tr>
						";
					 
					}
				}
				}
				
				else{
					echo "<div align='center'><b><font color='red'>Selection Parameter do not Match</font></b></div>";
				}
			}



			?>
		</div>
	</body>
</html>