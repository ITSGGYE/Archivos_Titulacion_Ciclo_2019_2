<?php
require_once("class/class.php");

$con = new Login();
$con = $con->ConfiguracionPorId();
$simbolo = "<strong>".$con[0]['simbolo']."</strong>";

?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Ing. Ruben Chirinos">
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo.png">
<title></title>

    <link rel="stylesheet" href="assets/hotel/common/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/jquery.event.calendar/css/jquery.event.calendar.css" media="all">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/royalslider/royalslider.css" media="all">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/royalslider/skins/minimal-white/rs-minimal-white.css" media="all">
    <link rel="stylesheet" href="assets/hotel/js/pluginss/isotope/css/style.css" media="all">
    <!-- Datatables CSS -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet">

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

<body id="page-10" itemscope itemtype="http://schema.org/WebPage">

<header class="navbar-fixed-top" role="banner">
    <div id="mainHeader">
        <div class="container">
            <div id="mainMenu" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="primary nav-1">
                  <a class="firstLevel" href="index" title="Panel Principal">Inicio</a>                  
                </li>

               

                <li class="primary nav-9">
                  <a class="dropdown-toggle disabled firstLevel active" href="rooms" title="Habitaciones">Habitaciones</a>                  
                </li>

             

                <li class="primary nav-10">
                  <a class="dropdown-toggle disabled firstLevel" href="booking" title="Reservaciones">Reservaciones</a>                  
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

          <h1 itemprop="name">Habitaciones</h1>
        </div>
        <div class="col-sm-5 hidden-xs">
          <div itemprop="breadcrumb" class="breadcrumb clearfix">
            <a href="index" title="Inicio">Inicio</a>
            <span>Habitaciones</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div id="content" class="pt20 pb20">
    <div class="container">

      <div class="row">
       

          <div class="table-responsive"><table id="datatable" class="table display">
           <thead>
             <tr role="row">
              <th><h3>Detalles de Habitaciones</h3></th>
            </tr>
          </thead>
          <tbody class="BusquedaRapida">

            <?php 
            $tra = new Login();
            $hab = $tra->ListarHabitaciones();

            if($hab==""){

              echo "<div class='alert alert-danger'>";
              echo "<center><span class='fa fa-info-circle'></span> NO SE ENCONTRARON HABITACIONES ACTUALMENTE </center>";
              echo "</div>";    

            } else {

              $img= 1;
              for($i=0;$i<sizeof($hab);$i++){  
                ?> 
                <tr role="row" class="odd">
                  <td> <form action="" method="post">

                   <div class="row booking-result">

                  <figure class="more-link">
                    <div class="col-md-3">
                      <?php if (file_exists("fotos/habitaciones/".$hab[$i]["codhabitacion"]."/1.jpg")){ 
                        echo "<img src='fotos/habitaciones/".$hab[$i]["codhabitacion"]."/1.jpg?' itemprop='photo' class='img-rounded thumbnail' height='220' width='275'>"; 
                      } else {
                        echo "<img src='fotos/ninguna.png' itemprop='photo' class='img-rounded thumbnail' height='220' width='275'>";  
                      } ?>                  
                      <span class="more-action">
                        <span class="more-icon"><i class="fa fa-link"></i></span>
                      </span>
                    </div>
                  </figure>

                <!--<div class="col-md-3">
                      <div class="img-container md">
              <?php if (file_exists("fotos/habitaciones/".$hab[$i]["codhabitacion"]."/1.jpg")){
                echo "<img src='fotos/habitaciones/".$hab[$i]["codhabitacion"]."/1.jpg?' itemprop='photo' alt=''>"; 
                    } else {
                echo "<img src='fotos/ninguna.jpg' itemprop='photo' alt=''>";  
                    } ?>                        
                      </div>
                    </div>-->


                    <div class="col-lg-5 col-md-5 col-sm-5">
                      <h3><?php echo $hab[$i]['nomtipo']." #".$hab[$i]["numhabitacion"]; ?></h3>
                      <h4>Descripción de la Habitación</h4>
                      <h6><?php echo $hab[$i]['descriphabitacion']; ?></h6>                               

                      <div class="clearfix mt10">
                       <span class="facility-icon">
                        <img alt="No se aceptan animales" title="No se aceptan animales" src="assets/hotel/common/big/3/pet-not-allowed.png" class="tips">
                      </span>

                      <span class="facility-icon">
                        <img alt="Canales de satélite" title="Canales de satélite" src="assets/hotel/common/big/8/satellite.png" class="tips">
                      </span>
                      
                      <span class="facility-icon">
                        <img alt="Aire Acondicionado" title="Aire Acondicionado" src="assets/hotel/common/big/9/air-conditioning.png" class="tips">
                      </span>
                      
                      <span class="facility-icon">
                        <img alt="Seguro" title="Seguro" src="assets/hotel/common/big/10/safe.png" class="tips">
                      </span>
                      
                      <span class="facility-icon">
                        <img alt="Sala de estar" title="Sala de estar" src="assets/hotel/common/big/11/lounge.png" class="tips">
                      </span>
                      
                      <span class="facility-icon">
                        <img alt="Lavadora" title="Lavadora" src="assets/hotel/common/big/16/washing-machine.png" class="tips">
                      </span>

                      <span class="facility-icon">
                        <img alt="Mini-bar" title="Mini-bar" src="assets/hotel/common/big/18/mini-bar.png" class="tips">
                      </span>

                      <span class="facility-icon">
                        <img alt="De no fumadores" title="De no fumadores" src="assets/hotel/common/big/19/non-smoking.png" class="tips">
                      </span>

                      <span class="facility-icon">
                        <img alt="Estacionamiento gratis" title="Estacionamiento gratis" src="assets/hotel/common/big/20/free-parking.png" class="tips">
                      </span>
                      
                      <span class="facility-icon">
                        <img alt="Telefono" title="Telefono" src="assets/hotel/common/big/28/phone.png" class="tips">
                      </span>

                      <span class="facility-icon">
                        <img alt="Televisión" title="Televisión" src="assets/hotel/common/big/29/tv.png" class="tips">
                      </span>

                      <span class="facility-icon">
                        <a href="detalles?h=SDAwMDA4" title="Leer más" class="tips">...</a>
                      </span>

                    <div class="price"> <span itemprop="priceRange"><h2>PISO: <?php echo $hab[$i]['piso']; ?></h2></span></div>
                    <div class="price"> <span itemprop="priceRange"><h2>VISTA: <?php echo $hab[$i]['vista']; ?></h2></span></div>
                    </div>
                  </div>

                  <div class="col-lg-4 col-md-4 col-sm-4 text-center sep">
                    <div class="price"> <span itemprop="priceRange"><h2>Temporada Baja  $<?php echo $hab[$i]['baja']; ?></h2></span> </div>
                    <div class="price"> <span itemprop="priceRange"><h2>Temporada Media $<?php echo $hab[$i]['media']; ?></h2></span> </div>
                    <div class="price"> <span itemprop="priceRange"><h2>Temporada Alta $<?php echo $hab[$i]['alta']; ?></h2></span> </div>
                    <div class="mb10 text-muted">Precio / Noche</div>
                    Capacidad: <i class="fa fa-male"></i>x<?php echo $hab[$i]['maxadultos']; ?>  - <i class="fa fa-child"></i> x<?php echo $hab[$i]['maxninos']; ?> 
                    <p class="lead pt10">
                      <span class="clearfix"></span>
                      <a class="btn btn-primary mt10 btn-block" href="details?h=<?php echo encrypt($hab[$i]["codhabitacion"]) ?>">
                        <i class="fa fa-plus-circle"></i> Más Detalles                                    
                      </a>
                    </p>

                  </div>

                </div>
              </form></td>
            </tr>
          <?php } } ?>
        </tbody>
      </table></div>


    </div>
  </div>
</div>

</section>


<!-- INICIO DE FOOTER -->
<?php include('footer.php'); ?>
<!-- FIN DE FOOTER -->

<!-- Datatables-->
  <script src="assets/plugins/datatables/dataTables.min.js"></script>
  <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="assets/plugins/datatables/datatable-basic.init.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').dataTable();
      $('#datatable-responsive').DataTable();
      $('#default_order').dataTable();
    } );
  </script>

</body>
</html>
