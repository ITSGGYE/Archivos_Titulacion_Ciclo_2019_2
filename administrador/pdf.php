<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
  header('Location: index.php');
  
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Consultorio Odontologia</title>
  <link rel="icon" href="img/logooo.png" type="image" >
  <link rel="stylesheet" href="css/iconos.css">
  <link rel="stylesheet" href="css/sty.css">
</head>
<body>
  <?php
  include ('nav.php');
  ?>
  <?php
  include ('iconos.php');
  ?>
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <section  class="section">
            <div   class="wrapp">
              <article class="articles" >
                <div class="mensaje">
                  <h2>PDF</h2>
                </div>
                <section  >
                  <center>
                   <div  class="media-body p-2 mt-3">
                    <a style="color: white;font-weight:bold; text-decoration: none;" class="button"  href="reporte/pdf_paciente.php">PACIENTE</a>
                  </div>
                  <div  class="media-body p-2 mt-3">
                    <a class="button2" style="color: white;font-weight:bold; text-decoration: none;" href="reporte/pdf_especialista.php">ESPECIALISTA</a>
                  </div>
                </center>
                <!--   segunda columna-->
                <br><br>
                <center>
                 <div  class="media-body p-2 mt-3">
                  <a class="button3" style="color: white;font-weight:bold; text-decoration: none;"  href="reporte/pdf_administrador.php">USUARIOS</a>
                </div>
                <div  class="media-body p-2 mt-3">
                  <a class="button4" style="color: white;font-weight:bold; text-decoration: none;" href="reporte/pdf_especialidad.php">  ESPECIALIDAD </a>
                </div> <!--   OTRO BOTON-->
              </center>
              <center>
               <div  class="media-body p-2 mt-3">
                <a class="button5" style="color: white;font-weight:bold; text-decoration: none;" href="reporte/pdf_cita_general.php">  CITAS </a>
              </div>
              <div  class="media-body p-2 mt-3">
                <a class="button6" style="color: white;font-weight:bold; text-decoration: none;" href="reporte/pdf_cita_asignada.php">  CITAS ASIGNADA </a>
              </div>
            </center>
            <br><br>
            <center>
             <div  class="media-body p-2 mt-3">
              <a class="button7" style="color: white;font-weight:bold; text-decoration: none;" href="reporte/pdf_cita_atendida.php">  CITAS ATENDIDA </a>
            </div>
            <div  class="media-body p-2 mt-3">
              <a class="button8" style="color: white;font-weight:bold; text-decoration: none;" href="reporte/pdf_perdidas.php">  CITAS PERDIDA </a>
            </div>
            <!--   tercera columna-->
            <br>
            <br><br><br>
            <br><br><br>
            <br><br>
            <br><br>
            <br><br>
          </center>
        </section>
      </div>
    </div>
  </div>  
  
  <div    < class="col-sm-12">
    <p  style="color:black; font-weight:bold;"  class="back-link">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Consultorio Odontologico Smile dental.  </p></div>
  </article></div></section>
</div><!--/.row-->
</div>  <!--/.main-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<!-- datatables JS -->
<script type="text/javascript" src="datatables/datatables.min.js"></script>   
<script type="text/javascript" src="js/main.js"></script>  
</body>
</html>