
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
			<div class="head pull-left">
				<h2 class="pull-left">SGA<small>&nbsp;&nbsp;Para Personas Con Escolaridad Inconclusa "Manuela Cañizares"</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="qualification.php" >
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Agregar Calificación Estudiantil  </h3></caption>
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
				<tr><td class="active" colspan="3"><input type="submit" class="btn btn-success" value="Consultar"/></td></tr>

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
		$sql = mysqli_query($conexion,"SELECT id,sem,sec FROM s1 WHERE sec = '$section'");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='qualification.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='4'>Ingrese la siguiente información</th>
				<tr>";
				echo "
				<td class='info'><select class='form-control' name='est'><option >------ Estudiante -----</option>";
				$ans=mysqli_query($conexion, "select distinct(sname) as sname from s1 where sec = '$section' group by sname order by sname");
				while($row = mysqli_fetch_array($ans)){
					$estudiante = $row["sname"];
					// displaying as option 
					echo "<option value='$estudiante'>$estudiante</option>";
				}
					$j++;
				
			  	echo "
				<td class='info'><select class='form-control' name='par'><option >------ Selecione Parcial -----</option>";
				$ans=mysqli_query($conexion, "select distinct(nom) as nom from parciales ");
				while($row = mysqli_fetch_array($ans)){
					$parcial = $row["nom"];
					// displaying as option 
					echo "<option value='$parcial'>$parcial</option>";
				}
					$j++;
				
				echo "
				<td class='info'><select class='form-control' name='doc'><option >---- Docente ---</option>";
				$ans=mysqli_query($conexion, "select distinct(fname) as fname from user where did = 1");
				while($row = mysqli_fetch_array($ans)){
					$faculty = $row["fname"];
					// displaying as option 
					echo "<option value='$faculty'>$faculty</option>";
				}
					$j++;
				
				echo "
				<td class='info'><select class='form-control' name='fac'><option >------ Materia -----</option>";
				 $ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty` GROUP BY `name` ORDER BY `name`");
				    $count1= mysqli_num_rows($ans);
				while($j<=$count1){
					while($row = mysqli_fetch_array($ans)){
						 $fnames = $row["name"];
						echo "<option value='$fnames'>$fnames</option>";	
					}
					$j++;
				};
				
				while($row = mysqli_fetch_array($sql)){
					$sem = $row["sem"];
					$sections = $row["sec"];
					echo "
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
				
					";
					$i++;
				}
			 
				echo "
				<tr>
				<table class='table table-bordered table-hover'>
				<th class='danger'>Promedio-TAI</th><th class='danger'>Promedio-AIC</th><th class='danger'>Promedio-AGC</th><th class='danger'>Prom LO-LE</th><th class='danger'>Eval-Sum</th><th class='danger'>Prom-Parcial</th><th class='danger'>Cualitativa</th><th class='danger'>Conducta</th><th class='danger'>Observación</th>
				<tr>
				<td class='info'>
				<input type='text' class='form-control' name='campo1' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo2' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo3' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo4' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo5' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo6' >
				</td>
				<td class='info'>
				<select name='campo7' class='form-control'>
                <option ></option>
		    	<option value='DAR'>DAR</option>
		    	<option value='AAR'>AAR</option>
                <option value='PAR'>PAR</option>
				<option value='PAR'>NAR</option>					
		        </select>
				</td>
				<td class='info'>
				<select name='campo8' class='form-control'>
                <option ></option>
		    	<option value='A'>A</option>
		    	<option value='B'>B</option>
                <option value='C'>C</option>
		        </select>
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo9' >
				</td>
				</tr>
				</table>
				</tr>
				";
				
				echo "
				<tr>
				<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>
				</tr>
				</table></form></div></div>";
			}	
	// for first year second semester attendance
	else if($a == "Noveno"){
		$sql = mysqli_query($conexion,"SELECT id,sem,sec,sname FROM s2 WHERE sec = '$section'");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='qualification.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='4'>Ingrese la siguiente información</th>
				<tr>";
				echo "
				<td class='info'><select class='form-control' name='est'><option >------ Estudiante -----</option>";
				$ans=mysqli_query($conexion, "select distinct(sname) as sname from s2 where sec = '$section' group by sname order by sname");
				while($row = mysqli_fetch_array($ans)){
					$estudiante = $row["sname"];
					// displaying as option 
					echo "<option value='$estudiante'>$estudiante</option>";
				}
					$j++;
				
			  	echo "
				<td class='info'><select class='form-control' name='par'><option >------ Selecione Parcial -----</option>";
				$ans=mysqli_query($conexion, "select distinct(nom) as nom from parciales ");
				while($row = mysqli_fetch_array($ans)){
					$parcial = $row["nom"];
					// displaying as option 
					echo "<option value='$parcial'>$parcial</option>";
				}
					$j++;
				
				echo "
				<td class='info'><select class='form-control' name='doc'><option >---- Docente ---</option>";
				$ans=mysqli_query($conexion, "select distinct(fname) as fname from user where did = 1");
				while($row = mysqli_fetch_array($ans)){
					$faculty = $row["fname"];
					// displaying as option 
					echo "<option value='$faculty'>$faculty</option>";
				}
					$j++;
				
				echo "
				<td class='info'><select class='form-control' name='fac'><option >------ Materia -----</option>";
				 $ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty` GROUP BY `name` ORDER BY `name`");
				    $count1= mysqli_num_rows($ans);
				while($j<=$count1){
					while($row = mysqli_fetch_array($ans)){
						 $fnames = $row["name"];
						echo "<option value='$fnames'>$fnames</option>";	
					}
					$j++;
				};
				
				while($row = mysqli_fetch_array($sql)){
					$sem = $row["sem"];
					$sections = $row["sec"];
					echo "
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
				
					";
					$i++;
				}
			 
				echo "
				<tr>
				<table class='table table-bordered table-hover'>
				<th class='danger'>Promedio-TAI</th><th class='danger'>Promedio-AIC</th><th class='danger'>Promedio-AGC</th><th class='danger'>Prom LO-LE</th><th class='danger'>Eval-Sum</th><th class='danger'>Prom-Parcial</th><th class='danger'>Cualitativa</th><th class='danger'>Conducta</th><th class='danger'>Observación</th>
				<tr>
				<td class='info'>
				<input type='text' class='form-control' name='campo1' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo2' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo3' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo4' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo5' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo6' >
				</td>
				<td class='info'>
				<select name='campo7' class='form-control'>
                <option ></option>
		    	<option value='DAR'>DAR</option>
		    	<option value='AAR'>AAR</option>
                <option value='PAR'>PAR</option>
				<option value='PAR'>NAR</option>					
		        </select>
				</td>
				<td class='info'>
				<select name='campo8' class='form-control'>
                <option ></option>
		    	<option value='A'>A</option>
		    	<option value='B'>B</option>
                <option value='C'>C</option>
		        </select>
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo9' >
				</td>
				</tr>
				</table>
				</tr>
				";
				
				echo "
				<tr>
				<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>
				</tr>
				</table></form></div></div>";
			}
	// second year first semester attendance
	 if($a == "Décimo"){
		$sql = mysqli_query($conexion,"SELECT id,sem,sec,sname FROM s3 WHERE sec = '$section'");
		$count =  mysqli_num_rows($sql);
					echo "
					<div class='container'><div class='promotess'>
				<form method='post' action='qualification.php'>
				<table class='table table-bordered table-hover'>
				<tbody>
				<th class='danger' colspan='4'>Ingrese la siguiente información</th>
				<tr>";
				echo "
				<td class='info'><select class='form-control' name='est'><option >------ Estudiante -----</option>";
				$ans=mysqli_query($conexion, "select distinct(sname) as sname from s3 where sec = '$section' group by sname order by sname");
				while($row = mysqli_fetch_array($ans)){
					$estudiante = $row["sname"];
					// displaying as option 
					echo "<option value='$estudiante'>$estudiante</option>";
				}
					$j++;
				
			  	echo "
				<td class='info'><select class='form-control' name='par'><option >------ Selecione Parcial -----</option>";
				$ans=mysqli_query($conexion, "select distinct(nom) as nom from parciales ");
				while($row = mysqli_fetch_array($ans)){
					$parcial = $row["nom"];
					// displaying as option 
					echo "<option value='$parcial'>$parcial</option>";
				}
					$j++;
				
				echo "
				<td class='info'><select class='form-control' name='doc'><option >---- Docente ---</option>";
				$ans=mysqli_query($conexion, "select distinct(fname) as fname from user where did = 1");
				while($row = mysqli_fetch_array($ans)){
					$faculty = $row["fname"];
					// displaying as option 
					echo "<option value='$faculty'>$faculty</option>";
				}
					$j++;
				
				echo "
				<td class='info'><select class='form-control' name='mat'><option >------ Materia -----</option>";
				 $ans = mysqli_query($conexion, "SELECT COUNT(*) AS `Rows`, `name` FROM `faculty` GROUP BY `name` ORDER BY `name`");
				    $count1= mysqli_num_rows($ans);
				while($j<=$count1){
					while($row = mysqli_fetch_array($ans)){
						 $fnames = $row["name"];
						echo "<option value='$fnames'>$fnames</option>";	
					}
					$j++;
				
				
				while($row = mysqli_fetch_array($sql)){
					$sem = $row["sem"];
					$sections = $row["sec"];
					echo "
					<input type='hidden' name='count' value='$count'/> 
					<input type='hidden' name='sect$i' value='$sections'/> 
				
					";
					$i++;
				}
			 
				echo "
				<tr>
				<table class='table table-bordered table-hover'>
				<th class='danger'>Promedio-TAI</th><th class='danger'>Promedio-AIC</th><th class='danger'>Promedio-AGC</th><th class='danger'>Prom LO-LE</th><th class='danger'>Eval-Sum</th><th class='danger'>Prom-Parcial</th><th class='danger'>Cualitativa</th><th class='danger'>Conducta</th><th class='danger'>Observación</th>
				<tr>
				<td class='info'>
				<input type='text' class='form-control' name='campo1' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo2' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo3' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo4' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo5' >
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo6' >
				</td>
				<td class='info'>
				<select name='campo7' class='form-control'>
                <option ></option>
		    	<option value='DAR'>DAR</option>
		    	<option value='AAR'>AAR</option>
                <option value='PAR'>PAR</option>
				<option value='PAR'>NAR</option>					
		        </select>
				</td>
				<td class='info'>
				<select name='campo8' class='form-control'>
                <option ></option>
		    	<option value='A'>A</option>
		    	<option value='B'>B</option>
                <option value='C'>C</option>
		        </select>
				</td>
				<td class='info'>
				<input type='text' class='form-control' name='campo9' >
				</td>
				</tr>
				</table>
				</tr>
				";
				
				echo "
				<tr>
				<table class='table'><tr><td colspan='2' align='center' class='info'> <input type='submit' class='btn btn-success' name='ok' value='Agregar'>
				</tr>
				</table></form></div></div>";

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
	if(isset($_POST["est"]) && isset($_POST["par"]) && (isset($_POST["doc"])) && (isset($_POST["mat"])) && (isset($_POST["campo1"])) && (isset($_POST["campo2"])) && (isset($_POST["campo3"])) && (isset($_POST["campo4"])) && (isset($_POST["campo5"])) && (isset($_POST["campo6"])) && (isset($_POST["campo7"])) && (isset($_POST["campo8"])) && (isset($_POST["camp9"])) ){
		 if(isset($_POST["result$i"]) == null){
			$res = 0;
		 }
		 else{
			$res = $_POST["result$i"];
		}
		
		$est = $_POST["est"];
		$par = $_POST["par"];
		$doc = $_POST["doc"];
		$mat = $_POST["mat"];		
		$campo1 = $_POST["campo1"];
		$campo2 = $_POST["campo2"];
		$campo3 = $_POST["campo3"];
		$campo4 = $_POST["campo4"];
		$campo5 = $_POST["campo5"];
		$campo6 = $_POST["campo6"];
		$campo7 = $_POST["campo7"];
		$campo8 = $_POST["campo8"];	
		$campo9 = $_POST["campo9"];	
		$count = $_POST["count"];
		$sem = $_POST["year"];
		$sec = $_POST["sect$i"];
		$ides = $_POST["ids$i"];

		//first year attendance first semester
	 if($sem == "Octavo"){
		$check = mysqli_query($conexion,"select * from qualification where(parcial='$par' and nombre='$est') and (sec = '$sec' and materia = '$mat') ");
		$countCheck = mysqli_num_rows($check);
		//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select * from qualification where nombre='$est' and parcial = '$par' and docente='$doc' and materia='$mat' and sec='$sec' ");
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
			$sql1 = mysqli_query($conexion,"INSERT INTO `qualification` (`parcial`, `nombre`, `curso`, `seccion`, `materia`,`docente`,`prom _tai`,`prom _aic`,`prom _agc`,`prom _lo_y_le`,`eval_sum`,`prom_par`,`cualit`,`conduct`,`observ`) VALUES ('$par','$est','$sem','$sec','$mat','$doc','$campo1','$campo2','$campo3','$campo4','$campo5','$campo6','$campo7','$campo8','$campo9')");
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
		$check = mysqli_query($conexion,"select * from qualification ");
		$countCheck = mysqli_num_rows($check);
		//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select * from qualification ");
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
			$sql1 = mysqli_query($conexion,"INSERT INTO `qualification` (`parcial`, `nombre`, `curso`, `seccion`, `materia`,`docente`,`prom _tai`,`prom _aic`,`prom _agc`,`prom _lo_y_le`,`eval_sum`,`prom_par`,`cualit`,`conduct`,`observ`) VALUES ('$par','$est','$sem','$sec','$mat','$doc','$campo1','$campo2','$campo3','$campo4','$campo5','$campo6','$campo7','$campo8','$campo9')");
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
		$check = mysqli_query($conexion,"select * from qualification where(parcial='$par' and nombre='$est') and (sec = '$sec' and materia = '$mat') ");
		$countCheck = mysqli_num_rows($check);
		//retriving the period to check whether attendance for that period is inserted within a day or not
		$checkSub = mysqli_query($conexion,"select * from qualification where nombre='$est' and parcial = '$par' and docente='$doc' and materia='$mat' and sec='$sec' ");
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
			$sql1 = mysqli_query($conexion,"INSERT INTO `qualification` (`parcial`, `nombre`, `curso`, `seccion`, `materia`,`docente`,`prom _tai`,`prom _aic`,`prom _agc`,`prom _lo_y_le`,`eval_sum`,`prom_par`,`cualit`,`conduct`,`observ`) VALUES ('$par','$est','$sem','$sec','$mat','$doc','$campo1','$campo2','$campo3','$campo4','$campo5','$campo6','$campo7','$campo8','$campo9')");
		}
		else{
			echo "<div align='center'><font color='red'><b>Lo siento, la asistencia para este tema ya está insertada
</b></font></div>";
			break;
		}
		}
		
	 }
	
	}
	$i++;

	}while($i<=$count);

}
}
?>


	</body>
</html>