
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
		
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Facultad - Detalles de los estudiantes</h3></caption>
			<tbody>
				<th class="danger">Nombre de la Asignatura</th><th class="danger">Nombre del Docente</th><th class="danger">Curso</th><th class="danger">Sección</th>
				
				<?php
			
						$sts = mysqli_query($conexion,"SELECT * FROM facsub ORDER BY sem ASC");
						while($row=mysqli_fetch_array($sts)){
							$fname = $row["names"];
							$sub = $row["subjects"];
							$yr = $row["sem"];
							$sec = $row["sec"];
							echo "<tr> <td class='info'>$sub</td><td class='info'>$fname</td><td class='info'>$yr</td><td class='info'>$sec</td>";
						}
					

				?>
			</tbody>			
			</table>
		

			</form>
		 </div>
		</div>
	</body>
</html>