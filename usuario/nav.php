<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
	header('Location: ../index.html');	
}
?>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"> CONSULTORIO ODONTOLOGICO</a> <div class="form-group"><br>
                  <?php
                    include_once("conexion.php");
                    $sentencia=$bd->query("SELECT * 
                      FROM 
                      notificacion WHERE id_notificacion= '1'
                      ;");
                    $pa=$sentencia->fetchAll(PDO::FETCH_OBJ);
                    ?>
                       <?php foreach($pa as $row): ?>
                    <MARQUEE  >  
                     <input style="height: 20%;background:rgba(0,0,0,0.3);text-align: left;color: black;font-weight: bold;"   value="<?php echo $row->notificacion; ?>" class="form-control" required>
                    </MARQUEE>
                       <?php endforeach; ?>
                </div>
				<ul style="list-style: none;">
					<li  class="dropdown"><a  href="#">
					</div>
				</li>
			</ul>
			
		</div>
	</div>
</nav>
