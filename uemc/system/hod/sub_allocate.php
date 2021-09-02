
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
$ids="";
$sbj="";
if((isset($_POST["fname"])) && (isset($_POST["subject"])) &&(isset($_POST["sem"])) &&(isset($_POST["sec"])) ){

	$name = $_POST["fname"];
	$subs = $_POST["subject"];
	$sec = $_POST["sec"];
	$sem = $_POST["sem"];
	//CHECKING FOR THE NULL VALUES 
	if( ($name == "") || ($subs=="") || ($sec=="") || ($sem=="") ){
		$msg = "<div align='center'><font color='red'>Seleccione todas las opciones apropiadamente</font></div>";
	}else{
		
		//$check = mysql_query("SELECT * FROM `facsub` WHERE `name`='$name' and `sub` ='$sub' and `sem`='$sem' and `sec`='$sec'");
		$sql = mysqli_query($conexion, "SELECT * FROM facsub WHERE names='$name' and subjects='$subs' and sem = '$sem' and sec = '$sec'");
		$count = mysqli_num_rows($sql);
		//CHECKING WHETHER SUBJECT ALREADY REGISTERED OR NOT
		if($count){
			//SUCCESS MEANS REGISTERED SO DISPLAY THE SAME MESSAGE
			$msg = "<div align='center'><font color='red'>Sujeto ya asignado.<a href='edit_alloc.php'>Haga clic aquí para editar</a></font></div>";
		}
		else{
		//NOT YET REGISTERED SO ALLOCATE THE SUBJECT TO THE FACULTY
			$insert = mysqli_query($conexion,"INSERT INTO facsub (names,subjects,sem,sec) VALUES ('$name','$subs','$sem','$sec')");
			if($insert){
				$msg = "<div align='center'><font color='green'>Asignado con éxito</font></div>";
			}
		}
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
			<form method="post" action="sub_allocate.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Registro de Asignaturas para Docente  </h3></caption>
			<tbody>
				<th class="danger" colspan="4">Asignar Materia para Docentes				
				</th>
			
				<tr>
					<td class="active" colspan="2">	
						<select name="fname" class="form-control" >
							<option value=""> Nombre del Docente</option>
							<?php 
							//retriving name of faculty to display in select option
								$sql=mysqli_query($conexion, "select distinct(fname) as fname from user");
								while($row = mysqli_fetch_array($sql)){
									$faculty = $row["fname"];
									// displaying as option 
									echo "<option value='$faculty'>$faculty</option>";
								}
							?>
						
						</select>
					</td>
										<td class="active" colspan="2"><select name="subject" class="form-control">
							<option value="">Nombre de la Asignatura</option>
					<?php
						
							//retriving the name of the subject from the database to display in the  select option
						$ans = mysqli_query($conexion, "SELECT distinct(`name`) FROM `faculty`  ORDER BY `name`");
						while($row = mysqli_fetch_array($ans)){
							$fname = $row["name"];
							echo "<option value='$fname'>$fname</option>";	
						}
					?>
					</select>	
						</td>
					
					
				</tr>
				<tr>
				<!-- for selecting semester -->
					<td class="active" colspan="2">							
			<select name="sem" class="form-control">
			<option value="">Curso</option>
			<option value="Octavo">Octavo</option>
			<option value="Noveno">Noveno</option>
			<option value="Décimo">Décimo</option>
			<option value="Primero de Bachillerato">Primero de Bachillerato</option>
			<option value="Segundo de Bachillerato">Segundo de Bachillerato</option>
			<option value="Tercero de Bachillerato">Tercero de Bachillerato</option>
					
		 </select></td>
		 <!-- for selecting seciton -->
		 					<td class="active" colspan="2">							
			<select name="sec" class="form-control">
			<option value="">Seccion</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>

					
		 </select></td>
				</tr>
				<tr>
					<td colspan="3" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Guardar">	
								
					</td>
				</tr>
				<tr>
					<td colspan="3" align="center" class="success">
						<?php echo $msg; ?>
					</td>
				</tr>
			</tbody>			
			</table>
			</form>
		 </div>
		</div>
	</body>
</html>