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
			<form method="post" action="edit_attandance2.php" >
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Editar asistencia estudiantil </h3></caption>
			<tbody>
				<th class="danger" colspan="3">Seleccione los parámetros para editar la asistencia
				</th>
			
				<tr>
					<td class="active" colspan="2">	
								<select name="sem" class="form-control">
			<option > Seleccionar Curso</option>
			<option value="Primero de Bachillerato">Primero de Bachillerato</option>
			<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
			<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
					
		</select>
					</td>
					<td class="active">	
								<select name="section" class="form-control">
			<option > Seleccionar Sección</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>

					
		</select>
					</td>
				</tr>
			
				<tr>
					<td class="active" colspan="2">
					<select name="sub" class="form-control">
					<option > Seleccionar Materia</option>
					<?php
					$j=1;
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
						<input type='date' class='form-control' name='date'/>
					</td>
				
				</tr>
				<tr>
				</td>
					<td class="active" colspan="3">	
								<select name="esp" class="form-control">
			<option >---Seleccionar Especialización---</option>
			<option value="1">Informática</option>
			<option value="2">Electrónica</option>
			<option value="3">Electromecánica</option>

					
		</select>
					</td>
				</tr>
				<tr>
					<td class="active" colspan="3">
						<select name="period" class="form-control">
							<option> Seleccionar período </option>
							<option value="1">primero</option>
							<option value="2">Segundo</option>
							<option value="3">tercero</option>
							<option value="4">cuarto</option>
							<option value="5">quinto</option>
							<option value="6">Sexto</option>
							<option value="7">Septimo</option>
							<option value="8">Octavo</option>
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
	
	$i=1;
	$j = 1;
	$subEdit="";
	$dateEdit="";
	
if(isset($_POST["sem"]) && isset($_POST["section"])  && isset($_POST["esp"]) && isset($_POST["sub"]) && isset($_POST["period"]) && isset($_POST["date"])){
	$a = $_POST["sem"];
	$period = $_POST["period"];
	$section = $_POST["section"];
	$especi = $_POST["esp"];
	$sub = $_POST["sub"];
	$dat = $_POST["date"];
	
	//for editing 2-2 attendance
	if($a == "Primero de Bachillerato"){
		$sql = mysqli_query($conexion, "SELECT * FROM a4 WHERE sec = '$section' and especializacion = '$especi' and per='$period' and fac= '$sub' and day = '$dat' ");
		$count =  mysqli_num_rows($sql);
		if($count){
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='edit_attandance.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='2'>Asistencia del estudiante</th>
				<tr><td class='info'>	";
				while($row = mysqli_fetch_array($sql)){
					$dateEdit = $row["day"];
					$subEdit = $row["fac"];
					$period = $row["per"];
				}
				//get date to edit attendance for that date
				echo "
				<input type='text' class='form-control' name='date' value='$dateEdit' readonly></td>";
				//get subject name to edit attendance for that subject
			  	echo "
				<td class='info'><input type='text' class='form-control' name='sub' value='$subEdit' readonly/>";
				//getting period and semister to edit the attendance
				echo "
				</td></tr></tbody></table>
				<input type='hidden' name='year' value='Primero de Bachillerato'/> 
				<input type='hidden' name='period' value='$period'/> 
				";
				$sql1 = mysqli_query($conexion, "SELECT * FROM a4 WHERE sec = '$section' and especializacion = '$especi' and per='$period' and fac= '$sub' and day = '$dat' ");
				while($row = mysqli_fetch_array($sql1)){
					$id = $row["id"];
					$sem = $row["sem"];
					$sections = $row["sec"];
					$sectionss = $row["especializacion"];
					$atten = $row["atten"];
										$nm = $row["sname"];

					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='text' readonly value='$id' name='ids$i'>
						";
						//checking whether persent or absent perviously
						if($atten==1){
						
						echo	"<input type='checkbox'  name='result$i'checked='checked' value='1'>";
						}
						else{
							echo	"<input type='checkbox'  name='result$i' value='1'>";
						}
						//getting counter value and section for editing attendance
						echo "
						&nbsp;
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
					<input type='hidden' name='secti$i' value='$sectionss'/> <br>
				
					";
					$i++;
				}
				echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Actualizar cambio'>	</td></tr>
				
				</table></form></div></div>";
		}
		else{
			echo "<div align='center'><b><font color='red'>El parámetro de selección no coincide</font></b></div>";
		}
	}
	//for edting 3-1 attendance
	else if($a == "Segundo de Bachillerato"){
		$sql = mysqli_query($conexion,  "SELECT * FROM a5 WHERE sec = '$section' and especializacion = '$especi' and per='$period' and fac= '$sub' and day = '$dat' ");
		$count =  mysqli_num_rows($sql);
		if($count){
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='edit_attandance.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='2'>Asistencia del estudiante</th>
				<tr><td class='info'>	";
				while($row = mysqli_fetch_array($sql)){
					$dateEdit = $row["day"];
					$subEdit = $row["fac"];
					$period = $row["per"];
				}
				//get date to edit attendance for that date
				echo "
				<input type='text' class='form-control' name='date' value='$dateEdit' readonly></td>";
				//get subject name to edit attendance for that subject
			  	echo "
				<td class='info'><input type='text' class='form-control' name='sub' value='$subEdit' readonly/>";
				//getting period and semister to edit the attendance
				echo "
				</td></tr></tbody></table>
				<input type='hidden' name='year' value='Segundo de Bachillerato'/> 
				<input type='hidden' name='period' value='$period'/> 
				";
				$sql1 = mysqli_query($conexion, "SELECT * FROM a5 WHERE sec = '$section' and especializacion = '$especi' and per='$period' and fac= '$sub' and day = '$dat' ");
				while($row = mysqli_fetch_array($sql1)){
					$id = $row["id"];
					$sem = $row["sem"];
					$sections = $row["sec"];
					$sectionss = $row["especializacion"];
					$atten = $row["atten"];
										$nm = $row["sname"];

					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='text' readonly value='$id' name='ids$i'>
						";
						//checking whether persent or absent perviously
						if($atten==1){
						
						echo	"<input type='checkbox'  name='result$i'checked='checked' value='1'>";
						}
						else{
							echo	"<input type='checkbox'  name='result$i' value='1'>";
						}
						//getting counter value and section for editing attendance
						echo "
						&nbsp;
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
					<input type='hidden' name='secti$i' value='$sectionss'/> <br>
				
					";
					$i++;
				}
				echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Actualizar cambio'>	</td></tr>
				
				</table></form></div></div>";
		}
		else{
			echo "<div align='center'><b><font color='red'>El parámetro de selección no coincide</font></b></div>";
		}
	}
	// for editing 3-2 attendance
	else if($a == "Tercero de Bachillerato"){
		$sql = mysqli_query($conexion, "SELECT * FROM a6 WHERE sec = '$section' and especializacion = '$especi' and per='$period' and fac= '$sub' and day = '$dat' ");
		$count =  mysqli_num_rows($sql);
		if($count){
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='edit_attandance.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='2'>Asistencia del estudiante</th>
				<tr><td class='info'>	";
				while($row = mysqli_fetch_array($sql)){
					$dateEdit = $row["day"];
					$subEdit = $row["fac"];
					$period = $row["per"];
				}
				//get date to edit attendance for that date
				echo "
				<input type='text' class='form-control' name='date' value='$dateEdit' readonly></td>";
				//get subject name to edit attendance for that subject
			  	echo "
				<td class='info'><input type='text' class='form-control' name='sub' value='$subEdit' readonly/>";
				//getting period and semister to edit the attendance
				echo "
				</td></tr></tbody></table>
				<input type='hidden' name='year' value='Tercero de Bachillerato'/> 
				<input type='hidden' name='period' value='$period'/> 
				";
				$sql1 = mysqli_query($conexion, "SELECT * FROM a6 WHERE sec = '$section' and especializacion = '$especi' and per='$period' and fac= '$sub' and day = '$dat' ");
				while($row = mysqli_fetch_array($sql1)){
					$id = $row["id"];
					$sem = $row["sem"];
					$sections = $row["sec"];
					$sectionss = $row["especializacion"];
					$atten = $row["atten"];
										$nm = $row["sname"];

					echo "
						<input type='text' readonly value='$nm' name='nm$i'>
						<input type='text' readonly value='$id' name='ids$i'>
						";
						//checking whether persent or absent perviously
						if($atten==1){
						
						echo	"<input type='checkbox'  name='result$i'checked='checked' value='1'>";
						}
						else{
							echo	"<input type='checkbox'  name='result$i' value='1'>";
						}
						//getting counter value and section for editing attendance
						echo "
						&nbsp;
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
					<input type='hidden' name='secti$i' value='$sectionss'/> <br>
				
					";
					$i++;
				}
				echo "		<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Actualizar cambio'>	</td></tr>
				
				</table></form></div></div>";
		}
		else{
			echo "<div align='center'><b><font color='red'>El parámetro de selección no coincide</font></b></div>";
		}
	}
	
}

