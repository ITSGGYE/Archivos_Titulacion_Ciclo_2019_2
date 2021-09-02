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

  if ($_SESSION['Paciente']==1)
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
                    <div class="box-header with-border" style="background:#ffffff;">
                   
                    <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"> <i class="fa fa-plus-circle">&nbsp Registrar Paciente</i></button>      
                   <a target="_blank" href="../Reportes/rppacientes.php"> <button id="btnreporte" class="btn btn-primary"><i class="fa fa-clipboard"></i> Reporte</button> </a>
                    
                   <center> <h2 id="titulo" class="box-title"><b> Listado de Pacientes </b> </h2> </center>
                    <h1 id="titulo_formulario" class="box-title">Nuevo Paciente <br> &nbsp <br> </h1>    
                    
                    <div class="box-tools pull-right">
                        </div>
                    
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opcion</th>
                            <th>Cèdula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Edad</th>
                            <th>Gènero</th>
                            <th>Sangre</th>
                            <th>Historial</th>                             
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                          <th>Opcion</th>
                            <th>Cèdula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Edad</th>
                            <th>Gènero</th>
                            <th>Sangre</th>
                            <th>Historial</th>  
                          </tfoot>
                        </table>
                    </div>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                      
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombres:</label>
                            <input type="text" class="form-control pac_nombre" name="pac_nombre" id="pac_nombre" maxlength="50" placeholder="Nombres del Paciente" required="">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Apellidos:</label>
                            <input type="text" class="form-control" name="pac_apellido" id="pac_apellido" maxlength="50" placeholder="Apellidos del Paciente" required="">
                          </div>
                          

                      

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-1">
                            <label>Cèdula:</label>
                            <input type="hidden" name="paciente_cod" id="paciente_cod">
                            <input type="text" class="form-control" id="pac_cedula" name="pac_cedula" 
                            pattern=".{10}" maxlength="10" onKeyUp="validar();" placeholder="ej: 0954235412" required="">
                           
                           <!-- <button type="button" onclick="validar_cedula()" class="btn btn-success"> <span class="fa fa-check"></span> 
                          </button> -->
                            <div id="salida" name="salida"></div>  
                            <div id="disponibilidad" style="color:red;"> </div>
                          </div>
                        
                          <!--
                        <div class="inputWithIcon form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <select name="disponibilidad" id="disponibilidad" class="form-control" style="appearance: none;
	                           -webkit-appearance: none; -moz-appearance: none;" required>
                            </select>
                          </div> --> 
                          

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" name="pac_fchnac" id="pac_fchnac" required="">
                          </div>
                            

                            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-4">
                            <label>Gènero:</label>
                            <select name="pac_genero" id="pac_genero" class="form-control selectpicker" required>
                               <option value="Masculino">Masculino</option>
                               <option value="Femenino">Femenino</option>
                            </select>
                          </div>


                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-4">
                            <label>Tipo de Sangre:</label>
                            <select name="pac_sangre" id="pac_sangre" class="form-control selectpicker" required>
                               <option value="A+">A+</option>
                               <option value="A-">A-</option>
                               <option value="B+">B+</option>
                               <option value="B-">B-</option>
                               <option value="AB+">AB+</option>
                               <option value="AB-">AB-</option>
                               <option value="O+">O+</option>
                               <option value="O-">O-</option>                           
                            </select>
                          </div>


                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Telèfono:</label>
                            <input type="text" class="form-control" name="pac_telf" id="pac_telf" maxlength="10" placeholder="">
                            </div>
                            
                            <div class="form-group col-lg- col-md-4 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="pac_email" id="pac_email" maxlength="40" placeholder="example@example.com"> 
                          </div>


                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Direcciòn:</label>
                            <input type="text" class="form-control" name="pac_direccion" id="pac_direccion" maxlength="150" placeholder="Direccion de Domicilio">
                            </div>
                          
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Persona Responsable:</label>
                            <input type="text" class="form-control" name="pac_resp" id="pac_resp" maxlength="150" placeholder="Persona Responsable">
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>En caso de emergencia:</label>
                            <input type="text" class="form-control" name="pac_emergencia" id="pac_emergencia" maxlength="150" placeholder="Llamar a:">
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary"  type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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

  <script type="text/javascript">
      $("#pac_cedula").validarCedulaEC();
    </script> 

<script type="text/javascript" src="scripts/paciente.js"></script>


<?php 
}
ob_end_flush();
?>