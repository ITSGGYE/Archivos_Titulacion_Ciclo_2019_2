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

  if ($_SESSION['Consulta Medica']==1)
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
                          <h1 id="titulo" class="box-title">Consultas Dr(a). <?php echo $_SESSION["per_nombre"].' '.$_SESSION["per_apellido"];  ?> </h1>
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
                            <label>Paciente (*):</label>
                            <input type="hidden" name="idficha_medica" id="idficha_medica">
                            <input type="hidden" class="form-control" maxlength="10" name="agenda_id" id="agenda_id">  
                            <input type="hidden" class="form-control" name="idconsulta" id="idconsulta">
                            <select name="paciente_cod" id="paciente_cod"   size="2" class="form-control selectpicker" data-live-search="true" required disabled>
                            </select>
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

                              

                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Peso (Kg) : </label>
                            <input type="text" style="background:white;" class="form-control" maxlength="2" name="peso" id="peso" placeholder="Peso" disabled>
                
                          </div>

                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Talla (cm) : </label>
                            <input type="text" style="background:white;" class="form-control" maxlength="3" name="talla" id="talla" placeholder="Talla" disabled>
                            </div> 

                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Alergias : </label>
                            <input type="text" style="background:white;" class="form-control" maxlength="3" name="alergias" id="alergias" placeholder="" disabled> 
                            </div> 

                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Temperatura (Cº) :</label>
                            <input type="text" style="background:white;" class="form-control" maxlength="2" name="temperatura" id="temperatura" placeholder="Temperatura" disabled>
                            </div> 

                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Habitos : </label>
                            <input type="text" style="background:white;" class="form-control"  name="habitos" id="habitos" placeholder="habitos" placeholder="Habitos" disabled>
                            </div> 



                               

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Motivo de la Consulta:</label>
                            <textarea type="text" class="form-control" maxlength="300" name="motivo_consulta" id="motivo_consulta" rows="3"> </textarea>
                            </div>  

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label>Enfermedad Actual:</label>
                            <textarea type="text" class="form-control" maxlength="300" name="enfermedad_actual" id="enfermedad_actual" rows="3"> </textarea>
                            </div>  

   
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label>Antecedentes :</label>
                            <textarea type="text" class="form-control" maxlength="300" name="anteced" id="anteced" rows="3"> </textarea> 
                            </div> 
                            

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label>Sintomas :</label>
                            <textarea type="text" class="form-control" maxlength="300" name="sintomas" id="sintomas" rows="3"> </textarea>
                            </div>


                            <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label>DIagnostico(*):</label>
                            <select name="cod_diagnostico" id="cod_diagnostico"    class="form-control selectpicker" data-live-search="true" required>
                            </select>
                          </div>


                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Tratamiento:</label>
                            <textarea type="text" class="form-control" maxlength="200" name="tratamiento" id="tratamiento" rows="3"> </textarea>
                            </div>  

                            <div class="panel-body">



                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Receta(*):</label>
                                            <table id="lista_medicamento" class="table table-striped table-bordered table-condensed table-hover">                                           
                                            <thead>
                                                <tr>
                                                  <th>Medicamento</th>
                                                  <th>Concentracion</th>
                                                  <th>Cantidad</th>
                                                  <th>Dosis</th>
                                                  <th>Duracion</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>
                                                    <input type="text" name="medicamento[]" class="medicamento" placeholder="" required="">
                                                  </td>

                                                  <td>
                                                    <input type="text" name="concentracion[]" class="concentracion" placeholder="" required="">
                                                  </td>
                                                  <td>
                                                    <input type="number" name="cantidad[]" class="cantidad" placeholder="" required="">
                                                  </td>
                                                  <td>
                                                    <input type="text"name="dosis[]" class="duracion" placeholder="" required="">
                                                  </td>

                                                  <td>
                                                    <input type="text" name="duracion[]" class="duracion" placeholder="" required="">
                                                  </td>
                                                  
                                                  <td>
                                                    <button type="button" class="btn btn-danger button_eliminar_medicamento fa fa-close"></button>
                                                  </td>
                                                </tr>
                                              </tbody>
                                              <tfoot>
                                                <tr>
                                                  <td colspan="3"></td>
                                                  <td>
                                                    <button type="button" class="btn btn-success button_agregar_medicamento">
                                                      Agregar Fila
                                                    </button>
                                                  </td>

                                                </tr>
                                              </tfoot>
                                            </table>
                                        </div>


                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" id="guardar">
                            
                          
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

<script type="text/javascript" src="scripts/medicamento.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        medicamento();
      });
    </script>

<script type="text/javascript" src="scripts/consulta_medica.js"></script>

<?php 
}
ob_end_flush();
?>