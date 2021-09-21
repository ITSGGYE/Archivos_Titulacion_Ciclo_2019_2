<?php
require_once("class/class.php"); 
if(isset($_SESSION['acceso'])) { 
     if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="recepcionista" || $_SESSION["acceso"]=="cliente") {

$tra = new Login();
$ses = $tra->ExpiraSession();        
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ing. Ruben Chirinos">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title></title>

    <!-- Menu CSS -->
    <link href="assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Sweet-Alert -->
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <!-- animation CSS -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <!-- needed css -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="assets/css/default.css" id="theme" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body onLoad="muestraReloj()" class="fix-header">
    
   <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-boxed-layout="full" data-boxed-layout="boxed" data-header-position="fixed" data-sidebar-position="fixed" class="mini-sidebar">                    
    
        <!-- INICIO DE MENU -->
        <?php include('menu.php'); ?>
        <!-- FIN DE MENU -->
   

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0"><i class="fa fa-tasks"></i> Perfil</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item">Administración</li>
                                <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
               
<!-- Row -->
<div class="row">
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="card-title text-white"><i class="fa fa-pencil"></i> Foto de Perfil</h4>
            </div>

        <div class="form-body">

<?php if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="recepcionista") {  ?>           

            <div class="card-body">
                <center class="mt-4"> 
                    <?php
                    if (isset($_SESSION['dni'])) {
                        if (file_exists("fotos/".$_SESSION['dni'].".jpg")){
                            echo "<img src='fotos/".$_SESSION['dni'].".jpg?' class='rounded-circle' width='150'>"; 
                        } else {
                            echo "<img src='fotos/avatar.jpg' class='rounded-circle' width='150'>"; 
                        } } else {
                            echo "<img src='fotos/avatar.jpg' class='rounded-circle' width='150'>"; 
                        }
                        ?>
                        <h4 class="card-title mt-2"><?php echo $_SESSION['nombres'] ?></h4>
                        <h5 class="card-title mt-2"><?php echo estado($_SESSION['acceso']) ?></h5>
                        <h6 class="card-subtitle"><?php echo $_SESSION['email'] ?></h6>
                </center>
            </div>

<?php } else { ?>          

            <div class="card-body">
                <center class="mt-4"> 
                    <?php
                    if (isset($_SESSION['dnicliente'])) {
                        if (file_exists("fotos/".$_SESSION['dnicliente'].".jpg")){
                            echo "<img src='fotos/".$_SESSION['dnicliente'].".jpg?' class='rounded-circle' width='150'>"; 
                        } else {
                            echo "<img src='fotos/cliente.jpg' class='rounded-circle' width='150'>"; 
                        } } else {
                            echo "<img src='fotos/cliente.jpg' class='rounded-circle' width='150'>"; 
                        }
                        ?>
                        <h4 class="card-title mt-2"><?php echo $_SESSION['nomcliente'] ?></h4>
                        <h5 class="card-title mt-2"><?php echo estado($_SESSION['acceso']) ?></h5>
                        <h6 class="card-subtitle"><?php echo $_SESSION['correocliente'] ?></h6>
                </center>
            </div>

<?php } ?>

        </div>
    </div>
</div>
<!--</div>
End Row -->

<!-- Row 
<div class="row">-->
    <div class="col-lg-7">
        <div class="card ">
            <div class="card-header bg-info">
                <h4 class="card-title text-white"><i class="fa fa-tasks"></i> Perfil de Usuario</h4>
            </div>
            <form class="form form-material" method="post" action="#">

                <div class="form-body">
                    
                    <div class="card-body">

