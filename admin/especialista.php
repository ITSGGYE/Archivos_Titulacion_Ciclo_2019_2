

<?php  
   session_start();
   if (!isset($_SESSION['nombre'])) {
     header('Location: index.php');
   
   }
   
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Conexión Vital</title>
      <link rel="icon" href="iconos/favicon.png" type="image" >
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/datepicker3.css" rel="stylesheet">
      <link href="css/styles.css" rel="stylesheet">
      <!--Custom Font-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <link href="css/toastr.css" rel="stylesheet">
      <script src="js/toastr.min.js"></script>
      <!--datables CSS básico-->
      <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
      <!--datables estilo bootstrap 4 CSS-->  
      <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="datatables/buttons.dataTables.min.css" />
      <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
      <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/tooltip.js"></script>
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body>
      <?php
         include ('nav.php');
          include ('sidebar.php'); 
         ?>

      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
         <div class="row">
            <ol class="breadcrumb">
               <li><a href="#">
                  <i class="fa fa-user-o" aria-hidden="true"></i>
                  </a>
               </li>
               <li class="active">Especialistas</li>
            </ol>
         </div>
         <!--/.row-->
         <div class="row">
            <div class="col-lg-12">
               <div class="panel panel-default ">
                  <div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;">
                     <center> <strong> LISTA DE ESPECIALISTAS</strong></center>
                     <!-- /.Informacion-->
                  </div>
               </div>
               <!-- /.panel-->
               <div class="panel panel-default" >
                  <div class="panel-body">
                     <div class="col-md-15" >
                        <!-- /.Informacion-->						
                        <div class="hero-unit-table">
                           <!--BUTTON MODAL -->
                           <button style="color: white; background:#ff7655;" type="button" class="btn " data-toggle="modal" data-target="#insertar">
                           Nuevo Especialista
                           </button>
                           <br><br>
                           <div >
                              <div >
                                 <div >
                                    <div class="table-responsive">
                                       <table id="example" class="table table-striped table-bordered table-hover  text-dark" style="text-align: center; font-weight: bold;" >
                                          <thead>
                                             <tr style="background:#222222;color:white;text-align: center; "> 
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Cedula</th>
                                                <th scope="col" class="text-center">Nombre Especialista</th>
                                                <th scope="col" class="text-center">Telefono</th>
                                                <th scope="col" class="text-center">Direccion</th>
                                                <th scope="col" class="text-center">Correo</th>
                                                <th scope="col" class="text-center">Fecha Nacimiento</th>
                                                <th scope="col" class="text-center">Genero</th>
                                                <th scope="col" class="text-center">Especialidad</th>
                                           
                                                <th scope="col" class="text-center">Fecha Creación</th>
                                                <th  style="visibility:collapse;display: none;">ID Especialidad</th>
                                                <th scope="col" class="text-center">Acciones</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <!-- REGISTROS DE BD -->                                
                                             <?php
                                                include_once("conexion.php");
                                                
                                                $sentencia=$bd->query("SELECT *  
                                                  FROM especialista a
                                                  JOIN especialidad d
                                                  ON a.id_especialidad =d.id_especialidad
                                                ORDER BY a.id_especialista
                                                
                                                  ;");
                                                //FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                                                $paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
                                                
                                                //print_r($var);
                                                
                                                ?>
                                             <?php
                                                foreach($paciente as $row) {?>
                                             <tr >
                                                <td><?php echo $row->id_especialista?></td>
                                                <td><?php echo $row->cedula_esp?></td>
                                                <td><?php echo $row->nombre_doctor?></td>
                                                <td><?php echo $row->telefono?></td>
                                                <td><?php echo $row->direccion?></td>
                                                <td><?php echo $row->correo?></td>
                                                <td><?php echo $row->fecha_nacimiento?></td>
                                                <td><?php echo $row->genero?></td>
                                                <td><?php echo $row->nombre_especialidad?></td>
                                                <td><?php echo $row->fecha_creacion?></td>
                                                <td style="visibility:collapse;display: none;"><?php echo $row->id_especialidad?></td>
                                                <td style="width: 8%;">
                                                      <span data-toggle="modal" data-target="#editar">
                                                      <button  style="font-size: 14px;" type="button" class="btn btn-info editbtn"  data-toggle="tooltip" title="Editar Administrador">
                                                         <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                      </span>

                                                      <span data-toggle="modal" data-target="#eliminar">
                                                      <button  style="font-size: 14px;" type="button" class="btn btn-danger deletebtn"  data-toggle="tooltip" title="Eliminar Paciente">
                                                         <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                      </span>
                                                </td>
                                             <?php }?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Modal Insertar -->
                           <div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarFormEdit()">
                                       <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                                       </button> 
                                       <div style="background:   #222222
                                          ;color:white;letter-spacing: 12px;" class="alert ">
                                          <strong>
                                             <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel">
                                                <center>AGREGAR ESPECIALISTA</center>
                                             </h5>
                                          </strong>
                                       </div>
                                    </div>
                                    <div class="modal-body">
                                       <!----- Formulario  ---->
                                      
                                          <div class="form-group">
                                             <label for="">CEDULA</label>
                                             <input type="text" name="cedula" id="cedulaE" class="form-control" placeholder="Ingresar Cedula Especialista"  minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event);" >
                                          </div>
                                          <div class="form-group">
                                             <label for="">NOMBRE ESPECIALISTA</label>
                                             <input type="text" name="nombre"  id="nombreE" class="form-control"  placeholder="Ingresar Nombre Especialista"  minlength="10" maxlength="60" onKeyPress="return soloLetras(event);" >
                                          </div>
                                          <div class="form-group">
                                             <label for="">TELEFONO</label>
                                             <input type="text" name="telefono" id="telefonoE" class="form-control" placeholder="Ingrese Telefono" minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event);" >
                                          </div>
                                          <div class="form-group">
                                             <label for="">DIRECCION</label>
                                             <input type="text" name="direccion" id="direccionE" class="form-control"  placeholder="Ingrese Dirección">
                                          </div>
                                          <div class="form-group">
                                             <label for="">CORREO</label>
                                             <input type="email" name="email"  id="emailE"  class="form-control"  placeholder="ejemplo@ejemplo.com" >
                                          </div>
                                          <div class="form-group">
                                             <label for="">FECHA NACIMIENTO</label>
                                             <input type="date" name="fecha"  id="fechaE" class="form-control" required>
                                          </div>
                                          <div class="form-group">
                                             <label for="">GENERO</label>
                                             <select name="genero" id="generoE" class="form-control" required>
                                             <option value="">Selecione Genero</option>
                                                <option  value="Masculino">Masculino</option>
                                                <option  value="Femenino">Femenino</option>
                                             </select>
                                          </div>
                                          <div class="form-group">
                                             <?php
                                                include_once("conexion.php");
                                                $sentencia=$bd->query("SELECT * FROM especialidad;");
                                                //FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                                                $pa=$sentencia->fetchAll(PDO::FETCH_OBJ);
                                                
                                                //print_r($var);    
                                                ?>
                                             <label>Especailidad</label>
                                             <select name="especialidad" id="especialidadE" class="form-control">
                                                <option value="" >Seleccione Especialidad</option>
                                                <?php foreach($pa as $row): ?>
                                                <option value="<?php echo $row->id_especialidad; ?>"><?php echo $row->nombre_especialidad; ?></option>
                                                <?php endforeach; ?>
                                             </select>
                                          </div>
                                    </div>
                                    <br>     
                                    <div class="modal-footer">       <br>
                                    <button style="color: white; font-weight: bold; " type="button" class="btn btn-danger" data-dismiss="modal" onclick="limpiarFormEdit()">Cerrar</button>
                                    <button 
                                       style="color: black; background:#ff7655; "
                                       type="submit" class="btn " onclick="validaGuardarEspecialista()">Guardar Especialista</button>
                                    </div>
                                 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.Termina modal Insertar-->
                        <!-- Modal Editar -->
                        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                                    </button> 
                                    <div style="background:   #222222
                                       ;color:white;letter-spacing: 10px;" class="alert ">
                                       <strong>
                                          <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel">
                                             <center>EDITAR ESPECIALISTA</center>
                                          </h5>
                                       </strong>
                                    </div>
                                    <br>
                                    <br>
                                 </div>
                                 <div class="modal-body">
                                    <!----- Formulario  ---->
                                   
                                       <input type="hidden" name="id" id="update_id">
                                       <div class="form-group">
                                          <label for="">CEDULA</label>
                                          <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Editar Cedula Especialista"  minlength="10" maxlength="10" onKeyPress="return SoloNumeros(event);" >
                                       </div>
                                       <div class="form-group">
                                          <label for="">NOMBRE ESPECILISTA</label>
                                          <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Editar Nombre Especialista"  inlength="10" maxlength="60" onKeyPress="return soloLetras(event);" >
                                       </div>
                                       <div class="form-group">
                                          <label for="">TELEFONO</label>
                                          <input type="text" name="telefono" id="telefono" class="form-control " placeholder="Editar Telefono" >
                                       </div>
                                       <div class="form-group">
                                          <label for="">DIRECCION</label>
                                          <input type="text" name="direccion" id="direccion"  class="form-control" placeholder="Editar Direcion" >
                                       </div>
                                       <div class="form-group">
                                          <label for="">CORREO</label>
                                          <input type="email" name="email" id="email" class="form-control" placeholder="Edite el Correo ejemplo@ejemplo.com" >
                                       </div>
                                       <div class="form-group">
                                          <label for="">FECHA NACIMIENTO</label>
                                          <input type="date" name="fecha" id="fecha" class="form-control"  >
                                       </div>
                                       <div class="form-group">
                                          <label for=""> GENERO</label>
                                          <select name="genero" id="genero" class="form-control"  >
                                             <option  value="Masculino">Masculino</option>
                                             <option  value="Femenino">Femenino</option>
                                          </select>
                                       </div>
                                       <div class="form-group">
                                          <?php
                                             include_once("conexion.php");
                                             
                                             $sentencia=$bd->query("SELECT * FROM especialidad ;");
                                             //FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                                             $pa=$sentencia->fetchAll(PDO::FETCH_OBJ);
                                             
                                             //print_r($var);
                                             
                                             ?>
                                          <label>Cambie la Especailidad</label>
                                          <select name="especialidad" id="especialidad" class="form-control">
                                             <?php foreach($pa as $row): ?>
                                             <option value="<?php echo $row->id_especialidad; ?>"><?php echo $row->nombre_especialidad; ?></option>
                                             <?php endforeach; ?>
                                          </select>
                                       </div>
                                 </div>
                                 <br>     
                                 <div class="modal-footer">       <br>
                                 <button style="color: white; font-weight: bold; " type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                 <button style="color: black; background:#ff7655; " type="submit"  class="btn " onclick="validaEditarEspecialista()">Actualizar Especialista</button>
                                 </div>
                              
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.Termina modal editar-->
                     <!-- Modal Eliminar -->
                     <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                                 </button> 
                                 <div style="background:   #222222
                                    ;color:white;letter-spacing: 10px;" class="alert ">
                                    <strong>
                                       <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel">
                                          <center>ELIMINAR ESPECIALISTA</center>
                                       </h5>
                                    </strong>
                                 </div>
                                 <br>
                                 <br>
                              </div>
                              <div class="modal-body">
                                 <!----- Formulario  ---->
                                 <form action="eliminar_especialista.php" method="POST" >
                                    <input type="hidden" name="id" id="delete_id" >
                                    <center>
                                       <p style="font-size: 22px;"   >Estas Seguro de Eliminar </strong> ?</p>
                                    </center>
                                    <br>     
                                    <div class="modal-footer">       <br>
                                       <button style="color: white; font-weight: bold; " type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                       <button type="submit" style="color: black; background:#ff7655; " class="btn ">Si</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.Termina modal modificar-->
                  </div>
               </div>
            </div>
         </div>
         <!-- /.panel-->
      </div>
      <!-- /.col-->
      <div class="col-sm-12">
         <p class="back-link">Fundación Conexión Vital   <a href="index.php">Andrea Hernandez Gerente</a></p>
      </div>
      </div><!-- /.row -->
      </div><!--/.main-->
      <script src="js/jquery-1.11.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/chart.min.js"></script>
      <script src="js/chart-data.js"></script>
      <script src="js/easypiechart.js"></script>
      <script src="js/easypiechart-data.js"></script>
      <script src="js/bootstrap-datepicker.js"></script>
      <script src="js/custom.js"></script>
      <!-- datatables JS -->
      <script type="text/javascript" src="datatables/datatables.min.js"></script>   
      <script src="datatables/dataTables.buttons.min.js"></script>
      <script src="datatables/buttons.flash.min.js"></script>
      <script src="datatables/jszip.min.js"></script>
      <script src="datatables/pdfmake.min.js"></script>
      <script src="datatables/vfs_fonts.js"></script>
      <script src="datatables/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 
      <script type="text/javascript" src="js/main.js"></script>  
      <script src="js/pacienteData.js"></script>
      <script>
         $('.editbtn').on('click',function () {
         
         $tr=$(this).closest('tr');
         
         var datos=$tr.children("td").map(function () {
         
         return $(this).text();
         
         });
         
         $('#update_id').val(datos[0]);
         
         $('#cedula').val(datos[1]);
         
         $('#nombre').val(datos[2]);
         
         
         $('#telefono').val(datos[3]);
         
         $('#direccion').val(datos[4]);
         
         $('#email').val(datos[5]);
         
         $('#fecha').val(datos[6]);
         
         $('#genero').val(datos[7]);
         
         $('#especialidad').val(datos[10]);
         });
         
         
         
      </script>
      <script>
         $('.deletebtn').on('click',function () {
         
         $tr=$(this).closest('tr');
         
         var datos=$tr.children("td").map(function () {
         
         return $(this).text();
         
         });
         
         $('#delete_id').val(datos[0]);
         
         
         });
 
      </script>
      <script >
         function SoloNumeros(evt){
            let key = (event.which) ? event.which : event.keyCode;
            if (key > 31 && (key < 48 || key > 59)) {
               return false;
            }
            return true;
         }

      </script>
      <script >
         function soloLetras(e) {
             key = e.keyCode || e.which;
             tecla = String.fromCharCode(key).toString();
             letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
             especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.
         
             tecla_especial = false
             for(var i in especiales) {
                 if(key == especiales[i]) {
                     tecla_especial = true;
                     break;
                 }
             }
         
             if(letras.indexOf(tecla) == -1 && !tecla_especial){
         alert('Tecla numerica no aceptada');
                 return false;
               }
         }
      </script>
   </body>
</html>

