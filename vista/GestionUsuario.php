<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Usuario</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/estilosCrud.css">
    <link rel="stylesheet" href="../estilos/contra.css">
    <link rel="stylesheet" href="../estilos/misestilos.css">


    <style>
        .estilo{
            box-shadow: 2px 2px 5px gray;
        }
        .modal-dialog {
       max-width: 80% !important;
       
}

	</style>
</head>
<body class="bodyTotal">

<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }
    ?>

    <?php
        include_once('../pie/headerOtros.php');
        require_once('../controlador/principal.php');
        
        
        
    ?>

<div class="container">
        <div  class="border__table">
            <div class="table-title bg-primary table__header__config">
                <div class="row">
                    <div class="col-sm-5">
                    
						<h2>
                            <img src="../iconos/icons/table.svg" alt="" width="40" height="40"  title="Bootstrap"> 
                            Generales 
                        <b>un usuario y contraseña </b></h2>

                        
                    </div>
                    <div style="margin-top:0.5em;  margin: auto;">
                        <a href="#"><button type="button" class="btn__Add__Administrador" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                            Agregar Administrador
                        </button></a>

                    </div> 
                    <form action="../controlador/buscagestion.php" method="GET" class="form-inline">
                        <div class="col-7">
                             <input type="text" class="form-control" name ="accion" required placeholder="Buscar!!">
                        </div>
                         <div class="col">
                           <button type="sumbit" class="btn">
                            <img src="../iconos/icons/search.svg" alt="" width="40" height="40"  title="Buscar"> 
                            </button>
                         </div>
                    </form>
                </div>
            </div>

            <?php

try{
    $conexion = new PDO('mysql:host=localhost; dbname=serviportex','root','');

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("set character set utf8");

    $tamagno_pagina=5;

    $pagina=1;

    if(isset($_GET['pagina'])){

        if($_GET['pagina'] == 1){

            header("location:../vista/GestionUsuario.php");

        }else{
            $pagina = $_GET['pagina'];
        }

    }else{
        $pagina = 1;
    }

    $empezar_desde= ($pagina - 1) * $tamagno_pagina;

    $sql="select * from aspirante limit $empezar_desde,$tamagno_pagina;";

    $resultado = $conexion->prepare($sql);

    $resultado->execute();

    $total_paginas=ceil($total_registro/$tamagno_pagina);



}catch(Exception $e){

    die ("ERROR! " . $e->GetMessage() . $e->GetLine());

}           
            ?>


            <table class="table table-responsive table-hover text-white ">
                <thead>
                    <tr class="bg-dark">
                        <th>ID</th>
                        <th>Cv</th>                   
                        <th>Cedula</th>                             
						<th>Nombres</th>            
                        <th>Apellidos</th>
                        <th>Fecha/N</th>
                        <th>Edad</th>
                        <th>Fecha/I</th>  
                        <th>dirección</th>  
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th> 
                            Generer
                        </th>
                        <th class="text-center">ver</th>
                        <th class="text-center">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php foreach( $resultado as $datos):?>

                        <td><?php echo $datos['ID_Aspirante']?></td>
                        <td><?php echo $datos['curriculum']?></td>
                        <td><?php echo $datos['cedula']?></td>
						<td><?php echo $datos['nombres']?></td>
                        <td><?php echo $datos['apellidos']?></td>
                        <td><?php echo $datos['fecha_nac']?></td>
                        <td><?php echo $datos['edad']?></td>
						<td><?php echo $datos['fecha_ingre']?></td>
                        <td><?php echo $datos['direccion']?></td>
                        <td><?php echo $datos['telefono']?></td>
                        <td><?php echo $datos['correo']?></td>
                        <td>
                            <a href="../controlador/usucontra.php?ID=<?php echo $datos['ID_Aspirante']?> & cedula=<?php echo $datos['cedula']?>  & nombres=<?php echo $datos['nombres']?> & apellidos=<?php echo $datos['apellidos']?> & fecha_nac=<?php echo $datos['fecha_nac']?> & edad=<?php echo $datos['edad']?> & fecha_ingre=<?php echo $datos['fecha_ingre']?>  & direccion=<?php echo $datos['direccion']?> & telefono=<?php echo $datos['telefono']?> & correo=<?php echo $datos['correo']?>" class="edit" name="insertar" onclick="return confirmar('¿Decea generar un usuario y contraseña para <?php echo $datos['nombres']?>?')" ">
                            <img src="../iconos/icons/person-fill.svg" alt="" width="60" height="60"  title="Agregar Usuario"> 
                        </a>

                        </td>
                        <td>
                            <a href="../controlador/vercontra.php?cedula=<?php echo $datos['cedula']?>  & nombres=<?php echo $datos['nombres']?> ">
                            <img src="../iconos/icons/Eye-fill.svg" alt="" width="60" height="60"  title="Ver Usuario y contraseña">
                            </a>
                        </td>

                        
                        <td>
                        <a href="../controlador/enviar.php?cedula=<?php echo $datos['cedula']?> & correo=<?php echo $datos['correo']?>  & nombres=<?php echo $datos['nombres']?> & apellidos=<?php echo $datos['apellidos']?>">
                        <img src="../iconos/icons/chat-fill.svg" alt="" width="60" height="60"  title="enviar correo">
                        </a>
                        </td>
                        
                        
                    </tr>

                        <?php endforeach; ?> 

                       
                    
                     
                
                </tbody>
            </table>
			<div class="clearfix" style="margin:0px 2em;">
                <div class="hint-text text-white">Paginas <b><?php echo $total_paginas;?></b> y <b> <?php echo $total_registro;?> </b> Aspirantes Ingresados</div>
                <ul class="pagination">
                <?php for($i=1; $i<=$total_paginas; $i++){?>
                    <li class="page-item active"><a href="?pagina=<?php echo $i ?>" class="page-link"><?php echo $i?></a></li>
                <?php }?>

                </ul>
            </div>
        </div>
    </div>



<div class="container text-dark" >
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title " id="exampleModalLabel">
                <img src="../iconos/icons/person-fill.svg" alt="" width="30" height="30"  title="Agregar usurario">
                Agregar Administrador</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="background:-webkit-linear-gradient(left, #3931af, #00c6ff);">
                <form action="../controlador/administrador.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card estilo">
                                <div class="card-title">
                                    <h5 class="text-muted text-center">Datos personales</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text" name="cedula" class="form-control" placeholder="Ingrese su cedula" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control" placeholder="Ingresa tu Nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="apellido" class="form-control" placeholder="Ingresa tu Apellido" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card estilo">
                            <div class="card-title">
                                    <h5 class="text-muted text-center">Credenciales</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text" name="perfil" class="form-control" value="Administrador" readonly >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="usuario" class="form-control" placeholder="Agrega un Usuario" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="contra" class="form-control" placeholder="Agrega tu Contraseña" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
           
        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar!!</button>
                    </div>
                </form>    
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