<?php require 'header.php'; ?>

<?php require 'menu_lateral.php'; ?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Usuarios <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombres</th>
                            <th>Correo</th>
                            <th>ROl</th>
                            <th>Login</th>
                            <th>Estado</th>
                          
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>

                          <th>Opciones</th>
                            <th>Nombres</th>
                            <th>Correo</th>
                            <th>ROl</th>
                            <th>Login</th>
                            <th>Estado</th>
                          
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Nombres y Apellidos(*):</label>
                            <input type="hidden" name="usuario_id" id="usuario_id">
                            <input type="text" class="form-control" name="usu_nom" id="usu_nom" maxlength="100" placeholder="Nombres" required>
                          </div>

                         
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Correo:</label>
                            <input type="email" class="form-control" name="usu_correo" id="usu_correo" maxlength="50" placeholder="Email">
                          </div>                 
                         


                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Rol(*):</label>
                            <select id="rol_id" name="rol_id" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>

  

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Login (*):</label>
                            <input type="text" class="form-control" name="usu_login" id="usu_login" maxlength="20" placeholder="Login" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Clave (*):</label>
                            <input type="password" class="form-control" name="usu_clave" id="usu_clave" maxlength="64" placeholder="Clave" required>
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
require 'footer.php';
?>

<script type="text/javascript" src="scripts/usuario.js"></script>
