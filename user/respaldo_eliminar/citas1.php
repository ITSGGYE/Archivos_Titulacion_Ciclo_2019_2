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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="functions.js"></script>
       <script src="functions_e.js"></script>
  
  <!--Custom Font-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
        </a></li>
        <li class="active">Citas</li>
      </ol>
    </div><!--/.row-->
    

    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default ">
          <div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;"><center> <strong> LISTA DE CITAS</strong></center>

<!-- /.Informacion-->



          </div>
          
        </div><!-- /.panel-->

        
        <div class="panel panel-default" >
        
          <div class="panel-body">
            <div class="col-md-15" >
  <!-- /.Informacion-->           



  <div class="hero-unit-table">  




      <!--BUTTON MODAL -->
<button style="color: white; background:#ff7655;" type="button" class="btn " data-toggle="modal" data-target="#insertar">
Nueva Cita
</button>

<br><br>
<div >
        <div>
                <div class="col-8">
                    <div class="table-responsive"> 
 <table id="example" class="table table-striped table-bordered table-hover  text-dark" style="text-align: center; font-weight: bold;"   >
                              
 <thead>
 <tr style="background:#222222;color:white; text-align: center; ">
                         
    
      

      <th scope="col"  >Paciente</th>
       
       
         <th scope="col">Especialidad del Especialista</th>
         <th scope="col">Especialista</th>
        <th scope="col">Fecha</th>

       <th scope="col">Hora</th>
   <th scope="col">Estado</th>
   <th scope="col">Observacion</th>
   
          <th scope="col">Reporte</th>
           <th scope="col">Eliminar</th>
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

WHERE  c.estado='asignado'


AND p.correo= '".$_SESSION['nombre']."'

ORDER BY c.id_cita

  ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>


<?php
foreach($paciente as $row) {?>



            <tr >
                                         

      <td><?php echo $row->nombre_apellido?></td>
 
     
         <td><?php echo $row->nombre_especialidad?></td>
         <td><?php echo $row->nombre_doctor?></td>
      <td><?php echo $row->fecha?></td> 
      <td><?php echo $row->hora?></td> 
              
<td><?php echo $row->estado?></td>
<td><?php echo $row->observacion?></td>

<td> <a href="reporte_pdf.php?id=<?php echo $row->id_cita?>" class="btn btn-warning"  target="_blank" ><span class="glyphicon glyphicon-file"></span> Reporte</a> </td>





<td>


<a class="btn btn-danger"style="color: white;" href="eliminar.php?id=<?php echo $row->id_cita?>">Eliminar</a>
            </center> </td>


                          </td>
                                    </tr>
           

  
<?php }?>

 </tbody>
 </table>


<!-- Modal Insertar -->
<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true" style="font-size: 40px;">&times;</span>
        </button> 
           <div style="background:   #222222
;color:white;letter-spacing: 12px;" class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel"><center>AGREGAR CITA</center></h5></strong></div>
       
        <br>
        
        <br>
           
      </div>
     

 <div class="modal-body">
       <!----- Formulario  ---->
<form action="registrar_citas.php" method="POST" enctype="multipart/form-data">





<div class="form-group">
     <?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * 
  FROM 
  paciente WHERE correo= '".$_SESSION['nombre']."'



  ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$pa=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>
         
            <label>PACIENTE</label>
            <select name="nombre"  class="form-control" readonly>
      
                <?php foreach($pa as $row): ?>
                    <option value="<?php echo $row->id_paciente; ?>" ><?php echo $row->nombre_apellido; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

<div class="form-group">
<label for="">Especialidad del Especialista</label>
      <select name="nombrecapa" id="nombrecapa" class="form-control">
  <option value="">Seleccione la especialidad de cita</option>
</select>



 </div>


 <div class="form-group">
<label for=""></label>
        <select name="curso" id="curso" class="form-control">

</select>
        
 </div>


<div class="form-group">
<label for="">FECHA</label>
<input  class="form-control" type="date" name="fecha" class="form-control">

 </div>


<div class="form-group">
<label for="">Hora (Elija entre (11:45-20:30))</label>
  <input  class="form-control" type="time" name="hora"  max="20:30" min="11:45" step="60" placeholder="" required>
 </div>





<div class="form-group">
<label for="">ESTADO</label>

  <select name="estado" class="form-control" >
 <option  value="Asignado">Asignado</option>

 </select>
 
 </div>


<div class="form-group">
 <label>Motivo</label>
                        <textarea placeholder="Expresion:" name="observacion"  class="form-control"></textarea>
</div>

  
 
    

       <br>     
  <div class="modal-footer">       <br>
        <button style="color: white; font-weight: bold; " type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar</button>
        <button 

style="color: black; background:#ff7655; "


         type="submit" class="btn ">Guardar Cita</button>
      </div>

</form>  <!----- Formulario  ---->
</div>  <!----- Div form-group  ---->



     

    </div>
  </div>
</div>















            </div>
          </div>
        </div><!-- /.panel-->
      </div><!-- /.col-->
      <br>
  <div>
      <div class="col-sm-12"><br>
        <p class="back-link">Fundación Conexión Vital   <a href="index.php">Andrea Hernandez Gerente</a></p>
      </div>
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
