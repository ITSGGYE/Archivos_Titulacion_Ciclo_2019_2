<?php
require_once("class/class.php");

$tra = new Login();
//$gas = $tra->ListarGastronomia();

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
    <!-- script jquery -->

</head>

<body id="page-7" itemscope itemtype="http://schema.org/WebPage">
   
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
                  <a class="dropdown-toggle disabled firstLevel active" href="gastronomy" title="Gastronomía">Gastronomía</a>      
                </li>

                <li class="primary nav-7">
                  <a class="dropdown-toggle disabled firstLevel" href="tourism" title="Sitios Turísticos">Sitios Turísticos</a>      
                </li>

                <li class="primary nav-10">
                  <a class="dropdown-toggle disabled firstLevel" href="booking" title="Reservaciones">Reservaciones</a>                  
                </li>

                <li class="primary nav-2">
                  <a class="dropdown-toggle disabled firstLevel" href="contact" title="Formulario de Contacto">Contacto</a>                 
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

<section id="page">
    
    <header class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                                    
                    <h1 itemprop="name">Gastronomía de la Ciudad</h1>
                                </div>
            <div class="col-sm-5 hidden-xs">
                <div itemprop="breadcrumb" class="breadcrumb clearfix">
                    <a href="index" title="Inicio">Inicio</a>
                    <span>Gastronomía</span>
                </div>
                            </div>
        </div>
    </div>
</header>
    
