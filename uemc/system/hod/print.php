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
		Para Personas Con Escolaridad Inconclusa "Manuela Cañizares"
		</title>
	</head>
	<body>
		<div class="container" align="center">
			<div class="head pull-left">
				<h2 class="pull-left">SGA<small>&nbsp;&nbsp;Para Personas Con Escolaridad Inconclusa "Manuela Cañizares"a</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div class="hidden-print"><?php include("../include/hodmenu.txt");?></div>
			<table class="table table-hover">
				<th class="danger">Reg ID</th>
				<?php
					$sql = mysqli_query($conexion, "SELECT distinct(fac) as fac FROM a1 ");
					while($row = mysqli_fetch_array($sql)){
						$sub=$row["fac"];
						echo "<th class=\"danger\">$sub</th>";
					}
				
				?>
				<th class="danger">Total</th><th class="danger">Presente total</th><th class="danger">Porcentage</th>
		
			<?php
				$id="";
		
				$sql1 = mysqli_query($conexion,"select distinct(id) from a1");
				while($row = mysqli_fetch_array($sql1)){
					$id = $row["id"];
					echo "<tr><td class='active'>$id</td>";
				}

			?>
				</table>
	</div>
	</body>
</html>