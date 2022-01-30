<!doctype html>
<html lang="Es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Administracion WEB">


    <title>Administración</title>

    <!-- Bootstrap core CSS -->
    <link rel="icon" href="../favicon.ico" type="image/x-icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/css/fontawesome-all.css" crossorigin="anonymous">
    <script defer src="../fonts/js/fontawesome-all.js"></script>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
    <script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
    
<style>
  /*.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
 /* Set the fixed height of the footer here */
 /* Vertically center the text there 

}*/
.footer {

width: 100%;
position: fixed; /* Fija el contenedor a una posición */
bottom: 0px; /* El div se sitúa abajo */
z-index: 10; /* Lo muestra por encima de otros div */

 }

</style>
    <script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
tinymce.init({
  selector: 'textarea',
  height: 200,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen','emoticons',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | emoticons '
});

    </script>
  </head>

  <body style="background: rgba(226,226,226,1);
background: -moz-linear-gradient(left, rgba(226,226,226,1) 0%, rgba(161,158,161,1) 50%, rgba(166,161,166,1) 51%, rgba(254,254,254,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(226,226,226,1)), color-stop(50%, rgba(161,158,161,1)), color-stop(51%, rgba(166,161,166,1)), color-stop(100%, rgba(254,254,254,1)));
background: -webkit-linear-gradient(left, rgba(226,226,226,1) 0%, rgba(161,158,161,1) 50%, rgba(166,161,166,1) 51%, rgba(254,254,254,1) 100%);
background: -o-linear-gradient(left, rgba(226,226,226,1) 0%, rgba(161,158,161,1) 50%, rgba(166,161,166,1) 51%, rgba(254,254,254,1) 100%);
background: -ms-linear-gradient(left, rgba(226,226,226,1) 0%, rgba(161,158,161,1) 50%, rgba(166,161,166,1) 51%, rgba(254,254,254,1) 100%);
background: linear-gradient(to right, rgba(226,226,226,1) 0%, rgba(161,158,161,1) 50%, rgba(166,161,166,1) 51%, rgba(254,254,254,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe', GradientType=1 );">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">Hola: Administrador</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"> <i class="fas fa-home"></i> Principal<span class="sr-only">(current)</span></a>
          </li>



          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-wrench"></i> Categorias</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="eva_categoria.php"><i class="fas fa-tag"></i> Crear Categoria</a>
              <a class="dropdown-item" href="eva_colegio.php"><i class="fas fa-briefcase"></i> Nuevo Colegio</a>
              <hr>
              <a class="dropdown-item" href="usuario_new.php"><i class="fal fa-user-secret"></i> Nuevo Usuario</a>
              <a class="dropdown-item" href="usuario_foto.php"><i class="fal fa-image"></i> Foto</a>
              
            </div>
          </li>

          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle btn btn-outline-primary" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-edit"></i>  Evaluaciones</a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="eva_nueva.php"><i class="fas fa-pencil-alt"></i> Crear Evaluación</a>
              <a class="dropdown-item" href="index.php"><i class="far fa-file-alt"></i> Ver Evaluaciones</a>
            </div>
          </li>

          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle btn btn-outline-success ml-3" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-file-word"></i> Trabajos</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <a class="dropdown-item" href="crear_trabajos.php"><i class="fas fa-file-alt"></i> Crear Trabajos</a>
              <a class="dropdown-item" href="trabajos.php"><i class="fas fa-file-word"></i> Ver Trabajos</a>
            </div>
          </li>

          <li class="nav-item dropdown active">
            <a href="foros.php" class="nav-link dropdown-toggle btn btn-outline-warning ml-3" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-comments"></i> Foros</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="crear_foros.php"><i class="far fa-comment"></i></i> Crear Foros</a>
              <a class="dropdown-item" href="foros.php"><i class="far fa-comments"></i> Ver Foros</a>
            </div>
          </li>


        </ul>

        <form class="form-inline my-2 my-lg-0">
      
      <a class="nav-link btn-danger active" href="../cerrarsesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar</a>
    </form>

      </div>
    </nav>
<div class="container">
