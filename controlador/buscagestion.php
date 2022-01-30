<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acciones</title>
    <link rel="stylesheet" href="../estilos/css/bootstrap.min.css">
    <link rel="icon" href="../imagenes/logo2.ico">
    <link rel="stylesheet" href="../estilos/estilosCrud.css">
    <link rel="stylesheet" href="../estilos/contra.css">


    <style>
		a{
			text-decoration: none !important;
		}
        .estilo{
            box-shadow: 2px 2px 5px gray;
        }
        .modal-dialog {
       max-width: 80% !important;
       
}

	</style>
</head>
<body style ="padding-top:2.5em;  background:-webkit-linear-gradient(right, #3931af, #00c6ff);">

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

            <?php
                $busqueda = $_GET['accion'];
            ?>

<div class="container" style="margin-top:1.1em;"  >
        <div  style="border-radius:15px; box-shadow: 6px 10px 6px blck;">
            <div class="table-title bg-primary" style="border-radius:15px; margin:0px 0px; ">
                <div class="row">
                    <div class="col-sm-5">
                    
						<h2>
                            <img src="../iconos/icons/table.svg" alt="" width="40" height="40"  title="Bootstrap"> 
                            Generales 
                        <b>un usuario y contraseña</b></h2>

                        
                    </div>
                    <div style="padding-top:0.5em;  margin: auto;">
                        <a href="#"><button type="button" class="btn btn-info h1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="border-radius:15px;">Agregar Administrador</button></a>
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


    $sql="select * from aspirante where( 
        cedula like '%$busqueda%' OR
        nombres like '%$busqueda%' OR
        apellidos like '%$busqueda%' OR
        direccion like '%$busqueda%' OR
        correo like '%$busqueda%'
        )";

    $resultado = $conexion->prepare($sql);

    $resultado->execute();

    $total_registro = $resultado->rowCount();
 

}catch(Exception $e){

    die ("ERROR! " . $e->GetMessage() . $e->GetLine());

}           
            ?>


            <table class="table table-responsive table-hover text-white">
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
                    <?php foreach($resultado as $datos):?>

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
                <div class="hint-text text-white ">
                <img src="../iconos/icons/search.svg" alt="" width="40" height="40"  title="Buscar">    
                <b> <?php echo $total_registro;?> </b> Resultados en la Busqueda</div>
                
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