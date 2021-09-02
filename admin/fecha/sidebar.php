<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: ../index.php');
	}	
?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	
<!--/r-->

		<div class="profile-sidebar">	
		
			<div class="profile-usertitle">


		<div class="profile-usertitle-name" ><div class="profile-usertitle-status" style="float: right;"><span class="indicator label-success"></span>Online</div>
			<p style="color: #ff7655;font-weight: bold; font-size: 16px;" > USUARIO
</p><p style=" font-size: 16px;text-transform: uppercase;"><?php echo $_SESSION['nombre'] ?></p>

		
	</div>
				
 <?php
include_once("../conexion.php");

$sentencia=$bd->query("SELECT nombre_apellido FROM administrador where usuario= '".$_SESSION['nombre']."'
    ");

$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>
<?php
foreach($paciente as $row) {?>
<p style="color: #ff7655; font-size: 16px;font-weight: bold;">NOMBRE USUARIO</p><p style=" font-size: 16px;"><?php echo $row->nombre_apellido?></p>	
<?php }?>

				
			</div>
			<div class="clear"></div>
		</div>

<!--/r-->


	
		<ul class="nav menu" style="font-weight: bold;">
			<li ><a href="../inicio.php"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
			



<li class="parent "><a data-toggle="collapse" href="#sub-item-3">
			<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Citas <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-3" >
					<li><a class="" href="../citas.php" >
						<i class="fa fa-pencil-square-o" aria-hidden="true" ></i> General
					</a></li>
					<li><a class="" href="../citas_asignada.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Asignadas
					</a></li>
					<li><a class="" href="../citas_atendida.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Atendidas
					</a></li>
				</ul>
			</li>











	<li><a href="../paciente.php"><i class="fa fa-user-o" aria-hidden="true"></i> Pacientes</a></li>
	
	<li><a href="../especialista.php"><i class="fa fa-user" aria-hidden="true"></i> Especialistas</a></li>


			<li><a href="../especialidad.php"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Especialidad</a></li>
			
		
			

 
<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
			<i class="fa fa-address-card-o" aria-hidden="true"></i> Historial<span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li><a class="" href="../inicio_hospital.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Paciente Historial
					</a></li>
					<li><a class="" href="../historial_general.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Historial Tabla
					</a><br></li><br>
					
				</ul>
			</li>


<li><a href="../contacto.php"><em class="fa fa-envelope"></em> Contacto</a></li>
			<li><a href="../sitio_inicio.php"><i class="fa fa-globe" aria-hidden="true"></i> Administrar Sitio</a></li>
 
<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
			<i class="fa fa-users" aria-hidden="true"></i> Usuarios <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="../admin.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Administradores
					</a></li>
					<li><a class="" href="../paciente_registrado.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Pacientes
					</a><br></li><br>
					
				</ul>
			</li>




















<li><a href="../reporte_inicio.php"><em class="fa fa-clone">&nbsp;</em> Reportes</a></li>








			<li><a href="../cerrar.php"><em class="fa fa-power-off">&nbsp;</em> Cerrar Session</a></li>
		</ul>
	</div><!--/.sidebar-->
		
