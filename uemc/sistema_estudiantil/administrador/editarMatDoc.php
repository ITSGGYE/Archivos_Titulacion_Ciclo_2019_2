
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
$csubs="";
$csub="";
if((isset($_POST["fname"])) && (isset($_POST["subject"])) &&(isset($_POST["sem"])) &&(isset($_POST["sec"])) &&(isset($_POST["espe"])) ){

	$name = $_POST["fname"];
	$subs = $_POST["subject"];
	$sem = $_POST["sem"];
	$sec = $_POST["sec"];
	$esp = $_POST["espe"];

	//CHECKING FOR THE NULL VALUES 
	if( ($name == "") || ($subs=="") || ($sem=="") || ($sec=="")  || ($esp=="") ){
		$msg = "<div align='center'><font color='red'>Select all options properly</font></div>";
	}else{
	 $sql = mysqli_query($conexion, "SELECT * FROM materiadoc WHERE nombreDoc='$name'  and año = '$sem' and seccion = '$sec' and cicloEsp = '$esp' ");

	 $count = mysqli_num_rows($sql);
	 if($count){

		$update = mysqli_query($conexion,"UPDATE materiadoc SET asignatura = '$subs' WHERE nombreDoc='$name'  and año = '$sem' and seccion = '$sec' and cicloEsp = '$esp' ");
		$sql1 = mysqli_query($conexion,"SELECT * FROM materiadoc WHERE nombreDoc='$name'  and año = '$sem' and seccion = '$sec' and cicloEsp = '$esp'");
	 		while($row=mysqli_fetch_array($sql1)){
				$csubs = $row["asignatura"];
			}
			if($csubs == $subs){
					$msg = "<div align='center'><font color='green'>Cambio aplicado con éxito</font></div>";
			}
			else{
				$msg = "<div align='center'><font color='red'>El cambio no se puede aplicar, contacto administrador </font></div>";
			}
		
	}
	else{
		$msg = "<div align='center'><font color='red'>El parámetro de selección no coincide</font></div>";
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
				<h2 class="pull-left">SSN<small>&nbsp;&nbsp;Para Personas Con Escolaridad Inconclusa </small>"Manuela Cañizares"</h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../menu_conexion/administradormenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="editarMatDoc.php" name="regupdate">
			<table class="table table-bordered table-hover" width="500px">
			<caption align="center"><h3>Editar Asignación de Asignatura </h3></caption>
			<tbody>
				<th class="danger" colspan="4">Seleccione Asunto para cambiar			
				</th>
			
				<tr>
					<td class="active" colspan="2">	
						<select name="fname" class="form-control" >
							<option value=""> Nombre del docente</option>
							<?php 
							//retriving name of faculty to display in select option
								$sql=mysqli_query($conexion,"select distinct(nombreDoc) as nombreDoc from docente");
								while($row = mysqli_fetch_array($sql)){
									$faculty = $row["nombreDoc"];
									// displaying as option 
									echo "<option value='$faculty'>$faculty</option>";
								}
							?>
						
						</select>
					</td>
										<td class="active" colspan="2"><select name="subject" class="form-control">
							<option value="">Cambiar materia a</option>
					<?php
						
							//retriving the name of the subject from the database to display in the  select option
						$ans = mysqli_query($conexion,"SELECT distinct(`nombreMat`) FROM `materias`  ORDER BY `nombreMat`");
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
			<option value="">Cursos</option>
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

					
		 </select></td>
          
		 <tr>
		 <td class="info" colspan="6"> 	
						<select name="espe" class="form-control">
					<option value="">ESPECIALIZACIÓN</option>
                                <option value="Básica">Básica</option>
								<option value="Bachillerato en Informática">Bachillerato en Informática</option>
								<option value="Bachillerato en Electrónica">Bachillerato en Electrónica</option>
								<option value="Bachillerato en Electromecánica">Bachillerato en Electromecánica</option>
			
						</select>
						
					</td>
		</tr>
				</tr>
				<tr>
					<td colspan="4" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="Grabar">	
								
					</td>
				</tr>
				<tr>
					<td colspan="4" align="center" class="success">
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