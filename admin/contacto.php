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
 <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/main.css">  
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
		<i class="fa fa-address-book-o" aria-hidden="true"></i>
				</a></li>
				<li class="active">Contactos</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;"><center> <strong> LISTA DE CONTACTOS</strong></center>
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
                        <table id="example" class="table table-striped table-bordered text-dark" style="text-align: center; font-weight: bold;">
                        <thead>
                       <tr style="background:#222222;color:white; ">
                                 <th scope="col">#</th>

      <th scope="col">Nombre de Contacto</th>
       <th scope="col">Celular</th>

                 <th scope="col">Correo Electrónico</th>
           <th scope="col">Mensaje</th> 
    
           <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                        <tbody>       <?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM contacto;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>
            <?php
foreach($paciente as $row) {?>

                    <tr >
              <td><?php echo $row->id_contacto?></td>                                   
      <td><?php echo $row->nombre_contacto?></td>
      <td><?php echo $row->telefono?></td>
      <td><?php echo $row->correo?></td> 
                                  
   <td><?php echo $row->mensaje?></td> 


<td><button class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar">
                             Eliminar
                            </button> </td>
                                    </tr>
           

    
<?php }?>
                        </tbody>        
                       </table>                  
                    </div>
                </div>
        </div>  
    </div>    
      




<!-- Modal Eliminar -->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true" style="font-size: 40px;">&times;</span>
        </button> 


      








      	   <div style="background:   #222222
;color:white;letter-spacing: 10px;" class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel"><center>ELIMINAR CONTACTO</center></h5></strong></div>
       












        <br>
        
        <br>
            
      </div>
     

      <div class="modal-body">
       <!----- Formulario  ---->




<form action="eliminar_contacto.php" method="POST" >

<input type="hidden" name="id" id="delete_id" >




<center>
<p style="font-size: 22px;"   >Estas Seguro de Eliminar </strong> ?</p>

</center>
       <br>     
  <div class="modal-footer">       <br>
        <button style="color: white; font-weight: bold; " type="button" class="btn btn-danger" data-dismiss="modal">No</button>
   
   <button type="submit" style="color: black; background:#ff7655; " class="btn ">Si</button>

      </div>

</form>

</div>

    
    </div>
  </div>
</div>


<!-- /.Termina modal modificar-->
 </div>

						</div>
					</div>
				</div>
			</div>
			

			<div class="col-sm-12">
				<p class="back-link">Fundación Conexión Vital   <a href="index.php">Andrea Hernandez Gerente</a></p>
			</div>

		</div>
	</div>
	
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
<script>
	
$('.deletebtn').on('click',function () {

$tr=$(this).closest('tr');

var datos=$tr.children("td").map(function () {

return $(this).text();

});

$('#delete_id').val(datos[0]);
});

</script>
</body>
</html>
