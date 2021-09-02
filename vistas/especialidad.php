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

  if ($_SESSION['Especialidad']==1)
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
                          <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                          <a target="_blank" href="../Reportes/rpespecialidad.php"> <button id="btnreporte" class="btn btn-primary"><i class="fa fa-clipboard"></i> Reporte</button> </a>
                          
                          <center> <h2 id="titulo" class="box-title"><b> Especialidades </b> </h2> </center>
                          <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Especialidad(*):</label>
                            <input type="hidden" name="esp_id" id="esp_id">
                            <input type="text" class="form-control" name="esp_nombre" id="esp_nombre" maxlength="50" placeholder="" required="">
                          </div>

                          <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <label>Descripcion:</label>
                            <input type="text" class="form-control" name="esp_descripcion" id="esp_descripcion" maxlength="200" rows="2" placeholder="Descripcion">
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

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
<script type="text/javascript" src="scripts/especialidad.js"></script>

<?php 
}
ob_end_flush();
?>