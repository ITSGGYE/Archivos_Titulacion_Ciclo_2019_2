<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: ../index.php');
	}	
?>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>CONEXION VITAL</span> ADMINISTRACIÓN</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">


							<?php
include_once("../conexion.php");


$sql = "SELECT COUNT(*) AS  c
                FROM contacto ";
$stm = $bd->prepare($sql);
//pasamos el parámetro almacenado en $id
$stm->bindParam( PDO::PARAM_INT);
$stm->execute();
echo $stm->fetchColumn(); 
?></span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
						 <?php
include_once("../conexion.php");

$sentencia=$bd->query("SELECT nombre_contacto,mensaje,fecha_ingreso FROM contacto ORDER BY fecha_ingreso Limit 2 ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>	  
								<div class="dropdown-messages-box">

	<?php
foreach($paciente as $row) {?>
							
									<div class="message-body">
										<h4 style="color: #54b7d5">Nuevo Mensaje de contacto</h4>
										<a href="#"><strong><?php echo $row->nombre_contacto?></strong> </a>
										<p><?php echo $row->mensaje?> </p>
							<small class="text-muted"> <?php echo $row->fecha_ingreso?></small>
	<?php }?>


								</div>
<div class="all-button"><a href="../contacto.php">
									<em class="fa fa-inbox"></em> <strong>Ir Todos los mensaje</strong>
								</a></div>


								</div>



							</li>
					
						</ul>
					</li>
					
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
