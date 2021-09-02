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

  if ($_SESSION['Horarios']==1)
{

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
                    <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Registrar Horario</button>
                        
                    <center> <h2 id="titulo" class="box-title"><b> Horario de Atencion de los Medicos </b> </h2> </center>
                    <h1 id="titulo_formulario" class="box-title">Nuevo Horario <br> &nbsp <br> </h1> 
                    <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                           <th>Opcion</th>
                             <th>Cod</th>
                             <th>Medico</th>
                             <th>Dia</th>
                             <th>Atencion</th>
                            <th>Tiempo de Cita</th>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 600px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">

                        <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Medico(*):</label>
                            <input type="hidden" name="idhorario" id="idhorario">
                            <select name="medico_id" id="medico_id"  class="form-control selectpicker" data-live-search="true" required>
                            </select>
                          </div>


                          <div class="inputWithIcon form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Dias Disponibles(*):</label>
                            <select name="cod_dia" id="cod_dia"  class="form-control" required>
                            </select>
                          </div>

                                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-6">
                              <label>Hora de Inicio</label>
                              <div class="col-10">
                                <input class="form-control" type="time" name="hora_inicio" id="hora_inicio"  
                                required/>
                              </div>
                                </div> 
 
                                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-6">
                              <label>Hora de Fin</label>
                              <div class="col-10">
                                <input class="form-control" type="time" name="hora_fin" id="hora_fin"  
                                required/>
                              </div>
                                </div> 
                    
                            
                                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <label>Intervalo</label>
                              <div class="col-10">
                                <input class="form-control" type="number" name="intervalo" id="intervalo"  
                                required/>
                              </div>
                                </div> 



                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button id="btnCancelar" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
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
<script type="text/javascript" src="scripts/horario.js"></script>

<?php 
}
ob_end_flush();
?>