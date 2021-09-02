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
			<form method="post" action="editarAsistencia.php" >
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Editar asistencia estudiantil </h3></caption>
			<tbody>
				<th class="danger" colspan="6">Seleccione los parámetros para editar la asistencia
				</th>
			
				<tr>
					<td class="active" colspan="3">	
								<select name="sem" class="form-control">
			<option > Seleccionar Curso</option>
			<option value="Octavo">Octavo</option>
			<option value="Noveno">Noveno</option>
			<option value="Décimo">Décimo</option>
			<option value="Primero de Bachillerato">Primero de Bachillerato</option>
			<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
			<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
					
		</select>
					</td>
					<td class="active" colspan="3">	
								<select name="section" class="form-control">
			<option > Seleccionar Sección</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>

					
		</select>
					</td>
				</tr>
			
				<tr>
				<td class="active" colspan="3">
				<select name="sub" class="form-control">
							<option value="">Nombre de la Asignatura</option>
					<?php
						
							//retriving the name of the subject from the database to display in the  select option
						$ans = mysqli_query($conexion, "SELECT distinct(`nombreMat`) FROM `materias`  ORDER BY `nombreMat`");
						while($row = mysqli_fetch_array($ans)){
							$fname = $row["nombreMat"];
							echo "<option value='$fname'>$fname</option>";	
						}
					?>
					</select>	


					<td class="active" colspan="3">
						<select name="period" class="form-control">
							<option> Seleccionar hora de clase </option>
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
				<tr>
				</td>
					<td class="active" colspan="3">	
								<select name="esp" class="form-control">
			                    <option value="Básica">Básica</option>
								<option value="Bachillerato en Informática">Bachillerato en Informática</option>
								<option value="Bachillerato en Electrónica">Bachillerato en Electrónica</option>
								<option value="Bachillerato en Electromecánica">Bachillerato en Electromecánica</option>

					
		</select>
					</td>

					</td>
					<td class="active" colspan="3">
						<input type='date' class='form-control' name='date'/>
					</td>
				</tr>

				<tr><td class="active" align="center" colspan="6"><input type="submit" class="btn btn-success" value="Consultar"/></td></tr>
				
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
		if($a == "Octavo"){
			$sql = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
			$count =  mysqli_num_rows($sql);
			if($count){
						echo "
						<div class='container'><div class='promotess'>
					<form method='post' action='editarAsistencia.php'>
					<table class='table table-bordered table-hover'>
					<tbody>
					<th class='danger' colspan='2'>Asistencia del estudiante</th>
					<tr><td class='info'>	";
					while($row = mysqli_fetch_array($sql)){
						$dateEdit = $row["dia"];
						$subEdit = $row["materia"];
						$period = $row["hora"];
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
					<input type='hidden' name='year' value='Octavo'/> 
					<input type='hidden' name='period' value='$period'/> 
					";
					$sql1 = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
					while($row = mysqli_fetch_array($sql1)){
						$id = $row["idAsis"];
						$sem = $row["curso"];
						$sections = $row["seccion"];
						$sectionss = $row["asistEsp"];
						$atten = $row["atten"];
											$nm = $row["nombre"];
	
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
		else if($a == "Noveno"){
			$sql = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
			$count =  mysqli_num_rows($sql);
			if($count){
						echo "
						<div class='container'><div class='promotess'>
					<form method='post' action='editarAsistencia.php'>
					<table class='table table-bordered table-hover'>
					<tbody>
					<th class='danger' colspan='2'>Asistencia del estudiante</th>
					<tr><td class='info'>	";
					while($row = mysqli_fetch_array($sql)){
						$dateEdit = $row["dia"];
						$subEdit = $row["materia"];
						$period = $row["hora"];
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
					<input type='hidden' name='year' value='Noveno'/> 
					<input type='hidden' name='period' value='$period'/> 
					";
					$sql1 = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
					while($row = mysqli_fetch_array($sql1)){
						$id = $row["idAsis"];
						$sem = $row["curso"];
						$sections = $row["seccion"];
						$sectionss = $row["asistEsp"];
						$atten = $row["atten"];
											$nm = $row["nombre"];
	
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
		else if($a == "Décimo"){
			$sql = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
			$count =  mysqli_num_rows($sql);
			if($count){
						echo "
						<div class='container'><div class='promotess'>
					<form method='post' action='editarAsistencia.php'>
					<table class='table table-bordered table-hover'>
					<tbody>
					<th class='danger' colspan='2'>Asistencia del estudiante</th>
					<tr><td class='info'>	";
					while($row = mysqli_fetch_array($sql)){
						$dateEdit = $row["dia"];
						$subEdit = $row["materia"];
						$period = $row["hora"];
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
					<input type='hidden' name='year' value='Décimo'/> 
					<input type='hidden' name='period' value='$period'/> 
					";
					$sql1 = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
					while($row = mysqli_fetch_array($sql1)){
						$id = $row["idAsis"];
						$sem = $row["curso"];
						$sections = $row["seccion"];
						$sectionss = $row["asistEsp"];
						$atten = $row["atten"];
											$nm = $row["nombre"];
	
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
	
	//for editing 2-2 attendance
	else if($a == "Primero de Bachillerato"){
		$sql = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
		$count =  mysqli_num_rows($sql);
		if($count){
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='editarAsistencia.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='2'>Asistencia del estudiante</th>
				<tr><td class='info'>	";
				while($row = mysqli_fetch_array($sql)){
					$dateEdit = $row["dia"];
					$subEdit = $row["materia"];
					$period = $row["hora"];
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
				$sql1 = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
				while($row = mysqli_fetch_array($sql1)){
					$id = $row["idAsis"];
					$sem = $row["curso"];
					$sections = $row["seccion"];
					$sectionss = $row["asistEsp"];
					$atten = $row["atten"];
										$nm = $row["nombre"];

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
		$sql = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
		$count =  mysqli_num_rows($sql);
		if($count){
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='editarAsistencia.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='2'>Asistencia del estudiante</th>
				<tr><td class='info'>	";
				while($row = mysqli_fetch_array($sql)){
					$dateEdit = $row["dia"];
					$subEdit = $row["materia"];
					$period = $row["hora"];
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
				$sql1 = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
				while($row = mysqli_fetch_array($sql1)){
					$id = $row["idAsis"];
					$sem = $row["curso"];
					$sections = $row["seccion"];
					$sectionss = $row["asistEsp"];
					$atten = $row["atten"];
										$nm = $row["nombre"];

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
		$sql = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
		$count =  mysqli_num_rows($sql);
		if($count){
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='editarAsistencia.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='2'>Asistencia del estudiante</th>
				<tr><td class='info'>	";
				while($row = mysqli_fetch_array($sql)){
					$dateEdit = $row["dia"];
					$subEdit = $row["materia"];
					$period = $row["hora"];
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
				$sql1 = mysqli_query($conexion, "SELECT * FROM asistencia WHERE seccion = '$section' and asistEsp = '$especi' and hora='$period' and materia= '$sub' and dia = '$dat' ");
				while($row = mysqli_fetch_array($sql1)){
					$id = $row["idAsis"];
					$sem = $row["curso"];
					$sections = $row["seccion"];
					$sectionss = $row["asistEsp"];
					$atten = $row["atten"];
										$nm = $row["nombre"];

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
			if($sem == "Octavo"){
				$sql1 = mysqli_query($conexion, "UPDATE `asistencia` SET  `atten`='$res' WHERE idAsis='$id' and seccion = '$sec' and asistEsp='$espcl' and hora='$period' and nombre='$nmup' and materia= '$subject' and dia = '$date'");
			}
			//update 3-1 attendance
			else if($sem == "Noveno"){
				$sql1 = mysqli_query($conexion, "UPDATE `asistencia` SET  `atten`='$res' WHERE idAsis='$id' and seccion = '$sec' and asistEsp='$espcl' and hora='$period' and nombre='$nmup' and materia= '$subject' and dia = '$date'");
			}
			//update 3-2 attendance
			else if($sem == "Décimo"){
				$sql1 = mysqli_query($conexion, "UPDATE `asistencia` SET  `atten`='$res' WHERE idAsis='$id' and seccion = '$sec' and asistEsp='$espcl' and hora='$period' and nombre='$nmup' and materia= '$subject' and dia = '$date'");
			}
			else if($sem == "Primero de Bachillerato"){
				$sql1 = mysqli_query($conexion, "UPDATE `asistencia` SET  `atten`='$res' WHERE idAsis='$id' and seccion = '$sec' and asistEsp='$espcl' and hora='$period' and nombre='$nmup' and materia= '$subject' and dia = '$date'");
			}
			//update 3-1 attendance
			else if($sem == "Segundo de Bachillerato"){
				$sql1 = mysqli_query($conexion, "UPDATE `asistencia` SET  `atten`='$res' WHERE idAsis='$id' and seccion = '$sec' and asistEsp='$espcl' and hora='$period' and nombre='$nmup' and materia= '$subject' and dia = '$date'");
			}
			//update 3-2 attendance
			else if($sem == "Tercero de Bachillerato"){
				$sql1 = mysqli_query($conexion, "UPDATE `asistencia` SET  `atten`='$res' WHERE idAsis='$id' and seccion = '$sec' and asistEsp='$espcl' and hora='$period' and nombre='$nmup' and materia= '$subject' and dia = '$date'");
				if($sql1){
					$msg = "<font color=\"green\">Registrado exitosamente</font>";
				}
			}
			else{
				// dispaly error message
					$msg = "<font color=\"red\">lo Sentimos! Este horario ya está añadida.</font>";
			}
			
		}
		
		
		$i++;
	}while( $i <= $count );
	
?>


	</body>
</html>
