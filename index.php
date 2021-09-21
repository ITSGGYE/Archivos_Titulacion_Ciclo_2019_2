<?php
require_once("class/class.php");

$con = new Login();
$con = $con->ConfiguracionPorId();

$tra = new Login();

if(isset($_POST['btn-login']))
{
  $log = $tra->Logueo();
  exit;
}
elseif(isset($_POST["btn-recuperar"]))
{
  $reg = $tra->RecuperarPassword();
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
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo.png">
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

    <!-- Calendario -->
    <link rel="stylesheet" href="assets/calendario/jquery-ui.css" />
    <script src="assets/calendario/jquery-ui.js"></script>
    <script src="assets/script/jscalendario.js"></script>
    <script src="assets/script/autocompleto.js"></script>
    <!-- Calendario -->

</head>

<body id="page-1" itemscope="" itemtype="http://schema.org/WebPage">
   
    <header class="navbar-fixed-top fixed" role="banner">
    <div id="mainHeader">
        <div class="container">
            <div id="mainMenu" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="primary nav-1">
                  <a class="firstLevel active" href="index" title="Panel Principal">Inicio</a>                  
                </li>

               

                <li class="primary nav-9">
                  <a class="dropdown-toggle disabled firstLevel" href="rooms" title="Habitaciones">Habitaciones</a>                  
                </li>

               

                <li class="primary nav-10">
                  <a class="dropdown-toggle disabled firstLevel" href="booking" title="Reservaciones">Reservaciones</a>                  
                </li>

        

                <li class="primary">
                  <a class="popup-modal firstLevel" data-backdrop="static" data-keyboard="false" href="#user-popup"><i class="fa fa-power-off"></i> Login</a>
                </li>
              </ul>


             <!--FORMULARIOS-->   
            <div id="user-popup" class="white-popup-block mfp-hide">
                  <div class="fluid-container">
                        <!--<div class="row">
                            <div class="col-xs-12 mb20 text-center">
                                <a class="btn fblogin" href="#"><i class="fa fa-facebook"></i> Log in with Facebook</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 mb20 text-center">
                                - Or -
                            </div>
                        </div>-->
                        
                  <div class="row">
                      <div class="col-xs-12">
							
							          <!--FORMULARIO DE ACCESO-->
                        <div class="login-form">
                          <h2>LOGIN DE ACCESO</h2><hr>
                          <form method="post" name="loginform" id="loginform" action="" class="ajax-form">

                          <div id="login">
                            <!-- error will be shown here ! -->
                          </div>

                          <div class="row">
                            <div class="col-md-12 m-t-10">
                              <div class="form-group has-feedback">
                                <label class="control-label">Seleccione Acceso: <span class="symbol required"></span></label>
                                <i class="fa fa-bars form-control-feedback"></i>  
                                <select name="select" id="select" class='form-control' required="" aria-required="true">
                                  <option value="">SELECCIONE</option>
                                  <option value="ADMINISTRADOR(A)">ADMINISTRADOR(A)</option>
                                
                                </select>                 
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group has-feedback">
                                <label class="control-label">Ingrese su Usuario: <span class="symbol required"></span></label>
                                <input type="text" class="form-control" placeholder="Ingrese su Usuario" name="usuario" id="usuario" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" required="" aria-required="true"> 
                                <i class="fa fa-user form-control-feedback"></i>                
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group has-feedback">
                                <label class="control-label">Ingrese su Password: <span class="symbol required"></span></label>
                                <input class="form-control" type="password" placeholder="Ingrese su Password" name="password" id="password" onKeyUp="this.value=this.value.toUpperCase();" autocomplete="off" required="" aria-required="true">
                                <i class="fa fa-key form-control-feedback"></i>               
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                                        
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                              <div class="col-sm-12 text-right">
                                <button class="btn btn-default" name="btn-login" id="btn-login" type="submit"><i class="fa fa-sign-out"></i> Acceder</button>
                               </div>
                          </div>
                          </form>
                        </div>
																
								         
                                </div>
                              </div>
                            </div>

                        </div>
								
                            </div>
                        </div>
                    </div>
                </div>
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
                    ?></a> </div>
            </div>
        </div>
    </div>
</header>
        
<div id="search-home-wrapper">
  <div id="search-home" class="container">

    <form action="booking" method="get" class="booking-search">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="form-group">
            <label class="sr-only" for="from"></label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-calendar"></i> Entrada</div>
              <input type="text" class="form-control" name="a" id="a" onKeyUp="this.value=this.value.toUpperCase();" data-rel="tooltip" placeholder="Fecha de Entrada" autocomplete="off" data-placement="top" value="<?php echo date("Y-m-d"); ?>" required="required">
            </div>
            <div class="field-notice" rel="from_date"></div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-calendar"></i> Salida</div>
              <input type="text" class="form-control" name="b" id="b" onKeyUp="this.value=this.value.toUpperCase();" data-rel="tooltip" placeholder="Fecha de Salida" autocomplete="off" data-placement="top" value="<?php $fecha = date('Y-m-j');
              $nuevafecha = strtotime ('+2 day', strtotime($fecha));
              echo $nuevafecha = date ('Y-m-j', $nuevafecha); ?>" required="required">
            </div>
            <div class="field-notice" rel="to_date"></div>
          </div>
        </div>
        <div class="col-md-2 col-sm-6">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-male"></i> Adultos</div>
              <select name="c" id="c" class="form-control">
                <option value="1" selected="selected">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option> 
                <option value="6">6</option>
                <option value="7">7</option>                   
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-sm-6">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-child"></i> Niños</div>
              <select name="d" id="d" class="form-control">
                <option value="0" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option> 
                <option value="5">5</option>                   
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-sm-12">
          <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit" name="check_availabilities"><i class="fa fa-search"></i> Continuar</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
	
<section id="sliderContainer">
  <div class="royalSlider rsMinW fullSized clearfix">
    
    <div class="rsContent">
      <img class="rsImg" src="fotos/slides/foto1.png" alt="">
        <div class="infoBlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
          <h1>Reserve sus vacaciones en HOTEL APART GUAYAQUIL</h1>
          <h2>Rápido, fácil y potente</h2>
        </div>
    </div>

    <div class="rsContent">
      <img class="rsImg" src="fotos/slides/foto2.png" alt="">
        <div class="infoBlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
          <h1>Una estancia de sueño al mejor precio</h1>
          <h2>Garantía del mejor precio</h2>
        </div>
    </div>

    <div class="rsContent">
      <img class="rsImg" src="fotos/slides/foto3.png" alt="">
        <div class="infoBlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
          <h1>Una estancia de sueño al mejor precio</h1>
          <h2>Garantía del mejor precio</h2>
        </div>
    </div>
    <div class="rsContent">
      <img class="rsImg" src="fotos/slides/foto4.png" alt="">
        <div class="infoBlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
          <h1>Una estancia de sueño al mejor precio</h1>
          <h2>Garantía del mejor precio</h2>
        </div>
    </div>
    <div class="rsContent">
      <img class="rsImg" src="fotos/slides/foto5.png" alt="">
        <div class="infoBlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
          <h1>Una estancia de sueño al mejor precio</h1>
          <h2>Garantía del mejor precio</h2>
        </div>
    </div>
  </div>
</section>


<section id="content" class="pt20 pb30">
    <div class="container">
        
      <div class="row">
          <div class="col-md-12 text-center mb30">
            <h1 itemprop="name">Hotel Apart Guayaquil, Comodidad y confort </h1>
            <blockquote class="text-center"><p>Un hombre viaja por todo el mundo en busca de lo que necesita y regresa a casa para encontrarlo.</p></blockquote>
           
          </div>
      </div>

      <div class="row">

        <?php 
        $hab = new Login();
        $hab = $hab->ListarHabitacionesxTipos();

        if($hab==""){

          echo "<div class='alert alert-danger'>";
          echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON HABITACIONES ACTUALMENTE </center>";
          echo "</div>";    

        } else {

        $img= 1;
        for($i=0;$i<sizeof($hab);$i++){  
        ?> 
        <article class="col-sm-4 mb20" itemscope="" itemtype="http://schema.org/LodgingBusiness">
          <a itemprop="url" href="#" class="moreLink">
            <figure class="more-link">

              <div class="img-container md" style="overflow: hidden; position: relative;">
                
                <?php if (file_exists("fotos/habitaciones/".$hab[$i]["codhabitacion"]."/1.jpg")){ 
                    echo "<img src='fotos/habitaciones/".$hab[$i]["codhabitacion"]."/1.jpg?' style='position: absolute; width: auto; height: 245px; top: 0px; left: -16px;' class='loaded'>"; 
                        } else {
                    echo "<img src='fotos/ninguna.png'  style='position: absolute; width: auto; height: 245px; top: 0px; left: -16px;' class='loaded'>";  
                        } ?>
              </div>

              <div class="more-content">
               <h3 itemprop="name"><?php echo $hab[$i]['nomtipo']; ?></h3>
              </div>
              <div class="more-action">
               <div class="more-icon"><i class="fa fa-link"></i></div>
              </div>
            </figure>
          </a>                    
        </article>
        <?php } } ?>


       <!--<article class="col-sm-4 mb20" itemscope="" itemtype="http://schema.org/LodgingBusiness">
         <a itemprop="url" href="#" class="moreLink">
          <figure class="more-link">
           <div class="img-container md" style="overflow: hidden; position: relative;">
            <img alt="" src="fotos/fotos_index/doble.jpg" style="position: absolute; width: auto; height: 245px; top: 0px; left: -29.4017px;" class="loaded">                                 </div>
            <div class="more-content">
             <h3 itemprop="name">Habitación Doble</h3>
           </div>
           <div class="more-action">
            <div class="more-icon"><i class="fa fa-link"></i></div>
          </div>
        </figure>
      </a>                    
    </article>

    <article class="col-sm-4 mb20" itemscope="" itemtype="http://schema.org/LodgingBusiness">
      <a itemprop="url" href="#" class="moreLink">
        <figure class="more-link">
          <div class="img-container md" style="overflow: hidden; position: relative;">
            <img alt="" src="fotos/fotos_index/simple.jpg" style="position: absolute; width: auto; height: 245px; top: 0px; left: -29.4017px;" class="loaded">                                    </div>
            <div class="more-content">
             <h3 itemprop="name">Habitación Simple</h3>
           </div>
           <div class="more-action">
            <div class="more-icon"><i class="fa fa-link"></i></div>
          </div>
        </figure>
      </a>                    
    </article>-->

      </div>

    </div>
</section>


<!-- INICIO DE FOOTER -->
<?php include('footer.php'); ?>
<!-- FIN DE FOOTER -->

</body>
</html>
