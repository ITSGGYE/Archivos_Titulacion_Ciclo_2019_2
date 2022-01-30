<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Aspirante</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/aspirantes.css">



</head>
<body >

<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }
        $cedula = $_SESSION['usuario'];




    ?>

<!-- Vertical navbar -->
<div class="vertical-nav " id="sidebar">
      <div class="py-4 px-3 mb-4">
          <div class="media-body">
            <h4 class="font-weight-white text-muted mb-0">Serviportex</h4>
            <p class="font-weight-grey text-muted text-white mb-0">Sistema de Evaluaciones </p>
          </div>
      </div>
      
      <p class="text-white font-weight-bold text-uppercase px-3 small pb-4 mb-0">
      <img src="../iconos/icons/folder.svg" alt="" width="25" height="25" title="Reporte Aspirante">    
      Menu</p>

      <ul class="nav flex-column mb-0">
        <li class="nav-item">
            <?php
                  require_once("../modelo/conexion.php");

                  $db = new Conectar();
          
                  $sql = $db->conexion();
          
                  $consulta = $sql->query("select * from pruebas where cedula = '$cedula';");

                  $num_fila = $consulta->rowCount();
            ?>

            <?php if($num_fila == 0):?>

              <a href="../pruebas/pruebauno.php" class="nav-link text-light font-italic"> 
              <img src="../iconos/icons/book.svg" alt="" width="25" height="25" title="Reporte Aspirante">
                    Prueba psicotecnica
            </a>
            <?php endif; ?>
            <?php if($num_fila != 0):?>

                <a href="../pruebas/pruebauno.php" hidden class="nav-link text-light font-italic"> 
              <img src="../iconos/icons/book.svg" alt="" width="25" height="25" title="Reporte Aspirante">
                    Prueba psicotecnica
            </a>

            <?php endif; ?>

            <?php  while($datos = $consulta->fetch(PDO::FETCH_ASSOC)):
            
                    if($datos['personalidad'] == ''):
                
            ?>
        </li>
        <li class="nav-item">
              <a href="../pruebas/pruebados.php"  class="nav-link text-light font-italic ">
              <img src="../iconos/icons/book-half-fill.svg" alt="" width="25" height="25" title="Reporte Aspirante">
                    Prueba de Personalidad 19
            </a>
        </li>

            <?php endif; ?>

            <?php if($datos['personalidad']):
                
                ?>
            </li>
            <li class="nav-item">
                  <a href="../pruebas/pruebados.php" hidden class="nav-link text-light font-italic">
                  <img src="../iconos/icons/book-half-fill.svg" alt="" width="25" height="25" title="Reporte Aspirante">
                        Prueba de Personalidad 19
                </a>

                <div class="alert alert-success" style="width: 100%; " role="alert">
                    <h4 class="alert-heading">Proceso Finalizado!</h4>
                    <p>Por favor presiona el boton de <strong>CERRAR SESIÓN</strong> para poder continual con el proceso de selección y poder registrarlo en la base de datos gracias por participar con nosotros.</p>

                </div>
            </li>
    
                <?php endif; ?>

        <?php endwhile; ?>

       
    
      </ul>
      <br>

      <p class="text-dark font-weight-bold text-uppercase px-3 small pb-4 mb-0">Acciones</p>

      <ul class="nav flex-column mb-0">
        <li class="nav-item">
              <a href="#" class="nav-link text-light font-italic">
              <img src="../iconos/icons/people-fill.svg" alt="" width="25" height="25" title="Reporte Aspirante">
                    Bienvenido: <?php echo $_SESSION['usuario']; ?>
            </a>
        </li>
        <li class="nav-item">
              <a href="../modelo/cerrarAspirante.php" class="nav-link text-light font-italic btn btn-dark btn__cerrarSession">
              <img src="../iconos/icons/Power.svg" alt="" width="25" height="25" title="Reporte Aspirante">
                    Cerra Cessión
            </a>
        </li>
       
    
      </ul>
     
           
          </ul>
</div>

