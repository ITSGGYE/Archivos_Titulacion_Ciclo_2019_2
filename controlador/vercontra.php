<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/estilosCrud.css">
    <link rel="stylesheet" href="../estilos/Contra.css">
   
</head>
<body style="background:-webkit-linear-gradient(left, #3931af, #00c6ff);">

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

        <div class="panel panel-default">
            <div class="panel-body ">
                Usuario y contraseña de <b class="title__header"> <?php echo $_GET['nombres']; ?></b>
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
    </nav>
</header>

    <?php

        try{
            $cedula = $_GET['cedula'];

            

            $conexion = new PDO('mysql:host=localhost; dbname=serviportex','root','');
        
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("set character set utf8");

            $sql="select * from usuarios where cedula = $cedula";
        
            $resultado = $conexion->prepare($sql);
        
            $resultado->execute();

        
        
        }catch(Exception $e){
        
            die ("ERROR! " . $e->GetMessage() . $e->GetLine());
        
        }           

        



    ?>
<div class="container Tabla__principal">
    <div class="row">
        <div class="col-md-12">
            <div class="Table__container">

                <div class="table table-responsive table-hover ">
                    <table class="table text-white ">
                    <thead class="text-center bg-dark">
                        <tr>
                        <th>
                            
                            Cedula</th>
                        <th>
                            
                            Perfil</th>
                        <th>
                            
                            Usuario</th>
                        <th>
                            
                            Contraseña</th>
                        <th class="text-danger">
                            Eliminar
                        </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    
                        <?php    foreach($resultado as $datos):?> 
                                <tr>
                                <td> <?php echo $datos['cedula']  ?>  </td>
                                <td> <?php echo $datos['perfil']  ?>  </td>
                                <td> <?php echo $datos['Nombre_Usuario'] ?> </td>
                                <td> <?php echo $datos['contraseña'] ?>  </td>
                                <td>
                                <a href="../controlador/eliminar2.php?ID_Usuario=<?php echo $datos['ID_Usuario']?>" class="delete" onclick="return confirmar('¿Deceas Eliminar el Usuario y Contraseña de  <?php echo  $datos['nombre'] . $datos['apellido'];  ?>?')" > <img src="../iconos/icons/trash.svg"width="30" height="30" title="Eliminar"></a>
                                </td>
                               
                                </tr>

                            <?php endforeach?>
                         
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>  
    
    <div class="Contenedor__Contra">
        <div class="Contra__Image">
            <img src="../imagenes/secu.svg" class="img__style" alt="">
        </div>

        <div class="Contra__frace">
            <div class="card bg-dark text-center">
                <div class="card-body ">
                    Cuando pierdas, no pierdas la lección
                </div>
                <div class="card-footer">
                     Dalai Lama
                </div>
            </div>
        </div>

       
    </div>
</div>

    <script>

    function confirmar(mensaje){

        return (confirm(mensaje))?true:false;

    }

    </script>

    <script src = "../estilos/js/jquery.js"></script>
    <script src = "../estilos/js/bootstrap.min.js"></script>
</body>
</html>