
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
		
			</div>
			<caption align="center"><h3>Ver los detalles de Docentes</h3></caption>
			</div>

			<table class='table table-bordered table-hover'>

				<th class="danger">Id Docentes</th><th class="danger">Nombre de Docentes</th><th class="danger">Dirección</th><th class="danger">Sector</th><th class="danger">barrio/Ciudadela</th><th class="danger">Teléfono Convencional</th><th class="danger">Teléfono Celular</th><th class="danger">Correo</th><th class="danger">Correo Laboral</th><th class="danger">Estado </th>
				
				<?php
			
						$sts = mysqli_query($conexion,"SELECT * FROM docente ORDER BY nombreDoc ASC");
						while($row=mysqli_fetch_array($sts)){
							$id = $row["idDoc"];
							$nomdoc = $row["nombreDoc"];
							$dir = $row["direccion"];
							$sec = $row["sector"];
							$barciu = $row["barrioCiudadela"];
							$tefCon = $row["telfCon"];
							$telfCel = $row["telfCel"];
							$em = $row["email"];
							$corIns= $row["correoInst"];
							$estdoc = $row["estadoDoc"];
							echo "<tr> <td class='info'>$id</td><td class='info'>$nomdoc</td><td class='info'>$dir</td><td class='info'>$sec</td><td class='info'>$barciu</td><td class='info'>$tefCon</td><td class='info'>$telfCel</td><td class='info'>$em</td><td class='info'>$corIns</td><td class='info'>$estdoc</td>";
						}
					

				?>
			</tbody>			
			</table>
		

			</form>
		 </div>
		</div>
	</body>
</html>