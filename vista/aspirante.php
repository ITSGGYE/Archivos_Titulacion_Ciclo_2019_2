<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de aspirante</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/estilos.css">   
    <link rel="stylesheet" href="../estilos/contra.css">
   
    
</head>
<body>

<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }
    ?>

<header>
        <?php include_once('../pie/headerOtros.php'); ?>
</header>

<div class="register container__uppdate">
                <div class="row">
                <div class="col-md-3 register-left">
                        <img src="../imagenes/logo.png" alt=""/>
                        <p>
                        El 80% del éxito se basa simplemente en insistir.
                        <div class="card-footer">
                        Woody Allen.
                        </div>
                        </p>
                        
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">
                                    <img src="../iconos/icons/people-fill.svg" alt="" width="35" height="35" title="Nuevo aspirante">
                                    Registro De Aspirante</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <form action="../controlador/insertar.php" method="POST" enctype ="multipart/form-data">

                                            <div class="form-group">
                                                <input type="file" name ="archivo" id="archivo"  class="form-control" required  size="20"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="cedula" id="cedula" required  placeholder="Ingresa la Cedula"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="nombre" id="nombre"required  placeholder="Ingresa el nombre" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control"  name="apellido" id="apellido" required placeholder="Ingresa el apellido"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" class="form-control"  name="fechan"  id="fechan" title="Ingresa la fecha de nacimiento del aspirante"  />
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  name="edad" id="edad"required  placeholder="Ingresa la edad" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="date" class="form-control"  name="fechaI" required id="fechai" title="Ingresa la fecha de ingreso del aspirante" />
                                                </div>
                                                <div class="form-group">
                                                <input type="text" class="form-control" name="direccion" required id="direccion" placeholder="Ingresa la dirección" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  name="telefono" required id="telefono" placeholder="Ingresa el telefono"/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="correo"required  id="correo" placeholder="Ingresa el correo" />
                                                </div>
                                                <input type="submit" class="btnRegister"  value="Guardar!!"/>
                                            </div>

                             
                             
                                        </form>
                                    </div>  
                                </div>  
                            </div>  

                        </div>                
                    </div>
                </div>
                           
             </div>
        </div>
    </div>

</div>

    <script src = "../estilos/js/jquery.js"></script>
    <script src = "../estilos/js/bootstrap.min.js"></script>
</body>
</html>