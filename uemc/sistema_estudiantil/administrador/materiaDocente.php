
<?php
session_start();
include ("../menu_conexion/conectar.php");
     if(!isset($_SESSION["tipo_usuario"])){
       header("location:../inicio.php");
     }
	 else{
	
	   $check_did = $_SESSION["tipo_usuario"];
		if($check_did !=2){
			 header("location:../inicio.php");
		}
	}
$msg ="";
$ids="";
$sbj="";
if((isset($_POST["fname"])) && (isset($_POST["subject"])) &&(isset($_POST["sem"])) &&(isset($_POST["sec"])) &&(isset($_POST["esp"])) ){

	$name = $_POST["fname"];
	$subs = $_POST["subject"];
	$sem = $_POST["sem"];	
	$sec = $_POST["sec"];
	$espe = $_POST["esp"];
	//CHECKING FOR THE NULL VALUES 
	if( ($name == "") || ($subs=="") ||($sem=="") || ($sec=="") ||  ($espe=="") ){
		$msg = "<div align='center'><font color='red'>Seleccione todas las opciones apropiadamente</font></div>";
	}else{
		
		//$check = mysql_query("SELECT * FROM `facsub` WHERE `name`='$name' and `sub` ='$sub' and `sem`='$sem' and `sec`='$sec'");
		$sql = mysqli_query($conexion, "SELECT * FROM materiadoc WHERE nombreDoc='$name' and asignatura='$subs' and año= '$sem' and seccion= '$sec' and cicloEsp= '$espe'");
		$count = mysqli_num_rows($sql);
		//CHECKING WHETHER SUBJECT ALREADY REGISTERED OR NOT
		if($count){
			//SUCCESS MEANS REGISTERED SO DISPLAY THE SAME MESSAGE
			$msg = "<div align='center'><font color='red'>Sujeto ya asignado.<a href='edit_alloc.php'>Haga clic aquí para editar</a></font></div>";
		}
		else{
		//NOT YET REGISTERED SO ALLOCATE THE SUBJECT TO THE FACULTY
			$insert = mysqli_query($conexion,"INSERT INTO materiadoc (nombreDoc,asignatura,año,seccion,cicloEsp) VALUES ('$name','$subs','$sem','$sec','$espe' )");
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
			<div><?php include("../menu_conexion/administradormenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="materiaDocente.php" name="regupdate">
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
								$sql=mysqli_query($conexion, "select distinct(nombreDoc) as nombreDoc from docente");
								while($row = mysqli_fetch_array($sql)){
									$faculty = $row["nombreDoc"];
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
						$ans = mysqli_query($conexion, "SELECT distinct(`nombreMat`) FROM `materias`  ORDER BY `nombreMat`");
						while($row = mysqli_fetch_array($ans)){
							$fname = $row["nombreMat"];
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
				<td class="active" colspan="4">							
			<select name="esp" class="form-control">
			<option value="">Seccion</option>
			                    <option value="Básica">Básica</option>
								<option value="Bachillerato en Informática">Bachillerato en Informática</option>
								<option value="Bachillerato en Electrónica">Bachillerato en Electrónica</option>
								<option value="Bachillerato en Electromecánica">Bachillerato en Electromecánica</option>

					
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