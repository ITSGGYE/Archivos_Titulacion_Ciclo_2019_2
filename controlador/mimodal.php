<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
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
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-2 shadow "> 
        <a href="" class="navbar-brand col-sm-3 col-md-2 mr-0 text-info" >
        <img src="../imagenes/logo2.ico" alt="" width="30" height="30" title="Serviportex"> 
        ServiPortex
        </a>
       
        <ul class = "navbar-nav px-3">
         <form class="form-check-inline">
            <a class="btn" href="../vista/acciones.php"  >
            <img src="../iconos/icons/arrow-bar-left.svg" alt="" width="30" height="30" title="Menu"> 
            </a>
            <a class="btn" href="../modelo/cerrar.php" >
            <img src="../iconos/icons/power.svg" alt="" width="30" height="30" title="Cerrar Sessión"> 
            </a>
        </form>
</header>

    <?php

    require_once("../modelo/conexion.php");

    if(!isset($_POST['modificar'])){
        $id = $_GET['ID'];
        $cedula = $_GET['cedula'];
        $nombre = $_GET['nombres'];
        $apellido = $_GET['apellidos'];
        $fn = $_GET['fecha_nac'];
        $edad = $_GET['edad'];
        $fi = $_GET['fecha_ingre'];
        $direccion = $_GET['direccion'];
        $telefono = $_GET['telefono'];
        $correo = $_GET['correo'];
   
}else{

    $db=Conectar::conexion();

    $id=$_POST['id'];
    $cedula =$_POST['cedula'];
    $nombre =$_POST['nombre'];
    $apellido =$_POST['apellido'];
    $fn =$_POST['fechan'];
    $edad =$_POST['edad'];
    $fi =$_POST['fechaI'];
    $direccion =$_POST['direccion'];
    $telefono =$_POST['telefono'];
    $correo =$_POST['correo'];

    
    $db->query("update aspirante set cedula='$cedula',nombres='$nombre',apellidos='$apellido',fecha_nac='$fn',edad='$edad',fecha_ingre='$fi',direccion='$direccion',telefono='$telefono',correo='$correo' where ID_Aspirante = $id;");

    header("location:../vista/acciones.php");



}

    ?>
    
    <div class="register container__uppdate">
                <div class="row">
                <div class="col-md-3 register-left">
                        <img src="../imagenes/logo.png" alt=""/>
                        <p>
                        No basta con querer: debes preguntarte a ti mismo qué vas a hacer para conseguir lo que quieres.
                        <div class="card-footer">
                        Franklin D. Roosevelt
                        </div>
                        </p>
                        
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">
                                    <img src="../iconos/icons/Pencil.svg" alt="" width="35" height="35" title="Nuevo aspirante">
                                    Modificar Aspirante: <?php echo $nombre . $apellido; ?></h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                                             <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="id" >

                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?php echo $cedula; ?>" name="cedula" id="cedula">
                                            </div>

                                            <div class="form-group">
                                                 <input type="text" class="form-control" value="<?php echo $nombre; ?>" name="nombre" id="nombre">
                                            </div>
                                            <div class="form-group">
                                                 <input type="text" class="form-control"value="<?php echo  $apellido; ?>"  name="apellido" id="apellido">
                                            </div>
                                            <div class="form-group">
                                                <input type="date" class="form-control" value="<?php echo $fn; ?>" name="fechan" id="fechan">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?php echo $edad;?>" name="edad" id="edad">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" value="<?php echo $fi;?>" name="fechaI" id="fechai">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?php echo $direccion;?>" name="direccion" id="direccion">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?php echo $telefono; ?>" name="telefono" id="telefono"> 
                                                </div>
                                                
                                                <div class="form-group">
                                                <input type="email" class="form-control" value="<?php echo $correo; ?>" name="correo" id="correo">
                                                </div>

                                                <button type="submit" name="modificar" class="btnRegister">Modificar!!</button>
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