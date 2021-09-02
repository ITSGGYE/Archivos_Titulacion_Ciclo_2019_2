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
 <title>Conexión Vital</title>
   <link rel="icon" href="iconos/favicon.png" type="image" >

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="css/main.css">  
<body>
<?php

include ('nav.php');


?>
	<?php

include ('sidebar.php');


?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
			<i class="fa fa-user-o" aria-hidden="true"></i>
				</a></li>
				<li class="active">PACIENTES REGISTRADOS</li>
			</ol>
		</div><!--/.row-->
		

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="alert " style="font-size: 30px; letter-spacing: 5px; color:black;background: #cdd1da;"><center> <strong> LISTA DE PACIENTES REGISTRADO</strong></center>

<!-- /.Informacion-->



					</div>
					
				</div><!-- /.panel-->

				
				<div class="panel panel-default" >
				
					<div class="panel-body">
						<div class="col-md-15" >
	<!-- /.Informacion-->						

<br><br>
<div >
        <div>
                <div class="col-8">
                    <div class="table-responsive"> 
 <table id="example"  class="table table-striped table-bordered table-hover text-dark" style="text-align: center; font-weight: bold;" >
                              
 <thead>
 <tr style="background:#222222;color:white; ">
                                 <th scope="col">#</th>
    
      <th scope="col">Cedula</th>
      <th scope="col">Nombre Paciente</th>
       <th scope="col">Correo</th>
        <th scope="col">Contraseña</th>
        
                                    </tr>
                                </thead>
<tbody>
   <!-- REGISTROS DE BD -->                                
   <?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM paciente;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>


<?php
foreach($paciente as $row) {?>



            <tr >
              <td><?php echo $row->id_paciente?></td>                                   
      <td><?php echo $row->cedula?></td>
      <td><?php echo $row->nombre_apellido?></td>
      <td><?php echo $row->correo?></td> 
                                  
<td><?php echo $row->contrasena?></td>


                                    </tr>
           

	
<?php }?>

 </tbody>
 </table>

       </div>
                </div>
        </div>  
    </div>    
      











 </div>














						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			

			<div class="col-sm-12">
				<p class="back-link">Fundación Conexión Vital   <a href="index.php">Andrea Hernandez Gerente</a></p>
			</div>

		</div><!-- /.row -->
	</div><!--/.main-->
	
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
