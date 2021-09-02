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
                    <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"> <i class="fa fa-plus">&nbsp Registrar Usuario</i></button>      
                   <a target="_blank" href="../Reportes/rpusuarios.php"> <button id="btnreporte" class="btn btn-primary"><i class="fa fa-clipboard"></i> Reporte</button> </a>
                   <center> <h2 id="titulo" class="box-title"><b> Listado de Usuarios </b> </h2> </center>
                    <h1 id="titulo_formulario" class="box-title">Nuevo Usuario <br> &nbsp <br> </h1>    

                          <div class="box-tools pull-right">
                        </div>
                    
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Cedula</th>
                            <th>Nombres</th>
                            <th>Usuario</th>
                            <th>Genero</th>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th>Especialidad</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>                  
                          <th>Opciones</th>
                            <th>Cedula</th>
                            <th>Nombres</th>
                            <th>Usuario</th>
                            <th>Genero</th>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th>Especialidad</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                     
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombres (*):</label>
                            <input type="text" class="form-control" name="per_nombre" id="per_nombre" maxlength="50" placeholder="Nombres" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Apellidos (*):</label>
                            <input type="text" class="form-control" name="per_apellido" id="per_apellido" maxlength="50" placeholder="Apellidos" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cedula:</label>
                            <input type="hidden" name="idpersona" id="idpersona">                            
                            <input type="text" class="form-control" name="per_cedula" id="per_cedula" pattern=".{10}" maxlength="10" onKeyUp="validar();" required="">
                            <div id="salida" name="salida" style="color:red;"></div>
                          </div>


                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha:</label>
                            <input type="date" class="form-control" name="per_fchnac" id="per_fchnac"  required>
                            </div>
                            

                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Genero:</label>
                            <select name="per_genero" id="per_genero" class="form-control" required>
                               <option value="Masculino">Masculino</option>
                               <option value="Femenino">Femenino</option>
                            </select>
                          </div>


                          <div class="form-group col-lg- col-md-4 col-sm-6 col-xs-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="per_email" id="per_email" maxlength="40" placeholder="example@example.com">
                            </div>


                          <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <label>Telefono:</label>
                            <input type="text" class="form-control" name="per_telf" id="per_telf" maxlength="10" placeholder="Telefono">
                            </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Especialidad(*):</label>
                            <select id="esp_id" name="esp_id" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>


                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Perfil:</label>
                            <select name="rol" id="rol" class="form-control" required>
                               <option value="Admin">Admin</option>
                               <option value="Medico">Medico</option>
                               <option value="Secretaria">Secretaria</option>
                               <option value="Auxiliar">Auxiliar</option>                           
                              </select>
                          </div>

                       
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Usuario(*):</label>
                            <input type="hidden" name="usuario_id" id="usuario_id"> 
                            <input type="text" class="form-control" name="acceso" id="acceso" maxlength="10" onKeyUp="validar_usuario();" required="">
                            <div id="disponibilidad" style="color:red;"> </div>
                            </div>

                    
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Clave(*):</label>
                            <input type="password" class="form-control" name="clave" id="clave" maxlength="20" placeholder="" require>
                            </div>
                     

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Asignar Modulos:</label>
                            <ul style="list-style: none;" id="modulo">
                              
                            </ul>
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

<script type="text/javascript">
      $("#per_cedula").validarCedulaEC();
    </script> 

<script type="text/javascript" src="scripts/persona.js"></script>

<?php 
}
ob_end_flush();
?>