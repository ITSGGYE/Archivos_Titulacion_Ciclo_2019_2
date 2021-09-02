<?php

ob_start();
session_start();



if(!isset($_SESSION["per_nombre"]))
{
  header("Location: login.html");
}
else
{
  require 'header.php';

  if ($_SESSION['Citas']==1)
{

//Incluímos la clase Agenda
require_once "../modelos/Paciente.php";
//Instanaciamos a la clase con el objeto Agenda
$paciente = new Paciente();
//En el objeto $rspta Obtenemos los valores devueltos del método Agenda
$rspta = $paciente->historial_paciente($_GET["id"]);
//Recorremos todos los valores obtenidos



?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                        <center> <h2 id="titulo" class="box-title"><b> Historial de Citas del Paciente: </b></h2> </center>
                        <a href="paciente.php">  <button class="btn btn-info" type="button"><i class="fa fa-arrow-circle-left"></i> Regresar</button> </a> 
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->


                    <?php 
                     

                      
                      while($reg=$rspta->fetch_object()){

                        $historia='../Reportes/historia.php?id=';
                        $receta='../Reportes/receta.php?id=';
                                           
                     ?>
                    
                    
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">                                                                
                          <tbody>
                          <tr>
                          <td><?php echo $reg->fecha_cita.' '.$reg->hora_cita; ?></td>
                          <td><?php echo '&nbsp <a target="_blank" href="'.$historia.$reg->agenda_id.'"  <button class="btn btn-primary"><i class="fa fa-file-pdf-o">
				              Historia Clinica </i></button>' ?></td>
                          <td><?php echo '&nbsp <a target="_blank" href="'.$receta.$reg->agenda_id.'"  <button class="btn btn-danger"><i class="fa fa-file-pdf-o">
				              Receta Medica </i></button>' ?></td>
                          </tr>
                          </tbody>
                          </table>
                    </div>
                      <?php
                        }
                      
                         ?>   
         
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



<?php 
}
ob_end_flush();
?>