<?php if ($_SESSION['acceso'] == "administrador" || $_SESSION["acceso"]=="secretaria" || $_SESSION["acceso"]=="recepcionista") {  ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Nº de Documento: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="dni" id="dni" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Nº de Documento" value="<?php echo $_SESSION['dni'] ?>" autocomplete="off" readonly="" required="" aria-required="true"/> 
                                    <i class="fa fa-bolt form-control-feedback"></i> 
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Nombre de Usuario: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="nombres" id="nombres" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Nombre de Usuario" value="<?php echo $_SESSION['nombres'] ?>" autocomplete="off" readonly="" required="" aria-required="true"/>  
                                    <i class="fa fa-pencil form-control-feedback"></i> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Sexo de Usuario: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="sexo" id="sexo" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Sexo de Usuario" value="<?php echo $_SESSION['sexo'] ?>" autocomplete="off" readonly="" required="" aria-required="true"/>  
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Dirección Domiciliaria: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="direccion" id="direccion" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Dirección Domiciliaria" value="<?php echo $_SESSION['direccion'] ?>" autocomplete="off" readonly="" required="" aria-required="true"/> 
                                    <i class="fa fa-map-marker form-control-feedback"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="telefono" id="telefono" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Nº de Teléfono" value="<?php echo $_SESSION['telefono'] ?>" autocomplete="off" readonly="" required="" aria-required="true"/>  
                                    <i class="fa fa-phone form-control-feedback"></i> 
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Correo de Usuario: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="email" id="email" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Correo Electronico" value="<?php echo $_SESSION['email'] ?>" autocomplete="off" readonly="" required="" aria-required="true"/> 
                                    <i class="fa fa-envelope-o form-control-feedback"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Usuario de Acceso: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Usuario de Acceso" value="<?php echo $_SESSION['usuario'] ?>" autocomplete="off" readonly="" required="" aria-required="true"/>  
                                    <i class="fa fa-user form-control-feedback"></i> 
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Nivel de Acceso: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="nivel" id="nivel" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Nivel  de Acceso" value="<?php echo $_SESSION['nivel'] ?>" autocomplete="off" readonly="" required="" aria-required="true"/> 
                                    <i class="fa fa-archive form-control-feedback"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Status de Usuario: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="status" id="status" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ingrese Status de Usuario" value="<?php echo $status = ( $_SESSION['status'] == 1 ? "ACTIVO" : "INACTIVO"); ?>" autocomplete="off" readonly="" required="" aria-required="true"/>  
                                    <i class="fa fa-pencil form-control-feedback"></i> 
                                </div>
                            </div>
                        </div>

<?php } else { ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Tipo de Documento: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="documento" id="documento" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Tipo de Documento" value="<?php echo $_SESSION['documento'] == "" ? "**********" : $_SESSION['documento']; ?>" autocomplete="off" disabled="" required="" aria-required="true"/> 
                                    <i class="fa fa-bolt form-control-feedback"></i> 
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Nº de Documento: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="dnicliente" id="dnicliente" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Nº de Documento" value="<?php echo $_SESSION['dnicliente'] ?>" autocomplete="off" disabled="" required="" aria-required="true"/> 
                                    <i class="fa fa-bolt form-control-feedback"></i> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Nombre y Apellidos: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="nomdoc" id="nomdoc" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Nombre y Apellidos" value="<?php echo $_SESSION['nomcliente'] ?>" autocomplete="off" disabled="" required="" aria-required="true"/>  
                                    <i class="fa fa-pencil form-control-feedback"></i> 
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Nº de Teléfono: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control phone-inputmask" name="tlfdoc" id="tlfdoc" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Nº de Teléfono" autocomplete="off" value="<?php echo $_SESSION['telefcliente'] ?>" disabled="" required="" aria-required="true"/>  
                                    <i class="fa fa-phone form-control-feedback"></i>        
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Pais: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="paiscliente" id="paiscliente" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Pais" value="<?php echo paises($_SESSION['paiscliente']) ?>" autocomplete="off" disabled="" required="" aria-required="true"/>  
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Ciudad: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="ciudad" id="ciudad" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Ciudad" value="<?php echo $_SESSION['ciudadcliente'] ?>" autocomplete="off" disabled="" required="" aria-required="true"/>  
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Dirección Domiciliaria: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="direcdoc" id="direcdoc" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Dirección Domiciliaria" autocomplete="off" value="<?php echo $_SESSION['direccliente'] ?>" disabled="" required="" aria-required="true"/>  
                                    <i class="fa fa-map-marker form-control-feedback"></i>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label class="control-label">Correo Electrónico: <span class="symbol required"></span></label>
                                    <input type="text" class="form-control" name="emaildoc" id="emaildoc" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Correo Electronico" autocomplete="off" value="<?php echo $_SESSION['correocliente'] ?>" disabled="" required="" aria-required="true"/> 
                                    <i class="fa fa-envelope-o form-control-feedback"></i>
                                </div>
                            </div>
                        </div>
<?php } ?>                
                    </div>    
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                <i class="fa fa-copyright"></i> <span class="current-year"></span>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
   

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/script/jquery.min.js"></script> 
    <script src="assets/js/bootstrap.js"></script>
    <!-- apps -->
    <script src="assets/js/app_002.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/perfect-scrollbar.js"></script>
    <script src="assets/js/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="assets/js/waves.js"></script>
    <!-- Sweet-Alert -->
    <script src="assets/js/sweetalert-dev.js"></script>
    <!--Menu sidebar -->
    <script src="assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/js/custom.js"></script>

    <!-- script jquery -->
    <script type="text/javascript" src="assets/script/titulos.js"></script>
    <script type="text/javascript" src="assets/script/script2.js"></script>
    <script type="text/javascript" src="assets/script/validation.min.js"></script>
    <script type="text/javascript" src="assets/script/script.js"></script>
    <link rel="stylesheet" href="assets/calendario/jquery-ui.css" />
    <script src="assets/calendario/jquery-ui.js"></script>
    <!-- script jquery -->    

</body>
</html>

<?php } else { ?>   
        <script type='text/javascript' language='javascript'>
        alert('NO TIENES PERMISO PARA ACCEDER A ESTA PAGINA.\nCONSULTA CON EL ADMINISTRADOR PARA QUE TE DE ACCESO')  
        document.location.href='panel'   
        </script> 
<?php } } else { ?>
        <script type='text/javascript' language='javascript'>
        alert('NO TIENES PERMISO PARA ACCEDER AL SISTEMA.\nDEBERA DE INICIAR SESION')  
        document.location.href='logout'  
        </script> 
<?php } ?>