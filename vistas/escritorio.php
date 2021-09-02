<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["per_nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['Escritorio']==1)
{
 
  require_once "../modelos/Consultas.php";
  $consulta = new Consultas();
  


  $rsptapac = $consulta->totalpacientes();
  $regp=$rsptapac->fetch_object();
  $totalpac=$regp->TotalPacientes;

  $rsptaper = $consulta->totalPersonal();
  $regpe=$rsptaper->fetch_object();
  $totalper=$regpe->TotalPersonal;

  $rsptaesp = $consulta->totalEspecialidad();
  $regesp=$rsptaesp->fetch_object();
  $totalesp=$regesp->TotalEspecialidades;

  $rsptact = $consulta->citastotales();
  $regct=$rsptact->fetch_object();
  $totalct=$regct->CitasTotales;

  $rsptaht = $consulta->historiastotales();
  $reght=$rsptaht->fetch_object();
  $totalht=$reght->HistoriasTotales;





  //Datos para mostrar el gráfico de barras de las Citas ultimos 10 dias
  $citas10 = $consulta->citasultimos_10dias();
  $fechasc='';
  $totalesc='';
  while ($regfechac= $citas10->fetch_object()) {
    $fechasc=$fechasc.'"'.$regfechac->fecha .'",';
    $totalesc=$totalesc.$regfechac->total .','; 

  }
  //Quitamos la última coma
  $fechasc=substr($fechasc, 0, -1);
  $totalesc=substr($totalesc, 0, -1);



  //Datos para mostrar el gráfico de barras de las CItas ultimos 12 meses
  $citas12 = $consulta->citasultimos_12meses();
  $fechasm='';
  $totalesm='';
  while ($regfecham= $citas12->fetch_object()) {
    $fechasm=$fechasm.'"'.$regfecham->fecha .'",';
    $totalesm=$totalesm.$regfecham->total .','; 
  }
  //Quitamos la última coma
  $fechasm=substr($fechasm, 0, -1);
  $totalesm=substr($totalesm, 0, -1);


    //Datos para mostrar el gráfico de barras de las CItas 
    $citase = $consulta->citas_estados();
    $estados='';
    $totalese='';
    while ($regestados= $citase->fetch_object()) {
      $estados=$estados.'"'.$regestados->estado_pago .'",';
      $totalese=$totalese.$regestados->total.','; 
    }
    //Quitamos la última coma
    $estados=substr($estados, 0, -1);
    $totalese=substr($totalese, 0, -1);


        //Datos para mostrar el gráfico de barras de las Especialidades mas Solicitadas
        $esp_solicitadas = $consulta->especialidades_solicitadas();
        $especialidad='';
        $totalese='';
        while ($regespecialidad= $esp_solicitadas->fetch_object()) {
          $especialidad=$especialidad.'"'.$regespecialidad->Especialidad .'",';
          $totalese=$totalese.$regespecialidad->Total .','; 
        }
        //Quitamos la última coma
        $especialidad=substr($especialidad, 0, -1);
        $totalese=substr($totalese, 0, -1);

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
                    <div class="box-header with-border" style="background:#ffffff;">
        <section class="content" >
            <div class="row">
              <div class="col-md-12">

                    <div class="panel-body">
                    
                    <div class="row">
             
         
    <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box" style="background:#3287BF;color:white;">
            <a href="paciente.php"> <span class="info-box-icon bg-blue"><i class="fa fa-users fa-1x"></i></span> </a>

            <div class="info-box-content">
              <span class="info-box-text">Pacientes</span>
              <span class="info-box-number"><?php echo $totalpac ?>  <small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

   
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box" style="background:#46C461;color:white;">
          <a href="persona.php"> <span class="info-box-icon bg-green"><i class="fa fa-user-md"></i></span> </a>

            <div class="info-box-content">
              <span class="info-box-text">Personal</span>
              <span class="info-box-number"><?php echo $totalper ?>  <small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box" style="background:#7D62E0;color:white;">
          <a href="especialidad.php"> <span class="info-box-icon bg-purple"><i class="fa fa-stethoscope"></i></span> </a>

            <div class="info-box-content">
              <span class="info-box-text">Especialidades</span>
              <span class="info-box-number"><?php echo $totalesp ?>  <small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box" style="background:#E7AC36;color:white;">
          <a href="agenda.php">  <span class="info-box-icon bg-yellow"><i class="fa fa-calendar"></i></span> </a>

            <div class="info-box-content">
              <span class="info-box-text">Citas Medicas</span>
              <span class="info-box-number"><?php echo $totalct ?>  <small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
       
       </div>
       
       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box" style="background:#E07362;color:white;" >
          <a href="citaspacientes.php">  <span class="info-box-icon bg-red"><i class="fa fa-file"></i></span> </a>

            <div class="info-box-content">
              <span class="info-box-text">Historia Clinica</span>
              <span class="info-box-number"><?php echo $totalht ?>  <small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
       
       </div>

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

                    </div>

                    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header bg-primary" style="color:white;">
             <b> <h3 class="box-title">CITAS DEL DÌA</h3> </b>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Hora</th>
                  <th>Paciente</th>
                  <th>Medico</th>
                  <th>Especialidad</th>
                  <th>Estado</th>
                </tr>

                <?php   $rsptacithoy = $consulta->citas_hoy();
                        while ($reg = $rsptacithoy->fetch_object()){
                ?>
                  <tr>
                  <td><?php echo $reg->Hora  ?> </td>
                  <td><?php echo $reg->Nombres  ?></td>
                  <td><?php echo $reg->Medic  ?></td>
                  <td><?php echo $reg->esp_nombre ?></td>
                  <td><?php echo $reg->estado_cita  ?></td>
                 
                  <?php  } ?>
                        </tr>
                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

        
                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="box box-primary">
                            <div class="box-header with-border">
                                Citas de los últimos 10 días
                            </div>
                            <div class="box-body">
                              <canvas id="citas" width="400" height="300"></canvas>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="box box-primary">
                            <div class="box-header with-border";>
                                Citas de los últimos 12 meses
                            </div>
                            <div class="box-body">
                              <canvas id="citasmeses" width="400" height="300"></canvas>
                            </div>
                          </div>
                        </div>
                    
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="box box-primary">
                            <div class="box-header with-border">
                                Estados de Citas Medicas
                            </div>
                            <div class="box-body">
                              <canvas id="citasestado" width="400" height="300"></canvas>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="box box-primary">
                            <div class="box-header with-border">
                                Especialidades mas Solicitadas
                            </div>
                            <div class="box-body">
                              <canvas id="esp_solicitadas" width="400" height="300"></canvas>
                            </div>
                          </div>
                        </div>

                    
                    
                    
                    
                      </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else
{
  require 'noacceso.php';
}

require 'footer.php';
?>
<script src="../public/js/chart.min.js"></script>
<script type="text/javascript">
var ctx = document.getElementById("citas").getContext('2d');
var citas = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $fechasc; ?>],
        datasets: [{
            label: '# Registradas Citas en los últimos 10 días',
            data: [<?php echo $totalesc; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


var ctx = document.getElementById("citasmeses").getContext('2d');
var citas_meses = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $fechasm; ?>],
        datasets: [{
            label: '# Citas Registradas en los últimos 12 meses',
            data: [<?php echo $totalesm; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


var ctx = document.getElementById("citasestado").getContext('2d');
var citas_estados = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $estados; ?>],
        datasets: [{
            label: '# Estadisticas de Citas Procesadas',
            data: [<?php echo $totalese; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var ctx = document.getElementById("esp_solicitadas").getContext('2d');
var esp_solicitadas = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $especialidad; ?>],
        datasets: [{
            label: '# Estadisticas de Especialidades mas Solicitadas',
            data: [<?php echo $totalese; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


</script>

<?php 
}
ob_end_flush();
?>


