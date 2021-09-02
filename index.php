<!DOCTYPE html>
<html lang="es-ES" dir="ltr">

<head>
  <?php include_once 'constants/head.html'?>
  <title>Inicio de Sesion</title>
  <link rel="stylesheet" href="./css/login.css">
  <link id="toast-status" rel="stylesheet" href="./css/toast-red.css">
</head>

<body>
  <center>
    <main>
        <div class="section container" id="section">
          <div class="row card-panel" id="row">
            <img src="./images/logo.jpeg" id="img" width="60%">
            <br>
            <form class="col s12" method="POST" id="formulario" action="./controller/ClassLoginC.php" enctype="multipart/form-data">
              <div class="input-field col s12">
                <input required="true" id="usuario" name="usuario" type="text" class="validate" >
                <label id="select-input" for="usuario">USUARIO * </label>
              </div>
              <div class="input-field col s12">
                <input required="true" id="password" name="password" type="password" class="validate">
                <label id="select-input" for="password">CONTRASEÑA * </label>
              </div>
              <button type="submit" class="btn waves-effect waves-light" name="action" id="action">Iniciar Sesión
              </button>
            </form>
          </div>
        </div>
    </main>
      <div class="preloader-wrapper big active">
          <div class="spinner-layer spinner-blue-only">
              <div class="circle-clipper left">
                  <div class="circle"></div>
              </div><div class="gap-patch">
                  <div class="circle"></div>
              </div><div class="circle-clipper right">
                  <div class="circle"></div>
              </div>
          </div>
      </div>
      </center>
  <footer class="page-footer">
      <div class="footer-copyright">
          <div class="container">
             <img class="img-footer" src="./images/istg.jpg"> © 2020 ISTG - Instituto Superior Tecnológico Guayaquil
          </div>
      </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="js/login.js"></script>
</body>
</html>
