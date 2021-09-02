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
                          <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agendar Cita</button>
                          <center> <h2 id="titulo" class="box-title"><b> Citas Medicas Registradas </b> </h2> </center>
                          <h1 id="titulo_formulario" class="box-title">Registrar Cita <br> &nbsp <br> 
                          
                          <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                             <th>opcion</th>
                            <th>Fecha</th>
                            <th>Paciente</th>
                            <th>Medico</th>
                            <th>Especialidad</th>
                            <th>Registrador</th>
                            <th>Costo</th>
                            <th>Pago</th>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 600px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">


                        
                        <div class="inputWithIcon form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div class="form-inline" id="cabecera">   
                        <label>Cedula o Nombres del Paciente (*):</label>
                            <input type="text" class="form-control" name="busqueda" id="busqueda" required="">
                            <button type="button" onclick="buscarpaciente()" class="btn btn-success"> <span class="fa fa-search"></span> 
                          </button>
                        </div>
                          </div>

                        

                        <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label> Paciente </label>
                            <select name="paciente" id="paciente" class="form-control" style="appearance: none;
	                           -webkit-appearance: none; -moz-appearance: none;" required>
                            </select>
                          </div>

                        
                           <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Especialidad(*):</label>
                            <select name="esp_id" id="esp_id" style="display:none" class="form-control selectpicker" data-live-search="true" required="">
                            </select>
                          </div>

                          <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Medico(*):</label>
                            <select name="medico_id" id="medico_id" class="form-control" required>
                              </select>
                          </div>
                        

                             <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <label>Fecha de la Cita</label>
                              <div class="col-10">
                                <input class="form-control" type="date" name="fecha_cita" id="fecha_cita"  required min="<?php date_default_timezone_set("America/Guayaquil"); $hoy=date("Y-m-d"); echo $hoy;?>"/>
                              </div>
                                </div>
   

                            <div class="inputWithIcon form-group col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <label>Hora(*):</label>
                            <select name="idhorario" id="idhorario" class="form-control" >
                              </select>
                            </div>
                            
                              <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <label>Costo(*):</label>
                            <input type="num" step="0.01" step="0,01" name="costo_cita" id="costo_cita" class="form-control" required="">
                            </div>

                            

                            <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <label>Asunto:</label>
                            <input type="text" class="form-control" name="asunto" id="asunto" maxlength="150">
                            </div> 

                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Estado de Pago:</label>
                            <select name="estado_pago" id="estado_pago" class="form-control" required>
                               <option value="Pendiente">Pendiente</option>
                               <option value="Pagado">Pagado</option>                          
                              </select>
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
<script type="text/javascript" src="scripts/agenda.js"></script>

<?php 
}
ob_end_flush();
?>