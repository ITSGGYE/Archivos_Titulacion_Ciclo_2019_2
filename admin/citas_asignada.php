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
	<link rel="stylesheet" type="text/css" href="datatables/buttons.dataTables.min.css" />
    <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">


</head>
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
			<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
				</a></li>
				<li class="active">Citas</li>
			</ol>
		</div><!--/.row-->
		

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;"><center> <strong> LISTA DE CITAS ASIGNADAS</strong></center>

<!-- /.Informacion-->



					</div>
					
				</div><!-- /.panel-->

				
				<div class="panel panel-default" >
				
					<div class="panel-body">
						<div class="col-md-15" >
	<!-- /.Informacion-->						


<div >
        <div>
                <div class="col-8">
                    <div class="table-responsive"> 
 <table id="example" class="table table-striped table-bordered table-hover  text-dark" style="text-align: center; font-weight: bold;" >
                              
 <thead>
 <tr style="background:#222222;color:white; ">
                                 <th scope="col">#</th>
    
         <th scope="col">Cedula</th>

      <th scope="col">Paciente</th>
       
       
         <th scope="col">Especialidad del Especialista</th>
         <th scope="col">Especialista</th>
        <th scope="col">Fecha</th>

       <th scope="col">Hora</th>
   <th scope="col">Estado</th>
   <th scope="col">Observacion</th>
   
    
          
                                    </tr>
                                </thead>
<tbody>
   <!-- REGISTROS DE BD -->                                
   <?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * 
  FROM cita c
  JOIN paciente p
  ON c.id_paciente=p.id_paciente
  JOIN especialista e
  ON c.id_especialista =e.id_especialista

  JOIN especialidad d
  ON  e.id_especialidad=d.id_especialidad
  WHERE c.estado='asignado'
ORDER BY c.id_cita




  ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>


<?php
foreach($paciente as $row) {?>



            <tr >
              <td><?php echo $row->id_cita?></td>                                   
    <td><?php echo $row->cedula?></td>
      <td><?php echo $row->nombre_apellido?></td>
 
     
         <td><?php echo $row->nombre_especialidad?></td>
         <td><?php echo $row->nombre_doctor?></td>
      <td><?php echo $row->fecha?></td> 
      <td><?php echo $row->hora?></td> 
              
<td><?php echo $row->estado?></td>
<td><?php echo $row->observacion?></td>



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
	<script src="datatables/dataTables.buttons.min.js"></script>
    <script src="datatables/buttons.flash.min.js"></script>
    <script src="datatables/jszip.min.js"></script>
    <script src="datatables/pdfmake.min.js"></script>
    <script src="datatables/vfs_fonts.js"></script>
    <script src="datatables/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 
<script type="text/javascript" src="js/main.js"></script>  





</body>
</html>
