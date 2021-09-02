<?php
    session_start();
    if(isset($_SESSION['nombres'])){
        if($_SESSION['cod_rol'] != '1'){
            echo "<script language='javascript'> alert('No posee privilegios para esta area');window.location = '../index.html'; </script>";
        }
    }else{
        echo "<script language='javascript'> window.location = '../index.html'; </script>";
    }
    $color = 'white';
    if(isset($_COOKIE['color'])){
        $color = $_COOKIE['color'];
    }
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="../assets/img/icono.jpg" type="image/x-icon" />

    <title>Fundación Ecuador People - Aprobación/Reprobación registrados</title>

    <!--=== Bootstrap CSS ===-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="../assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="../assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="../assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="../assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="../assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="../style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="../assets/css/responsive.css" rel="stylesheet">

</head>

<body class="loader-active" style="background-image: url('imagen/fondo_blanco.jpg'); background-position: center center;      
      background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-12 text-left">
                        <i class="fa fa-user"></i> <?php echo 'Bienvenido: '.$_SESSION['nombres'].' '.$_SESSION['apellidos']; ?>
                    </div>

                    <!--== Social Icons End ==-->
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom" style="background-color:rgba(0,0,0,0.5);">
    <div class="container">
        <div class="row">
            <!--== Logo Start ==-->
            <div class="col-lg-4">
            <h1 style="color:#fff; font-size: 25px;">Fundación Ecuador People</h1>
            </div>
            <!--== Logo End ==-->
            <!--=Inicio de Registros ==-->
            <div class="col-lg-8 d-none d-xl-block">
            <nav class="mainmenu alignright">
                    <ul>
                <li><a href="#">Registrar Datos</a>
                    <ul>
                        <li><a href="registrar_estudiante.php">Registrar Estudiante</a></li>
                        <li><a href="registrar_pasante.php">Registrar Pasantes</a></li>
                        <li><a href="document.php">Registrar Aprobación</a></li>
                    </ul>
                </li>
                <li><a href="#">Visualizar</a>
                    <ul>
                        <li><a href="historial_estudiante.php?func=mostrar">Historial Estudiantes</a></li>
                        <li><a href="historial_pasante.php?func=mostrar">Historial Pasantes</a></li>
                        <li><a href="documentver.php?func=mostrar">Mostrar Aprobación</a></li>
                    </ul>
                </li>
                <li class="active"><a style="color: yellow;" href="homeadmin.php">Volver Atrás</a></li>
                <li><a href="document.php?func=close">Cerrar Sesión</a></li>
            </ul>
                </nav>
            <!--== Fin de Registros==-->
            </div>
        </div>
    </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->

    <!--== Login Page Content Start ==-->
    <section id="lgoin-page-wrap" style="margin-top:150px;" class="section-padding">
        <div class="container">
            <div class="row">
                <?php
                    include_once ("../appws/controladorDocument.php");
                    include_once ("../appws/controladorLogin.php");
                    $func = $_GET['func'];
                    $controlador = new controladorDocument();
                    $controladorlog = new controladorLogin();
                    
                    if($func == 'close'){
                        $controladorlog->logout();
                        echo "<script> window.location.href = 'documentver.php?func=mostrar'; </script>";
                    }
                    if($func == 'delete'){
                        $controlador->delete($_GET['codice']);
                        echo "<script> window.location.href = 'documentver.php?func=mostrar'; </script>";
                    }
                    if($func == 'mostrar'){
                        $r = $controlador->index();
                ?>
                <center><img src="imagen/mega-menu.jpg" style="width: 30%; border-radius: 5px;"></center>
                    
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="input-group">
                          <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">Buscar</button>
                          </span>
                          <input id="documentver" name="documentver" type="text" class="form-control" placeholder="Ingrese cedula..">
                        </div>
                      </div>
                    </div>
                    <div align="center" class="col-lg-12 col-md-8 m-auto" style="font-size: 18px; color:#0985E1; font-weight: bold; margin-top: ;">
                        HISTORIAL DE APROBADOS Y REPROBADOS
                    </div>
                    <div class="col-lg-12 col-md-2 m-auto" style="margin-top: 10px !important;"><br>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead style="color: #fff; background: #000; font-size: 14px;">
                                <tr>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Genero</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Aprobo</th>
                                    <th scope="col">Reprobo</th>
                                    <th scope="col">Motivo/Reprobación</th>
                                    <th scope="col">Fecha/Registro</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody style="color:#0985E1; font-size: 13px; text-align:center; margin: 0;" id="table_est">
                              <?php foreach ($r->fetchAll(PDO::FETCH_ASSOC) as $row){ ?>
                            <tr>
                              <th scope="row"><?php echo $row['doc_cedula']; ?></th>
                              <th scope="row"><?php echo $row['doc_nombre']; ?></th>
                              <th scope="row"><?php echo $row['doc_apellido']; ?></th>
                              <th scope="row"><?php echo $row['doc_direccion']; ?></th>
                              <th scope="row"><?php echo $row['doc_genero']; ?></th>
                              <th scope="row"><?php echo $row['doc_telefono']; ?></th>
                              <th scope="row"><?php echo $row['doc_curso']; ?></th>
                              <th scope="row"><?php echo $row['doc_aprobo']; ?></th>
                              <th scope="row"><?php echo $row['doc_reprobo']; ?></th>
                              <th scope="row"><?php echo $row['doc_motivo']; ?></th>
                              <th scope="row"><?php echo $row['doc_fecha']; ?></th>
                              <th scope="row"><a href="<?php echo 'documentver.php?func=delete&codice='.$row['doc_id']; ?>" style="margin-top:0px !important;" class="btn btn-primary">Eliminar</a></th>
                            </tr>

                              <?php } ?>

                            </tbody>
                        </table>

                    </div>
						
                <?php } ?>
				
        	</div>
        </div>
			
    </section>
    <!--== Login Page Content End ==-->

    <!--== Footer Area Start ==-->
    <section id="footer-area">
        <!-- Footer Widget Start -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
            <p><!-- INICIO DEL FOOTER. -->
            Copyright &copy; <script>document.write(new Date().getFullYear());</script> Fundación Ecuador People - C.C Design</p>
            <!-- FOOTER DE FUNDACION. -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </section>
    <!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="assets/img/flecha superior.gif" alt="fundacionecuadorpeople">
    </div>
    <!--== Scroll Top Area End ==-->

    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="../assets/js/jquery-migrate.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="../assets/js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="../assets/js/plugins/gijgo.js"></script>
    <!--=== Vegas Min Js ===-->
    <script src="../assets/js/plugins/vegas.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="../assets/js/plugins/isotope.min.js"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="../assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="../assets/js/plugins/waypoints.min.js"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="../assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="../assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="../assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="../assets/js/plugins/slicknav.min.js"></script>

    <!--=== Mian Js ===-->
    <script src="../assets/js/main.js"></script>
    <script src="busqueda_est_pst.js"></script>
</body>

</html>
