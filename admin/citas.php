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
      <link rel="icon" href="iconos/favicon.png" type="image">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/datepicker3.css" rel="stylesheet">
      <link href="css/styles.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <link href="css/toastr.css" rel="stylesheet">
      <script src="js/toastr.min.js"></script>
      <!--Custom Font-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <!--datables CSS básico-->
      <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
      <!--datables estilo bootstrap 4 CSS-->
      <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="datatables/buttons.dataTables.min.css" />
      <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
      <link rel="stylesheet" href="css/main.css">
      <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/tooltip.js"></script>
   </head>
   <body>
      <?php include('nav.php');
         include('sidebar.php');
         ?>
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <div class="row">
         <ol class="breadcrumb">
            <li>
               <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            </li>
            <li class="active">Citas</li>
         </ol>
      </div>
      <div class="row">
      <div class="col-lg-12">
      <div class="panel panel-default ">
         <div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;">
            <center> <strong> LISTA DE CITAS</strong></center>
         </div>
      </div>
      <div class="panel panel-default">
      <div class="panel-body">
         <div class="col-md-15">
            <div class="hero-unit-table">
               <button style="color: white; background:#ff7655;" type="button" class="btn " data-toggle="modal" data-target="#insertar">
               Nueva Cita
               </button><br><br>
               <div>
                  <div>
                     <div class="col-8">
                        <div class="table-responsive">
                           <table id="example" class="table table-striped table-bordered table-hover  text-dark" style="text-align: center; font-weight: bold;">
                              <thead>
                                 <tr style="background:#222222;color:white; text-align: center; ">
                                    <th scope="col">#</th>
                                    <th style="text-align: center;padding-left: 10px;">Paciente </th>
                                    <th style="visibility:collapse;display: none;">IDPaciente </th>
                                    <th style="visibility:collapse;display: none;">IDEspecialidad </th>
                                    <th style="visibility:collapse;display: none;">IDEspecialista </th>
                                    <th style="text-align: center;padding-left: 10px;">Especialidad</th>
                                    <th style="text-align: center;padding-left: 10px;">Especialista</th>
                                    <th style="text-align: center;padding-left: 10px;">Fecha</th>
                                    <th style="text-align: center;padding-left: 10px;">Hora</th>
                                    <th style="text-align: center;padding-left: 10px;">Estado</th>
                                    <th style="text-align: center;padding-left: 10px;">Observacion</th>
                                    <th style="text-align: center;padding-left: 10px;">Acciones</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <!-- REGISTROS DE BD -->
                                 <?php
                                    include_once("conexion.php");
                                    $sentencia = $bd->query("SELECT * 
                                    FROM cita c
                                    JOIN paciente p
                                    ON c.id_paciente=p.id_paciente
                                    JOIN especialista e
                                    ON c.id_especialista =e.id_especialista
                                    JOIN especialidad d
                                    ON  e.id_especialidad=d.id_especialidad
                                    WHERE c.id_paciente
                                    ORDER BY c.id_cita asc;");
                                    //FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                                    $paciente = $sentencia->fetchAll(PDO::FETCH_OBJ);
                                    //print_r($var);
                                    ?>
                                 <?php
                                    foreach ($paciente as $row) { $estado = $row->estado; ?>
                                 <tr >
                                    <td style="width: 5%;"><?php echo $row->id_cita ?></td>
                                    <td style="visibility:collapse;display: none;"><?php echo $row->id_paciente ?></td>
                                    <td style="visibility:collapse;display: none;"><?php echo $row->id_especialidad ?></td>
                                    <td style="visibility:collapse;display: none;"><?php echo $row->id_especialista ?></td>
                                    <td style="width: 16%;"><?php echo $row->nombre_apellido ?></td>
                                    <td style="width: 16%;"><?php echo $row->nombre_especialidad ?></td>
                                    <td style="width: 16%;"><?php echo $row->nombre_doctor ?></td>
                                    <td style="width: 6%;"><?php echo $row->fecha ?></td>
                                    <td style="width: 6%;"><?php echo $row->hora ?></td>
                                    <td  style="width: 8%;"><?php echo $row->estado ?></td>
                                    <td  style="width: 20%;"><?php echo $row->observacion ?></td>
                                    <?php  if ($estado == 'atendido'){ ?>
                                    <td style="width: 15%;">
                                       <span data-toggle="modal" data-target="#editarCitas"><button disabled style="font-size: 14px;" type="button" class="btn btn-info editCita" id="editBoton"data-toggle="tooltip" title="Editar Cita">
                                       <i class="fa fa-pencil" aria-hidden="true"></i></button></span>
                                       <button class="btn btn-danger deletebtn" data-toggle="tooltip" title="Cancelar Cita" disabled><i class="fa fa-ban" aria-hidden="true"></i></button>
                                    </td>
                                    <?php } else{ ?>
                                    <td style="width: 15%;">
                                       <span data-toggle="modal" data-target="#editarCitas"><button style="font-size: 14px;" type="button" class="btn btn-info editCita" id="editBoton"data-toggle="tooltip" title="Editar Cita">
                                       <i class="fa fa-pencil" aria-hidden="true"></i></button></span>
                                       <button class="btn btn-danger deletebtn" data-toggle="tooltip" title="Cancelar Cita"><i class="fa fa-ban" aria-hidden="true"></i></button>
                                    </td>
                                    <?php } ?>
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                           <!-- Modal Insertar -->
                           <div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarForm()">
                                       <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                                       </button>
                                       <div style="background:#222222;color:white;letter-spacing: 12px;" class="alert ">
                                          <strong>
                                             <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel">
                                                <center>AGREGAR CITA</center>
                                             </h5>
                                          </strong>
                                       </div>
                                       <br> <br>
                                    </div>
                                    <div class="modal-body">
                                       <div class="form-group">
                                          <?php include_once("conexion.php");
                                             $sentencia = $bd->query("SELECT * FROM paciente;");
                                             $pa = $sentencia->fetchAll(PDO::FETCH_OBJ);
                                             ?>
                                          <label> Paciente</label>
                                          <select name="nombre" id="idpaciente" class="form-control">
                                             <option value="">Seleccione paciente</option>
                                             <?php foreach ($pa as $row) : ?>
                                             <option value="<?php echo $row->id_paciente; ?>"><?php echo $row->nombre_apellido; ?></option>
                                             <?php endforeach; ?>
                                          </select>
                                       </div>
                                       <div class="form-group">
                                          <label for="">Especialidad</label>
                                          <select name="nombrecapa" id="idEspecialidad" class="form-control" disabled>
                                             <option value="">Seleccione Especialidad</option>
                                             <?php $sql = $bd->query("SELECT * FROM especialidad");
                                                $especilaidad = $sql->fetchAll(PDO::FETCH_OBJ);
                                                foreach ($especilaidad as $row) : ?>
                                             <option value="<?php echo $row->id_especialidad; ?>"><?php echo $row->nombre_especialidad; ?></option>
                                             <?php endforeach; ?>
                                          </select>
                                       </div>
                                       <div class="form-group">
                                          <label for="">Especialista</label>
                                          <select name="especialista" id="idEspecialista" class="form-control" disabled>
                                             <option value=""></option>
                                          </select>
                                       </div>
                                       <?php
                                          $hora1 = '11:45';
                                          $hora2 = '20:30';
                                          $intervarlo = '5';
                                          $Inicio = new DateTime($hora1);
                                          $fechaFin = new DateTime($hora2);
                                          $fechaFin = $fechaFin->modify('+5 minutes');
                                          $fechasPeriodo = new DatePeriod($Inicio, new DateInterval('PT45M'), $fechaFin);
                                          date_default_timezone_set('America/Guayaquil');
                                          ?>
                                       <div class="form-group">
                                          <label for="">FECHA</label>
                                          <input min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>" class="form-control" type="date" name="fecha" id="fecha" disabled>
                                       </div>
                                       <div class="form-group">
                                          <label for="">Hora (11:45-20:30)</label>
                                          <select id="idHora" name="hora" class="form-control" disabled>
                                             <option value="">Seleccione horas disponible</option>
                                             <?php foreach ($fechasPeriodo as $fecha) : ?>
                                             <option value="<?php echo $fecha->format("H:i:s"); ?>"><?php echo $fecha->format("H:i:s"); ?></option>
                                             <?php endforeach; ?>
                                          </select>
                                       </div>
                                       <div class="form-group">
                                          <label for="">ESTADO</label>
                                          <input class="form-control" type="text" name="estado" id="idestado" value="Asignado" readonly>
                                       </div>
                                       <div class="form-group">
                                          <label>Observaciones:</label>
                                          <textarea placeholder="Observacion:" name="observacion" id="idobservacion" class="form-control" disabled><?php echo $row->observacion; ?></textarea>
                                       </div>
                                       <br>
                                       <div class="modal-footer"><br>
                                          <button style="color: white; font-weight: bold;" type="button" onclick="limpiarForm()" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                          <button style="color: black; background:#ff7655;" type="submit" id="guardarCita" onclick="validaGuardarCita()" class="btn ">Guardar Cita</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php include 'edita_cita.php'; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <br>
            <div>
               <div class="col-sm-12">
                  <br>
                  <p class="back-link">Fundación Conexión Vital<a href="index.php">Andrea Hernandez Gerente</a></p>
               </div>
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
      <script src="datatables/dataTables.buttons.min.js"></script>
      <script src="datatables/buttons.flash.min.js"></script>
      <script src="datatables/jszip.min.js"></script>
      <script src="datatables/pdfmake.min.js"></script>
      <script src="datatables/vfs_fonts.js"></script>
      <script src="datatables/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
      <script src="js/userCitaEdit.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
   </body>
</html>

