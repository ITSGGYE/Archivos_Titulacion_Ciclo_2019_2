<?php  
session_start();
if (!isset($_SESSION['nombre'])) {
  header('Location: ../index.html');
  
}
?>
<?php
require_once('conexion.php');
$sql = "SELECT * 
FROM cita c
JOIN paciente p
ON c.paciente=p.id_paciente
JOIN especialista e
ON c.id_especialista =e.id_especialista
JOIN especialidad d
ON  e.id_especialidad=d.id_especialidad
WHERE cit_estado='asignado'
ORDER BY c.id_cita";
$req = $bd->prepare($sql);
$req->execute();
$events = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Consultorio Odontologia</title>
  <link rel="icon" href="img/logooo.png" type="image" >
  <link rel="stylesheet" href="css/iconos.css">
  <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrapp.min.css" rel="stylesheet">
  
  <!-- FullCalendar -->
  <link href='css/fullcalendar.css' rel='stylesheet' />
  <!-- Custom CSS -->
</head>
<body>
  <?php
  include ('nav.php');
  ?>
  <?php
  include ('iconos.php');
  ?><div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <section  class="section">
            <div   class="wrapp">
              <article class="articles" >
                <div class="mensaje">
                  <h2>CALENDARIO</h2>
                </div>
               
                  <div  id="calendar" class="container-fluid">
                    <!-- Modal -->
                    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form class="form-horizontal" method="POST" action="">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <center>
                                <h4  class="modal-title text-info" style="font-weight: bold;" id="myModalLabel">INFORMACION DE SU CITA</h4>
                              </center>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Paciente</label>
                                <div class="col-sm-10">
                                  <input  type="text" name="title" class="form-control" id="title"   readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="especialidad" class="col-sm-2 control-label">Especialidad</label>
                                <div class="col-sm-10">
                                  <input  type="text" name="especialidad" class="form-control" id="especialidad"   readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="especialista" class="col-sm-2 control-label">Especialista</label>
                                <div class="col-sm-10">
                                  <input  type="text" name="especialista" class="form-control" id="especialista"   readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="fecha" class="col-sm-2 control-label">Fecha</label>
                                <div class="col-sm-10">
                                  <input  type="date" name="fecha" class="form-control" id="fecha"   readonly>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="hora" class="col-sm-2 control-label">Hora</label>
                                <div class="col-sm-10">
                                  <select name="hora" id="hora" class="form-control" disabled="" >
                                    <option   value="09:00-09:20" >09:00-09:20</option>
                                    <option  value="09:30-09:50" >09:30-09:50</option>
                                    <option  value="10:00-10:20">10:00-10:20</option>
                                    <option  value="10:30-10:50" >10:30-10:50</option>
                                    <option  value="11:00-11:20" >11:00-11:20</option>
                                    <option  value="11:30-11:50" >11:30-11:50</option>
                                    <option  disabled>NO DISPONIBLE (12:00 A 13:50)</option>
                                    <option  value="14:00-14:20" >14:00-14:20</option>
                                    <option  value="14:30-14:50" >14:30-14:50</option>
                                    <option  value="15:00-15:20" >15:00-15:20</option>
                                    <option  value="15:30-15:50" >15:30-15:50</option>
                                    <option  value="16:00-16:20" >16:00-16:20</option>
                                    <option  value="16:30-16:50" >16:30-16:50</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="estado" class="col-sm-2 control-label">Estado</label>
                                <div class="col-sm-10">
                                  <select name="estado" id="estado" class="form-control" disabled="">
                                   <option  value="Asignado">Asignado</option>
                                 </select>
                               </div>
                             </div>
                             <div class="form-group">
                              <label for="observacion" class="col-sm-2 control-label">Observacion</label>
                              <div class="col-sm-10">
                              <input  type="text" name="observacion" class="form-control" id="observacion"   readonly>
                             </div>
                           </div>
                           <div class="form-group">
                            <label for="color" class="col-sm-2 control-label">Color</label>
                            <div class="col-sm-10">
                              <select name="color" class="form-control" id="color" disabled="">
                                <option value="">Seleccionar</option>
                                <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
                                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                                <option style="color:#008000;" value="#008000">&#9724; Verde</option>             
                                <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                                <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                                <option style="color:#000;" value="#000">&#9724; Negro</option>
                              </select>
                            </div>
                            <input type="hidden" name="id" class="form-control" id="id">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  <div class="col-sm-12">
          <p style="color: black;font-weight: bold;" class="back-link">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Derechos Reservados | Consultorio Odontologico Smile dental.  </p></div>
        </article></div></section>
      </div><!--/.row-->
    </div>  <!--/.main-->
    <!-- jQuery Version 1.11.1 -->
    <script src="js/js1/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/js1/bootstrap.min.js"></script>
    <!-- FullCalendar -->
    <script src='js/js1/moment.min.js'></script>
    <script src='js/js1/fullcalendar/fullcalendar.min.js'></script>
    <script src='js/js1/fullcalendar/fullcalendar.js'></script>
    <script src='js/js1/fullcalendar/locale/es.js'></script>
    <!-- FullCalendar -->
    <script src='js/js1/moment.min.js'></script>
    <script src='js/js1/fullcalendar/fullcalendar.min.js'></script>
    <script src='js/js1/fullcalendar/fullcalendar.js'></script>
    <script src='js/js1/fullcalendar/locale/es.js'></script>
    <!-- datatables JS -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
      $(document).ready(function() {
        var date = new Date();
        var yyyy = date.getFullYear().toString();
        var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
        var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
        $('#calendar').fullCalendar({
          header: {
           language: 'es',
           left: 'prev,next today',
           center: 'title',
           right: 'month,basicWeek,basicDay',
         },
         eventRender: function(event, element) {
          element.bind('dblclick', function() {
            $('#ModalEdit #id').val(event.id);
            $('#ModalEdit #title').val(event.title);
            $('#ModalEdit #especialidad').val(event.especialidad);
            $('#ModalEdit #especialista').val(event.especialista);
            $('#ModalEdit #fecha').val(event.fecha);
            $('#ModalEdit #hora').val(event.hora);
            $('#ModalEdit #estado').val(event.estado);
            $('#ModalEdit #observacion').val(event.observacion);
            $('#ModalEdit #color').val(event.color);
            $('#ModalEdit').modal('show');
          });
        },
        events: [
        <?php foreach($events as $event): 
          $fecha = explode(" ", $event['fecha']);
          if($fecha[1] == ''){
            $fecha = $fecha[0];
          }
          ?>
          {
            id: '<?php echo $event['id_cita']; ?>',
            title: '<?php echo $event['nombre_apellido']; ?>',
            start: '<?php echo $fecha; ?>',        
            especialidad: '<?php echo $event['nombre_especialidad']; ?>',
            especialista: '<?php echo $event['nombre_doctor']; ?>',
            fecha: '<?php echo $event['fecha']; ?>',
            hora: '<?php echo $event['hora']; ?>',
            estado: '<?php echo $event['cit_estado']; ?>',
            observacion: '<?php echo $event['cit_observacion']; ?>',
            color: '<?php echo $event['color']; ?>',
          },
        <?php endforeach; ?>
        ]
      });
      });
    </script>
  </body>
  </html>
