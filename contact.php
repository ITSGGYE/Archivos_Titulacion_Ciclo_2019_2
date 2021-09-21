<?php
require_once("class/class.php");

$tra = new Login();

if(isset($_POST['btn-submit']))
{
$reg = $tra->EnviarContacto();
exit;
} 
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Ing. Ruben Chirinos">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
<title></title>

    <link rel="stylesheet" href="assets/hotel/common/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/jquery.event.calendar/css/jquery.event.calendar.css" media="all">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/royalslider/royalslider.css" media="all">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/royalslider/skins/minimal-white/rs-minimal-white.css" media="all">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/isotope/css/style.css" media="all">

    <link rel="stylesheet" href="assets/hotel/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/hotel/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/hotel/common/js/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/hotel/common/css/shortcodes.css">
    <link rel="stylesheet" href="assets/hotel/css/layout.css">
    <link rel="stylesheet" href="assets/hotel/css/colors.css" id="colors">
    <link rel="stylesheet" href="assets/hotel/css/custom.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/hotel/css/style.css">

    <script src="assets/hotel/js/jquery-1.10.2.min.js"></script>
    <script src="assets/hotel/js/bootstrap-select.min.js"></script>
    <script src="assets/hotel/common/js/modernizr-2.6.1.min.js"></script>

    <script>
      Modernizr.load({
        load : [
        'assets/hotel/common/bootstrap/js/bootstrap.min.js',
        'assets/hotel/js/pluginss/respond/respond.min.js',
        'assets/hotel/js/jquery-ui.js',
        'assets/hotel/js/pluginss/jquery-cookie/jquery-cookie.js',
        'assets/hotel/js/pluginss/easing/jquery.easing.1.3.min.js',
        'assets/hotel/common/js/plugins/magnific-popup/jquery.magnific-popup.min.js',
        //Javascripts required by the current model
        'assets/hotel/js/pluginss/royalslider/jquery.royalslider.min.js',
        'assets/hotel/js/pluginss/isotope/jquery.isotope.min.js',
        'assets/hotel/js/pluginss/isotope/jquery.isotope.sloppy-masonry.min.js',
        'assets/hotel/js/jquery.imagesloaded.min.js',
        'assets/hotel/js/pluginss/imagefill/js/jquery-imagefill.js',
        'assets/hotel/js/pluginss/toucheeffect/toucheffects.js',
                ],
        complete : function(){
        Modernizr.load('assets/hotel/common/js/custom.js');
        Modernizr.load('assets/hotel/js/custom.js');
                }
            });
      $(function(){});
        /* ==============================================
         * PLACE ANALYTICS CODE HERE
         * ==============================================
         */
         var _gaq = _gaq || [];
        
      </script>

    <!-- script jquery -->
    <script src="assets/script/jquery.min.js"></script> 
    <script type="text/javascript" src="assets/script/titulos.js"></script>
    <script type="text/javascript" src="assets/script/validation.min.js"></script>
    <script type="text/javascript" src="assets/script/script.js"></script>
    <script src="assets/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <!-- script jquery -->

<body id="page-2" itemscope itemtype="http://schema.org/WebPage">

<header class="navbar-fixed-top" role="banner">
    <div id="mainHeader">
        <div class="container">
            <div id="mainMenu" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="primary nav-1">
                  <a class="firstLevel" href="index" title="Panel Principal">Inicio</a>                  
                </li>

                <li class="primary nav-5">
                  <a class="dropdown-toggle disabled firstLevel" href="hotel" title="Información de Hotel">Hotel</a>                  
                </li>

                <li class="primary nav-9">
                  <a class="dropdown-toggle disabled firstLevel" href="rooms" title="Habitaciones">Habitaciones</a>                  
                </li>

                <li class="primary nav-7">
                  <a class="dropdown-toggle disabled firstLevel" href="gastronomy" title="Gastronomía">Gastronomía</a>      
                </li>

                <li class="primary nav-7">
                  <a class="dropdown-toggle disabled firstLevel" href="tourism" title="Sitios Turísticos">Sitios Turísticos</a>      
                </li>

                <li class="primary nav-10">
                  <a class="dropdown-toggle disabled firstLevel" href="booking" title="Reservaciones">Reservaciones</a>                  
                </li>

                <li class="primary nav-2">
                  <a class="dropdown-toggle disabled firstLevel active" href="contact" title="Formulario de Contacto">Contacto</a>
                </li>
              </ul>
            </div>

            <div class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                    
                    </button>
                <a class="navbar-brand" href="#"><?php if (file_exists("fotos/logo-principal.png")){
                        echo "<img src='fotos/logo-principal.png' alt='Logo Principal'>"; 
                                    } else {
                        echo "<img src='' alt='Logo Principal'>"; 
                                    } 
                    ?></a>                
                </div>
            </div>
        </div>
    </div>
