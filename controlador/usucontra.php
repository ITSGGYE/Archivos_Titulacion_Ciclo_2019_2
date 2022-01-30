<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Credenciales</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/Contra.css">
    

</head>
<body class="register" >

<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }
    ?>


<header>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-2 shadow"> 
        <a href="" class="navbar-brand col-sm-3 col-md-2 mr-0 text-info" >
        <img src="../imagenes/logo2.ico" alt="" width="30" height="30" title="Serviportex"> 
        ServiPortex
        </a>

        <div class="panel panel-default">
            <div class="panel-body ">
                Crear Usuario y contraseña para <b class ="title__header"> <?php echo $_GET['nombres'] . $_GET['apellidos'] ; ?> </b>
            </div>
        </div>
       
        <ul class = "navbar-nav px-3">
            <form class="form-check-inline">
                <a class="btn" href="../vista/GestionUsuario.php"  >
                <img src="../iconos/icons/arrow-bar-left.svg" alt="" width="30" height="30" title="Menu"> 
                </a>
                <a class="btn" href="../modelo/cerrar.php" >
                <img src="../iconos/icons/power.svg" alt="" width="30" height="30" title="Cerrar Sessión"> 
                </a>
            </form>
        </ul>
</header>

    <?php

    require_once("../modelo/conexion.php");

    if(!isset($_POST['contra'])){
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
    $aspirante =$_POST['aspirante'];
    $usuario =$_POST['usuario'];
    $contrasena =$_POST['contrasena'];



    
    $db->query("insert into usuarios(cedula,nombre,apellido,perfil,Nombre_Usuario,contraseña)
    value('$cedula','$nombre','$apellido','$aspirante','$usuario','$contrasena');");

    header("location:../vista/GestionUsuario.php");
 


}

    ?>
    
    <div class="" >
            <div class="tab-content" id="myTabContent">
            <h3 class="register-heading">Generar usuario y contraseña</h3>
            <img src="../imagenes/password.svg" class="Contenedor__register" alt="">
                <div class="register-form container">
                    <div class="row">
                        <div class="col-md-6">

                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

                                <input type="hidden" class="form-control" value="<?php echo $id; ?>" name="id" >

                            <div class="form-group">
                                <input type="text" class="form-control" readonly  value="<?php echo $cedula; ?>" name="cedula" title="Cedula del Aspirante">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" readonly value="<?php echo $nombre; ?>" name="nombre" title="Nombre del Aspirante">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" readonly value="<?php echo  $apellido; ?>"  name="apellido" title="Apellido del Aspirante">
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly value="Aspirante"  name="aspirante" title="Perfil del Aspirante">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" readonly value="<?php echo $cedula; ?>" name="usuario" title="Usuario del Aspirante" >
                                </div>
                                <div class="form-group">
                            
                                    <input type="text" class="form-control" readonly value="<?php echo rand()  ?>" name="contrasena" id="contrasena" title="Contraseña Generada ">
                                </div>
                    </div>
                    </div>
                    <button type="submit" name="contra"  class="btnRegister__update">Guardar!!</button>
                    </form>
                </div>
            </div>
        </div>




    <script src = "../estilos/js/jquery.js"></script>
    <script src = "../estilos/js/bootstrap.min.js"></script>
</body>
</html>