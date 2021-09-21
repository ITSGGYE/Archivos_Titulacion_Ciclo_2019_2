<?php
require_once("class/class.php");

$tra = new Login();
//$tur = $tra->ListarTurismo();

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
                  <a class="dropdown-toggle disabled firstLevel" href="gastronomy" title="Gastronomía">Gastronomía</a>      
                </li>

                <li class="primary nav-7">
                  <a class="dropdown-toggle disabled firstLevel active" href="tourism" title="Sitios Turísticos">Sitios Turísticos</a>      
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

                    <h1 itemprop="name">Sitios Turísticos de la Ciudad</h1>
                </div>
                <div class="col-sm-5 hidden-xs">
                    <div itemprop="breadcrumb" class="breadcrumb clearfix">
                        <a href="index" title="Inicio">Inicio</a>
                        <span>Sitios Turísticos</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div id="content" class="pt30 pb20">
        <div class="container" itemprop="text">

            <div class="row">

             <section class="col-sm-12"><h3 itemprop="name">Volcán Imbabura</h3> <p style="text-align: justify;">Está ubicado 10 Km de la ciudad de Ibarra constituye un excelente mirador de los volcanes de la Sierra Norte, a sus pies se encuentra la laguna de San Pablo, de la cual fluye el agua que se descarga por la Cascada de Peguche, es un volcán inactivo, no presenta actividad sísmica, se dice que su última erupción fue hace 14.000 años, tiene una altura 4610 msnm,

             En la antigüedad era considerado como monte sagrado y lo llaman "Tayta Imbabura", cuenta la comunidad la historia del cerro Imbabura y del cerro Cotacachi. El Imbabura grande e impotente era considerado como el padre sabio, se levantaba todas la mañanas a ver si todos los hombre y las mujeres cumplían bien con sus deberes como la siembra y cuidado de los animales.</p></section>

             <section class="col-sm-12"><h3 itemprop="name">Laguna de Yahuarcocha</h3> <p style="text-align: justify;">Se encuentra a 4 Km. de Ibarra, por la vía Panamericana Norte. Posee  una altura de 2.190 msnm y la temperatura del agua es de 11º C. Se cree que esta Laguna se formó en el pleistoceno y es de origen glacial. 
             Según una leyenda la Laguna de Yahuarcocha o “Lago de Sangre”  debe este nombre al hecho de que en sus orillas se efectuó la última batalla de resistencia de los Caranquis contra los Incas. Se dice que luego de ganar la batalla, los incas pasaron a cuchillo a todos los sobrevivientes y arrojaron sus cuerpos al lago, tiñéndose así de sangre.</p></section>


             <section class="col-sm-12"><h3 itemprop="name">Loma de Guayabillas</h3> <p style="text-align: justify;">Se encuentra al otro lado del río Tahuando, tiene un lugar en el cual hay un zoológico y las instalaciones necesarias para un paseo familiar. Denominada así debido a la amplia existencia de una especie arbustiva frecuente llamada pisidium guineense (guayabilla) cuyo fruto es de agradable sabor. En el zoológico de guayabillas podemos encontrar una gran variedad de especies animales en protección entre ellos loros leones, serpientes, monos, guatusas, tortugas, y en definitiva una gran cantidad de animales.</p></section>


             <section class="col-sm-12"><h3 itemprop="name">Mirador de Ibarra San Miguel Arcángel</h3> <p style="text-align: justify;">Gran monumento construido en honor a San Miguel Arcángel, patrono de la ciudad de Ibarra, es un mirador ubicado a 3 1/2 km. de la ciudad, donde usted puede disfrutar de una maravillosa vista de la Laguna de Yahuarcocha y de toda la ciudad. Este sitio es un mirador natural desde donde se tiene una excelente vista de la ciudad de Ibarra y sus alrededores como San Antonio de Ibarra, La Esperanza, lomas de Azaya, Loma de Guayabillas, Yuracruz y elevaciones como el Imbabura, Cubilche, Curro, Cotacachi, entre otras.</p></section>


             <section class="col-sm-12"><h3 itemprop="name">Iglesia Catedral</h3> <p style="text-align: justify;">Está ubicada en el Parque Pedro Moncayo de la ciudad de Ibarra que fue construida en el año de 1606 es una edificación construida en piedra labrada y cal, sus altares son tallados en madera fina y recubierta con pan de oro.
             Encontramos esculturas y pinturas siendo las más importantes las figuras de los apóstoles.</p></section>


             <section class="col-sm-12"><h3 itemprop="name">Parque Pedro Moncayo</h3> <p style="text-align: justify;">Ubicado en el corazón de Ibarra en el cual se destacan árboles y hermosos jardines diseñados y mantenidos. Rodeado de la Iglesia de la Catedral, Capilla Episcopal, El Torreón, los edificios de la Gobernación y el Palacio Municipal. Es el parque principal de la ciudad, se ubica al frente de la Gobernación y la Municipalidad de Ibarra.</p></section>

             <section class="col-sm-12"><h3 itemprop="name">Museo Arqueológico y Etnográfico Atahualpa</h3> <p style="text-align: justify;">Este museo contiene una gran variedad de vestigios arqueológicos de la cultura Caranqui que habitaba en la sierra norte del Ecuador. La mayoría de muestras fueron encontradas en los últimos hallazgos registrados en las Ruinas del Inka Huasi ubicadas en el sector de Caranqui de Ibarra. Está compuesta por dos salas conectadas por un túnel, aquí según algunos cronistas nació Atahualpa, el último emperador inca. Está ubicado en la parroquia de Caranqui en la avenida Atahualpa</p></section>

         </div>


         <div class="row">

            <div class="isotopeWrapper clearfix isotope lazy-wrapper" data-loader="/panda-resort-3.0.1/templates/booking/common/get_articles.php" data-mode="click" data-limit="9" data-pages="1" data-is_isotope="true" data-variables="page_id=7&page_alias=gallery">

                <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                    <div class="isotopeInner">
                        <a itemprop="url" href="#">
                           <figure class="more-link">
                            <img alt="" src="assets/hotel/img/volcan.jpg" class="img-responsive">
                            <span class="more-action">
                                <span class="more-icon"><i class="fa fa-link"></i></span>
                            </span>
                        </figure>

                        <div class="isotopeContent">
                            <div class="text-overflow">
                                <h3 itemprop="name">Volcán Imbabura</h3>
                            </div></div>
                        </a>
                    </div>
                </article> 


                <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                    <div class="isotopeInner">
                        <a itemprop="url" href="#">
                           <figure class="more-link">
                            <img alt="" src="assets/hotel/img/laguna.jpg" class="img-responsive">
                            <span class="more-action">
                                <span class="more-icon"><i class="fa fa-link"></i></span>
                            </span>
                        </figure>

                        <div class="isotopeContent">
                            <div class="text-overflow">
                                <h3 itemprop="name">Laguna de Yahuarcocha</h3>
                            </div></div>
                        </a>
                    </div>
                </article> 


                <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                    <div class="isotopeInner">
                        <a itemprop="url" href="#">
                           <figure class="more-link">
                            <img alt="" src="assets/hotel/img/zoologico.jpg" class="img-responsive">
                            <span class="more-action">
                                <span class="more-icon"><i class="fa fa-link"></i></span>
                            </span>
                        </figure>

                        <div class="isotopeContent">
                            <div class="text-overflow">
                                <h3 itemprop="name">Zoológico de Guayabillas</h3>
                            </div></div>
                        </a>
                    </div>
                </article> 


                <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                    <div class="isotopeInner">
                        <a itemprop="url" href="#">
                           <figure class="more-link">
                            <img alt="" src="assets/hotel/img/catedral.jpg" class="img-responsive">
                            <span class="more-action">
                                <span class="more-icon"><i class="fa fa-link"></i></span>
                            </span>
                        </figure>

                        <div class="isotopeContent">
                            <div class="text-overflow">
                                <h3 itemprop="name">Iglesia Catedral</h3>
                            </div></div>
                        </a>
                    </div>
                </article> 

                <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                    <div class="isotopeInner">
                        <a itemprop="url" href="#">
                           <figure class="more-link">
                            <img alt="" src="assets/hotel/img/parque.jpg" class="img-responsive">
                            <span class="more-action">
                                <span class="more-icon"><i class="fa fa-link"></i></span>
                            </span>
                        </figure>

                        <div class="isotopeContent">
                            <div class="text-overflow">
                                <h3 itemprop="name">Parque Pedro Moncayo</h3>
                            </div></div>
                        </a>
                    </div>
                </article> 

                <article class="col-sm-2 isotopeItem" itemscope itemtype="http://schema.org/Article">
                    <div class="isotopeInner">
                        <a itemprop="url" href="#">
                           <figure class="more-link">
                            <img alt="" src="assets/hotel/img/museo.jpg" class="img-responsive">
                            <span class="more-action">
                                <span class="more-icon"><i class="fa fa-link"></i></span>
                            </span>
                        </figure>

                        <div class="isotopeContent">
                            <div class="text-overflow">
                                <h3 itemprop="name">Museo Arqueológico y Etnográfico Atahualpa</h3>
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