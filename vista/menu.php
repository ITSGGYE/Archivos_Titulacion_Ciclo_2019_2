<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Menu</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/misestilos.css">
    <link rel="stylesheet" href="../estilos/contra.css">

</head>
<body class="bodyTotal__menu">
<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }
    ?>
<?php 
    require_once('../controlador/principal.php');
    include_once('../pie/header.php');
    
?>

<br>
<br>
  <div class="container-fluid p-4 " >
    <div class="row" style="padding-left: 6em;">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar pt-5" style="border-radius: 20px;">
        <hr>
        <div class="sidebar-sticky bg-dark bar" >
          <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link text-info h6" href="../vista/aspirante.php">
            <img src="../iconos/icons/arrow-bar-right.svg" alt="" width="25" height="25" title="Nuevo aspirante">   
                Nuevo Aspirante
              </a>
            </li>
               
            <li class="nav-item">
              <a class="nav-link text-info h6" href="../vista/acciones.php">
            <img src="../iconos/icons/tools.svg" alt="" width="25" height="25" title="Acciones">   
                Acción 
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-info h6" href="../vista/GestionUsuario.php">
            <img src="../iconos/icons/people.svg" alt="" width="25" height="25" title="Gestion usuario">   
                Gestion de Usuario  
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-info h6" href="test.php">
            <img src="../iconos/icons/book-half-fill.svg" alt="" width="25" height="25" title="test">   
                Test 
              </a>
                    
            </li>

            <li class="nav-item">
              <a class="nav-link text-info h6" href="../vista/reporte.php">
            <img src="../iconos/icons/book.svg" alt="" width="25" height="25" title="Reporte Aspirante">   
                Reporte Aspirantes 
              </a>
            </li>
          

          </ul>

        </div>
        <hr>

      </nav>

      <div class="col-md-9 pt-4 pl-5 bg-dark barra">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2 text-info ">
            <img src="../iconos/icons/graph-up.svg" alt="" width="40" height="40"  title="Cuadro estadistico">  
            Cuadro Estadistico
           </h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            
            <a  class="btn btn-sm btn-outline-secondary ">
              <img src="../iconos/icons/people-fill.svg" alt="" width="20" height="20"  title="usuario"> 
              <b class="text-info text-center h5"><?php echo 'Usuario: '. $_SESSION['usuario'];  ?></b>
            </a>
          </div>
        </div>
      
        <div id="container" style="height:400px;  "></div>
        
        <h2 class="text-info">
          <img src="../iconos/icons/table.svg" alt="" width="40" height="40"  title="Mejores Puntuaciones"> 
          Mejores Puntuaciones
          
        </h2>
      <div class="table-responsive">
        <table class="table table-striped table-dark table-hover ">
          <thead>
            <tr>
               <th>ID</th>
              <th>Puntaje</th>
              <th>Fecha</th>
              <th>Cedula</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
          

            
                <?php
                  foreach($matriz_menu as $datos):
                      echo "<tr><td>" . $datos['ID_puntaje'] . "</td>";
                      echo "<td>" . $datos['nota'] ."</td>";
                      echo "<td>" . $datos['fecha_prueba'] . "</td>" ;
                      echo "<td>" . $datos['cedula'] . "</td>";
                      echo "<td>" . $datos['nombres'] . "</td>";
                      echo "<td>" . $datos['apellidos'] ."</td>";
                ?>

                        <td><a href="../vista/reporteFinal.php?nota=<?php echo $datos['nota']?>  & fecha=<?php echo $datos['fecha_prueba']?> & cedula=<?php echo $datos['cedula']?> & nombre=<?php echo $datos['nombres']?> & apellido=<?php echo $datos['apellidos']?> & cv=<?php echo $datos['curriculum']?> & correo=<?php echo $datos['correo']?>   ">
                        <img src='../iconos/icons/Eye-fill.svg'  width='40' height='40'  title='Ver'>
                        </a> </td></tr>

                  
                  <?php endforeach; ?>
         
            
          </tbody>
        </table>
        <div class="clearfix text-center" >
                <div class="hint-text text-info ">Actualmente Existen <b class="text-warning"><?php echo $total_registro;?></b> Aspirantes Registrados en la Base de datos</div>
                    
                
            </div>
      </div>

      </div> 
    
    </div>
    
   
  </div>


   
    <script src = "../estilos/js/jquery.js"></script>
    <script src = "../estilos/js/bootstrap.min.js"></script>
    <script src="../Highcharts-4.1.5/highcharts.js"></script>
    <script src="../Highcharts-4.1.5/highcharts-3d.js"></script>
 
</body>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'MEJORES PUNTUADOS'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'MEJORES NOTAS',
            data: [
                
                <?php 

                foreach($grafico_menu as $dato){
                ?>

                ['<?php echo $dato['nombres']?>', <?php echo $dato['nota']?>  ],


                <?php } ?>
              
            ]
        }]
    });
});
		</script>

</html>