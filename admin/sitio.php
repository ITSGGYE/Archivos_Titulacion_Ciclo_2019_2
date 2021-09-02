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
      <title>Conexión Vital
      </title>
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
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body>
      <?php
         include ('nav.php');
         include ('sidebar.php');
         ?>
      <?php
         include ('sidebar.php');
         ?>
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
         <div class="row">
            <ol class="breadcrumb">
               <li>
                  <a href="#">
                  <i class="fa fa-users" aria-hidden="true">
                  </i> 
                  </a>
               </li>
               <li class="active">Espacialidad Web
               </li>
            </ol>
         </div>
         <!--/.row-->
         <div class="row">
            <div class="col-lg-12">
               <div class="panel panel-default ">
                  <div class="alert " style="font-size: 35px; letter-spacing: 5px; color:black;background: #cdd1da;">
                     <center> 
                        <strong> TABLA DE ADMINISTRACION SITIO
                        </strong>
                     </center>
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
                           <br>
                           <br>
                           <div >
                              <div>
                                 <div class="col-8">
                                    <div class="table-responsive">
                                       <table id="example" class="table table-striped table-bordered table-hover  text-dark" style="text-align: center; font-weight: bold;" enctype="multipart/form-data">
                                          <thead>
                                             <tr style="background:#222222;color:white; text-align: center; ">
                                                <th scope="col">#</th>
                                                <th class="text-center" >ESPECIALIDAD</th>
                                                <th class="text-center" >SUBTEMA</th>
                                                <th class="text-center" >DESCRIPCION</th>
                                                <th class="text-center" style="visibility:collapse;display: none;" >RUTA</th>
                                                <th class="text-center" >IMAGEN</th>
                                                <th class="text-center" style="visibility:collapse;display: none;" >idEspecialidad</th>
                                                <th class="text-center" >Acciones</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <!-- REGISTROS DE BD -->
                                             <?php
                                                include_once("conexion.php");
                                                $sentencia=$bd->query("SELECT * FROM sitio s
                                                JOIN especialidad e
                                                ON s.id_especialidad=e.id_especialidad
                                                WHERE s.id_sitio
                                                ORDER BY s.id_sitio
                                                ;");
                                                //FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                                                $paciente = $sentencia->fetchAll(PDO::FETCH_OBJ);
                                                //print_r($var);
                                                ?>
                                             <?php
                                                foreach ($paciente as $row) { ?>
                                             <tr >
                                                <td style="width: 5%;text-center"><?php echo $row->id_sitio ?></td>
                                                <td  class="text-center" ><?php echo $row->nombre_especialidad ?></td>
                                                <td   class="text-center" ><?php echo $row->subtema ?></td>
                                                <td   class="text-center" ><?php echo $row->descripcion ?></td>
                                                <td style="visibility:collapse;display: none;"  ><?php echo $row->imagen?></td>
                                                <td  class="text-center"><img src="<?php echo $row->imagen?>" width="64px" height="64px"  ></td>
                                                <td class="text-center" style="visibility:collapse;display: none;" ><?php echo $row->id_especialidad ?></td>
                                                <td  class="text-center" style="width: 8%;">
                                                   <button type="button" class="btn btn-info editbtn" data-toggle="modal" data-target="#editar" onclick="EditarData()"> <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                   <button class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar"><i class="fa fa-ban" aria-hidden="true"></i></button>
                                                </td>
                                             </tr>
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
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true" style="font-size: 40px;">&times;
                                       </span>
                                       </button> 
                                       <div style="background:#222222
                                          ;color:white;letter-spacing: 12px;" class="alert ">
                                          <strong>
                                             <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel">
                                                <center>AGREGAR 
                                                </center>
                                             </h5>
                                          </strong>
                                       </div>
                                       <br>
                                       <br>
                                    </div>
                                    <div class="modal-body">
                                       <!----- Formulario  ---->
                                       <form action="registrar_sitio.php" method="POST" enctype="multipart/form-data">
                                          <div class="form-group">
                                             <?php
                                                include_once("conexion.php");
                                                $sentencia=$bd->query("SELECT * 
                                                FROM 
                                                especialidad 
                                                ;");
                                                //FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
                                                $pa=$sentencia->fetchAll(PDO::FETCH_OBJ);
                                                //print_r($var);
                                                ?>
                                             <label>Especailidad
                                             </label>
                                             <select name="especialidad" class="form-control" required>
                                                <option value="" >Seleccione Especialidad
                                                </option>
                                                <?php foreach($pa as $row): ?>
                                                <option value="<?php echo $row->id_especialidad; ?>">
                                                   <?php echo $row->nombre_especialidad; ?>
                                                </option>
                                                <?php endforeach; ?>
                                             </select>
                                          </div>
                                          <div class="form-group">
                                             <label for="">SUBTEMA
                                             </label>
                                             <input type="text" name="subtema" class="form-control" required>
                                          </div>
                                          <div class="form-group">
                                             <label for="">DESCRIPCIÓN
                                             </label>
                                             <textarea  name="descripcion" class="form-control"  required>
                                             </textarea>
                                          </div>
                                          <div class="form-group">
                                             <label for="">Imagen
                                             </label>
                                             <input type="file" name="foto" id="foto" required accept="image/*" >
                                             <div id="info"></div>
                                          </div>
                                          <br>     
                                          <div class="modal-footer">       
                                             <br>
                                             <button style="color: white; font-weight: bold; " type="button" class="btn btn-danger" data-dismiss="modal">Cerrar
                                             </button>
                                             <button 
                                                style="color: black; background:#ff7655; "
                                                type="submit" class="btn ">Guardar 
                                             </button>
                                          </div>
                                       </form>
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
                                       <span aria-hidden="true" style="font-size: 40px;">&times;
                                       </span>
                                       </button> 
                                       <div style="background:   #222222
                                          ;color:white;letter-spacing: 10px;" class="alert ">
                                          <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel">
                                             <center>EDITAR 
                                             </center>
                                          </h5>
                                       </div>
                                    </div>
                                    <div class="modal-body">
                                       <!----- Formulario  ---->
                                       <form action="editar_sitio.php" method="POST" enctype="multipart/form-data" >
                                          <input type="hidden" name="id" id="update_id">
                                          <div class="form-group">
                                             <label for="">Especialidad (Título) </label>
                                             <input type="hidden" name="idEspecialidad"id="idEspecialidad" class="form-control" value="<?php echo $row->id_especialidad; ?>">
                                             <input type="text" name="nombreEspecialidad" id="nombreEspecialidad" class="form-control" value="<?php echo $row->nombre_especialidad; ?>" disabled>
                                          </div>
                                          <div class="form-group">
                                             <label for="">Subtema
                                             </label>
                                             <input type="text" name="subtema" id="subtema" class="form-control" required="">
                                          </div>
                                          <div class="form-group">
                                             <label for="">Descripción
                                             </label>
                                             <textarea  name="descripcion" id="descripcion"  class="form-control" required="" style="height:200px;"  >
                                             </textarea>
                                          </div>
                                          <div class="form-group">
                                             <div id="result-data"></div>
                                          </div>
                                          <div id="preview" ></div>
                                          <div class="form-group">
                                             <label for="">Imagen
                                             </label>                              
                                             <input  type="file"  name="foto" id="fotos" accept="image/*"  > 
                                            
                                          </div>
                                          <div class="modal-footer">       
                                             <br>
                                             <button style="color: white; font-weight: bold; " type="button" class="btn btn-danger" data-dismiss="modal">Cerrar
                                             </button>
                                             <button 
                                                style="color: black; background:#ff7655; "
                                                type="submit" class="btn ">Guardar 
                                             </button>
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
                                       <span aria-hidden="true" style="font-size: 40px;">&times;
                                       </span>
                                       </button> 
                                       <div style="background:   #222222
                                          ;color:white;letter-spacing: 10px;" class="alert ">
                                          <strong>
                                             <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel">
                                                <center>ELIMINAR  
                                                </center>
                                             </h5>
                                          </strong>
                                       </div>
                                       <br>
                                       <br>
                                    </div>
                                    <div class="modal-body">
                                       <!----- Formulario  ---->
                                       <form action="eliminar_sitio.php" method="POST" >
                                          <input type="hidden" name="id" id="delete_id" >
                                          <center>
                                             <p style="font-size: 22px;"   >Estas Seguro de Eliminar 
                                                </strong> ?
                                             </p>
                                          </center>
                                          <br>     
                                          <div class="modal-footer">       
                                             <br>
                                             <button style="color: white; font-weight: bold; " type="button" class="btn btn-danger" data-dismiss="modal">No
                                             </button>
                                             <button type="submit" style="color: black; background:#ff7655; " class="btn ">Si
                                             </button>
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
               <p class="back-link">Fundación Conexión Vital   
                  <a href="inicio.php">Andrea Hernandez Gerente
                  </a>
               </p>
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
      <script>
         function EditarData(){
         
           $("#preview").hide();
           $("#result-data").show();
          // $('#fotos').val('');
         }
         
                  $('.editbtn').on('click', function() {
                   $("#preview").hide();
                   $("#result-data").show();
                 //  $('#fotos').val('');
             $tr = $(this).closest('tr');
             var datos = $tr.children("td").map(function() {
                 return $(this).text();
         
             });
            console.log(datos)
             $('#update_id').val(datos[0]);
             $('#nombreEspecialidad').val(datos[1]);
                    $('#subtema').val(datos[2]);
                    $('#descripcion').val(datos[3]);
                    $('#fotoruta').val(datos[4]); 
                
                    $('#idEspecialidad').val(datos[6]);
                    
                    var imgLink =(datos[4]);    
                    var idEspecialidad = datos[6];
                    var nombreEspecialidad = datos[1];

                   $.ajax({
                       type: "GET",
                       method: "GET",
                       url: "sitio.php",
                     data: 'imgen=' + imgLink,  
                       dataType : 'html',
                       success: function(data) {
                        
                         $('#result-data').html('<img src="' + imgLink + '" width="70%"   >');
                    
                       },
                       error : function(xhr, status) {
                           alert('Disculpe, existió un problema');
                       },
                   });
         });
         
         document.getElementById("fotos").onchange = function(e) {
           $("#result-data").hide();
           $('#preview').show();
           // Creamos el objeto de la clase FileReader
           let reader = new FileReader();
           // Leemos el archivo subido y se lo pasamos a nuestro fileReader
           reader.readAsDataURL(e.target.files[0]);
  
           // Le decimos que cuando este listo ejecute el código interno
           reader.onload = function(){
             let preview = document.getElementById('preview'),
                     image = document.createElement('img');
                     image.style.width="70%";
             image.src = reader.result;
             preview.innerHTML = '';
             preview.append(image);
           };
         }
   
  

               
      </script>
      <script>
         $('.deletebtn').on('click',function () {
           $tr=$(this).closest('tr');
           var datos=$tr.children("td").map(function () {
             return $(this).text();
           }
                                           );
           $('#delete_id').val(datos[0]);
         }
                           );
      </script>
   </body>
</html>