<div class="page-content p-5 bg-white" id="content">

  <h1 class="display-5 text-dark">Serviportex del Ecuador</h1>
<div id="carbon-block"></div>
<div>
</div>
      <p class="lead text-dark mb-0">Usted es libre de responder con total seguridad los test que se le proporcionaran, se le dara instrucciones claras para mejorar su experiencia al participar en esta selecion de personal de nuestra empresa.  </p>
  <div class="separator" style="border-bottom: 1px dashed rgb(45, 121, 207);"></div>
      <div class="row text-dark">
        <div class="col-lg-12">
                <li >
                    <strong>No piense demasiado en el contenido de sus frases, </strong>ni emplee mucho tiempo en decidirse. Las frases son muy cortas para para darle todos los detalles que usted quisiera; Debe contestar pensasdo en lo que habitualmente usted cree que esta correcto.   

                </li>

                <li >
                    <strong>Evite dejar los respuestas sin seleccionar, </strong>si ese es el caso su pregunta sera tomada como cero en el rango de calificasiones en el cual se encuentra esta prueba; Puede que algunas preguntas tengas respuestas que no parescan coherentes pero coloque la que mas crea usted que sea correcta.   

                </li>
                <li >
                    <strong>Conteste sinceramente, </strong>no señale sus respuestas pensando en lo que es "es bueno estara bien" o lo que "le interesa" para impresionar.   

                </li>

                <li >
                    <strong class="text-danger">IMPORTANTE, UNA VEZ ENVIADO LAS DOS PRUEBAS Y CIERRE LA SESIÓN SU USUARIO Y CONTRASEÑA SERAN BORRADOS AUTOMATICAMENTE DEL SISTEMA (PROCURE HABER CULMINADO LAS PRUEBAS ANTES DE PRESIONAR EL BOTON DE CERRAR SESIÓN SI LO HACE Y NO A RESUELTO LAS PRUEBAS USTED SERA DADO DE BAJA DEL SISTEMA Y NO PODRA SEGUIR PARTICIPANDO EN EL PROCESO DE SELECCIÓN).</strong>

                </li>
            <br>

            <p class="lead text-dark mb-0"> <strong>Un breve Ejemplo de como seran las preguntas que devera responder a continuación</strong>   </p>

            <br>
            <div class="row">
                    <div class="col-md-6">
                <div class="card" style="box-shadow: 1px 1px 3px black;">
                    <div class="card-title text-center">
                        <h5>Me gusta un trabajo que requiera habilidades de atención y axactitud</h5>
                    </div>
                    
                    <div class="card-body">
                                <div class="form-check ">
                                    <input class="form-check-input" disabled type="radio" >
                                    <label class="form-check-label" for="exampleRadios1">
                                    Totalmente de acuerdo
                                    </label>
                                </div>

                                <div class="form-check ">
                                    <input class="form-check-input" disabled type="radio" >
                                    <label class="form-check-label" for="exampleRadios1">
                                    De acuerdo
                                    </label>
                                </div>

                                <div class="form-check ">
                                    <input class="form-check-input" disabled type="radio" >
                                    <label class="form-check-label" for="exampleRadios1">
                                    Neutro
                                    </label>
                                </div>

                                <div class="form-check ">
                                    <input class="form-check-input" disabled type="radio" >
                                    <label class="form-check-label" for="exampleRadios1">
                                    En desacuerdo
                                    </label>
                                </div>

                                <div class="form-check ">
                                    <input class="form-check-input" disabled type="radio" >
                                    <label class="form-check-label" for="exampleRadios1">
                                    Totalmente en desacuerdo
                                    </label>
                                </div>

                            
                        </div>
                    </div>
    
                </div>
                <div class="col-md-6">
                    <img src="../imagenes/aspiranteImg1.svg" class="menuAspirante__img">
                </div>
            </div>
          
        </div>
       
      </div>
</div>
  

    <script src = "../estilos/js/jquery.js"></script>
    <script src = "../estilos/js/bootstrap.min.js"></script>
</body>
</html>