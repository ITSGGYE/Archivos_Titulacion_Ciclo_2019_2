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

  if ($_SESSION['Personal']==1)
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
                          <h1 class="box-title"> </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opcion</th>
                            <th>Razon Social</th>
                            <th>Ruc</th>
                            <th>Responsable</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                        </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                          <th>Opcion</th>
                            <th>Razon Social</th>
                            <th>Ruc</th>
                            <th>Responsable</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                          </tfoot>
                        </table>
                    </div>
                    
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          
                        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Razon Social(*):</label>
                            <input type="hidden" name="idconfiguracion" id="idconfiguracion">
                            <input type="text" class="form-control" name="razon_social" id="razon_social" maxlength="50" required>
                          </div>

                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Ruc(*):</label>
                            <input type="text" class="form-control" name="ruc" id="ruc" maxlength="13" required>
                          </div>


                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Responsable(*):</label>
                            <input type="text" class="form-control" name="responsable" id="responsable" maxlength="50" required>
                          </div>

                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="email" id="email" maxlength="40">
                          </div>

                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Telefono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="40">
                          </div>

                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Direccion:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="255">
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
<script type="text/javascript" src="scripts/configuracion.js"></script>

<?php 
}
ob_end_flush();
?>