?>

<?php
	$i=1;
	$count="";
	$res = "";
	$sec = "";
	$id ="";
	$sem="";
	$subject ="";
	$period="";
	$date="";
	do{
		// checking and retriving the id posted by form2
		if( isset($_POST["ids$i"]) ){
				$sem = $_POST["year"];
				$sec = $_POST["sect$i"];
				$espcl = $_POST["secti$i"];
				$date=$_POST["date"];
				$id= $_POST["ids$i"];
				$nmup = $_POST["nm$i"];
				$subject = $_POST["sub"];
				$period = $_POST["period"];
				// counter value
				$count = $_POST["count"];
				//checking for checkbox value 
				if( ((isset($_POST["result$i"])) == null) || ((isset($_POST["result$i"])) == 0) ){
					$res = 0;
				}
				else{
					$res = $_POST["result$i"];
				}
				
			//update 2-2 attendance
			if($sem == "Primero de Bachillerato"){
				$sql1 = mysqli_query($conexion, "UPDATE `a4` SET  `atten`='$res' WHERE id='$id' and sec = '$sec' and especializacion='$espcl' and per='$period' and sname='$nmup' and fac= '$subject' and day = '$date'");
			}
			//update 3-1 attendance
			else if($sem == "Segundo de Bachillerato"){
				$sql1 = mysqli_query($conexion, "UPDATE `a5` SET  `atten`='$res' WHERE id='$id' and sec = '$sec' and especializacion='$espcl' and per='$period' and sname='$nmup' and fac= '$subject' and day = '$date'");
			}
			//update 3-2 attendance
			else if($sem == "Tercero de Bachillerato"){
				$sql1 = mysqli_query($conexion, "UPDATE `a6` SET  `atten`='$res' WHERE id='$id' and sec = '$sec' and especializacion='$espcl' and per='$period' and sname='$nmup' and fac= '$subject' and day = '$date'");
			}
		}
		$i++;
	}while( $i <= $count );
	
?>


	</body>
</html>