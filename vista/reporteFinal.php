<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Final</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" type="text/css" href="../estilos/css/main.css">
    <link rel="stylesheet" href="../estilos/Contra.css">

</head>
<body class="carta">

<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }
    ?>


<header>

<?php
    $nota = $_GET['nota'];
    $fechaP = $_GET['fecha'];
    $cedula = $_GET['cedula'];
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $cv = $_GET['cv'];
    $correo = $_GET['correo'];
   

?>



<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-2 shadow "> 
        <a href="" class="navbar-brand col-sm-3 col-md-2 mr-0 text-info" >
        <img src="../imagenes/logo2.ico" alt="" width="30" height="30" title="Serviportex"> 
        ServiPortex
        </a>

        <div class="panel panel-default">
            <div class="panel-body ">
                Reporte Detallado de <b class="text-info"> <?php echo $nombre . $apellido ?></b>
            </div>
        </div>
       
        <ul class = "navbar-nav px-3">
            <form class="form-check-inline">
                <a class="btn" href="../vista/menu.php"  >
                <img src="../iconos/icons/arrow-bar-left.svg" alt="" width="30" height="30" title="Menu"> 
                </a>
                <a class="btn" href="../modelo/cerrar.php" >
                <img src="../iconos/icons/power.svg" alt="" width="30" height="30" title="Cerrar Sessión"> 
                </a>
            </form>
        </ul>
</header>



<div class="container">

<div class="row">
    <div class="col-sm-6 col-md-5 col-lg-6">

            <div class="card w-60 card__Rfinal__bg">
                <div class="card-body card__altura__rFinal">

                    <a href="../controlador/pdf.php? cv=<?php echo $cv;?>"  target="_blank" class="" style="float:left;">
                      <img src='../iconos/icons/arrows-fullscreen.svg'  width='30' height='30'  title='Pantalla Completa'>
                    </a>

                   

                    <iframe class="iframe__Rfinal" src="../archivos/<?php echo $cv;?>" ></iframe>
                
                </div>
            </div>

         

    </div>
    <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">

                    <div class="card w-60 card__Rfinal__bg">
                        <div class="card-body card__altura__rFinal">
                       
                            <div>
                                        <h5 class="title__email__Rfinal">
                                            Enviar Correo
                                        </h5>
                                    <div style="padding:0.50em;" >
                                        <form action="../controlador/correo.php" method="POST" class="form__email__Rfinal">

                                            <div class="wrap-input2 " data-validate = "Valid email is required: ex@abc.xyz">
                                                <input class="input2" type="text" readonly name="correo" value="<?php echo $correo;?>">
                                                
                                            </div> 
                                            <div class="wrap-input2 " data-validate="Name is required">
                                                <input class="input2"  readonly type="text" name="titulo" value="ServiPortex del Ecuador">
                                                
                                            </div>

                                            <div class="wrap-input2 " data-validate = "Message is required">
                                                <textarea class="input2" name="mensaje" style="resize: none;">
                                                Deseo darte mis más sinceras y efusivas felicitaciones <?php echo $nombre . $apellido;?> por esta nueva misión que te fue dada. Felicidades has sido aceptado en la empresa ServiPortex del Ecuador por favor acércate a nuestras instalaciones para finalizar el trámite de aceptación.   
                                                </textarea>
                                                
                                            </div>

                                            <div class="container-contact2-form-btn">
                                                <div class="wrap-contact2-form-btn">
                                                    <div class="contact2-form-bgbtn"></div>
                                                    <button class="contact2-form-btn" type="submit" onclick="return confirmar('¿Decea Enviar este correo al aspirante <?php echo $nombre . $apellido;?>?')">
                                                        Enviar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>        
                            </div>                    
                        </div>
                    </div>

    </div>
  </div>

  <div class="row">
    <div class="col-sm-5 col-md-6">

    <div class="card w-60 card__Rfinal__bg" >
            <div class="card-body card__altura__rFinal">
                 <div  style="border-radius:15px;">

                 <?php  
                           require_once("../modelo/conexion.php");

                           $db = new Conectar();
                   
                           $sql = $db->conexion();
                   
                           $consulta = $sql->query("select * from pruebas where cedula = '$cedula'");
                    
                    ?>

                    <table class="table text-white table-hover">
                        
                    <?php 
                    foreach($consulta as $datos):    
                    ?>

                   <?php $psicotecnico = $datos['psicotecnico'];
                         $personalidad = $datos['personalidad'];
                   
                   
                   ?> 


                    <?php 
                    endforeach;    
                    ?> 

                        <thead class="text-white bg-dark">
                            <tr>
                                <th>Nota</th>
                                <th>Cedula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><?php echo $nota;?> </td>
                                <td><?php echo $cedula;?> </td>
                                <td><?php echo $nombre;?> </td>
                                <td><?php echo $apellido;?> </td>
                            </tr>
                        </tbody>

                    </table>

                    <table class="table text-white table-hover">

                            <thead class="text-white bg-dark">
                               
                                    <h4 class="text-center text-dark">Datos Seccionados</h4>
                                    <tr>
                                        <th>
                                         Psicotecnico  
                                        </th>
                                    
                                    <th>
                                        Personalidad  
                                    </th>
                                    </tr>
                            </thead>
    
                            <tbody>
                                <tr>
                                    <td><?php echo $psicotecnico;?> </td>
                                    <td><?php echo $personalidad;?> </td>
                                   
                                </tr>
                            </tbody>
    
                        </table>

                 </div>
                 <div class="card bg-dark text-center">
                        <div class="card-body text-white">
                        El 80% del éxito se basa simplemente en insistir.
                        </div>
                        <div class="card-footer">
                        Woody Allen.
                        </div>
                </div>
            </div>
        </div>

       

    </div>
    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">

        <div class="card w-60 card__Rfinal__bg">
            <div class="card-body card__altura__rFinal" >

                <div id="container" ></div>

                
             
               
            </div>
        </div>
        
    </div>
  </div>
</div>


<script>

function confirmar(mensaje){

    return (confirm(mensaje))?true:false;

}

</script>

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
            text: 'Nota'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
            name: 'Puntaje Seccionado',
            
            data: [

                

                ['<?php echo 'PSICOTECNICO'; ?>', <?php echo $psicotecnico;?>  ],
                ['<?php echo 'PERSONALIDAD'; ?>', <?php echo $personalidad;?>  ],
                      
            ]
            
        }]
        
    });
});
		</script>
</html>