<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: index.php');
	
	}

	
?>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid"  >
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand"
 href="#" style="    font-size: 20px;
    text-transform: uppercase;
    font-weight: 500;
    height: 60px;
    padding-top: 18px;"><span>CONEXION VITAL</span> ADMINISTRACIÓN</a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
