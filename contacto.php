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
	 
    
    <section class="" style="background:#FF7655;" data-stellar-background-ratio="0.5"  >
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 style="color:#0A496A; font-weight: bolder; " class="animated infinite bounce">CONTACTANOS</h1>
            <p  ><span class="" ><a style="color: white; font-size: 22px; letter-spacing:4px;  " class="" href="index.html"  >INICIO <i class="ion-ios-arrow-forward"></i></a></span></span></p>
          </div>
        </div>
      </div>
    </section>
		
	  
 
  <section class="section-60 section-md-top-90 section-md-bottom-100 novi-background bg-whisperapprox bg-cover"  style="background:#FAF3F2 ;">
    <center><br>
<div class="alert alert-primary" role="alert"  >
<h1 style="font-size: 24px; letter-spacing: 3px; font-weight: bold;">SI TIENE ALGUNA PRUGUNTA O DUDA, SIMPLEMENTE COMPLETE EL SIGUITENTE FORMULARIO Y NOS PONDREMO EN CONTACTO CON USTED  LO MAS PRONTO </h1>
</div>



    </center>  
            <div class="container"  >
                <div class="row row-50 row-fix justify-content-lg-between">
              <div class="col-lg-5 col-xl-4">
                        <div class="inset-lg-right-15 inset-xl-right-0"><br><br><br><br><br>
                            <div class="row row-30 row-md-40">



             <img src="img/asesora.png" width="350" height="300">                  
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-7">
                      <br><br>
                        <form   method="post" action="guardar.php"    >
                       <div class="form-group">
                        <label style="font-weight: bold;" >Nombre Completo</label>
                <input type="text" class="form-control" name="nombre" minlength="5" maxlength="50" placeholder="Ingrese su nombre completo" required  onkeypress="return soloLetras(event);" >
              </div>
 <div class="form-group">
                <label style="font-weight: bold;" >Telefono</label>
                <input type="text" class="form-control"  minlength="5" maxlength="10"  name="telefono" placeholder="Escribe su numero de contacto" onKeyPress="return SoloNumeros(event);" required>
              </div>

              <div class="form-group">
                <label style="font-weight: bold;">Correo Electrónico</label>
                <input type="email" class="form-control" name="email" placeholder="ejemplo@ejemplo.com" required>
              </div>
          

              <div class="form-group">
                  <label style="font-weight: bold;">Mensaje</label>
                <textarea name="mensaje" id="" cols="30"  rows="7" class="form-control" placeholder="Escribe mensaje o sugerencia" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Enviar Mensaje" class="btn btn-dark py-3 px-5">
             


              </div>
                        </form>

                        <script >//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
alert('Tecla de Numero no aceptado, Solo use de texto');
        return false;
      }
}</script>


<script>//Se utiliza para que el campo de texto solo acepte numeros
    

function SoloNumeros(evt){
 if(window.event){//asignamos el valor de la tecla a keynum
  keynum = evt.keyCode; //IE
 }
 else{
  keynum = evt.which; //FF
 } 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
  return true;
 }
 else{
  alert('Tecla de letra no aceptado, Solo use numero');
  return false;
 }
}





</script>

    <br><br>
            
                    </div>
                </div>
            </div>
        </section>





		
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