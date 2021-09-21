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
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/iconoos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Consultorio Odontologico</title>
	<link rel="stylesheet" href="../../css/iconos.css">
</head>
<body style="  background: url(../../img/ima2.jpg) no-repeat ;
background-attachment: fixed;
background-size: cover;">
<br><br>
<div  class="titulo" >
	<ul   >
		<li><?php
		include_once("../../conexion.php");
		$sentencia=$bd->query("SELECT nombre_apellido FROM paciente where correo= '".$_SESSION['nombre']."'
			");
		$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
		?>
		<?php
		foreach($paciente as $row) {?>
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
		<img src="../../img/logooo.png" classs="i" width="120%">
		<ul ><li><span class="icon-home"></span><a  href="../../inicio.php" title="CenterMedicine" > Inicio</a> </li>
			<?php
                    include_once("conexion.php");
                    $sentencia=$bd->query("SELECT * 
                      FROM 
                      notificacion WHERE id_notificacion= '6'
                      ;");
                    $pa=$sentencia->fetchAll(PDO::FETCH_OBJ);
                    ?>     
			<li ><?php foreach($pa as $row): ?>
				<a class="citas" href="../../citas.php"   value="<?php echo $row->id_notificacion; ?>"><?php echo $row->notificacion; ?>
                       <?php endforeach; ?>  
                 </a>
            </li>
                    <?php
                    include_once("conexion.php");
                    $sentencia=$bd->query("SELECT * 
                      FROM 
                      notificacion WHERE id_notificacion= '7'
                      ;");
                    $pa=$sentencia->fetchAll(PDO::FETCH_OBJ);
                    ?>
			<li ><?php foreach($pa as $row): ?>
				<a class="citas" href="../../citas_atendida.php"  value="<?php echo $row->id_notificacion; ?>"><?php echo $row->notificacion; ?>
                       <?php endforeach; ?> 
                </a>
            </li>
            <?php
                    include_once("conexion.php");
                    $sentencia=$bd->query("SELECT * 
                      FROM 
                      notificacion WHERE id_notificacion= '8'
                      ;");
                    $pa=$sentencia->fetchAll(PDO::FETCH_OBJ);
                    ?>
			<li ><?php foreach($pa as $row): ?>
				<a class="citas" href="../../citas_perdida.php" value="<?php echo $row->id_notificacion; ?>"><?php echo $row->notificacion; ?>
                       <?php endforeach; ?> 
                </a>
            </li>
			<li><span class="icon-clock"></span> <a href="../../reporte/reportes/asignados.php" title="pdf">Ver Citas Ocupadas y Disponible</a></li>
			<li><span class="icon-clock"></span> <a href="../../cancelar.php" title="pdf">Citas Canceladas</a></li>
			<li><span  class="icon-cross"></span><a style="" title="cerrar" href="../../cerrar.php"> Salir</a></li>
			
		</ul>
		
	</nav>
</div></aside>
</div>
<!--/.sidebar-->

	<!--<ul  class="children collapse" id="sub-item-3" >
					<li  ><a class="" href="citas.php">
						<span style="margin: 0px 0px 0px -30px ;" class="fa fa-arrow-right">&nbsp;</span> Asignadas
					</a></li>
					<li><a class="" href="citas_atendida.php">
						<span style="margin: 0px 0px 0px -30px ;" class="fa fa-arrow-right">&nbsp;</span> Atendidas
					</a></li>
					<li><a class="" href="citas_perdida.php">
						<span style="margin: 0px 0px 0px -30px ;" class="fa fa-arrow-right">&nbsp;</span> Perdidas
					</a></li>
				</ul>>-->