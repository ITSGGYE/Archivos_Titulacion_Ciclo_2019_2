<!DOCTYPE html>
<html>
<body style=" background-image: url(../imagenes/fondo-2.jpg);">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">

  <title>ADMIN</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/style.css">
   <link  rel="icon"   href="img/fondo-login.png" type="image/png" />
   <link rel="stylesheet" href="css/style1.css">
   <link rel="stylesheet" href="css/style2.css">
     <link rel="stylesheet" href="">
   
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

</head>

<body>



  <div class="wrapper">
    <!-- Sidebar Holder -->


    <nav id="sidebar">

      <div class="sidebar-header">
        <h3>Administrador</h3>
         <figure class="full-box -avatar">
          <center style=" margin-top: 30px;margin-right: 50px;">
<img src="./img/Avatar.png" class="img-fluid" alt="Avatar" ></center>
<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        </h3>
      </div>

      <ul class="list-unstyled components">
        <p></p>

        <li class="fas fa-clipboard-check">
          <a href="nuevo.php"><i class="fas fa-user-plus"></i>&nbsp; Estudiantes</a>

        </li>
        <li>
         <a href="usuario_new.php"><i class='fas fa-key'></i> &nbsp; Administrador</a>


        <!--</li>
        <li>
         <a href="eva_categoria.php"><i class="fas fa-clipboard-check"></i> &nbsp; Crear Categoria</a>
        </li>
       
          

        </li>
        <li>
          <a href="leccion.php"><i class="fas fa-list-ol"></i> &nbsp; Crear Lecciones</a>


        </li>-->
       
      

      </ul>

 <button type="button" class="btn btn-danger"style="

display: block;
margin: 0 auto;
width: 200px;
padding: 15px;


 "><a href="../cerrarsesion.php"><i class="glyphicon glyphicon-log-in"></i> &nbsp; LOGOUT</a></button>
 </div>
          

    </nav>

  
          </div>
    <!-- Page Content Holder -->
    <div id="content">
<div class="navbar navbar-dark bg-primary">
  
 
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="  glyphicon glyphicon-menu-hamburger"></i>
                            </button>
                  
       <h1>
        <center><p class="text-justify">
          <p>Escuela de Educación Básica Fiscal</p> 
         <p>"Enrique Gil Calderón"</p>
        </p></center>
        </h1>
      </div>
      <div class="full-box tile-container-primary">
        <a href="nuevo.php" class="tile">
          <div class="tile-tittle">Usuarios</div>
          <div class="tile-icon">
            <i class="glyphicon glyphicon-user"></i>
          </div>
        </a>  

      <!--  <a href="eva_categoria.php" class="tile">
          <div class="tile-tittle">Lecciones</div>
          <div class="tile-icon">
            <i class="glyphicon glyphicon-book"></i>
          </div>
        </a>  -->

      </div>
       

          
       

          
        </div>
    


    </div>
  </div>

<!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <!-- Bootstrap Js CDN -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {


      $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>


</body>

</html>