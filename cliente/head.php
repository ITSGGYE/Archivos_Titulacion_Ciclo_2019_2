  <!-- Static navbar -->
	<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse"
					data-target=".navbar-collapse" class="navbar-toggle collapsed">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
			</div>
	 
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li  ><a href="index.php">Inicio</a></li>
					<li  ><a href="reervas.php">Nueva Reserva</a>
					</li>
					</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							Hola,  
							 
							<?php echo $_SESSION['usuario']; ?>
							<span class="caret"></span>
						</a>
						 
							<li> <a href="logout.php">Salir</a> </li>
						</ul> 	 
					</li>
					
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>