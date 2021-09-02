<?php
require_once 'model/sesion.php';
require_once 'model/usuario.php';
//Verificar si es un usuario autenticado  

$session = new Session();
if (!isset($_SESSION)) {
    $session->init();
}

if ($session->getStatus() === 1 || empty($session->get('usu_correo'))) {
    header('location: index.php?c=login&a=login');
}

$id = $session->get('usu_id');
$usuario = (new Usuario())->ObtenerPorId($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <title> Sistema panificadora </title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="assets/fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.cs" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
    <!-- data tables -->
    <link href="assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href=" assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="assets/css/material_style.css">
    <!-- animation -->
    <link href="assets/css/pages/animate_page.css" rel="stylesheet">
    <!-- steps -->
    <link href="assets/css/pages/steps.css" rel="stylesheet">
    <!-- Theme Styles -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages/formlayout.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme-color.cs" rel="stylesheet" type="text/css" />
    <!-- dropzone -->
    <link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
    <!--tagsinput-->
    <link href="assets/plugins/jquery-tags-input/jquery-tags-input.css" rel="stylesheet">
    <!--select2-->
    <link href="assets/plugins/select2/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datepicker/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-white">
    <div class="page-wrapper" style="height: 100%">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top" style="background: #1880c9">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo" style="background: #222c3c">
                    <a href="">
                        <img alt="" src="">
                        <span class="logo-default">Panaderia</span> </a>
                </div>
                <!-- logo end -->
                <ul class="nav navbar-nav navbar-left in">
                    <li><a href="#" class="menu-toggler sidebar-toggler font-size-23"><i class="fa fa-bars"></i></a></li>
                </ul>

                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                <img alt="" class="img-circle " src="assets/img/dp.jpg">

                            </a>
                            <ul class="dropdown-menu dropdown-menu-default animated jello">
                                <li>
                                    <a href="index.php?c=usuario&a=EditarPerfil&usu_id=<?php echo $usuario->usu_id ?>">
                                        <i class="fa fa-user-o"></i> Perfil </a>
                                </li>
                                <li>
                                    <a href="index.php?c=usuario&a=CambiarPassword&usu_id=<?php echo $usuario->usu_id ?>">
                                        <i class="fa fa-cogs"></i> Cambiar Password </a>
                                </li>

                                <li class="divider"> </li>

                                <li>
                                    <a href="index.php?c=login&a=logout">
                                        <i class="fa fa-sign-out"></i> Salir </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
                    </ul>
                </div>



            </div>
        </div>
        <!-- end header -->
        <!-- start page container -->
        <div class="page-container">
            <!-- start sidebar menu -->
            <div class="sidebar-container">
                <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                    <div id="remove-scroll">
                        <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="sidebar-user-panel">
                                <div class="user-panel">
                                    <div class="pull-left image">
                                        <img src="assets/img/logo.jpeg" class="img-circle user-img-circle" alt="User Image" />
                                    </div>
                                    <div class="pull-left info">
                                        <h5><small style="color:white">.</small></h5>

                                    </div>
                                </div>
                            </li>





                            <!-- start menu clientes -->
                            <li class="nav-item">
                                <a href="index.php?c=cliente&a=index" class="nav-link nav-toggle">
                                    <i class="fa fa-address-book"></i>
                                    <span class="title">Clientes</span>
                                </a>
                            </li>
                            <!-- end menu clientes -->
                            <!-- start menu trabajadores -->
                            <li class="nav-item">
                                <a href="index.php?c=empleado&a=index" class="nav-link nav-toggle">
                                    <i class="fa fa-user-md"></i>
                                    <span class="title">Trabajadores</span>
                                </a>
                            </li>
                            <!-- end menu trabajadores -->
                            <?php
                            if ($usuario->rol_id == 1) {
                            ?>
                                <!-- start menu administradores -->
                                <li class="nav-item">
                                    <a href="index.php?c=usuario&a=index" class="nav-link nav-toggle">
                                        <i class=" fa fa-user-circle "></i>
                                        <span class="title">Administradores</span>
                                    </a>
                                </li>
                                <!-- end menu administradores -->
                            <?php } ?>
                            <!-- start menu cargos -->
                            <li class="nav-item">
                                <a href="index.php?c=cargo&a=index" class="nav-link nav-toggle">
                                    <i class="fa  fa-bars"></i>
                                    <span class="title">Cargos</span>
                                </a>
                            </li>
                            <!-- end menu cargos -->
                            <!-- start menu pedidos -->
                            <li class="nav-item">
                                <a href="index.php?c=pedidosdetalle&a=filtrarFecha" class="nav-link nav-toggle">
                                    <i class="fa fa-book"></i>
                                    <span class="title">Pedidos</span>
                                </a>
                            </li>
                            <!-- end menu pedidos -->
                            <!-- start menu produccion -->
                            <li class="nav-item">
                                <a href="index.php?c=produccion&a=index" class="nav-link nav-toggle">
                                    <i class="fa fa-gears"></i>
                                    <span class="title">Produccion</span>
                                </a>
                            </li>
                            <!-- end menu produccion -->
                            <!-- start menu reportes -->
                            <li class="nav-item">
                                <a href="index.php?c=reportes&a=consultarDatosSueldos" class="nav-link nav-toggle">
                                    <i class="fa fa-windows"></i>
                                    <span class="title">Reportes</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="index.php?c=reportes&a=consultarPedidos" class="nav-link ">
                                            <span class="title">Pedidos</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index.php?c=reportes&a=consultarProduccion" class="nav-link ">
                                            <span class="title">Produccion</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- start menu salir -->
                            <li class="nav-item">
                                <a href="index.php?c=login&a=logout" class="nav-link nav-toggle">
                                    <i class="fa fa-sign-out"></i>
                                    <span class="title">Salir</span>
                                </a>
                            </li>
                            <!-- end menu produccion -->
                            <Div style="height: 200px"></Div>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">