<div id="content" class="pt30 pb20">
    <div class="container" itemprop="text">

        <div class="row">

         <section class="col-sm-12"><h3 itemprop="name">Ciudad de Ibarra</h3> <p style="text-align: justify;">Ibarra, es la capital de la provincia de Imbabura, está ubicada a 115 km, al noroeste de Quito y 125 km, al sur de Tulcán. Ibarra tiene una altitud de 2.225 m.s.n.m., y posee un clima templado seco y agradable con una temperatura promedio de 18° C. Conocida como la ciudad blanca por sus fachadas pintadas de blanco y por asentamientos españoles  y ciudad a la que siempre se vuelve por su clima, historia y amabilidad de sus habitantes

         La ciudad se encuentra edificada a las faldas del volcán que lleva el mismo nombre de la provincia. La Villa de San Miguel de Ibarra fue fundada el 28 de septiembre de 1606, por el capitán Cristóbal de Troya, bajo la orden del entonces presidente de la Real Audiencia de Quito, Miguel de Ibarra y bajo mandato del Rey Felipe de España.</p></section>

         <section class="col-sm-12"><h3 itemprop="name">Gastronomía Típica de Ibarra</h3> <p style="text-align: justify;">La gastronomía es otro de los aspectos que caracterizan a Ibarra, existen un sin número de sitios donde propios y extraños pueden de gustar los más sabrosos platos típicos como:
         Empanadas de morocho, fritadas, tortillas con chorizo entre otros y para el postre están los deliciosos helados de paila, el arrope de mora, las nogadas que por su sabor es imposible dejar de consumirlos.</p></section>


         <section class="col-sm-12"><h3 itemprop="name">Helados de Paila</h3> <p style="text-align: justify;">Los deliciosos helados de paila ya son una tradición, ubicados principalmente en el centro de la ciudad,  los puedes comprar en los principales establecimientos ubicados en las calle olmedo.</p></section>


         <section class="col-sm-12"><h3 itemprop="name">Nogadas de Arrope de Mora</h3> <p style="text-align: justify;">Estas tradicionales y deliciosas golosinas están tradicionalmente ubicadas en el parque de la Merced.</p></section>


         <section class="col-sm-12"><h3 itemprop="name">Empanadas de Morocho</h3> <p style="text-align: justify;">Estas deliciosas empanadas de morocho las puede comprar en el establecimiento ubicado en la calle Olmedo y García Moreno.</p></section>


         <section class="col-sm-12"><h3 itemprop="name">Pan de Leche</h3> <p style="text-align: justify;">Para degustar de estos exquisitos bocaditos debemos trasladarnos hasta Caranqui, población cercana a Ibarra la cual posee tradiciones que son conservadas por los moradores. Una de ellas es la elaboración del pan de leche y los helados de crema, que son conocidos nacional e internacionalmente. 
            La receta  para la elaboración de este pan  es un legado de una familia con raíces españolas, el cual ha transcendido  de generación  en generación
        .</p></section>

        <section class="col-sm-12"><h3 itemprop="name">Fritada</h3> <p style="text-align: justify;">Otro plato típico está compuesto por fritada, tortilla de papas, mote, queso, aguacate, maduro, empanada de viento, y encebollado.</p></section>

    </div>


    <div class="row">
        <div class="isotopeWrapper clearfix isotope lazy-wrapper" data-loader="/panda-resort-3.0.1/templates/booking/common/get_articles.php" data-mode="click" data-limit="9" data-pages="1" data-is_isotope="true" data-variables="page_id=7&page_alias=gallery">

            <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                <div class="isotopeInner">
                    <a itemprop="url" href="#">
                       <figure class="more-link">
                        <img alt="" src="assets/hotel/img/helado.jpg" class="img-responsive">
                        <span class="more-action">
                            <span class="more-icon"><i class="fa fa-link"></i></span>
                        </span>
                    </figure>
                    <div class="isotopeContent">
                        <div class="text-overflow">
                            <h3 itemprop="name">Helados de Paila</h3>
                        </div></div>
                    </a>
                </div>
            </article> 


            <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                <div class="isotopeInner">
                    <a itemprop="url" href="#">
                       <figure class="more-link">
                        <img alt="" src="assets/hotel/img/nogada.jpg" class="img-responsive">
                        <span class="more-action">
                            <span class="more-icon"><i class="fa fa-link"></i></span>
                        </span>
                    </figure>
                    <div class="isotopeContent">
                        <div class="text-overflow">
                            <h3 itemprop="name">Nogadas y Arrope de Mora</h3>
                        </div></div>
                    </a>
                </div>
            </article> 


            <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                <div class="isotopeInner">
                    <a itemprop="url" href="#">
                       <figure class="more-link">
                        <img alt="" src="assets/hotel/img/empanadas.jpg" class="img-responsive">
                        <span class="more-action">
                            <span class="more-icon"><i class="fa fa-link"></i></span>
                        </span>
                    </figure>
                    <div class="isotopeContent">
                        <div class="text-overflow">
                            <h3 itemprop="name">Empanadas de Morocho</h3>
                        </div></div>
                    </a>
                </div>
            </article> 


            <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                <div class="isotopeInner">
                    <a itemprop="url" href="#">
                       <figure class="more-link">
                        <img alt="" src="assets/hotel/img/pan.jpg" class="img-responsive">
                        <span class="more-action">
                            <span class="more-icon"><i class="fa fa-link"></i></span>
                        </span>
                    </figure>
                    <div class="isotopeContent">
                        <div class="text-overflow">
                            <h3 itemprop="name">Pan de Leche</h3>
                        </div></div>
                    </a>
                </div>
            </article> 

            <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                <div class="isotopeInner">
                    <a itemprop="url" href="#">
                       <figure class="more-link">
                        <img alt="" src="assets/hotel/img/fritada.jpg" class="img-responsive">
                        <span class="more-action">
                            <span class="more-icon"><i class="fa fa-link"></i></span>
                        </span>
                    </figure>
                    <div class="isotopeContent">
                        <div class="text-overflow">
                            <h3 itemprop="name">Fritada</h3>
                        </div></div>
                    </a>
                </div>
            </article> 

            <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                <div class="isotopeInner">
                    <a itemprop="url" href="#">
                       <figure class="more-link">
                        <img alt="" src="assets/hotel/img/pan2.jpg" class="img-responsive">
                        <span class="more-action">
                            <span class="more-icon"><i class="fa fa-link"></i></span>
                        </span>
                    </figure>
                    <div class="isotopeContent">
                        <div class="text-overflow">
                            <h3 itemprop="name">Pan de Leche</h3>
                        </div></div>
                    </a>
                </div>
            </article> 

        </div>
    </div>	
</div>
</div>
</div>
</section>


<!-- INICIO DE FOOTER -->
<?php include('footer.php'); ?>
<!-- FIN DE FOOTER -->

</body>
</html>