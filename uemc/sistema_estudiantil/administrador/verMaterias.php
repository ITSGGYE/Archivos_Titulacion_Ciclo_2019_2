
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
		
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Ver los detalles de las materias</h3></caption>
			<tbody>
				<th class="danger">Id de la materia</th><th class="danger">Nombre de la materia</th><th class="danger">Estado de la materia</th>
				
				<?php
			
						$sts = mysqli_query($conexion,"SELECT * FROM materias ORDER BY nombreMat ASC");
						while($row=mysqli_fetch_array($sts)){
							$fname = $row["idMat"];
							$sub = $row["nombreMat"];
							$yr = $row["estado"];
							echo "<tr> <td class='info'>$fname</td><td class='info'>$sub</td><td class='info'>$yr</td>";
						}
					

				?>
			</tbody>			
			</table>
		

			</form>
		 </div>
		</div>
	</body>
</html>