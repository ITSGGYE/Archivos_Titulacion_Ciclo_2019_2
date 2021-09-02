<?php
	session_start();
		/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos 
 
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
     ?><script>  window.location.replace('login.php');</script><?php   
		exit;
        }
 $us=$_SESSION['user_id'];
	require_once ("config/db.php"); 
	require_once ("config/conexion.php"); 
 
	$title="Inicio | Tenaza";
?>
<!DOCTYPE html>
<html>
<?php require_once 'header.php';?><head>
	 <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<body>
<?php require_once 'head.php';?>

	<div class="content">
     	<div class="container">
     		<div class="col-md-8 col-sm-8 col-xs-12">
     	 
	<section id="contact-form-section" class="form-content-wrap">
		<div class="container">
			<div class="row">
<h1>Formulario de reservas</h1>
    <div class="bg-agile">
	<div class="book-appointment">
	<h2>Hacer una Reserva</h2>
				
				<form action="reservasp.php" method="post" name="appointment" id="appointment">
			<div id="resultados_ajax" class="gaps"></div>
			<div class="left-agileits-w3layouts same">
	 <input type="hidden" name="cliente" value="<?php echo $us;?>" placeholder="" required=""/>
					<div class="gaps">	
				<p>Número de Mesas</p>
					<input type="text" name="numbera" placeholder="" required=""/>
				</div>
				<div class="gaps">	
				<p>Número de sillas</p>
					<input type="text" name="number" placeholder="" required=""/>
				</div>
			 	
				<div class="gaps">
				<p>Observaciones</p>
						<textarea name="symptoms" placeholder="" required="" ></textarea>
				</div>
			</div>
			<div class="right-agileinfo same">
			<div class="gaps">
				<p>Seleccionar fecha</p>		
						<input  id="datepicker1" name="datepicker1" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'dd/mm/yyyy';}" required="">
			</div>
			<div class="gaps">
				<p>Menu</p>	
					<select class="form-control" name="departament">
						<option></option>
						<?php 
							$query_categoria=mysqli_query($con,"select * from menu where estado_menu=1");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['id_menu'];?>"><?php echo $rw['nombre_menu']." $".$rw['precio'];?></option>			
								<?php
							}
							?>
					</select>
			</div>
			 
			<div class="gaps">
				<p>Hora</p>		
					<input type="text" id="timepicker" name="time" class="timepicker form-control" value="">	
			</div>
			</div>
			<div class="clear"></div>
						  <input type="submit" value="Realizar cita">
			</form>
		</div>
   </div>
   <!--copyright-->
			 

			</div><!--End row -->
		</div><!--End container -->
	</section>
		 

     	</div>
    </div> <!-- /container -->
<?php require_once 'footer.php';?>
	
</body>
</html>
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>
		<!-- Calendar -->
				<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
						  
				  </script>