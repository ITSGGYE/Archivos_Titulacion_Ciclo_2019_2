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
                        <center> <h2 id="titulo" class="box-title"><b> Valoracion de los Pacientes </b> </h2> </center>
                         <h1 id="titulo_formulario" class="box-title">Registro de Signos Vitales</h1>
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
                            <th>Cedula</th>
                            <th>Paciente</th>
                            <th>Medico</th>
                            <th>Especialidad</th>
                            <th>Registrador</th>
                            <th>Costo</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 600px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Medico:</label>    
                            <input type="text" style="background:white;" class="form-control" maxlength="50" name="medico" id="medico" disabled>
                            </div> 

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Especialidad:</label>
                            <input type="text" style="background:white;" class="form-control" maxlength="50" name="especialidad" id="especialidad" disabled>
                            </div>     

                        <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Paciente(*):</label>
                            <input type="hidden" name="idficha_medica" id="idficha_medica">
                            <input type="hidden" class="form-control" maxlength="10" name="agenda_id" id="agenda_id">  
                            <select name="paciente_cod" style="background:white;" id="paciente_cod"   size="2" class="form-control selectpicker" data-live-search="true" required disabled>
                            </select>
                          </div>
              
                          <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-4">
                              <label>Edad</label>
                              <div class="col-10">
                                <input class="form-control" style="background:white;" type="text" name="Edad" id="Edad"  disabled/>
                              </div>
                                </div>
                           
                        <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                              <label>Fecha de Cita:</label>
                              <div class="col-10">
                                <input class="form-control" style="background:white;" type="text" name="fecha_cita" id="fecha_cita" required disabled/>
                              </div>
                                </div>

                                <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                              <label>Hora de la Cita:</label>
                              <div class="col-10">
                                <input class="form-control" style="background:white;" type="text" name="hora_cita" id="hora_cita" required disabled/>
                              </div>
                                </div>


                            <div class="inputWithIcon form-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <label>Asunto de la Cita:</label>
                            <input type="text" style="background:white;" class="form-control"  name="asunto" id="asunto" disabled>  
                          </div>

                          <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Peso: (Kg)</label>
                            <input type="text" class="form-control" maxlength="2" name="peso" id="peso" placeholder="Peso" require>
                
                          </div>

                            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Talla: (cm)</label>
                            <input type="text" class="form-control" maxlength="3" name="talla" id="talla" placeholder="Talla" require>
                            </div> 


                            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Presion Arterial :(mmHg)</label>
                            <input type="text" class="form-control" maxlength="3" name="presion_art" id="presion_art" placeholder="Presion Arterial" require>
                            </div> 

                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Alergias:</label>
                            <input type="text" class="form-control" maxlength="50" name="alergias" id="alergias" placeholder="Alergias">
                            </div> 

                            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label>Temperatura (Cº):</label>
                            <input type="text" class="form-control" maxlength="2" name="temperatura" id="temperatura" placeholder="Temperatura">
                            </div> 

                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Habitos:</label>
                            <input type="text" class="form-control" maxlength="50" name="habitos" id="habitos" placeholder="habitos" placeholder="Habitos">
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
<script type="text/javascript" src="scripts/ficha_medica.js"></script>

<?php 
}
ob_end_flush();
?>