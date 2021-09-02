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
			<form method="post" action="view2.php">			
			<table class="table table-bordered table-hover">
				<caption>Ver Asistencia Estudiantil</caption>
				<tbody>
					<th class="danger" colspan="2">Asistencia del estudiante</th>
					<tr>
						<td class="active">
							<input type ="date" name="date" class="form-control"/>
						</td>
						<td class="active">
								<select name="sem" class="form-control">
			<option>Cursos</option>

			<option value="Primero de Bachillerato">Primero de Bachillerato</option>
			<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
			<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
					
		 </select>
						</td>
					
					</tr>
					<tr>
							<td class="active">
							<select name="subject" class="form-control">
							<option>Materia</option>
							<?php
							$j=1;
							//retriving the name of the subject from the database to display in the  select option
						$ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty` GROUP BY `name` ORDER BY `name`");
				    $count1= mysqli_num_rows($ans);
				while($j<=$count1){
					while($row = mysqli_fetch_array($ans)){
						 $fname = $row["name"];
						echo "<option value='$fname'>$fname</option>";	
					}
					$j++;
				};
							?>
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
					</td>
						<td class="active" colspan = "2">
								<select name="esp" class="form-control">
			<option >---Selecione Especialización---</option>
			<option value="1">Informática</option>
			<option value="2">Electrónica</option>
			<option value="3">Electromecánica</option>

					
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
	 if( (isset($_POST["date"])) && (isset($_POST["sem"])) && (isset($_POST["subject"])) && (isset($_POST["section"])) && (isset($_POST["esp"])) ){
					$date = $_POST["date"];
					$sem = $_POST["sem"];
					$subject = $_POST["subject"];
					$section = $_POST["section"];
					$especi = $_POST["esp"];
					
	
			//RETRIVING ATTENDANCE OF II-II 
			 if($sem == "Primero de Bachillerato"){
				$sql1 = mysqli_query($conexion, "SELECT * FROM a4 WHERE day = '$date' and fac = '$subject' and sec = '$section' and especializacion = '$especi' ");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>ID</th><th class='danger'>NOMBRE</th><th class='danger'>ESPECIALIZACIÓN</th><th class='danger'>SECCIÓN</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>ASISTENCIA</th>";
				if($count){
					while($row = mysqli_fetch_array($sql1) ){
						$id = $row["id"];
						$nom = $row["sname"];
						$espcl = $row["especializacion"];
						$sec = $row["sec"];
						$sub = $row["fac"];
						$date = $row["day"];
						$atten = $row["atten"];
						if($atten ==1){
							$stat='<font color="green">Presente</font>';
						}
						else if($atten ==0){
							$stat='<font color="red">Ausente</font>';
						}
						echo "
							<tr>
								<td class='info'>$id</td><td class='info'>$nom</td><td class='info'>$espcl</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$date</td><td class='info'>$stat</td>
							</tr>
						";
					}
				}
				else{
					echo "<div align='center'><b><font color='red'>El parámetro de selección no coincide</font></b></div>";
				}
			}
			//RETRIVING ATTENDANCE OF III-I 
			else if($sem == "Segundo de Bachillerato"){
				$sql1 = mysqli_query($conexion, "SELECT * FROM a5 WHERE day = '$date' and fac = '$subject' and sec = '$section' and especializacion = '$especi' ");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>ID</th><th class='danger'>NOMBRE</th><th class='danger'>ESPECIALIZACIÓN</th><th class='danger'>SECCIÓN</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>ASISTENCIA</th>";
				if($count){
					while($row = mysqli_fetch_array($sql1) ){
						$id = $row["id"];
						$nom = $row["sname"];
						$espcl = $row["especializacion"];
						$sec = $row["sec"];
						$sub = $row["fac"];
						$date = $row["day"];
						$atten = $row["atten"];
						if($atten ==1){
							$stat='<font color="green">Presente</font>';
						}
						else if($atten ==0){
							$stat='<font color="red">Ausente</font>';
						}
						echo "
							<tr>
								<td class='info'>$id</td><td class='info'>$nom</td><td class='info'>$espcl</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$date</td><td class='info'>$stat</td>
							</tr>
						";
					}
				}
				else{
					echo "<div align='center'><b><font color='red'>El parámetro de selección no coincide</font></b></div>";
				}
			}
			//RETRIVING ATTENDANCE OF III-II 
			else if($sem == "Tercero de Bachillerato"){
				$sql1 = mysqli_query($conexion, "SELECT * FROM a6 WHERE day = '$date' and fac = '$subject' and sec = '$section' and especializacion = '$especi' ");
				$count = mysqli_num_rows($sql1);
				echo "<table class='table table-bordered table-hover'>
				<th class='danger'>ID</th><th class='danger'>NOMBRE</th><th class='danger'>ESPECIALIZACIÓN</th><th class='danger'>SECCIÓN</th><th class='danger'>TEMA</th><th class='danger'>FECHA</th><th class='danger'>ASISTENCIA</th>";
				if($count){
					while($row = mysqli_fetch_array($sql1) ){
						$id = $row["id"];
						$nom = $row["sname"];
						$espcl = $row["especializacion"];
						$sec = $row["sec"];
						$sub = $row["fac"];
						$date = $row["day"];
						$atten = $row["atten"];
						if($atten ==1){
							$stat='<font color="green">Presente</font>';
						}
						else if($atten ==0){
							$stat='<font color="red">Ausente</font>';
						}
						echo "
							<tr>
								<td class='info'>$id</td><td class='info'>$nom</td><td class='info'>$espcl</td><td class='info'>$sec</td><td class='info'>$sub</td><td class='info'>$date</td><td class='info'>$stat</td>
							</tr>
						";
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


