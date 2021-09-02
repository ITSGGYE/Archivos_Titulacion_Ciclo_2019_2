<?php
if(strlen(session_id())<1)
  session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CM Isabelita</title>
   


   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="../files/logo/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../files/logo/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../files/logo/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
   
   
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../public/css/bootstrap-select.min.css"> 
  
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">

      <!-- DATATABLES -->
    <link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet"  type="text/css" href="../public/datatables/css/buttons.dataTables.min.css">
    <link rel="stylesheet"  type="text/css" href="../public/datatables/css/responsive.dataTables.min.css">
  
    <!-- sweetalert2 Ventanas Emergentes -->
    <link rel="stylesheet" href="../public/css/sweetalert.min.css" />
  
    <!-- Alertify -->
    <link rel="stylesheet" type="text/css" href="../public/css/example.css"> 
    <link rel="stylesheet" type="text/css" href="../public/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../public/alertifyjs/css/themes/default.css">

  


  </head>
  <body class="hold-transition skin-purple-light sidebar-mini">
    <div class="wrapper" >

      <header class="main-header">

        <!-- Logo -->
        <a href="escritorio.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>CMI</b></span>
          <!-- logo for regular state and mobile devices -->
          
          <span class="logo-lg"><b>CM</b> Isabelita</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                      
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
            <span class="fa fa-user"> <?php echo $_SESSION['per_nombre'].' '.$_SESSION['per_apellido']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../ajax/persona.php?op=salir" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->

      <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

  



      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
         <!-- Inicio del Menu lateral -->
      <ul class="sidebar-menu" data-widget="tree">
        
            <?php 
             if ($_SESSION['Escritorio']==1)
             {
               echo '<li><a href="escritorio.php"><i class="fa fa-server"></i> <span>Escritorio</span></a></li>
               </a>
             </li>';
             }
            ?>
            
            <?php 
             if ($_SESSION['Paciente']==1)
             {
               echo '<li><a href="paciente.php"><i class="fa fa-users"> </i> <span> Paciente </span> </a></li>';
             }
            ?>

            <?php 
             if ($_SESSION['Citas']==1)
             {
               echo '<li class="treeview">
               <a href="#">
                 <i class="fa fa-calendar"></i> <span>Citas</span>  
                   <i class="fa fa-angle-left pull-right"></i>
               </a>
               <ul class="treeview-menu">
                 <li><a href="agenda.php"><i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i> Agendar Cita</a></li>
               </ul>
             </li>';
             }
            ?>

        
              <?php  
             if ($_SESSION['Personal']==1)
             {
               echo '<li class="treeview">
               <a href="#">
                 <i class="fa fa-user"></i> <span>Personal</span>
                   <i class="fa fa-angle-left pull-right"></i>
               </a>
               <ul class="treeview-menu">
                 <li><a href="persona.php"><i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i> Usuarios</a></li>
                 <li><a href="modulo.php"><i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i> Modulos</a></li>
                 <li><a href="diagnostico.php"><i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i> Enfermedades</a></li>
                 </ul>
             </li>';
             }
            ?>

              <?php  
             if ($_SESSION['Valoracion']==1)
             {
               echo '<li><a href="ficha_medica.php"><i class="fa fa-edit"> </i> <span> Valoracion </span> </a></li>';
             }
            ?>


            <?php  
             if ($_SESSION['Consulta Medica']==1)
             {
               echo '<li><a href="consulta_medica.php"><i class="fa fa-user-md"> </i> <span> Consulta Medica </span> </a></li>';
             }
            ?>

             <?php  
             if ($_SESSION['Horarios']==1)
             {
               echo '<li><a href="horario.php"><i class="fa fa-calendar"> </i> <span> Horario </span> </a></li>';
             }
            ?>
      
     
           <?php  
             if ($_SESSION['Especialidad']==1)
             {
               echo ' <li><a href="especialidad.php"><i class="fa fa-stethoscope"></i> <span>Especialidades</span></a></li>';
             }
            ?>
      
           <?php  
             if ($_SESSION['Consultas']==1)
             {
               echo ' <li class="treeview">
               <a href="#">
                 <i class="fa fa-search"></i> <span>Consultas</span>
                   <i class="fa fa-angle-left pull-right"></i>
               </a>
               <ul class="treeview-menu">
                 <li><a href="citaspacientes.php"><i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i>Pacientes</a></li>
                 <li><a href="citasmedicas.php"><i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i>Citas Registradas</a></li>
               </ul>
             </li>';
             }
            ?>

            <?php  
             if ($_SESSION['Configuracion']==1)
             {
               echo ' <li><a href="configuracion.php"><i class="fa fa-cogs"></i> <span>Configuracion</span></a></li>';
             }
            ?>
          


      </ul>

    
    </section>
    <!-- /.sidebar -->


  </aside>


