<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../../../index.html');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Consultorio Odontologico</title>
	<link rel="stylesheet" href="../../css/iconos.css">
	<link href="../../css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body style="  background: url(../../img/ima2.jpg) no-repeat ;
background-attachment: fixed;
background-size: cover;">
<br><br>
<div  class="titulo" >
	<ul   >
		<li> <?php
		include_once("conexion.php");
		$sentencia=$bd->query("SELECT nombre_apellido FROM administrador where usuario= '".$_SESSION['nombre']."'
			");
		$administrador=$sentencia->fetchAll(PDO::FETCH_OBJ);
		?>
		<?php
		foreach($administrador as $row) {?>
			Bienvenido <?php echo $row->nombre_apellido?>	
		<?php }?>
	</li>
</ul>
</div>	 
<br>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<div class="profile-sidebar">	
		<div class="profile-usertitle">
			<div class="profile-usertitle-name" ><div class="profile-usertitle-status" style="float: right;"></div>	
		</div>
	</div>
	<div class="clear"></div>
</div>
<aside  ><div  class="inicio">
	<nav style="text-decoration: none;">
		<img src="../../img/logooo.png" classs="i" width="97%">
		<ul ><li><span class="icon-home"></span><a  href="../../inicio.php" title="CenterMedicine" > Inicio</a> </li>
			<li><span class="icon-man"></span><a href="../../paciente.php" title="Pacientes">Pacientes</a></li>
			<li><span class="icon-list"></span><a href="../../admin.php" title="Usuarios">Usuarios</a></li>
			<li  ><a  style="text-decoration: none;color: black;" class="citas" data-toggle="collapse" href="#sub-item-3">
				Citas <span class="icon-calendar" ></span><em  class="icon-circle-down"></em>
			</a>
			<ul  class="children collapse" id="sub-item-3" >
				
				<li  id="li"  ><a class="" href="../../citas.php">
					<span style="margin: 0px 0px 0px -30px ;" class="icon-spinner10">&nbsp;</span> Asignadas
				</a></li>
				<li  id="li" ><a class="" href="../../citas_atendida.php">
					<span style="margin: 0px 0px 0px -30px ;" class="icon-spinner10">&nbsp;</span> Atendidas
				</a></li>
				<li  id="li" ><a class="" href="../../citas_perdida.php">
					<span style="margin: 0px 0px 0px -30px ;" class="icon-spinner10">&nbsp;</span> Perdidas
				</a></li>
				<li  id="li" ><a class="" href="../../fecha/reportes/citas_ocupada_disponible.php">
					<span style="margin: 0px 0px 0px -30px ;" class="icon-spinner10">&nbsp;</span>Citas Ocupadas y Disponible
				</a></li>
				<li  id="li" ><a class="" href="../../citas_cancelada.php">
					<span style="margin: 0px 0px 0px -30px ;" class="icon-spinner10">&nbsp;</span>Cancelada
				</a></li>
			</ul>
		</li>
		
		<li><span class="icon-user"></span><a href="../../especialista.php" title="Medicos">Especialista</a></li>
		
		
		<li><span class="icon-list"></span><a href="../../especialidad.php" title="Especialidad">Especialidad</a></li>
		
		<li  ><a  style="text-decoration: none;color: black;" class="citas" data-toggle="collapse" href="#sub-item-4">
			Reporte <span class="icon-history" style="position: relative; right: 28px;top: -20px;" ></span><em  class="icon-circle-down"></em>
		</a>
		<ul  class="children collapse" id="sub-item-4" >
			
			<li  id="li"  ><a class="" href="../../fecha/index.php">
				<span style="margin: 0px 0px 0px -30px ;" class="icon-spinner10">&nbsp;</span>Asignado
			</a></li>
			<li  id="li" ><a class="" href="../../fecha/reportes/atendidos.php">
				<span style="margin: 0px 0px 0px -30px ;" class="icon-spinner10">&nbsp;</span>Atendido
			</a></li>
			<li  id="li" ><a class="" href="../../fecha/reportes/citas_perdida.php">
				<span style="margin: 0px 0px 0px -30px ;" class="icon-spinner10">&nbsp;</span>Perdido
			</a></li>
		</ul>
	</li>
	<li><span class="icon-file-pdf"></span> <a href="../../pdf.php" title="pdf">Pdf</a></li>
	<li><span  class="icon-cross"></span><a style="" title="cerrar" href="../../cerrar.php"> Salir</a></li>
	
</ul>

</nav>
</div></aside>
</div><!--/.sidebar-->

