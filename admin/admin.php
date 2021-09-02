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
      <!--datables CSS básico-->
      <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
      <!--datables estilo bootstrap 4 CSS-->  
      <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
      <script href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/tooltip.js"></script>
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body>
      <?php
         include ('nav.php');
         ?>
      <?php
         include ('sidebar.php');
         ?>
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
         <div class="row">
            <ol class="breadcrumb">
               <li><a href="#">
                  <i class="fa fa-users" aria-hidden="true"></i> 
                  </a>
               </li>
               <li class="active">Espacialidad Web</li>
            </ol>
         </div>
         <!--/.row-->
         <div class="row">
            <div class="col-lg-12">
               <div class="panel panel-default ">
                  <div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;">
                     <center> <strong> TABLA DE ADMINISTRACION SITIO</strong></center>
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
                           Nuevo 
                           </button>
                           <br><br>
                           <div >
                              <div>
                                 <div class="col-8">
                                    <div class="table-responsive">
                                       <table id="example"  class="table table-striped table-bordered table-hover text-dark" style="text-align: center; font-weight: bold;" >
                                          <thead>
                                             <tr style="background:#222222;color:white; ">
                                                <th scope="col">#</th>
                                                <th scope="col">Usuario</th>
                                                <th scope="col">Contraseña</th>
                                                <th scope="col">Nombres Apellidos</th>
                                                <th scope="col">Acciones</th>
                                               
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <!-- REGISTROS DE BD -->                                
                                             <?php
                                                include_once("conexion.php");

                                                function desencryptData($data){
                                                  $clave  = 'cadalargadepassdeingresodelsistemafundacionconexionvital';
                                                  $method = 'aes-256-cbc';
                                                  $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
                                                  $desencrypted_data = openssl_decrypt($data, $method, $clave, false, $iv);
                                                  return $desencrypted_data;
                                              }
                                                $sentencia=$bd->query("SELECT *  FROM administrador;");
                                                //FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                                                $paciente=$sentencia->fetchAll(PDO::FETCH_OBJ);
                                                ?>
                                             <?php
                                                foreach($paciente as $row) {                  
                                                  ?>
                                             <tr >
                                                <td><?php echo $row->id_administrador?></td>
                                                <td><?php echo $row->usuario?></td>
                                                <td>    <?php echo desencryptData($row->contrasena);?></td>
                                                <td><?php echo $row->nombre_apellido?></td>
                                                <td>                   
                                                   <span data-toggle="modal" data-target="#editar">
                                                     <button  style="font-size: 14px;" type="button" class="btn btn-info editbtn"  data-toggle="tooltip" title="Editar Administrador">
                                                      <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                    </span>
                                                     <span data-toggle="modal" data-target="#eliminar">
                                                     <button  style="font-size: 14px;" type="button" class="btn btn-danger deletebtn"  data-toggle="tooltip" title="Editar Administrador">
                                                      <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </span>
                                                </td>
                                             </tr>
                                             <?php }?>
                                          </tbody>
                                       </table>
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
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true" style="font-size: 40px;">&times;</span>
                                       </button> 
                                       <div style="background:#222222
                                          ;color:white;letter-spacing: 12px;" class="alert ">
                                          <strong>
                                             <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel">
                                                <center>AGREGAR </center>
                                             </h5>
                                          </strong>
                                       </div>
                                       <br>
                                       <br>
                                    </div>
                                    <div class="modal-body">
                                       <!----- Formulario  ---->
                                       <form action="registrar_admin.php" method="POST" enctype="multipart/form-data">
                                          <div class="form-group">
                                             <label for="">USUARIO</label>
                                             <input type="text" name="usuario" class="form-control" placeholder="Ingrese Usuario" required>
                                          </div>
                                          <div class="form-group">
                                             <div class="">
                                              <label for="password">Contraseña</label>
                                              <input type="text" name="pass" id="pass" class="form-control" placeholder="Ingrese Contraseña" required>      
                                          </div>
                                          </div>
                                          <div class="form-group">
                                             <label for="">Nombre Apellido</label>
                                             <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombres Apellidos" onkeypress="return soloLetras(event);" required>
                                          </div>
                                          <br>     
                                          <div class="modal-footer"><br>
                                             <button style="color: white; font-weight: bold; " type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                             <button 
                                                style="color: black; background:#ff7655; "
                                                type="submit" class="btn ">Guardar </button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
           
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
                                                <center>EDITAR </center>
                                             </h5>
                                          </strong>
                                       </div>
                                       <br>
                                       <br>
                                    </div>
                                    <div class="modal-body">
                                       <!----- Formulario  ---->
                                       <form action="editar_admin.php" method="POST" >
                                          <input type="hidden" name="id" id="update_id">
                                          <div class="form-group">
                                             <label for="">USUARIO</label>
                                             <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese Usuario" required >
                                          </div>
                                      
                                          <div class="campo">
                                              <label for="password">CONTRASEÑA</label>
                                              <input type="password" name="pass" id="passw"class="form-control" placeholder="Ingrese Contraseña" required>
                                              <span style="background:white;"><i class="fa fa-eye" style="font-size:21px;" aria-hidden="true"></i></span>
                                          </div>
                                          <div class="form-group">
                                             <label for="">Nombre Apellido</label>
                                             <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Nombres Apellidos" onkeypress="return soloLetras(event);" required>
                                          </div>
                                          <br>     
                                          <div class="modal-footer">       <br>
                                             <button style="color: white; font-weight: bold; " type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                             <button style="color: black; background:#ff7655; " type="submit"  class="btn ">Actualizar</button>
                                          </div>
                                       </form>
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
                                                <center>ELIMINAR  </center>
                                             </h5>
                                          </strong>
                                       </div>
                                       <br>
                                       <br>
                                    </div>
                                    <div class="modal-body">
                                       <!----- Formulario  ---->
                                       <form action="eliminar_admin.php" method="POST" >
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
               <p class="back-link">Fundación Conexión Vital   <a href="inicio.php">Andrea Hernandez Gerente</a></p>
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!--/.main-->
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
      <script type="text/javascript" src="js/main.js"></script>  
      <script >//Se utiliza para que el campo de texto solo acepte letras
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
      <
      <script>

         $('.editbtn').on('click',function () {
         
         $tr=$(this).closest('tr');
         
         var datos=$tr.children("td").map(function () {
         
         return $(this).text();
         
         });
         
         $('#update_id').val(datos[0]);
         
         $('#usuario').val(datos[1]);
         
         $('#passw').val(datos[2]);  
         $('#nombre').val(datos[3]);
            
         });
         
         document.querySelector('.campo i').addEventListener('click', e => {
    const passwordInput = document.querySelector('#passw');
   
    if (e.target.classList.contains('show')) {
        e.target.classList.remove('show');
        /* e.target.textContent = 'Ocultar'; */
      
        passwordInput.type = 'text';
    } else {
        e.target.classList.add('show');
        /* e.target.textContent = 'Mostrar'; */
        passwordInput.type = 'password';
    }
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
   </body>
</html>