</header>

<script type="text/javascript">
    //var locations = [['Big Ben', 'London SW1A 0AA', '51.500729', '-0.124625']];
</script>

<section id="page">
    
    <header class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">

                    <h1 itemprop="name">Formulario de Contacto</h1>
                </div>
                <div class="col-sm-5 hidden-xs">
                    <div itemprop="breadcrumb" class="breadcrumb clearfix">
                        <a href="index" title="Inicio">Inicio</a>
                        <span>Contacto</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div id="content" class="clearfix">

        <!--<div id="mapWrapper" data-marker="js/booking/images/marker.png" data-api_key="GMAPS_API_KEY"></div> -->

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d63790.680441879435!2d-79.92720661124497!3d-2.184971292270579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sec!4v1574039972970!5m2!1ses!2sec" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


        <div class="container pt30 pb15">
            <div class="row">
                
                <form class="form" action="#" method="post" name="contacto" id="contacto">
                    
                    <div id="error">
                        <!-- error will be shown here ! -->
                    </div>

            <div class="row">
                <div class="col-md-6">
                   <div class="form-group has-feedback">
                        <label class="control-label">Nombres y Apellidos: <span class="symbol required"></span></label>
                        <input type="text" class="form-control" name="nombre" id="nombre" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Nombres y Apellidos" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i> 
                    </div>
                </div>

                <div class="col-md-6">
                   <div class="form-group has-feedback">
                        <label class="control-label">Correo Electrónico: <span class="symbol required"></span></label>
                        <input type="text" class="form-control" name="email" id="email" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Correo Electrónico" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-envelope-o form-control-feedback"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                   <div class="form-group has-feedback">
                        <label class="control-label">N° de Teléfono: <span class="symbol required"></span></label>
                        <input type="text" class="form-control" name="telefono" id="telefono" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese N° de Teléfono" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-phone form-control-feedback"></i> 
                    </div>
                </div>

                <div class="col-md-6">
                   <div class="form-group has-feedback">
                        <label class="control-label">Direción Domiciliaria: <span class="symbol required"></span></label>
                        <input type="text" class="form-control" name="direccion" id="direccion" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Dirección Domiciliaria" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-map-marker form-control-feedback"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                   <div class="form-group has-feedback">
                        <label class="control-label">Asunto: <span class="symbol required"></span></label>
                        <textarea class="form-control" name="asunto" id="asunto" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Asunto" rows="2" autocomplete="off" required="" aria-required="true"></textarea>
                        <i class="fa fa-pencil form-control-feedback"></i> 
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group has-feedback2">
                        <label class="control-label">Mensaje: <span class="symbol required"></span></label>
                        <textarea class="form-control" name="mensaje" id="mensaje" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Mensaje" rows="2" autocomplete="off" required="" aria-required="true"></textarea>
                        <i class="fa fa-comment form-control-feedback2"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                </div>

                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <a tabindex="-1" style="border-style: none;" href="#" title="Refrescar Imagen" onClick="document.getElementById('siimage').src = 'assets/captcha/securimage_show.php?sid=' + Math.random(); this.blur(); return false"><img id="siimage" name="siimage" style="border: 1px solid #CCCCCC; margin-right: 5px" src="assets/captcha/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" onClick="this.blur()" alt="CAPTCHA Image" width="150" height="65" align="left"></a>
                        <label>Ingrese Código: <span class="symbol required"></span></label><br /><input type="text" class="form-control" name="captcha" id="captcha" autocomplete="off" style="width:180px;height:40px" placeholder="Ingrese Código" autocomplete="off" required="" aria-required="true">
                        <i class="fa fa-pencil form-control-feedback"></i>                    
                    </div>
                </div>
            </div>

        <div class="text-right">
            <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-info"><span class="fa fa-send"></span> Enviar Mensaje</button>
            <button class="btn btn-danger" type="reset"><span class="fa fa-trash-o"></span> Limpiar</button>
        </div>


            </form>
        </div>
    </div><hr>
    
</section>


<!-- INICIO DE FOOTER -->
<?php include('footer.php'); ?>
<!-- FIN DE FOOTER -->

</body>
</html>