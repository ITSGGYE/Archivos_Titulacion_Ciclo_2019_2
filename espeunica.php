<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CONEXION VITAL - FUNDCIÓN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css1/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css1/animate.css">
    
    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">
    <link rel="stylesheet" href="css1/magnific-popup.css">

    <link rel="stylesheet" href="css1/aos.css">
      <link rel="stylesheet" href="css1/bootstrap.css">

    <link rel="stylesheet" href="css1/ionicons.min.css">

    <link rel="stylesheet" href="css1/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css1/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css1/flaticon.css">
    <link rel="stylesheet" href="css1/icomoon.css">
    <link rel="stylesheet" href="css1/style.css">

<link rel="icon" href="img/ico.ico" sizes="32x32" />
<link rel="icon" href="img/ico.ico" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="img/ico.ico" />
<meta name="msapplication-TileImage" content="img/ico.ico" />


  </head>
  <body>
    <nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
    			<div class="col-lg-2 pr-4 align-items-center">
		    	 <center> <img width="300" src="img/logob.png"> </center> 
	    		</div>
	    		<div class="col-lg-10 d-none d-md-block">
		    		<div class="row d-flex">
			    		<div class="col-md-4 pr-4 d-flex topper align-items-center">
			    			<div class="">


					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="">
					    		

					    	</div>
						   
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">S
					    	<div class="">
					    		

					    	</div>
						    
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </nav>
	 
    
    <section class="" style="background:#FF7655;" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 style="color:#0A496A; font-weight: bolder; ">Especialidad </h1>
            <p  class=""><span class="" ><a style="color: white; font-size: 22px; letter-spacing:4px;"href="index.html">INICIO <i class="ion-ios-arrow-forward"></i></a></span></span></p>
          </div>
        </div>
      </div>
    </section>

    <?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM sitio s
JOIN especialidad e
ON s.id_especialidad=e.id_especialidad
WHERE s.id_sitio
ORDER BY s.id_sitio
  ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>

		
<?php
foreach($paciente as $row) {?>


		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url(<?php echo $row->imagen; ?>);" width="64px" height="64px">
		</div>
					<div class="col-md-7 wrap-about py-4 py-md-5 ftco-animate">
	          <div class="heading-section mb-5">
	          	<div class="pl-md-5 ml-md-5">
		          	
		            <h2 class="mb-4" style="font-size: 28px;text-transform: uppercase;"><?php echo $row->nombre_especialidad?></h2>
                <h3 class="mb-4" style="font-size: 22px; letter-spacing: 2px" ><?php echo $row->subtema?></h3>
	            </div>
	          </div>
	          <div class="pl-md-5 ml-md-5 mb-5">
							<p> <?php echo $row->descripcion?> </p>
              



						</div>





					</div>
				</div>
			</div>

     
		</section>

 <section class="" style="background:#FF7655;" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 style="color:#0A496A; font-weight: bolder; "></h1>
           
          </div>
        </div>
      </div>
    </section>


      <?php }?>

		
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
       
            </div>
          <center>  
            	<img width="300" style="" src="img/logob.png"> 
	            <div class="ftco-footer-widget mb-5">
<br><br>
	            <span style="color: #fff;" class="icon icon-map-marker"></span><span style="font-size:18px;  color: #FF7655; font-weight: bold; margin:0px 6px; letter-spacing: 1.5px;"   class="text">Urbanización San Felipe</span><br>
	                
 <span style="color: #fff;"  class="icon icon-envelope"></span><span style="font-size:18px; color: #FF7655; font-weight: bold; margin:0px 6px; letter-spacing: 1.5px;"   class="text">conexionvitalfundacion@gmail.com</span><br>
                  <span style="color: #fff;"  class="icon icon-phone"></span><span style="font-size:18px; color: #FF7655;font-weight: bold;margin:0px 6px; letter-spacing: 1.5px;"  class="text">0992045476</span>
	           
	            </div></center>

	            
           <center> <p style="color:white; font-weight: light;"> Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Fundación Conexión Vital
  </p></center>
          </div>
        </div>
      </div>
    </footer>
  











  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>